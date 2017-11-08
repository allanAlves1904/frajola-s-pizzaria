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
        <title>CMS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_visualizar_pizza_mes.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <form name="frmVu" method="post" action="visualizar_visualizar_pizza_mes.php">
            <div id="segura_tudo">
                <header>Detalhes Da Pizza do Mês:</header>
                <?php
                $sql= "SELECT * FROM tbl_pizza_mes WHERE id=".$_SESSION['idPizzaMes']; 
                $select=mysql_query($sql);
                while ($rsNA = mysql_fetch_array($select))
                {
                    $nome = $rsNA['nome'];
                    $descicao = $rsNA['descricao'];
                    $preco = $rsNA['preco'];
                    $fotoUm = $rsNA['foto'];
                    $fotoDois = $rsNA['fotoDois'];
                    $fotoTres = $rsNA['fotoTres'];
                    $fotoQuatro = $rsNA['fotoQuatro'];
                ?>
                <div id="principal">
                    <div class="titulo">Nome:</div>
                    <div class="tamanho">
                        <?php echo($nome); ?>            
                    </div>
                    <div class="titulo">Desciçâo:</div>
                    <div class="tamanho">
                        <?php echo($descicao); ?>            
                    </div>
                    <div class="titulo">Preço:</div>
                    <div class="tamanho">
                        <?php echo($preco);  ?>            
                    </div>
                    <div class="titulo">Foto 1:</div>
                    <div class="tamanho_foto">
                        <img src="<?php echo($fotoUm)?>"  width="65" height="50">          
                    </div>
                    <div class="titulo">Foto 2:</div>
                    <div class="tamanho_foto">
                        <img src="<?php echo($fotoDois)?>"  width="65" height="50">           
                    </div>
                    <div class="titulo">Foto 3:</div>
                    <div class="tamanho_foto">
                        <img src="<?php echo($fotoTres)?>"  width="65" height="50">
                    </div>
                    <div class="titulo">Foto 4:</div>
                    <div class="tamanho_foto">
                        <img src="<?php echo($fotoQuatro)?>"  width="65" height="50">        
                    </div>
                </div>
                <?php
                }
                ?>
                <footer>
                    <div id="bt">
                        <a href="conteudo_pizza_mes.php">
                            <input type="button" name="BtnVoltar" value="Voltar" id="voltar"> 
                        </a>
                    </div>
                </footer>
            </div>
        </form>
    </body>
</html>