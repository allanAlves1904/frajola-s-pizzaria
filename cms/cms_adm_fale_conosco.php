<?php 
//Conexao com o banco de dados
require_once("conectar_banco.php");
Conexao_db();

// inicianda a variavel de sessao
session_start();


// if da escolha , visualizar ou excluir
if(isset($_GET['escolha'])){
    $escolha = $_GET['escolha'];
    $id = $_GET['id'];
    
    //if da escolha excluir
    if($escolha == 'excluir'){
        $sql = "DELETE FROM tbl_fale_conosco WHERE id= ".$id;
        mysql_query($sql);
        header('location:cms_adm_fale_conosco.php');
        
    //if da escolha vizualizar
    }else if($escolha == 'visualizar'){
        
        $sql = "SELECT * FROM tbl_fale_conosco WHERE id=".$id;
        mysql_query($sql);
        $select = mysql_query($sql);
        $rsFC = mysql_fetch_array($select);
        
        $_SESSION['nomeFC'] = $rsFC['nome'];
        $_SESSION['telefone'] = $rsFC['telefone'];
        $_SESSION['celular'] = $rsFC['celular'];
        $_SESSION['email'] = $rsFC['email'];
        $_SESSION['h_p'] = $rsFC['home_page'];
        $_SESSION['l_f'] = $rsFC['link_facebook'];
        $_SESSION['profissao'] = $rsFC['profissao'];
        $_SESSION['i_p'] = $rsFC['informacao_produto'];
        $_SESSION['sexo'] = $rsFC['sexo'];
        $_SESSION['sugetao'] = $rsFC['sugetao'];
            
        if($_SESSION['nomeFC'] != null){
            header('location:visualizar_fale_conosco.php');
        }else{
            echo("Deu ruim!!!");
        }
    }
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>CMS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_cms_adm_fale_conosco.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <form name="frmCms" method="get" action="cms_adm_fale_conosco.php">
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
                                    <div id="texto_opc_adm_cor">Adm.Fale Conosco</div>  
                                </div>
                            </a>
                            <a  href="cms_adm_produto.php" style="text-decoration:none">
                                <div class="opc_adm">
                                    <div class="img_opc_adm">
                                        <img src="img/produto.png" alt="">
                                    </div>  
                                    <div class="texto_opc_adm">Adm.Produtos</div>  
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
                    <div id="linha2">
                        <div class="branco"></div>
                        <div id="inf">
                            <div class="tamanho">NOME</div>
                            <div class="tamanho">CELULAR</div>
                            <div class="tamanho">PROFISSÃO</div>
                            <div class="tamanho">SEXO</div>
                            <div class="bt_opç">Opç</div>
                        </div>
                        <?php
                            $sql = "SELECT * FROM tbl_fale_conosco";
                            $select = mysql_query($sql);
                            while ($rsFC = mysql_fetch_array($select))
                            {
                            
                        ?>
                        <div class="informaçao">
                            <div class="tamanho_ctd"><?php echo($rsFC['nome']) ?></div> 
                            <div class="tamanho_ctd"><?php echo($rsFC['celular']) ?></div> 
                            <div class="tamanho_ctd"><?php echo($rsFC['profissao']) ?></div> 
                            <div class="tamanho_ctd"><?php echo($rsFC['sexo']) ?></div> 
                            <div class="opc_bt">
                                <a href="cms_adm_fale_conosco.php?escolha=visualizar&id=<?php echo($rsFC['id']); ?>" style="text-decoration:none">
                                    <img src="img/olhar.png" alt="Visualizar">
                                      
                                </a>
                                
                                <a href="cms_adm_fale_conosco.php?escolha=excluir&id=<?php echo($rsFC['id']); ?>">
                                    <img src="img/cancel-24.png" alt="Excluir">
                                </a>
                            </div>
                        </div>        
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <footer>
                    Desenvolvido por: Allan Alves de Aquino
                </footer>
            </div>
        </form>
    </body>
</html>