<?php 
//conexao com o db
require_once("conectar_banco.php");
Conexao_db();


$nome = "";
$descicao = "";
$preco = "";
$promo = "";
$botao = "Salvar";
$imagem = "";
$trava = "";
$teste= 0;


// inicianda a variavel de sessao
session_start();


// IF da escolha editar ou excluir o conteudo cadastrado
if(isset($_GET['escolha'])){
    $escolha = $_GET['escolha'];
    $id = $_GET['id'];
    
    
    //if da escolha excluir
    if($escolha == 'excluir'){
        $sql="DELETE FROM tbl_promocoes WHERE id= ".$id;
        mysql_query($sql);
        header('location:conteudo_promocoes.php');
        
    // if da escolha editar
    }else if($escolha == 'editar'){
        $_SESSION['idPromocoes'] = $id;
        $botao = "Editar";
        $sql="select * from tbl_promocoes where id = ".$_SESSION['idPromocoes'];
        $select = mysql_query($sql);
        $rsNA = mysql_fetch_array($select);
        
        $nome = $rsNA['nome'];
        $descicao = $rsNA['descricao'];
        $preco = $rsNA['preco'];
        $promo = $rsNA['promo'];
        $imagem = $rsNA['foto'];    
        $teste = 1;
        
    }else if($escolha == 'olhar'){
        $_SESSION['idPromocoes'] = $id;
        $botao = "Voltar";
        $trava = "disabled";
        $sql="select * from tbl_promocoes where id = ".$_SESSION['idPromocoes'];
        $select = mysql_query($sql);
        $rsNA = mysql_fetch_array($select);
        
        $nome = $rsNA['nome'];
        $descicao = $rsNA['descricao'];
        $preco = $rsNA['preco'];
        $promo = $rsNA['promo'];
        $imagem = $rsNA['foto'];  
        $teste = 1;
    }

}


// IF do botao  salvar/editar   
if(isset($_POST['Btn']))
{
    $btn = $_POST['Btn'];
    $opc = "0";
    $nome = $_POST["txtNome"];
    $descicao = $_POST["txtDesc"];
    $preco = $_POST["txtPreco"];
    $promo = $_POST["txtPromo"];
    
    //Caminho da pasta onde as imagens serão armazenadas
    $upload_dir = "arquivo/";

    //Armazenando o nome e extensão do arquivoo que foi selecionado
    $nome_arq = basename($_FILES['flefoto']['name']);
    
    // if do botao salvar
    if($btn ==  'Salvar')
    {
        //Verifica tipo de extensão permitida para o upload do arquivo, 
        //usamos o comando strstr() para localizar sequencia de caravteres
		if(strstr($nome_arq,'.jpg') || strstr($nome_arq,'.png') || strstr($nome_arq,'.gif'))
        {
            
            //Guardamos o caminho e o nome da imagem que será inserido no BD.
            $upload_file = $upload_dir . $nome_arq;
                
            if(move_uploaded_file($_FILES['flefoto']['tmp_name'], $upload_file))
            {
                addslashes($sql = "insert into tbl_promocoes (nome, preco,promo, descricao, opc,foto)
                    values ('".$nome."','".$preco."','".$promo."','".$descicao."','".$opc."','".$upload_file."') ");
                
                
                mysql_query($sql);
                header('location:conteudo_promocoes.php');
                
                echo("Arquivo movido com sucesso");
            }else{
                echo("O arquivo não pode ser movido para o servidor");
            }
        }
    
    // if do botao editar
    }else if($btn ==  'Editar'){
        $nome = $_POST["txtNome"];
        $descicao = $_POST["txtDesc"];
        $preco = $_POST["txtPreco"];
        $promo = $_POST["txtPromo"];
        $upload_dir = "arquivo/";
        $nome_arq = basename($_FILES['flefoto']['name']);
        
        if(strstr($nome_arq,'.jpg') || strstr($nome_arq,'.png') || strstr($nome_arq,'.gif'))
        {
            //Guardamos o caminho e o nome da imagem que será inserido no BD.
            $upload_file = $upload_dir . $nome_arq;
                
            if(move_uploaded_file($_FILES['flefoto']['tmp_name'], $upload_file))
            {
                $sql = "UPDATE tbl_promocoes SET nome ='".$nome."',preco ='".$preco."', promo ='".$promo."', descricao ='".$descicao."', foto ='".$upload_file."' WHERE id =".$_SESSION['idPromocoes'];

                //Executa o script no BD
                mysql_query($sql);
                echo("Foi salvo");
                header('location:conteudo_promocoes.php');

                echo("Arquivo movido com sucesso");
            }else{
                echo("O arquivo não pode ser movido para o servidor");
            }
        }else{
            echo("O arquivo não pode ser movido para o servidor");
        }
        
    }else if($btn ==  'Voltar'){
         header('location:conteudo_promocoes.php');
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
        
        $sql = "UPDATE tbl_promocoes SET opc ='".$opc."' WHERE id =".$id;
            
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        header('location:conteudo_promocoes.php');       
    
    //if para alterar para desativado
    }else if($modo == "apagar"){
        $opc = 0;
        
        $sql = "UPDATE tbl_promocoes SET opc ='".$opc."' WHERE id =".$id;
            
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        header('location:conteudo_promocoes.php');
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CMS Promoções</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_conteudo_promocoes.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <form name="frmCms" method="post" action="conteudo_promocoes.php" enctype="multipart/form-data">
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
                            <div class="titulo">Nome:</div>
                            <input type="texto"  value="<?php echo($nome)?>" name="txtNome" class="texto" required <?php echo($trava) ?> >
                            <div class="titulo">Preço:</div>
                            <input type="texto"  value="<?php echo($preco)?>" name="txtPreco" class="texto" required <?php echo($trava) ?> maxlength="5">
                            <div class="titulo">Preço Promocional:</div>
                            <input type="texto"  value="<?php echo($promo)?>" name="txtPromo" class="texto" required <?php echo($trava) ?> maxlength="5">
                            <div class="titulo">Descrição:</div>
                            <input type="texto"  value="<?php echo($descicao)?>" name="txtDesc" class="texto" required <?php echo($trava) ?>>
                            <div class="titulo">Escolha a Foto:</div>
                            <input type="file" name="flefoto" required <?php echo($trava) ?> id="t">
                            
                            <?php
                            if($teste == 1){

                            ?>
                            <div id="img">
                                <img src="<?php echo($imagem)?>"  width="90" height="70">
                            </div>
                            <?php
                            }
                            ?>
                            <div class="branco"></div>
                            <div id="botao">
                                <input type="submit" name="Btn" value="<?php echo($botao)?>">
                            </div>
                        </div>
                        <div class="branco"></div>
                        <div id="area_titulo">
                            <div id="nome_titulo">NOME</div>   
                            <div id="foto">IMAGEM</div>
                            <div id="bt_opc">Opç</div>
                            <div id="on_of">On/Off</div>
                        </div>
                        <?php 
                            $sql= "SELECT * FROM tbl_promocoes"; 
                            $select=mysql_query($sql);
                            while ($rsNA = mysql_fetch_array($select))
                            {
                                $img = $rsNA['foto'];
                        ?>
                        <div class="conteudo"> 
                            <div class="tamanho_titulo"><?php echo($rsNA['nome'])?></div>
                            <div class="tamanho_foto"> 
                                <img src="<?php echo($img)?>"  width="65" height="50">
                            </div>
                            <div class="opc_bt">
                                <a href="conteudo_promocoes.php?escolha=excluir&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/cancel-24.png" alt="Excluir">
                                </a>
                                <a href="conteudo_promocoes.php?escolha=editar&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/editar.png" alt="Editar">
                                </a>
                                <a href="conteudo_promocoes.php?escolha=olhar&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/olhar.png" alt="Editar">
                                </a>
                            </div>
                            <div class="img_on_of">
                                <?php
                                    $opc = $rsNA['opc'];

                                    if($opc == 0){
                                ?>
                                        <a href="conteudo_promocoes.php?modo=ligar&id=<?php echo($rsNA['id']); ?>">
                                            <img src="img/of.png">   
                                        </a>
                                <?php    
                                    }else if($opc == 1){
                                ?>
                                        <a href="conteudo_promocoes.php?modo=apagar&id=<?php echo($rsNA['id']); ?>">
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