
<?php 
//conexao com o db
require_once("conectar_banco.php");
Conexao_db();


$primeiro = "";
$primeiroT = "";
$segundo = "";
$segundoT = "";
$terceiro = "";
$terceiroT = "";
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
        $sql="DELETE FROM tbl_curiosidades WHERE id= ".$id;
        mysql_query($sql);
        header('location:conteudo_curiosidades.php');
        
    // if da escolha editar
    }else if($escolha == 'editar'){
        $_SESSION['idCuriosidades'] = $id;
        $botao = "Editar";
        $sql="select * from tbl_curiosidades where id = ".$_SESSION['idCuriosidades'];
        $select = mysql_query($sql);
        $rsNA = mysql_fetch_array($select);
        
        $primeiroT = $rsNA['primeiroTitulo'];
        $primeiro = $rsNA['primeiro'];
        $segundoT = $rsNA['segundoTitulo'];
        $segundo = $rsNA['segundo'];
        $terceiroT = $rsNA['terceiroTitulo'];  
        $terceiro = $rsNA['terceiro'];
    
    }else if($escolha == 'olhar'){
        $_SESSION['idCuriosidades'] = $id;
        $botao = "Voltar";
        $trava = "disabled";
        $sql="select * from tbl_curiosidades where id = ".$_SESSION['idCuriosidades'];
        $select = mysql_query($sql);
        $rsNA = mysql_fetch_array($select);
        
        $primeiroT = $rsNA['primeiroTitulo'];
        $primeiro = $rsNA['primeiro'];
        $segundoT = $rsNA['segundoTitulo'];
        $segundo = $rsNA['segundo'];
        $terceiroT = $rsNA['terceiroTitulo'];  
        $terceiro = $rsNA['terceiro'];  
    }

}

// IF do botao  salvar/editar 
if(isset($_GET["Btn"]))
{
    $btn = $_GET['Btn'];
    $opc = "0";
    $primeiroT = $_GET["txtPriT"];
    $primeiro = $_GET["txtPri"];
    $segundoT = $_GET["txtSeT"];
    $segundo = $_GET["txtSe"];
    $terceiroT =$_GET["txtTerT"];
    $terceiro =$_GET["txtTer"];
    
    
    // if do botao salvar
    if($btn ==  'Salvar')
    {
        //Monta o Script para enviar para o BD
        addslashes($sql = "insert into tbl_curiosidades (primeiro, segundo, terceiro,opc, primeiroTitulo, segundoTitulo, terceiroTitulo) values ('".$primeiro."','".$segundo."','".$terceiro."','".$opc."','".$primeiroT."','".$segundoT."','".$terceiroT."')");
    
        //Executa o script no BD
        mysql_query($sql);
        //echo ('salvo com sucesso');
        header('location:conteudo_curiosidades.php');
    // if do botao editar
    }else if($btn ==  'Editar'){
            $primeiroT = $_GET["txtPriT"];
            $primeiro = $_GET["txtPri"];
            $segundoT = $_GET["txtSeT"];
            $segundo = $_GET["txtSe"];
            $terceiroT =$_GET["txtTerT"];
            $terceiro =$_GET["txtTer"];
        
            $sql = "UPDATE tbl_curiosidades SET primeiro ='".$primeiro."', segundo ='".$segundo."', terceiro ='".$terceiro."', primeiroTitulo ='".$primeiroT."', segundoTitulo ='".$segundoT."', terceiroTitulo ='".$terceiroT."'  WHERE id = ".$_SESSION['idCuriosidades'].";";

            //Executa o script no BD
            mysql_query($sql);
            //echo($sql);
            header('location:conteudo_curiosidades.php');
        
    }else if($btn ==  'Voltar'){
            header('location:conteudo_curiosidades.php');
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
        
        $sql = "UPDATE tbl_curiosidades SET opc ='".$opc."' WHERE id =".$id;
            
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        header('location:conteudo_curiosidades.php');       
    
    //if para alterar para desativado
    }else if($modo == "apagar"){
        $opc = 0;
        
        $sql = "UPDATE tbl_curiosidades SET opc ='".$opc."' WHERE id =".$id;
            
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        header('location:conteudo_curiosidades.php');
    }
}
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>CMS Curiosidades</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_conteudo_curiosidades.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <form name="frmCms" method="get" action="conteudo_curiosidades.php">
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
                            <div class="titulo">Titulo 1:</div>
                            <input type="text" required name="txtPriT"  value="<?php echo($primeiroT)?>" placeholder="Titulo do primeiro texto" class="tamanho_caixa" <?php echo($trava) ?>>
                            <div class="titulo">Texto Anos 60:</div>
                            <textarea  name="txtPri" maxlength="7000" required <?php echo($trava) ?> ><?php echo($primeiro)?>
                            </textarea>
                            <div class="titulo">Titulo 2:</div>
                            <input type="text" required name="txtSeT"  value="<?php echo($segundoT)?>" placeholder="Titulo do segundo texto" class="tamanho_caixa"<?php echo($trava) ?>>
                            <div class="titulo">Texto Anos 70 :</div>
                            <textarea  name="txtSe" maxlength="7000" required <?php echo($trava) ?>><?php echo($segundo)?>
                            </textarea>
                            <div class="titulo">Titulo 3:</div>
                            <input type="text" required name="txtTerT"  value="<?php echo($terceiroT)?>" placeholder="Titulo do terceiro texto" class="tamanho_caixa"<?php echo($trava) ?>>
                            <div class="titulo">Texto Anos 80:</div>
                            <textarea  name="txtTer" maxlength="8000" required <?php echo($trava) ?>><?php echo($terceiro)?>
                            </textarea>
                            <div id="botao">
                                <input type="submit" name="Btn" value="<?php echo($botao)?>">
                            </div>
                        </div>
                        <div class="branco"></div>
                        <div id="area_titulo">
                            <div class="nome_titulo">1° TITULO</div>     
                            <div class="nome_titulo">2° TITULO</div>     
                            <div class="nome_titulo">3° TITULO</div>     
                            <div id="bt_opc">Opç</div>
                            <div id="on_of">On/Off</div>
                        </div>
                        <?php 
                            $sql= "SELECT * FROM tbl_curiosidades"; 
                            $select=mysql_query($sql);
                            while ($rsNA = mysql_fetch_array($select))
                            {
                        ?>
                        <div class="conteudo"> 
                            <div class="tamanho_titulo"><?php echo($rsNA['primeiroTitulo'])?></div>        
                            <div class="tamanho_titulo"><?php echo($rsNA['segundoTitulo'])?></div>
                            <div class="tamanho_titulo"><?php echo($rsNA['terceiroTitulo'])?></div>
                            <div class="opc_bt">
                                <a href="conteudo_curiosidades.php?escolha=excluir&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/cancel-24.png" alt="Excluir">
                                </a>
                                <a href="conteudo_curiosidades.php?escolha=editar&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/editar.png" alt="Editar">
                                </a>
                                <a href="conteudo_curiosidades.php?escolha=olhar&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/olhar.png" alt="Editar">
                                </a>
                            </div>
                            <div class="img_on_of">
                                <?php
                                    $opc = $rsNA['opc'];

                                    if($opc == 0){
                                ?>
                                        <a href="conteudo_curiosidades.php?modo=ligar&id=<?php echo($rsNA['id']); ?>">
                                            <img src="img/of.png">   
                                        </a>
                                <?php    
                                    }else if($opc == 1){
                                ?>
                                        <a href="conteudo_curiosidades.php?modo=apagar&id=<?php echo($rsNA['id']); ?>">
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