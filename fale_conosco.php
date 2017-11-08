<?php

//************conexão com o Msql************************
    require_once("cms/conectar_banco.php");
    Conexao_db();
//******************************************************

//Verifica se o botão Salvar foi clicado
if(isset($_POST["BtnSalvar"]))
{
    //Resgatar os dados fornecidos pelo usuario
    //usando o metod POST, conforme escolhido pelo Form
    $nome=$_POST["txtNome"];
    $telefone=$_POST["txtTel"];
    $celular=$_POST["txtCel"];
    $email=$_POST["txtEmail"];
    $home_page=$_POST["txthome"];
    $link_facebook=$_POST["txtface"];
    $profissao=$_POST["txtprofi"];
    $informacao_produto=$_POST["txtproduto"];
    $sexo=$_POST["rdosexo"];
    $sugestao=$_POST["txtsugestao"];
    
    //Monta o Script para enviar para o BD
    addslashes($sql = "insert into tbl_fale_conosco (nome, telefone, celular, email, home_page, link_facebook, profissao, informacao_produto, sexo, sugestao)
                values ('".$nome."','".$telefone."','".$celular."','".$email."','".$home_page."','".$link_facebook."','".$profissao."','".$informacao_produto."','".$sexo."','".$sugestao."') ");
   
    //Executa o script no BD
    mysql_query($sql);
    
   header('location:fale_conosco.php');
    //Dar um echo so sql sempre que der erro no insert, para ver qual é o erro
   // echo($sql);
    
}

?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Fale Conosco</title>  
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_fale_conosco.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <!-- Deve ser usada apenas para 
            criar o cabeçalho do site -->
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
                            <a href="fale_conosco.php" style="text-decoration:none" id="cor"> 
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
        <form name="frmhome" method="post" action="fale_conosco.php">
            <!--Conteudo-->
            <div id="principal">
                <div id="container">
                    <div id="titulo">
                        Observação, Critica ou Sugestão:
                    </div>
                    <div class="tamanho">
                        <div>Nome:</div> 
                        <div>
                            <input placeholder="Digite seu nome" type="text" name="txtNome" value="" class="tamanho_caixa" required pattern="[a-z A-Z ã Ã õ Õ é É ô Ô ç Ç]*" 
                                   title="Permitido apenas letras" onkeypress="return validar(event,'number')">
                        </div>
                    </div>
                    <div class="tamanho">
                        <div>Telefone:</div>
                        <div>
                            <input placeholder="DDD XXXX-XXXX" type="text" name="txtTel" value="" class="tamanho_caixa" >
                        </div>
                    </div>
                    <div class="tamanho">
                        <div>Celular:</div>
                        <div>
                            <input placeholder="DDD 9XXXX-XXXX" type="text" name="txtCel" value="" class="tamanho_caixa" required pattern="[0-9]{3} [0-9]{5}-[0-9]{4}" title="Formato obrigatótio DDD 9XXXX-XXXX" onkeypress="return validar(event,'caracter')">
                        </div>
                    </div>
                    <div class="tamanho">
                        <div>Email:</div>
                        <div>
                            <input placeholder="Digite seu email" type="email" name="txtEmail" value="" class="tamanho_caixa" required>
                        </div>
                    </div>
                    <div class="tamanho">
                        <div>Home Page:</div>
                        <div>
                            <input type="url" name="txthome" value="" class="tamanho_caixa">
                        </div>
                    </div>
                    <div class="tamanho">
                        <div>Link no Facebook:</div>
                        <div>
                            <input type="url" name="txtface" value="" class="tamanho_caixa">
                        </div>
                    </div>
                    <div class="tamanho">
                        <div>Profissão:</div>
                        <div>
                            <input placeholder="Informe sua profissão" type="text" name="txtprofi" value="" class="tamanho_caixa" required>
                        </div>
                    </div>
                    <div class="tamanho">
                        <div>Informações de Produtos:</div>
                        <div>
                            <input type="text" name="txtproduto" value="" class="tamanho_caixa">
                        </div>
                    </div>
                    <div class="tamanho">
                        <div>Sexo:</div>
                        <div>
                            <input type="radio" name="rdosexo" value="M" required>Masculino
                            <input type="radio" name="rdosexo" value="F" required>Feminino
                        </div>
                    </div>
                    <div id="obs">
                        <div>Sugestão/Criticas:</div>
                        <div>
                            <textarea  name="txtsugestao" maxlength="255"></textarea>
                        </div>
                    </div>
                    <div id="btn">
                        <input type="submit" name="BtnSalvar" value="Enviar"> 
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