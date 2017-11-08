<?php 
//conexao com o db
require_once("cms/conectar_banco.php");
Conexao_db();
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Pizza do Mes</title>  
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_pizza_mes.css">
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
        <script>
            $(function(){
                $('.thumbs img').click(function(){
                    var cover = $('.cover img');
                    var thumb = $(this).attr('src');
                    
                    if(cover.attr('src') !== thumb){
                        cover.fadeTo('200', '0', function(){
                            cover.attr('src', thumb);
                            cover.fadeTo('150', '1');
                        });  
                        
                        $('.thumbs img').removeClass('active');
                        $(this).addClass('active');
                    }
                });                
            });
        </script>
    </head>
    <body>
        <!-- Cabeçalho-->
        <header>
            <div id="transparente"></div>
            <div id="segura">
                <div id="logo">
                    <img src="img/logo2.png" alt="logo do site">
                </div>           
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
                            <a href="pizza_mes.php" style="text-decoration:none" id="cor">
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
                Pizza do Mês
            </div>
            <?php
            $sql= "SELECT * FROM tbl_pizza_mes where opc = 1"; 
            $select=mysql_query($sql);
            while($rsNA = mysql_fetch_array($select))
            {
                $nome = $rsNA['nome'];
                $descicao = $rsNA['descricao'];
                $preco = $rsNA['preco'];
            ?> 
            <div class="cover">
                <div id="segura_img">
                    <img src="<?php echo("cms/".$rsNA["foto"]) ?>" alt="">
                </div>
            </div> 
            <div class="thumbs">
                <div id="segura_imagens">
                    <img src="<?php echo("cms/".$rsNA["foto"]) ?>" alt="" class="active">
                    <img src="<?php echo("cms/".$rsNA["fotoDois"]) ?>" alt="">
                    <img src="<?php echo("cms/".$rsNA["fotoTres"]) ?>" alt="">
                    <img src="<?php echo("cms/".$rsNA["fotoQuatro"]) ?>" alt="">
                </div>
            </div>
            
            <div id="detalhe">
                <div class="tamanho">
                    Nome: <?php echo($nome);?>
                </div>
                <div class="tamanho">
                   Descrição: <?php echo($descicao);?>
                </div>
                <div class="tamanho">
                   Preço especial: R$<?php echo($preco);?> (Apenas esse mês)
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