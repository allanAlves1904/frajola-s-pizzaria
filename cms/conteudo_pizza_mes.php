<?php 
//conexao com o db
require_once("conectar_banco.php");
Conexao_db();


$nome = "";
$descicao = "";
$preco = "";
$botao = "Salvar";
$trava = "";
$imagem = "";


// inicianda a variavel de sessao
session_start();


// IF da escolha editar ou excluir o conteudo cadastrado
if(isset($_GET['escolha'])){
    $escolha = $_GET['escolha'];
    $id = $_GET['id'];
    
    //if da escolha excluir
    if($escolha == 'excluir'){
        $sql="DELETE FROM tbl_pizza_mes WHERE id= ".$id;
        mysql_query($sql);
        header('location:conteudo_pizza_mes.php');
        
    // if da escolha editar
    }else if($escolha == 'editar'){
        $_SESSION['idPizzaMes'] = $id;
        $botao = "Editar";
        $sql="select * from tbl_pizza_mes where id = ".$_SESSION['idPizzaMes'];
        $select = mysql_query($sql);
        $rsNA = mysql_fetch_array($select);
        
        $nome = $rsNA['nome'];
        $descicao = $rsNA['descricao'];
        $preco = $rsNA['preco'];
        
    }else if($escolha == 'olhar'){
        $_SESSION['idPizzaMes'] = $id;
        $botao = "Voltar";
        $trava = "disabled";
        $sql="select * from tbl_pizza_mes where id = ".$_SESSION['idPizzaMes'];
        $select = mysql_query($sql);
        $rsNA = mysql_fetch_array($select);
        
        header('location:visualizar_pizza_mes.php');
        
        $nome = $rsNA['nome'];
        $descicao = $rsNA['descricao'];
        $preco = $rsNA['preco'];
        
    }

}


// IF do botao  salvar/editar   
if(isset($_GET['Btn']))
{
    $btn = $_GET['Btn'];
    $opc = "0";
    $nome = $_GET["txtNome"];
    $descicao = $_GET["txtDesc"];
    $preco = $_GET["txtPreco"];
    
    //Caminho da pasta onde as imagens serão armazenadas
    $upload_dir = "arquivo/";

    //Armazenando o nome e extensão do arquivoo que foi selecionado
    $nome_arq = basename($_FILES['flefoto']['name']);
    $nome_arq_um = basename($_FILES['flefoto1']['name']);
    $nome_arq_dois = basename($_FILES['flefoto2']['name']);
    $nome_arq_tres = basename($_FILES['flefoto3']['name']);
    
    // if do botao salvar
    if($btn ==  'Salvar')
    {
        //Verifica tipo de extensão permitida para o upload do arquivo, 
        //usamos o comando strstr() para localizar sequencia de caravteres
		if(strstr($nome_arq,'.jpg') || strstr($nome_arq,'.png') || strstr($nome_arq,'.gif') || strstr($nome_arq_um,'.jpg') || strstr($nome_arq_um,'.png') || strstr($nome_arq_um,'.gif') || strstr($nome_arq_dois,'.jpg') || strstr($nome_arq_dois,'.png') || strstr($nome_arq_dois,'.gif') || strstr($nome_arq_tres,'.jpg') || strstr($nome_arq_tres,'.png') || strstr($nome_arq_tres,'.gif'))
        {
            
            //Guardamos o caminho e o nome da imagem que será inserido no BD.
            $upload_file = $upload_dir . $nome_arq;
            $upload_file_um = $upload_dir . $nome_arq_um;
            $upload_file_dois = $upload_dir . $nome_arq_dois;
            $upload_file_tres = $upload_dir . $nome_arq_tres;
                
            if(move_uploaded_file($_FILES['flefoto']['tmp_name'], $upload_file) and move_uploaded_file($_FILES['flefoto1']['tmp_name'], $upload_file_um) and move_uploaded_file($_FILES['flefoto2']['tmp_name'], $upload_file_dois) and move_uploaded_file($_FILES['flefoto3']['tmp_name'], $upload_file_tres))
            {
                
                
                
                $sql = "insert into tbl_pizza_mes (nome, descricao, opc, preco, foto, fotoDois, fotoTres, fotoQuatro)
                    values ('".$nome."', '".$descicao."', '".$opc."', '".$preco."', '".$upload_file."', '".$upload_file_um."', '".$upload_file_dois."', '".$upload_file_tres."') ";
                
                
                
                //mysql_query($sql);
               // header('location:conteudo_pizza_mes.php'); 
                echo $sql;
                //echo("Arquivo movido com sucesso");
            }else{
                echo("O arquivo não pode ser movido para o servidor");
            }
        }
    echo("Arquivo movido com sucesso");
    // if do botao editar
    }else if($btn ==  'Editar'){
        $nome = $_GET["txtNome"];
        $descicao = $_GET["txtDesc"];
        $preco = $_GET["txtPreco"];

        $sql = "UPDATE tbl_pizza_mes SET nome ='".$nome."', descricao ='".$descicao."', preco ='".$preco."' WHERE id =".$_SESSION['idPizzaMes'];

        //Executa o script no BD
        mysql_query($sql);
        echo("Foi salvo");
        //header('location:conteudo_pizza_mes.php');
        
    }else if($btn ==  'Voltar'){
         //header('location:conteudo_pizza_mes.php');
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
        
        $sql = "UPDATE tbl_pizza_mes SET opc = 0 ";
           
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        
        $sql = "UPDATE tbl_pizza_mes SET opc ='".$opc."' WHERE id =".$id;
           
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        
        
        header('location:conteudo_pizza_mes.php');       
    
    //if para alterar para desativado
    }else if($modo == "apagar"){
        $opc = 0;
        
        $sql = "UPDATE tbl_pizza_mes SET opc ='".$opc."' WHERE id =".$id;
            
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        header('location:conteudo_pizza_mes.php');
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CMS Pizza do Mês</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_conteudo_pizza_mes.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <form name="frmCms" method="post" action="conteudo_pizza_mes.php">
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
                        <!--div id="area_operacao">
                            <div class="titulo">Nome:</div>
                            <input type="texto"  value="<?php echo($nome)?>" name="txtNome" class="texto" required <?php echo($trava) ?>>
                            <div class="titulo">Descrição:</div>
                            <input type="texto"  value="<?php echo($descicao)?>" name="txtDesc" class="texto" required <?php echo($trava) ?>>
                            <div class="titulo">Preço:</div>
                            <input type="texto"  value="<?php echo($preco)?>" name="txtPreco" class="texto" required <?php echo($trava) ?>  maxlength="5">
                            <div class="titulo">Escolha a Foto:</div>
                            <input type="file" name="flefoto" required <?php echo($trava) ?>>
                            <div class="titulo">Escolha a Foto:</div>
                            <input type="file" name="flefoto1" required <?php echo($trava) ?>>
                            <div class="titulo">Escolha a Foto:</div>
                            <input type="file" name="flefoto2" required <?php echo($trava) ?>>
                            <div class="titulo">Escolha a Foto:</div>
                            <input type="file" name="flefoto3" required <?php echo($trava) ?>>
                            <div class="branco"></div>
                            <div id="botao">
                                <input type="submit" name="Btn" value="<?php echo($botao)?>">
                            </div>
                        </div-->
                        <div class="branco"></div>
                        <div id="area_titulo">
                            <div id="nome_titulo">NOME</div>   
                            <div id="foto">IMAGEM</div>
                            <div id="bt_opc">Opç</div>
                            <div id="on_of">On/Off</div>
                        </div>
                        <?php 
                            $sql= "SELECT * FROM tbl_pizza_mes"; 
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
                                <a href="conteudo_pizza_mes.php?escolha=excluir&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/cancel-24.png" alt="Excluir">
                                </a>
                                <a href="conteudo_pizza_mes.php?escolha=editar&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/editar.png" alt="Editar">
                                </a>
                                <a href="conteudo_pizza_mes.php?escolha=olhar&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/olhar.png" alt="Editar">
                                </a>
                            </div>
                            <div class="img_on_of">
                                <?php
                                    $opc = $rsNA['opc'];

                                    if($opc == 0){
                                ?>
                                        <a href="conteudo_pizza_mes.php?modo=ligar&id=<?php echo($rsNA['id']); ?>">
                                            <img src="img/of.png">   
                                        </a>
                                <?php    
                                    }else if($opc == 1){
                                ?>
                                        <a href="conteudo_pizza_mes.php?modo=apagar&id=<?php echo($rsNA['id']); ?>">
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