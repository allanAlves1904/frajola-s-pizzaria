<?php 
//conexao com o db
require_once("cms/conectar_banco.php");
Conexao_db();
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Promoções</title>  
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_promocoes.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <!--Cabeçalho-->
        <header>
            <!--Area transparente-->
            <div id="transparente"></div>
            <div id="segura">
                <!--Logo-->
                <div id="logo">
                    <img src="img/logo2.png" alt="logo do site">
                </div>  
                <!--Menu-->
                <nav id="menu">
                    <div id="cima">
                        <div class="item_menu">
                            <a href="curiosidades.php" style="text-decoration:none">
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
                            <a href="promocoes.php" style="text-decoration:none" id="cor">
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
                Nossas Promoções
            </div>
            <?php
            $sql= "SELECT * FROM tbl_promocoes where opc = 1"; 
            $select=mysql_query($sql);
            while($rsNA = mysql_fetch_array($select))
            {
                $nome = $rsNA['nome'];
                $descicao = $rsNA['descricao'];
                $preco = $rsNA['preco'];
                $promo = $rsNA['promo'];
            ?>
            <div class="item_promo"> 
                <div class="img_promo">
                    
                    <img src="<?php echo("cms/".$rsNA["foto"]) ?>" width="300px" height="200px">
                </div>
                <div class="descri_promo">
                    <div class="linha">Nome: <?php echo($nome);?></div>
                    <div class="linha">Preço: R$<?php echo($preco);?></div>
                    <div class="linha">Preço Promocional: R$<?php echo($promo);?></div>
                    <div class="linha">Descrição: <?php echo($descicao);?></div>
                </div>
            </div>
            <?php    
            }
            ?>
            <!--<div class="item_promo">
                <div class="img_promo">
                    <img src='img/4_queijo.jpg' alt="">
                </div>
                <div class="descri_promo">
                    <div class="linha">Nome: Quatro Queijos</div>
                    <div class="linha">Preço: R$35,00</div>
                    <div class="linha">Preço Promocional: R$21,90</div>
                    <div class="linha">Descrição: Mussarela, parmesão, provolone e catupiry</div>
                </div>
            </div>
            <div class="item_promo">
                <div class="img_promo">
                    <img src="img/images.jpg" alt="">
                </div>
                <div class="descri_promo">
                    <div class="linha"> Nome: Margherita</div>
                    <div class="linha"> Preço: R$30,00</div>
                    <div class="linha"> Preço Promocional: R$19,99</div>
                    <div class="linha"> Descrição: Mussarela, tomate e manjericão</div> 
                </div>
            </div>-->
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