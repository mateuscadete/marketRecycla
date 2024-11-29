const mp = new MercadoPago("TEST-f7adf0d0-09ed-4fff-b581-1ef88659cc5e");

let cartTotal = 0;

async function getCartTotal() {
    try {
        const response = await fetch('controllers/get_cart_total.php');
        const data = await response.json();
        return data.total;
    } catch (error) {
        console.error('Erro ao buscar total do carrinho:', error);
        return 0;
    }
}

async function limparCarrinho() {
    try {
        const response = await fetch('../controllers/limpar_carrinho.php');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        console.log('Resposta da limpeza do carrinho:', data); // Debug
        if (data.status !== 'success') {
            throw new Error(data.message);
        }
        return true;
    } catch (error) {
        console.error('Erro ao limpar carrinho:', error);
        return false;
    }
}

(async function initializeForm() {
    cartTotal = await getCartTotal();
    
    const cardForm = mp.cardForm({
        amount: String(cartTotal),
        iframe: true,
        form: {
            id: "form-checkout",
            cardNumber: {
                id: "form-checkout__cardNumber",
                placeholder: "Número do cartão",
                style: {
                    "font-size": "16px",
                    "color": "#333333"
                }
            },
            expirationMonth: {
                id: "form-checkout__expirationMonth",
                placeholder: "MM",
                style: {
                    "font-size": "16px",
                    "color": "#333333"
                }
            },
            expirationYear: {
                id: "form-checkout__expirationYear",
                placeholder: "YY",
                style: {
                    "font-size": "16px",
                    "color": "#333333"
                }
            },
            securityCode: {
                id: "form-checkout__securityCode",
                placeholder: "CVV",
                style: {
                    "font-size": "16px",
                    "color": "#333333"
                }
            },
            cardholderName: {
                id: "form-checkout__cardholderName",
                placeholder: "Titular do cartão",
            },
            issuer: {
                id: "form-checkout__issuer",
                placeholder: "Banco emissor",
            },
            installments: {
                id: "form-checkout__installments",
                placeholder: "Parcelas",
            },
            identificationType: {
                id: "form-checkout__identificationType",
                placeholder: "Tipo de documento",
            },
            identificationNumber: {
                id: "form-checkout__identificationNumber",
                placeholder: "Número do documento",
            },
            cardholderEmail: {
                id: "form-checkout__cardholderEmail",
                placeholder: "E-mail",
            },
        },
        callbacks: {
            onFormMounted: (error) => {
                if (error) {
                    console.warn("Form Mounted handling error: ", error);
                    return;
                }
                console.log("Form mounted");
            },

            onSubmit: (event) => {
                event.preventDefault();

                const progressBar = document.querySelector(".progress-bar");
                progressBar.removeAttribute("value");

                cardForm.createCardToken()
                    .then(token => {
                        if (!token) {
                            throw new Error('Não foi possível gerar o token do cartão');
                        }
                        
                        const formData = cardForm.getCardFormData();
                        const cardholderName = document.querySelector('#form-checkout__cardholderName').value || 'APRO';
                        
                        return fetch("controllers/pagamento.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({
                                token: token.id,
                                payment_method_id: formData.paymentMethodId,
                                transaction_amount: Number(formData.amount),
                                installments: Number(formData.installments || 1),
                                description: "Compra na loja",
                                payer: {
                                    email: formData.cardholderEmail || 'test@test.com',
                                    identification: {
                                        type: formData.identificationType || 'CPF',
                                        number: formData.identificationNumber || '19119119100',
                                    },
                                    first_name: cardholderName.split(' ')[0],
                                    last_name: cardholderName.split(' ').slice(1).join(' ') || cardholderName.split(' ')[0]
                                },
                            }),
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            return response.text().then(text => {
                                try {
                                    return JSON.parse(text);
                                } catch (e) {
                                    console.error('Resposta do servidor:', text);
                                    throw new Error('Resposta inválida do servidor');
                                }
                            });
                        })
                        .then(result => {
                            console.log('Resultado do pagamento:', result);
                            if (result.status === "approved") {
                                fetch('controllers/esvaziar_carrinho.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log('Resposta do esvaziamento:', data);
                                    
                                    return fetch('controllers/destruir_sessao.php');
                                })
                                .then(() => {
                                    alert("Pagamento aprovado!");
                                    window.location.href = 'principal.php?clear=1&t=' + new Date().getTime();
                                })
                                .catch(error => {
                                    console.error('Erro:', error);
                                    alert("Pagamento aprovado!");
                                    window.location.href = 'principal.php';
                                });
                            } else {
                                throw new Error(result.message || "Erro no pagamento");
                            }
                        })
                        .catch(error => {
                            console.error("Erro:", error);
                            alert("Erro no pagamento: " + error.message);
                        })
                        .finally(() => {
                            progressBar.setAttribute("value", "0");
                        });
                    })
                    .catch(error => {
                        console.error("Erro:", error);
                        alert("Erro no pagamento: " + error.message);
                    });
            },

            onFetching: (resource) => {
                const progressBar = document.querySelector(".progress-bar");
                progressBar.removeAttribute("value");

                return () => {
                    progressBar.setAttribute("value", "0");
                };
            },

            onCardTokenReceived: (error, token) => {
                if (error) {
                    console.warn('Token handling error: ', error);
                    const errorMessages = {
                        '205': 'Digite o número do seu cartão.',
                        '208': 'Escolha um mês.',
                        '209': 'Escolha um ano.',
                        '212': 'Informe seu documento.',
                        '213': 'Informe seu documento.',
                        '214': 'Informe seu documento.',
                        '220': 'Informe seu banco.',
                        '221': 'Digite o nome e sobrenome.',
                        '224': 'Digite o código de segurança.',
                        'E301': 'Há algo de errado com esse número. Digite novamente.',
                        'E302': 'Confira o código de segurança.',
                        '316': 'Por favor, digite um nome válido.',
                        '322': 'Confira seu documento.',
                        '323': 'Confira seu documento.',
                        '324': 'Confira seu documento.',
                        '325': 'Confira a data.',
                        '326': 'Confira a data.'
                    };
                    
                    let errorMessage = 'Verifique os dados do cartão.';
                    if (Array.isArray(error)) {
                        errorMessage = error.map(err => errorMessages[err.code] || err.message).join('\n');
                    }
                    
                    alert(errorMessage);
                    return;
                }
                console.log('Token received:', token);
            },

            onPaymentMethodsReceived: (error, paymentMethods) => {
                if (error) {
                    console.warn('Erro ao receber métodos de pagamento:', error);
                    return;
                }
                
                mp.getInstallments({
                    amount: String(cartTotal),
                    locale: 'pt-BR',
                    payment_method_id: paymentMethods[0].id,
                    bin: cardForm.getCardFormData().bin
                }).then(function (installments) {
                    const installmentsSelect = document.querySelector('#form-checkout__installments');
                    if (installmentsSelect && installments[0]) {
                        installmentsSelect.innerHTML = '';
                        
                        installments[0].payer_costs.forEach(payerCost => {
                            const option = document.createElement('option');
                            option.value = payerCost.installments;
                            
                            const installmentAmount = (payerCost.installment_amount).toLocaleString('pt-BR', {
                                style: 'currency',
                                currency: 'BRL'
                            });
                            
                            const totalAmount = (payerCost.total_amount).toLocaleString('pt-BR', {
                                style: 'currency',
                                currency: 'BRL'
                            });
                            
                            if (payerCost.installments === 1) {
                                option.textContent = `À vista ${totalAmount}`;
                            } else {
                                option.textContent = `${payerCost.installments}x de ${installmentAmount}`;
                                if (payerCost.installment_rate > 0) {
                                    option.textContent += ` (Total: ${totalAmount})`;
                                } else {
                                    option.textContent += ` sem juros`;
                                }
                            }
                            
                            installmentsSelect.appendChild(option);
                        });
                    }
                }).catch(function (error) {
                    console.error('Erro ao buscar parcelas:', error);
                });
            },

            onInstallmentsReceived: (error, installments) => {
                if (error) {
                    console.warn('Erro ao receber parcelas:', error);
                    return;
                }

                const installmentsSelect = document.querySelector('#form-checkout__installments');
                if (installmentsSelect && installments.length > 0) {
                    installmentsSelect.innerHTML = '';
                    
                    installments.forEach(option => {
                        const installmentOption = document.createElement('option');
                        installmentOption.value = option.installments;
                        
                        const installmentAmount = (option.installment_amount).toLocaleString('pt-BR', {
                            style: 'currency',
                            currency: 'BRL'
                        });
                        
                        const totalAmount = (option.total_amount).toLocaleString('pt-BR', {
                            style: 'currency',
                            currency: 'BRL'
                        });
                        
                        if (option.installments === 1) {
                            installmentOption.textContent = `À vista ${totalAmount}`;
                        } else {
                            installmentOption.textContent = `${option.installments}x de ${installmentAmount}`;
                            if (option.installment_rate > 0) {
                                installmentOption.textContent += ` (Total: ${totalAmount})`;
                            } else {
                                installmentOption.textContent += ` sem juros`;
                            }
                        }
                        
                        installmentsSelect.appendChild(installmentOption);
                    });
                }
            },
        },
    });
})();
