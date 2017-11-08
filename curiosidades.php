<?php 

require_once("cms/conectar_banco.php");
Conexao_db();;



session_start();

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Curiosidades</title>  
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_curiosidades.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <!--Cabeçalho-->
        <header>
            <!--Area transparente-->
            <div id="transparente"></div>
            <div id="segura">
                <!--Login-->
                <div id="logo">
                    <img src="img/logo2.png" alt="logo do site">
                </div>   
                <!--Area menu-->
                <nav id="menu">
                    <div id="cima">
                        <div class="item_menu">
                            <a href="curiosidades.php" style="text-decoration:none" id="cor">
                                Curiosidades                             
                            </a>                            
                        </div>
                        <div class="item_menu">
                            <a href="fale_conosco.php" style="text-decoration:none"> 
                                Fale Conosco
                            </a>                             
                        </div>
                        <div class="item_menu">
                            <a href="home.php" style="text-decoration:none"> 
                                Home
                            </a>                        
                        </div>
                        <div class="item_menu_diferente">
                            <a href="nosso_ambiente.php" style="text-decoration:none">
                                Nossos Ambientes
                            </a>                            
                        </div>
                    </div>
                    <div id="baixo">
                        <div class="item_menu">
                            <a href="pizza_mes.php" style="text-decoration:none">
                                Pizza do Mês
                            </a>                             
                        </div>
                        <div class="item_menu">
                            <a href="promocoes.php" style="text-decoration:none">
                                Promoções
                            </a>                             
                        </div>
                        <div class="item_menu_diferente">
                            <a href="sobre_pizzaria.php" style="text-decoration:none">
                                Sobre a Pizzaria
                            </a>                             
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--Conteudo-->
        <div id="principal">
            <div id="titulo">
                Curiosidades das décadas 
            </div>
            <?php
            $sql= "SELECT * FROM tbl_curiosidades where opc = 1"; 
            $select=mysql_query($sql);
            while($rsNA = mysql_fetch_array($select))
            {
                $primeiroT = $rsNA['primeiroTitulo'];
                $primeiro = $rsNA['primeiro'];
                $segundoT = $rsNA['segundoTitulo'];
                $segundo = $rsNA['segundo'];
                $terceiroT = $rsNA['terceiroTitulo'];  
                $terceiro = $rsNA['terceiro'];
            ?> 
            
            <div class="sub_titulo">
                <?php echo($primeiroT);?>
            </div>
            <div class="texto">
                <?php echo($primeiro);?>
            </div>
            <div class="sub_titulo">
                <?php echo($segundoT);?>
            </div>
            <div class="texto">
                <?php echo($segundo);?>
            </div>
            <div class="sub_titulo">
                <?php echo($terceiroT);?>
            </div>
            <div class="texto">
                <?php echo($terceiro);?>
            </div>
            <?php       
                
            }
            ?>
        </div>
        <!--Rodape-->
         <footer>
            <div id="segura1">
                <div id="t">
                    Mapa do site:
                </div>
                <div id="mapa_site">
                    <div class="item_mapa">
                        <a href="curiosidades.php" style="text-decoration:none">
                            Curiosidades                             
                        </a>                            
                    </div>
                    <div class="item_mapa">
                        <a href="fale_conosco.php" style="text-decoration:none"> 
                            Fale Conosco
                        </a>                             
                    </div>
                    <div class="item_mapa">
                        <a href="home.php" style="text-decoration:none"> 
                            Home
                        </a>                        
                    </div>
                    <div class="item_mapa">
                        <a href="nosso_ambiente.php" style="text-decoration:none">
                            Nossos Ambientes
                        </a>                            
                    </div>
                    <div class="item_mapa">
                        <a href="pizza_mes.php" style="text-decoration:none">
                            Pizza do Mês
                        </a>                             
                    </div>
                    <div class="item_mapa">
                        <a href="promocoes.php" style="text-decoration:none">
                            Promoções
                        </a>                             
                    </div>
                    <div class="item_mapa">
                        <a href="sobre_pizzaria.php" style="text-decoration:none">
                            Sobre a Pizzaria
                        </a>                             
                    </div>
                </div>
                <!--Redes sociais-->
                <div id="rede_social">
                    <div id="rede_social_titulo">
                        Redes Sociais
                    </div>
                    <div id="ceter">
                        <div class="icon">
                            <a target="_blank" href="https://www.instagram.com" style="text-decoration:none">
                                <img src="img/instagram_circle_color-32.png" alt="rede social instagram">
                            </a>
                        </div>
                        <div class="icon">
                            <a target="_blank" href="https://www.facebook.com" style="text-decoration:none">
                                <img src="img/facebook_circle_color-32.png" alt="rede social facebook">
                            </a>
                        </div>
                        <div class="icon">
                            <a target="_blank" href="https://twitter.com" style="text-decoration:none">
                                <img src="img/twitter_circle_color-32.png" alt="rede social twitter">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="transparente1"></div>
        </footer>
    </body>
</html>