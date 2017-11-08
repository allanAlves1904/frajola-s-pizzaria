<?php 


require_once("cms/conectar_banco.php");
Conexao_db();


$usuario = null;
$senha = null;

//inicia a sessão com o banco
session_start();

?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Frajola’s Pizzaria</title>  
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_home.css">
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="coin-slider.min.js"></script>
        <link rel="stylesheet" href="css/coin-slider-styles.css" type="text/css" />
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
        <?php 
        if(isset($_POST["BtnOk"]))
        {
            $usuario = $_POST['txtusuario'];
            $senha = $_POST['txtsenha'];

            addslashes($sql = "SELECT * FROM tbl_usuario WHERE usuario = '".$usuario."' AND senha = '".$senha."';");

            $result = mysql_query($sql);

            if(mysql_num_rows($result) >0){

                $select = mysql_query($sql);

                $rsUsuario = mysql_fetch_array($select);

                $_SESSION['nomeUsuario'] = $rsUsuario['nome'];

                header('location:cms/cms_adm_conteudo.php');
            }else{
        ?>
        <script>
            alert("Usuário ou Senha incorretos!!!");
        </script>
        <?php
            }

        }
        ?>
    </head>    
    <body>
        <form name="frmhome" method="post" action="home.php">
            <!-- Deve ser usada apenas para 
                criar o cabeçalho do site -->
            <header>
                <!--Area transparente-->
                <div id="transparente"></div>
                <div id="segura">
                    <!--Logo-->
                    <div id="logo">
                        <img src="img/logo2.png" alt="logo do site">
                    </div>  
                    <!--Menu -->
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
                                <a href="home.php" style="text-decoration:none" id="cor"> 
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
                    <!--Area do login-->
                    <div id="area_login">
                        <div class="login">
                            <div>Usuário:</div>
                            <div>
                                <input placeholder="Digite seu usuario" type="text" name="txtusuario" value="" class="tamanho_caixa"> 
                            </div>
                        </div>
                        <div class="login">
                            <div>Senha:</div>
                            <div>
                                <input placeholder="Digite sua senha" type="password" name="txtsenha" value="" class="tamanho_caixa">
                            </div>                    
                        </div>
                        <div id="botao">
                            <input type="submit" name="BtnOk" value="Entrar" id="bt"> 
                        </div>
                    </div>
                </div>
            </header>  
            <!-- Conteudo -->
            <div id="principal">
                <!--Redes sociais-->
                <div id="contatos">
                    <div class="item_contatos">
                        <a target="_blank" href="https://www.instagram.com" style="text-decoration:none">
                            <img src="img/instagram.png" alt="rede social instagram">
                        </a>       
                    </div>
                    <div class="item_contatos">
                        <!-- target='_blank' serve para abrir o link em outra pagina -->
                        <a target="_blank" href="https://www.facebook.com" style="text-decoration:none">
                            <img src="img/facebook.png" alt="rede social facebook">
                        </a>
                    </div>
                    <div class="item_contatos">
                        <a target="_blank" href="https://twitter.com" style="text-decoration:none">
                            <img src="img/twitter.png" alt="rede social twitter">
                        </a>                        
                    </div>
                </div>
                <!--Area de slideshow de imagens-->
                <div id="slideshow">
                    <div id='coin-slider'>
                        <a href="#">
                            <img src='img/massa-artezanale.png' alt="piza">
                            <span>
                                <b>Pizza 1</b> <br /> 
                            </span>
                        </a>
                        <a href="#">
                            <img src='img/6.jpg' alt="piza">
                            <span>
                                <b>Pizza 2</b> <br /> 
                            </span>
                        </a>
                        <a href="#">
                            <img src='img/margherita.jpg' alt="piza">
                            <span>
                                <b>Pizza Margherita</b> <br /> 
                            </span>
                        </a>
                        <a href="#">
                            <img src='img/vegetariana.jpg' alt="piza">
                            <span>
                                <b>Pizza Vegetariana</b> <br /> 
                            </span>
                        </a>
                        <a href="#">
                            <img src='img/pizza-romeu-julieta.jpg' alt="pizza romeu-julieta">
                            <span>
                                <b>Pizza Romeu-julieta</b> <br /> 
                            </span>
                        </a>
                    </div>
                    <script type="text/javascript">
                      $(document).ready(function() {
                        $('#coin-slider').coinslider({ width: 1200, height: 570, navigation: true, effect:'', delay: 3000 });
                      });
                    </script>
                </div>
                <div id="segura_conteudo">
                    <!--Menu lateral-->
                    <div id="menu_lateral">
                        <div class="item_menu_lateral">Teste</div>               
                        <div class="item_menu_lateral">Teste</div>               
                    </div>
                    <!--Produtos-->
                    <div id="produto_pizza">
                        <div class="produto">
                            <div class="img">
                                <img src='img/calabresa.jpg' alt=""> 
                            </div>
                            <div class="inf_produto">Nome: Calabresa</div>
                            <div class="inf_produto">Preço: R$19,50</div>
                            <div class="descricao_produto">Descrição: Calabresa, orégano, azeitona e cebola </div>
                            <div class="detalhes_produto">Detalhes</div>
                        </div>  
                        <div class="produto">
                            <div class="img">
                                <img src="img/images.jpg" alt="">
                            </div>
                            <div class="inf_produto">Nome: Margherita</div>
                            <div class="inf_produto">Preço: R$30,00</div>
                            <div class="descricao_produto">Descrição: Mussarela, Tomate e Manjericão</div>
                            <div class="detalhes_produto">Detalhes</div>
                        </div> 
                        <div class="produto">
                            <div class="img">
                                <img src='img/massa-fantastica.png' alt="">
                            </div>
                            <div class="inf_produto">Nome: Pepperoni</div>
                            <div class="inf_produto">Preço: R$25,50</div>
                            <div class="descricao_produto">Descrição: Mussarela, salame tipo pepperoni e orégano</div>
                            <div class="detalhes_produto">Detalhes</div>
                        </div> 
                        <div class="produto">
                            <div class="img">
                                <img src='img/fango_catupiry.jpg' alt="">
                            </div>
                            <div class="inf_produto">Nome: Frango com Catupiry</div>
                            <div class="inf_produto">Preço: R$22,50</div>
                            <div class="descricao_produto">Descrição: Frango, catupiry, tomate, orégano e azeitona</div>
                            <div class="detalhes_produto">Detalhes</div>
                        </div> 
                        <div class="produto">
                            <div class="img">
                                <img src='img/4_queijo.jpg' alt="">  
                            </div>
                            <div class="inf_produto">Nome: Quatro Queijos</div>
                            <div class="inf_produto">Preço: R$35,00</div>
                            <div class="descricao_produto">Descrição: Mussarela, parmesão, provolone e catupiry </div>
                            <div class="detalhes_produto">Detalhes</div>
                        </div> 
                        <div class="produto">
                            <div class="img">
                                <img src='img/pizza-de-kinder-ovo.jpg' alt="">
                            </div>
                            <div class="inf_produto">Nome: Kinder ovo</div>
                            <div class="inf_produto">Preço: R$30,50</div>
                            <div class="descricao_produto">Descrição: Chocolate e pedaços de kinder ovo</div>
                            <div class="detalhes_produto">Detalhes</div>
                        </div> 
                    </div>                
                </div>
            </div>
            <!-- Serve para criar o rodapé 
                    do site -->
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
        </form>
    </body>
</html>