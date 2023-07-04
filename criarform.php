<html>
    <head>
        <title>Cria um novo Administrador</title>
    </head>
    <body>
    <?php 
            // Inicia a sessao
            session_start();

            // Se existir a marcacao de estar logado
            if(isset($_SESSION["logado"]) == true) {
                //Se a maracacao esta True

                // Exibe o nome do usuario
                echo "Ola " . $_SESSION["nome"];
            } else {
                // Se a marcacao nao existir ou for falsa

                // Direciona paga a pagina de login com a mensagem de erro
                header("location:loginadmin.php?msg=PRIMEIRO VOCÊ DEVE LOGAR");
            }
        ?>
        <h1>Cria um novo Administrador</h1>
        <br>    
        <Form Action="criarprocessamento.php" method="POST">
            <br>
            Nome : 
            <input type="text" name="nome">
            <br>
            Email : 
            <input type="text" name="email">
            <br>
            Senha : 
            <input type="password" name="senha">
            <br>
            <input type="submit" value="Enviar"> 
        </Form>
        <br>
        <a href="listaradmins.php">Voltar para a Pagina de Lista</a>    
    </body>
</html>   