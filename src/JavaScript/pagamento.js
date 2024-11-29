const mp = new MercadoPago("TEST-f7adf0d0-09ed-4fff-b581-1ef88659cc5e");

const cardForm = mp.cardForm({
    amount: "100.5",
    iframe: true,
    form: {
        id: "form-checkout",
        cardNumber: {
            id: "form-checkout__cardNumber",
            placeholder: "Número do cartão",
            style: {
                "font-size": "16px"
            }
        },
        cardExpirationMonth: {
            id: "form-checkout__cardExpirationMonth",
            placeholder: "MM",
            style: {
                "font-size": "16px"
            }
        },
        cardExpirationYear: {
            id: "form-checkout__cardExpirationYear",
            placeholder: "YY",
            style: {
                "font-size": "16px"
            }
        },
        securityCode: {
            id: "form-checkout__securityCode",
            placeholder: "CVV",
            style: {
                "font-size": "16px"
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
        onFormMounted: error => {
            if (error) {
                console.warn("Form Mounted handling error: ", error);
                return;
            }
            console.log("Form mounted successfully");
        },
        onSubmit: event => {
            event.preventDefault();
            
            const {
                paymentMethodId,
                issuerId,
                cardholderEmail: email,
                amount,
                token,
                installments,
                identificationNumber,
                identificationType,
            } = cardForm.getCardFormData();

            fetch("controllers/pagamento.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    token,
                    issuerId,
                    paymentMethodId,
                    transactionAmount: Number(amount),
                    installments: Number(installments),
                    description: "Descrição do produto",
                    payer: {
                        email,
                        identification: {
                            type: identificationType,
                            number: identificationNumber,
                        },
                    },
                }),
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === "approved") {
                    // Limpa o carrinho após o pagamento aprovado
                    fetch('controllers/esvaziar_carrinho.php', {
                        method: 'POST'
                    })
                    .then(() => {
                        alert("Pagamento aprovado!");
                        window.location.href = 'principal.php';
                    });
                } else {
                    alert("Pagamento não aprovado");
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert("Erro no pagamento");
            });
        },
        onFetching: (resource) => {
            console.log("Fetching resource: ", resource);
        }
    },
});

// Inicializa os campos do formulário
document.addEventListener('DOMContentLoaded', function() {
    cardForm.mount();
});
