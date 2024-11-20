<?php
// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {

    // Verifica se a imagem foi enviada corretamente
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {

        // Extrai informações sobre a imagem
        $imagem = $_FILES['imagem'];
        $nomeImagem = $imagem['name'];
        $tmpNomeImagem = $imagem['tmp_name'];
        $extensaoImagem = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));

        // Diretório onde a imagem será salva
        $diretorioDestino = 'uploads/';

        // Gera um nome único para a imagem
        $nomeImagemFinal = uniqid('img_', true) . '.' . $extensaoImagem;

        // Extensões permitidas
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];

        // Verifica se a extensão da imagem é permitida
        if (in_array($extensaoImagem, $extensoesPermitidas)) {

            // Cria o diretório caso ele não exista
            if (!is_dir($diretorioDestino)) {
                mkdir($diretorioDestino, 0777, true);
            }

            // Move a imagem para o diretório de destino
            if (move_uploaded_file($tmpNomeImagem, $diretorioDestino . $nomeImagemFinal)) {
                echo "<p class='message'>Imagem enviada com sucesso! <br><img src='" . $diretorioDestino . $nomeImagemFinal . "' alt='Imagem enviada' width='300'></p>";
            } else {
                echo "<p class='error'>Erro ao mover a imagem para o diretório.</p>";
            }
        } else {
            echo "<p class='error'>Somente arquivos JPG, JPEG, PNG e GIF são permitidos.</p>";
        }
    } else {
        echo "<p class='error'>Erro ao enviar a imagem. Tente novamente.</p>";
    }
}
?>
