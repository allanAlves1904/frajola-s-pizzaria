<?php

//conexao com o db
require_once("conectar_banco.php");
Conexao_db();

//inicia a variavel de sessao
session_start();


// if da escolha usuario, visualizar, editar ou excluir
if(isset($_GET['escolha'])){
    $escolha = $_GET['escolha'];
    $id = $_GET['id'];
    
    //if da escolha excluir
    if($escolha == 'excluir'){
        $sql="DELETE FROM tbl_usuario WHERE id= ".$id;
        mysql_query($sql);
        header('location:cms_adm_usuarios.php');
        
    // if da escolha editar
    }else if($escolha == 'editar'){
        $sql="select u.id,u.usuario,u.senha,u.nome,u.telefone,u.celular,u.email,u.sexo,n.nivel,n.idNivel from tbl_usuario as u , tbl_nivel as n where u.idNivel=n.idNivel AND u.id = ".$id;
        $select = mysql_query($sql);
        $rsN = mysql_fetch_array($select);
        
        $_SESSION['nomeUser'] = $rsN['nome'];
        $_SESSION['usuario'] = $rsN['usuario'];
        $_SESSION['senhaUsuario'] = $rsN['senha'];
        $_SESSION['telefoneUsuario'] = $rsN['telefone'];
        $_SESSION['celularUsuario'] = $rsN['celular'];
        $_SESSION['emailUsuario'] = $rsN['email'];
        $_SESSION['sexoUsuario'] = $rsN['sexo'];
        $_SESSION['nivelUsuario'] = $rsN['nivel'];
        $_SESSION['idNivelUsuario'] = $rsN['idNivel'];
        $_SESSION['idUsuario'] = $rsN['id'];
        $_SESSION['botao'] = "Editar";
        
        
        if($_SESSION['nomeUsuario'] !=null){
            header('location:editar_usuario.php');
            //echo($_SESSION['idNivelUsuario']);
        }else{
            echo("Deu ruim!!!");
        }
    
    // if da escolha visualizar
    }else if($escolha == 'visualizar'){
        
        $sql="select u.id,u.usuario,u.senha,u.nome,u.telefone,u.celular,u.email,u.sexo,n.nivel from tbl_usuario as u , tbl_nivel as n where u.idNivel=n.idNivel AND u.id = ".$id;
        mysql_query($sql);
        $select = mysql_query($sql);
        $rsN = mysql_fetch_array($select);
        
        $_SESSION['nomeUser'] = $rsN['nome'];
        $_SESSION['usuario'] = $rsN['usuario'];
        $_SESSION['senhaUsuario'] = $rsN['senha'];
        $_SESSION['telefoneUsuario'] = $rsN['telefone'];
        $_SESSION['celularUsuario'] = $rsN['celular'];
        $_SESSION['emailUsuario'] = $rsN['email'];
        $_SESSION['sexoUsuario'] = $rsN['sexo'];
        $_SESSION['nivelUsuario'] = $rsN['nivel'];
        
        if($_SESSION['nomeUser'] !=null){
            header('location:visualizar_usuario.php');
        }else{
            echo("Deu ruim!!!");
        }
        
    }
}

// if da escolha nivel, visualizar, editar ou excluir
if(isset($_GET['escolha_nivel'])){
    $escolha_nivel = $_GET['escolha_nivel'];
    $id = $_GET['idNivel'];
    
    //if da escolha excluir
    if($escolha_nivel == 'excluir'){
        $sql="DELETE FROM tbl_nivel WHERE idNivel= ".$id;
        mysql_query($sql);
        header('location:cms_adm_usuarios.php');
    
        //if da escolha editar
    }else if($escolha_nivel == 'editar'){
        $sql="select * from tbl_nivel WHERE idNivel = ".$id;
        mysql_query($sql);
        $select = mysql_query($sql);
        $rsN = mysql_fetch_array($select);
        
       
        $_SESSION['nivel'] = $rsN['nivel'];
        $_SESSION['idNivel'] = $rsN['idNivel'];
        $_SESSION['botao'] = "Editar";
        
        
        if($_SESSION['nivel'] !=null){
            header('location:editar_nivel.php');
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
        <link rel="stylesheet" type="text/css" href="css/style_cms_adm_usuarios.css">
        <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
    </head>
    <body>
        <form name="frmCms" method="get" action="cms_adm_usuarios.php">
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
                                    <div id="texto_opc_adm_cor">Adm.Usuários</div>  
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
                        <div id="novo">
                            <div class="coluna">                                
                                <div class="center">
                                    <a href="criar_usuarios.php" style="text-decoration:none" >
                                        <img src="img/adicionar.png" alt="Adicionar Usuário">
                                    </a>
                                </div>
                                <div class="texto">Add. Usuário</div>                                
                            </div>
                            <div class="coluna">
                                <div class="center">
                                    <a href="criar_nivel.php" style="text-decoration:none"> 
                                        <img src="img/adicionar.png" alt="Adicionar Nível">
                                    </a>
                                </div>
                                <div class="texto">Add. Nível</div>                                
                            </div>
                        </div>
                        <div class="branco"></div>
                        <div id="inf_user">
                            <div class="tamanho">NOME</div>
                            <div class="tamanho">USUÁRIO</div>
                            <div class="tamanho">CELULAR</div>
                            <div class="tamanho">NÍVEL</div>
                            <div class="bt_opc">Opç</div>
                        </div>
                        <?php
                            $sql="select u.id,u.usuario,u.senha,u.nome,u.telefone,u.celular,u.email,u.sexo,n.nivel
                            from tbl_usuario as u , tbl_nivel as n where u.idNivel=n.idNivel";
                            $select=mysql_query($sql);
                            while ($rsU = mysql_fetch_array($select))
                            {
                        ?>
                        <div class="informaçao_usuario">
                            <div class="tamanho_ctd"><?php echo($rsU['nome'])?></div>
                            <div class="tamanho_ctd"><?php echo($rsU['usuario'])?></div>
                            <div class="tamanho_ctd"><?php echo($rsU['celular'])?></div>
                            <div class="tamanho_ctd"><?php echo($rsU['nivel']) ?></div>                            
                            <div class="opc_bt">
                                <a href="cms_adm_usuarios.php?escolha=visualizar&id=<?php echo($rsU['id']); ?>" style="text-decoration:none">
                                    <img src="img/olhar.png" alt="Visualizar">
                                      
                                </a>
                                <a href="cms_adm_usuarios.php?escolha=excluir&id=<?php echo($rsU['id']); ?>" style="text-decoration:none">
                                    <img src="img/cancel-24.png" alt="Excluir">
                                </a>
                                <a href="cms_adm_usuarios.php?escolha=editar&id=<?php echo($rsU['id']); ?>" style="text-decoration:none">
                                    <img src="img/editar.png" alt="Editar">
                                </a>
                            </div>
                        </div>                        
                        <?php
                            }
                        ?>
                        <div class="branco"></div>
                        <div id="inf_nivel">
                            <div class="tamanho">NÍVEL</div>                        
                            <div class="bt_opc">Opç</div>                        
                        </div>
                        <?php
                            $sql = "SELECT * FROM tbl_nivel";
                            $select = mysql_query($sql);
                            while ($rsN = mysql_fetch_array($select))
                            {
                        ?>
                        <div class="informacao_nivel">
                            <div class="tamanho_ctd"><?php echo($rsN['nivel']) ?></div>                            
                            <div class="opc_bt">
                                <a href="cms_adm_usuarios.php?escolha_nivel=excluir&idNivel=<?php echo($rsN['idNivel']); ?>" style="text-decoration:none">
                                    <img src="img/cancel-24.png" alt="Excluir">
                                </a>
                                <a href="cms_adm_usuarios.php?escolha_nivel=editar&idNivel=<?php echo($rsN['idNivel']); ?>" style="text-decoration:none">
                                    <img src="img/editar.png" alt="Editar">
                                </a>
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