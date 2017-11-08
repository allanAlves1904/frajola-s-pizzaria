<?php
//conexao com o db
require_once("conectar_banco.php");
Conexao_db();

// inicianda a variavel de sessao
session_start();

$nivel= $_SESSION['idNivelUsuario'];

if($_SESSION['sexoUsuario'] == "M"){
    $checkedM = "checked";
    $checkedF = null;
}else{
    $checkedM = null;
    $checkedF = "checked";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>CMS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_editar_usuario.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
        <!--IF do botao editar-->
        <?php
        if(isset($_POST["btEditar"]))
        {
            //Resgatar os dados fornecidos pelo usuario
            //usando o metod POST, conforme escolhido pelo Form
            $nome=$_POST["txtNome"];
            $usuario=$_POST["txtUsuario"];
            $senha=$_POST["txtSenha"];
            $telefone=$_POST["txtTel"];
            $celular=$_POST["txtCel"];
            $email=$_POST["txtEmail"];
            $nivel=$_POST["slcNivel"];
            $sexo=$_POST["rdosexo"];  
            $idUser=$_SESSION['idUsuario'];
        
            //Monta o Script para enviar para o BD
            //AQUI ESTA INCOMPLETO *************************************************************
            addslashes($sql = "update tbl_usuario set usuario ='".$usuario."', senha ='".$senha."', nome ='".$nome."', telefone = '".$telefone."', celular ='".$celular."', email ='".$email."', sexo ='".$sexo."', idNivel='".$nivel."' WHERE id =".$idUser);
            
            //Executa o script no BD
            mysql_query($sql);
        ?>  
        <script>
            alert("Usuário editado com sucesso!");
        </script> 
        <?php
                header('location:cms_adm_usuarios.php');
        }
        ?>  
    </head>
    <body>
        <form name="frmEdt" method="post" action="editar_usuario.php">
            <div id="segura_td">
                <header>Edição de Usuário:</header>
                <div id="principal">
                    <div class="titulo">Nome:</div>
                    <input type="text" name="txtNome" value="<?php echo($_SESSION['nomeUser']); ?>" class="tamanho">
                    <div class="titulo">Usuário:</div>
                    <input type="text" name="txtUsuario" value="<?php echo($_SESSION['usuario']); ?>" class="tamanho">
                    <div class="titulo">Senha:</div>
                    <input type="text" name="txtSenha" value="<?php echo($_SESSION['senhaUsuario']); ?>" class="tamanho">
                    <div class="titulo">Telefone:</div>
                    <input type="tel" name="txtTel" value="<?php echo($_SESSION['telefoneUsuario']); ?>" class="tamanho">
                    <div class="titulo">Celular:</div>
                    <input type="tel" name="txtCel" value="<?php echo($_SESSION['celularUsuario']); ?>" class="tamanho">
                    <div class="titulo">Email:</div>
                    <input type="email" name="txtEmail" value="<?php echo($_SESSION['emailUsuario']); ?>" class="tamanho">
                    <div class="titulo">Nível:</div>
                    <div id="select">
                        <select class="dados" name="slcNivel">
                            <?php 
                            if($_SESSION['botao'] == "Editar"){
                                $sql="select * from tbl_nivel WHERE idNivel=".$nivel;
                                $select=mysql_query($sql);
                                while($rNivel=mysql_fetch_array($select)){
                                    $idNivel= $rNivel['idNivel'];
                                    $nivel = $rNivel['nivel'];
                                    echo("<option value = $idNivel>$nivel</option> ");
                                }
                            }
                            $sql="select * from tbl_nivel";
                            $select=mysql_query($sql);
                            while($rs=mysql_fetch_array($select)){

                                $idNivel= $rNivel['idNivel'];
                                $nivel = $rNivel['nivel'];
                                //echo("<option value =$idNivel>$nivel</option>");
                            ?>

                            <option value="<?php echo $rs['idNivel']?>"><?php echo $rs['nivel']?></option>
                            
                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                    <div class="titulo">Sexo:</div>
                    <div id="sexo">
                        <input type="radio" name="rdosexo" value="M" <?php echo($checkedM); ?> required>Masculino
                        <input type="radio" name="rdosexo" value="F" <?php echo($checkedF); ?> required>Feminino
                    </div>
                </div>
                <footer>
                    <div id="botao">
                        <input type="submit" name="btEditar" value="Editar" id="bt">
                        <div id="bt_voltar">
                            <a href="cms_adm_usuarios.php" style="text-decoration:none" id="cor">
                                Voltar(x)
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </form>
    </body>
</html>