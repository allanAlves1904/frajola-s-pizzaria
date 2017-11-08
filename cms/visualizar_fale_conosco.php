<?php
//Conexao com o banco de dados
require_once("conectar_banco.php");
Conexao_db();

//if do botao lvoltar
if(isset($_POST['BtnVoltar'])){
    header('location:cms_adm_fale_conosco.php');
}

// inicianda a variavel de sessao
session_start();

?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Visualização</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_visualizar_fale_conosco.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <form name="frmVFC" method="post" action="visualizar_fale_conosco.php">
            <div id="segura_tudo">
                <header>Detalhes do Fale Conosco:</header>
                <div id="principal">
                    <div class="titulo">Nome:</div>
                    <div class="conteudo"><?php echo($_SESSION['nomeFC']);?></div>
                    <div class="titulo">Telefone:</div>
                    <div class="conteudo"><?php echo($_SESSION['telefone']); if($_SESSION['telefone'] ==null){ echo("Dados não informado");}?></div>
                    <div class="titulo">Celular</div>
                    <div class="conteudo"><?php echo($_SESSION['celular']);?></div>
                    <div class="titulo">Email:</div>
                    <div class="conteudo"><?php echo($_SESSION['email']);?></div>
                    <div class="titulo">Home Page:</div>
                    <div class="link"><?php echo($_SESSION['h_p']); if($_SESSION['h_p'] ==null){ echo("Dados não informado");}?></div>
                    <div class="titulo">Link Facebook:</div>
                    <div class="link"><?php echo($_SESSION['l_f']); if($_SESSION['l_f'] ==null){ echo("Dados não informado");}?></div>
                    <div class="titulo">Profissão:</div>
                    <div class="conteudo"><?php echo($_SESSION['profissao']); ?></div>
                    <div class="titulo">Informação do Produto:</div>
                    <div class="conteudo"><?php echo($_SESSION['i_p']); if($_SESSION['i_p'] ==null){ echo("Dados não informado");}?></div>
                    <div class="titulo">Sexo:</div>
                    <div class="conteudo"><?php echo($_SESSION['sexo']);?></div>
                    <div class="titulo">Sugestão/Crítica:</div>
                    <div class="conteudo"><?php echo($_SESSION['sugetao']); if($_SESSION['sugetao'] ==null){ echo("Dados não informado"); }?></div>
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