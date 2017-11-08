<?php 

require_once("cms/conectar_banco.php");
Conexao_db();;



session_start();

?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Nosso Ambiente</title>  
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_nosso_ambiente.css">
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
                            <a href="nosso_ambiente.php" style="text-decoration:none" id="cor">
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
                Informações de nossas lojas
            </div>
            <?php
            $sql= "SELECT * FROM tbl_nosso_ambiente where opc = 1"; 
            $select=mysql_query($sql);
            while($rsNA = mysql_fetch_array($select))
            {
                $nome = $rsNA['nome'];
                $cidade = $rsNA['cidade'];
                $bairro = $rsNA['bairro'];
                $rua = $rsNA['rua'];
                $telefone = $rsNA['telefone'];
                $horaInicio = $rsNA['horaAbrir'];
                $horaFechar = $rsNA['horaFechar'];
            ?> 
            <div class="caixa">
                <div class="dt">
                    ___/___/___
                </div>
                <div class="loja">
                    <?php echo($nome);?>
                </div>
                <div class="linha">
                    Cidade: <?php echo($cidade);?>
                </div>
                <div class="linha">
                    Bairro: <?php echo($bairro);?>
                </div>
                <div class="linha">
                    Rua: <?php echo($rua);?>
                </div>
                <div class="linha">
                    Tel.: <?php echo($telefone);?>
                </div>
                <div class="linha">
                    Ter a Dom:  <?php echo($horaInicio);?> ás <?php echo($horaFechar);?>
                </div>
                <div class="linha">
                </div>
                <div class="linha">
                </div>
                <div class="linha">
                </div>
                <div class="ultima_linha">
                </div>
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