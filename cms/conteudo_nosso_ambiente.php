
<?php 
//conexao com o db
require_once("conectar_banco.php");
Conexao_db();


$nome = "";
$cidade = "";
$bairro ="";
$rua ="";
$telefone ="";
$horaInicio ="";
$horaFechar ="";
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
        $sql="DELETE FROM tbl_nosso_ambiente WHERE id= ".$id;
        mysql_query($sql);
        header('location:conteudo_nosso_ambiente.php');
        
    // if da escolha editar
    }else if($escolha == 'editar'){
        $_SESSION['idNossoAmbiente'] = $id;
        $botao = "Editar";
        $sql="select * from tbl_nosso_ambiente where id = ".$_SESSION['idNossoAmbiente'];
        $select = mysql_query($sql);
        $rsNA = mysql_fetch_array($select);
        
        $nome = $rsNA['nome'];
        $cidade = $rsNA['cidade'];
        $bairro = $rsNA['bairro'];
        $rua = $rsNA['rua'];
        $telefone = $rsNA['telefone'];
        $horaInicio = $rsNA['horaAbrir'];
        $horaFechar = $rsNA['horaFechar'];
        
    //if da escolha olhar   
    }else if($escolha == 'olhar'){
        $_SESSION['idNossoAmbiente'] = $id;
        $botao = "Voltar";
        $trava = "disabled";
        $sql="select * from tbl_nosso_ambiente where id = ".$_SESSION['idNossoAmbiente'];
        $select = mysql_query($sql);
        $rsNA = mysql_fetch_array($select);
        
        $nome = $rsNA['nome'];
        $cidade = $rsNA['cidade'];
        $bairro = $rsNA['bairro'];
        $rua = $rsNA['rua'];
        $telefone = $rsNA['telefone'];
        $horaInicio = $rsNA['horaAbrir'];
        $horaFechar = $rsNA['horaFechar'];
    }

}

// IF do botao  salvar/editar 
if(isset($_GET["Btn"]))
{
    $btn = $_GET['Btn'];
    $opc = "0";
    $nome = $_GET["txtNome"];
    $cidade = $_GET["txtCidade"];
    $bairro =$_GET["txtBairro"];
    $rua =$_GET["txtRua"];
    $telefone =$_GET["txtTel"];
    $horaInicio =$_GET["txtHrIni"];
    $horaFechar =$_GET["txtHrFec"];
    
    // if do botao salvar
    if($btn ==  'Salvar')
    {
        //Monta o Script para enviar para o BD
        addslashes($sql = "insert into tbl_nosso_ambiente (nome, cidade, bairro, rua, telefone, horaAbrir, horaFechar,opc) values ('".$nome."','".$cidade."','".$bairro."','".$rua."','".$telefone."','".$horaInicio."','".$horaFechar."','".$opc."')");
    
        //Executa o script no BD
        mysql_query($sql);
        //echo ('salvo com sucesso');
        header('location:conteudo_nosso_ambiente.php');
    // if do botao editar
    }else if($btn ==  'Editar'){
            $nome = $_GET["txtNome"];
            $cidade = $_GET["txtCidade"];
            $bairro =$_GET["txtBairro"];
            $rua =$_GET["txtRua"];
            $telefone =$_GET["txtTel"];
            $horaInicio =$_GET["txtHrIni"];
            $horaFechar =$_GET["txtHrFec"];
        
            $sql = "UPDATE tbl_nosso_ambiente SET nome ='".$nome."', cidade ='".$cidade."', bairro ='".$bairro."', rua ='".$rua."', telefone ='".$telefone."', horaAbrir ='".$horaInicio."', horaFechar ='".$horaFechar."' WHERE id = ".$_SESSION['idNossoAmbiente'].";";

            //Executa o script no BD
            mysql_query($sql);
            //echo($sql);
            header('location:conteudo_nosso_ambiente.php');
        
    }else if($btn ==  'Voltar'){
            header('location:conteudo_nosso_ambiente.php');
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
        
        $sql = "UPDATE tbl_nosso_ambiente SET opc ='".$opc."' WHERE id =".$id;
            
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        header('location:conteudo_nosso_ambiente.php');       
    
    //if para alterar para desativado
    }else if($modo == "apagar"){
        $opc = 0;
        
        $sql = "UPDATE tbl_nosso_ambiente SET opc ='".$opc."' WHERE id =".$id;
            
        //Executa o script no BD
        mysql_query($sql);
        //echo("Erro, não foi salvo");
        header('location:conteudo_nosso_ambiente.php');
    }
}
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>CMS Nosso Ambiente</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_conteudo_nosso_ambiente.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <form name="frmCms" method="get" action="conteudo_nosso_ambiente.php">
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
                            <div class="titulo">Matriz/filial:</div>
                            <input type="text" required name="txtNome"  value="<?php echo($nome)?>" placeholder="Informe a matriz/filial" class="tamanho_caixa" <?php echo($trava) ?>>
                            <div class="titulo">Cidade:</div>
                            <input type="text" required name="txtCidade"  value="<?php echo($cidade)?>" placeholder="Cidade" class="tamanho_caixa" <?php echo($trava) ?>>
                            <div class="titulo">Bairro:</div>
                            <input type="text" required name="txtBairro"  value="<?php echo($bairro)?>" placeholder="Bairro" class="tamanho_caixa" <?php echo($trava) ?>>
                            <div class="titulo">Rua:</div>
                            <input type="text" required name=txtRua  value="<?php echo($rua)?>" placeholder="Rua" class="tamanho_caixa" <?php echo($trava) ?>>
                            <div class="titulo">Telefone:</div>
                            <input type="text" required name="txtTel"  value="<?php echo($telefone)?>" placeholder="Telefone" class="tamanho_caixa" <?php echo($trava) ?>>
                            <div class="titulo">Hora que abre:</div>
                            <input type="text" required name="txtHrIni"  value="<?php echo($horaInicio)?>" placeholder="Hora em que a pizzaria ira abrir" class="tamanho_caixa" <?php echo($trava) ?>>
                            <div class="titulo">Hora que fecha:</div>
                            <input type="text" required name="txtHrFec"  value="<?php echo($horaFechar)?>" placeholder="Hora em que a pizzaria ira fechar" class="tamanho_caixa" <?php echo($trava) ?>>
                            <div id="botao">
                                <input type="submit" name="Btn" value="<?php echo($botao)?>">
                            </div>
                        </div>
                        <div class="branco"></div>
                        <div id="area_titulo">
                            <div id="m_f">MATRIZ/FILIAL</div>
                            <div class="titulo_area">CIDADE</div>
                            <div class="titulo_area">BAIRRO</div>
                            <div id="bt_opc">Opç</div>
                            <div id="on_of">On/Off</div>
                        </div>
                        <?php 
                            $sql= "SELECT * FROM tbl_nosso_ambiente"; 
                            $select=mysql_query($sql);
                            while ($rsNA = mysql_fetch_array($select))
                            {
                        ?>
                        <div class="conteudo"> 
                            <div class="m_f"><?php echo($rsNA['nome'])?></div>
                            <div class="tamanho_ctd"><?php echo($rsNA['cidade'])?></div>
                            <div class="tamanho_ctd"><?php echo($rsNA['bairro'])?></div>
                            <div class="opc_bt">
                                <a href="conteudo_nosso_ambiente.php?escolha=excluir&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/cancel-24.png" alt="Excluir">
                                </a>
                                <a href="conteudo_nosso_ambiente.php?escolha=editar&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/editar.png" alt="Editar">
                                </a>
                                <a href="conteudo_nosso_ambiente.php?escolha=olhar&id=<?php echo($rsNA['id']); ?>" style="text-decoration:none">
                                    <img src="img/olhar.png" alt="Editar">
                                </a>
                            </div>
                            <div class="img_on_of">
                                <?php
                                    $opc = $rsNA['opc'];

                                    if($opc == 0){
                                ?>
                                        <a href="conteudo_nosso_ambiente.php?modo=ligar&id=<?php echo($rsNA['id']); ?>">
                                            <img src="img/of.png">   
                                        </a>
                                <?php    
                                    }else if($opc == 1){
                                ?>
                                        <a href="conteudo_nosso_ambiente.php?modo=apagar&id=<?php echo($rsNA['id']); ?>">
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