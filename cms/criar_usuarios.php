<?php
//conexao com o db
require_once("conectar_banco.php");
Conexao_db();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>CMS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_criar_usuarios.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
        <!--IF do botao salvar-->
        <?php
        if(isset($_POST["BtnSalvar"]))
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


            //Monta o Script para enviar para o BD
            addslashes($sql = "insert into tbl_usuario (usuario, senha, nome, telefone, celular, email, sexo, idNivel)
                        values ('".$usuario."','".$senha."','".$nome."','".$telefone."','".$celular."','".$email."','".$sexo."',
                        '".$nivel."') ");

            //Executa o script no BD
            mysql_query($sql);

        ?>
            <script>
                alert("Usuário cadastrado com sucesso!");
            </script>        
        <?php
        }
        ?>
    </head>
    <body>
        <form action="criar_usuarios.php" name="frmCad" method="post">
            <div id="segura_td">
                <header>CADASTRO DE USUÁRIO</header>
                <div id="principal">
                    <div class="titulo">Nome:</div>
                    <input placeholder="Nome" type="text" name="txtNome" value="" required class="tamanho_caixa"> 
                    <div class="titulo">Usuário:</div>
                    <input placeholder="Usuario" type="text" name="txtUsuario" value="" maxlength="15" required class="tamanho_caixa"> 
                    <div class="titulo">Senha:</div>
                    <input placeholder="Senha" type="password" name="txtSenha" value="" maxlength="20" required class="tamanho_caixa"> 
                    <div class="titulo">Telefone:</div>
                    <input placeholder="Telefone" type="text" name="txtTel" value="" class="tamanho_caixa"> 
                    <div class="titulo">Celular:</div>
                    <input placeholder="Celular" type="text" name="txtCel" value="" required class="tamanho_caixa"> 
                    <div class="titulo">Email:</div>
                    <input placeholder="Email" type="email" name="txtEmail" value="" required class="tamanho_caixa"> 
                    <div class="titulo">Nível:</div>
                    <div id="select">
                        <select class="dados" name="slcNivel">
                            <?php 
                            $sql="select * from tbl_nivel";
                            $select=mysql_query($sql);

                            while($rs=mysql_fetch_array($select)){

                            ?>

                            <option value=" <?php echo $rs['idNivel']?>"><?php echo $rs['nivel']?></option>

                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                    <div class="titulo">Sexo:</div>
                    <div id="sexo">
                        <input type="radio" name="rdosexo" value="M" required>Masculino
                        <input type="radio" name="rdosexo" value="F" required>Feminino
                    </div>
                </div>
                <footer>
                    <div id="botao">
                        <input type="submit" name="BtnSalvar" value="Salvar" id="bt">
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