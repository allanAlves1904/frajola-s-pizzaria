<?php

//Conexao com o banco de dados
require_once("conectar_banco.php");
Conexao_db();

// inicianda a variavel de sessao
session_start();

//if do botao voltar
if(isset($_POST['BtnVoltar'])){
    header('location:cms_adm_usuarios.php');
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>CMS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_visualizar_usuario.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <form name="frmVu" method="post" action="visualizar_usuario.php">
            <div id="segura_tudo">
                <header>Detalhes do Usuário:</header>
                <div id="principal">
                    <div class="titulo">Nome:</div>
                    <div class="tamanho">
                        <?php echo($_SESSION['nomeUser']); ?>            
                    </div>
                    <div class="titulo">Usuário:</div>
                    <div class="tamanho">
                        <?php echo($_SESSION['usuario']); ?>            
                    </div>
                    <div class="titulo">Telefone:</div>
                    <div class="tamanho">
                        <?php echo($_SESSION['telefoneUsuario']); if($_SESSION['telefoneUsuario'] ==null){ echo("Dados não informado");} ?>            
                    </div>
                    <div class="titulo">Celular:</div>
                    <div class="tamanho">
                        <?php echo($_SESSION['celularUsuario']); ?>            
                    </div>
                    <div class="titulo">Email:</div>
                    <div class="tamanho">
                        <?php echo($_SESSION['emailUsuario']); ?>            
                    </div>
                    <div class="titulo">Sexo:</div>
                    <div class="tamanho">
                        <?php echo($_SESSION['sexoUsuario']); ?>            
                    </div>
                    <div class="titulo">Nível:</div>
                    <div class="tamanho">
                        <?php echo($_SESSION['nivelUsuario']); ?>            
                    </div>
                </div>
                <footer>
                    <div id="bt">
                        <input type="submit" name="BtnVoltar" value="Voltar" id="voltar"> 
                    </div>
                </footer>
            </div>
        </form>
    </body>
</html>