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
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="css/style_cms_adm_produto.css">
    </head>
    <body>
        <form>
            <div id="segura_tudo">
                <header>
                    <div id="cms">
                        <span>CMS</span> - Sistema de Gerenciamento do Site
                    </div>
                    <div id="logo">
                        <img src="img/logo2.png" alt="logo do site">
                    </div>
                </header>
                <div id="principal">
                    <div id="linha1">
                        <div id="segura_menu">
                            <a  href="cms_adm_conteudo.php" style="text-decoration:none">
                                <div class="opc_adm">
                                    <div class="img_opc_adm">
                                        <img src="img/conteudo.png" alt="">
                                    </div>  
                                    <div class="texto_opc_adm">Adm.Conteúdo</div>  
                                </div>
                            </a>
                            <a  href="cms_adm_fale_conosco.php" style="text-decoration:none">
                                <div class="opc_adm">
                                    <div class="img_opc_adm">
                                        <img src="img/fale_conosco.png" alt="">
                                    </div>  
                                    <div class="texto_opc_adm">Adm.Fale Conosco</div>  
                                </div>
                            </a>
                            <a  href="cms_adm_produto.php" style="text-decoration:none">
                                <div class="opc_adm">
                                    <div class="img_opc_adm">
                                        <img src="img/produto.png" alt="">
                                    </div>  
                                    <div id="texto_opc_adm_cor">Adm.Produtos</div>  
                                </div>
                            </a>
                            <a  href="cms_adm_usuarios.php" style="text-decoration:none">
                                <div class="opc_adm">
                                    <div class="img_opc_adm">
                                        <img src="img/usuario.png" alt="">
                                    </div>  
                                    <div class="texto_opc_adm">Adm.Usuários</div>  
                                </div>
                            </a>
                        </div>
                        <div id="area_nome">
                            <div id="bv">Bem vindo,</div>
                            <div id="nome"><?php echo($_SESSION['nomeUsuario']); ?></div>
                        </div>
                        <div id="area_botao">
                            <a href="../home.php">
                                <input type="button" name="BtnLogout" value="Logout" id="bt">
                            </a>
                        </div>
                    </div>
                    <div id="linha2"></div>
                </div>
                <footer>
                    Desenvolvido por: Allan Alves de Aquino
                </footer>
            </div>
        </form>
    </body>
</html>