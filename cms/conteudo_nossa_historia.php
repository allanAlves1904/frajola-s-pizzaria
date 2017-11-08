<?php 
//conexao com o db
require_once("conectar_banco.php");
Conexao_db();


$texto = "";
$titulo = "";
$botao = "Salvar";
$trava = "";


// inicianda a variavel de sessao
session_start();


// IF da escolha editar ou excluir o conteudo cadastrado
if(isset($_GET['escolha'])){
    $escolha = $_GET['escolha'];
    $id = $_GET['id'];
    
    //if da escolha excluir
    if($escolha == 'excluir'){
        $sql="DELETE FROM tbl_nossa_historia WHERE id= ".$id;
        mysql_query($sql);
        header('location:conteudo_nossa_historia.php');
        
    // if da escolha editar
    }else if($escolha == 'editar'){
        $_SESSION['idNossaHistoria'] = $id;
        $botao = "Editar";
        $sql="select * from tbl_nossa_historia where id = ".$_SESSION['idNossaHistoria'];
        $select = mysql_query($sql);
        $rsNA = mysql_fetch_array($select);
        
        $texto = $rsNA['texto'];
        $titulo = $rsNA['titulo'];
        
    }else if($escolha == 'olhar'){
        $_SESSION['idNossaHistoria'] = $id;
        $botao = "Voltar";
        $trava = "disabled";
        $sql="select * from tbl_nossa_historia where id = ".$_SESSION['idNossaHistoria'];
        $select = mysql_query($sql);
        $rsNA = mysql_fetch_array($select);
        
        $texto = $rsNA['texto'];
        $titulo = $rsNA['titulo'];
    }

}


// IF do botao  salvar/editar   
if(isset($_GET['Btn']))
{
    $btn = $_GET['Btn'];
    $opc = "0";
    $texto = $_GET["txtTexto"];
    $titulo = $_GET["txtTitulo"];
    
    // if do botao salvar
    if($btn ==  'Salvar')
    {
        //Monta o Script para enviar para o BD
        addslashes($sql = "insert into tbl_nossa_historia (texto, titulo, opc)
                    values ('".$texto."','".$titulo."','".$opc."') ");

        //Executa o script no BD
        mysql_query($sql);
        //echo("Gravado com sucesso");
        header('location:conteudo_nossa_historia.php'); 
    
    // if do botao editar
    }else if($btn ==  'Editar'){
        $texto = $_GET["txtTexto"];
        $titulo = $_GET["txtTitulo"];

        $sql = "UPDATE tbl_nossa_historia SET texto ='".$texto."', titulo ='".$titulo."' WHERE id =".$_SESSION['idNossaHistoria'];

        //Executa o script no BD
        mysql_query($sql);
        echo("Foi salvo");
        header('location:conteudo_nossa_historia.php');
        
    }else if($btn ==  'Voltar'){
         header('location:conteudo_nossa_historia.php');
    }
}

// if responsavel pela troca de imagem (on/of)
if(isset($_GET['modo']))
{
    $modo = $_GET['modo'];
    $id = $_GET['id'];

    //if para alterar para ativo
    if($modo == "ligar")
    {
        $opc = 1;
        
        $sql = "UPDATE tbl_nossa_historia SET opc ='".$opc."' WHERE id =".$id;
            
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        header('location:conteudo_nossa_historia.php');       
    
    //if para alterar para desativado
    }else if($modo == "apagar"){
        $opc = 0;
        
        $sql = "UPDATE tbl_nossa_historia SET opc ='".$opc."' WHERE id =".$id;
            
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        header('location:conteudo_nossa_historia.php');
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CMS Nossa História</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_conteudo_nossa_historia.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <form name="frmCms" method="get" action="conteudo_nossa_historia.php">
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
                        <div id="area_operacao">
                            <div class="titulo">Titulo</div>
                            <input type="texto"  value="<?php echo($titulo)?>" name="txtTitulo" class="texto" required <?php echo($trava) ?>>
                            <div class="titulo">Texto</div>
                            <textarea  name="txtTexto" maxlength="8000" required <?php echo($trava) ?>><?php echo($texto)?></textarea>
                            <div id="botao">
                                <input type="submit" name="Btn" value="<?php echo($botao)?>">
                            </div>
                        </div>
                        <div class="branco"></div>
                        <div id="area_titulo">
                            <div id="nome_titulo">TITULO</div>     
                            <div id="bt_opc">Opç</div>
                            <div id="on_of">On/Off</div>
                        </div>
                        <?php 
                            $sql= "SELECT * FROM tbl_nossa_historia"; 
                            $select=mysql_query($sql);
                            while ($rsNA = mysql_fetch_array($select))
                            {
                        ?>
                        <div class="conteudo"> 
                            <div class="tamanho_titulo"><?php echo($rsNA['titulo'])?></div>
                            <div class="opc_bt">
                                <a href="conteudo_nossa_historia.php?escolha=excluir&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/cancel-24.png" alt="Excluir">
                                </a>
                                <a href="conteudo_nossa_historia.php?escolha=editar&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/editar.png" alt="Editar">
                                </a>
                                <a href="conteudo_nossa_historia.php?escolha=olhar&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/olhar.png" alt="Editar">
                                </a>
                            </div>
                            <div class="img_on_of">
                                <?php
                                    $opc = $rsNA['opc'];

                                    if($opc == 0){
                                ?>
                                        <a href="conteudo_nossa_historia.php?modo=ligar&id=<?php echo($rsNA['id']); ?>">
                                            <img src="img/of.png">   
                                        </a>
                                <?php    
                                    }else if($opc == 1){
                                ?>
                                        <a href="conteudo_nossa_historia.php?modo=apagar&id=<?php echo($rsNA['id']); ?>">
                                            <img src="img/on.png">
                                        </a>
                                <?php    
                                    }
                                ?>
                            </div>                        
                            
                        </div>
                        <?php 
                            }
                        ?>
                        <div class="branco"></div>
                    </div>
                </div>
                <footer>
                    Desenvolvido por: Allan Alves de Aquino
                </footer>
            </div>
        </form>
    </body>
</html>