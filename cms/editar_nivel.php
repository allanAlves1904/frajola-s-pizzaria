<?php
//Conexao com o banco de dados
require_once("conectar_banco.php");
Conexao_db();

// inicianda a variavel de sessao
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Criar Novo Nível</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_editar_nivel.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
        <?php
        //if do botao editar
        if(isset($_POST["btEditar"]))
        {
            //Resgatar os dados fornecidos pelo usuario
            //usando o metod POST, conforme escolhido pelo Form
            $nivel=$_POST["txtNivel"];


            //Monta o Script para enviar para o BD
            addslashes($sql = "update tbl_nivel set nivel='".$nivel."' WHERE idNivel=".$_SESSION['idNivel']);

            //Executa o script no BD
            mysql_query($sql);

        ?>
        <script>
            alert("Nível cadastrado com sucesso!");
        </script>        
        <?php
                    header('location:cms_adm_usuarios.php');
        }
        ?>
    </head>
    <body>
        <form action="editar_nivel.php" name="frmCad" method="post">
            <div id="segura_tudo">
                <header>Editar Nível</header>
                <div id="principal">
                    <div class="titulo">Nível</div>
                    <input placeholder="Nível" type="text" name="txtNivel" value="<?php echo($_SESSION['nivel']); ?>" required class="tamanho_caixa"> 
                </div>
                <footer>
                    <div id="botao">
                        <input type="submit" name="btEditar" value="Editar" id="bt">
                        <div id="bt_voltar">
                            <a href="cms_adm_usuarios.php" style="text-decoration:none" id="cor">
                                Voltar(x)
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </form>
    </body>
</html>