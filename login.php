<?php
    require_once 'Classes/Conexao.php';
    require_once 'Classes/Usuarios.php';
    $u = new Usuario;
    //$conn = new Conecta;
?>
<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=deice-width", initial-scale=1>
    <title> I-Recyling - Construindo um mundo melhor </title>
    <meta name="description" content="Descarte Correto De Lixo Eletrônico e os Benefícios Da Reciclagem De Lixo Eletrônico">
    <meta name="keywords" content="Lixo eletrônico, Reciclagem, TI verde">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Gabriel Matheus">
    <link rel="stylesheet" href="css/loginAtual.css">
    <script src="https://kit.fontawesome.com/c0cdb8f95a.js" crossorigin="anonymous"></script>
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link href = "https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"rel =" stylesheet ">
    <link rel="icon" href="img/logo-mobile.png">

<body>
    <header class= "cabecalho">
        <button class="btn-menu"> <i class="fas fa-bars"></i></button>
        <nav class="menu">
            <a class="btn-close"><i class="fas fa-times"></i>
            </a>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="cadastro.php">Cadastrar</a></li>
                <!--li><a href="#">Serviços</a></li>-->
                <li><a href="login.php">Login</a></li>
                <li><a href="sobrenos.html">Quem Somos</a></li>
                <!--<li><a href="#">Contato</a></li>-->
            </ul>
        </nav>
        <a href="home.html"><h1 class="logocentro">I-Recyling - Construindo um mundo melhor</h1></a>
    </header>
    <div class="banner">
        <form action="#" method="post">
            <fieldset>
                <div class="campo">
                    <label for="email">Login</label>
                    <input type="text" id="email" name="email" style="width: 22em" value="">
                </div>
                <fieldset class="grupo">
                    <div class="campo">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" style="width: 22em" value="">
                    </div>
                </fieldset>
                <a class="senha" href="esquecisenha.php">Esqueceu sua senha?</a>
            </fieldset>
            <button class="botao" type="submit" name="submit">Entrar</button>
        </form>
        </div>
<?php
    if(isset($_POST['email']))
    {    
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
    
        if(!empty($email) && !empty($senha)){
        
            //$conn->conectar();
            //if($u->msgErro == ""){

                if($u->logar($email,$senha)){  
                    
                    //header("location: menuposlogincliente.php");
                    
                }
                else{
                    echo "<script>alert('Email e/ou senha estão incorretos!');</script>";
                }
            //}
            /*else{
                "Erro: ".$u->msgErro;
            }*/
        }
        else{
            echo "<script>alert('Preencha todos campos');</script>";
        }
    }
    
?>
    <!--Roda pé-->
    <footer class="rodape">
        <div class="social-icons">
            <!-- ICONES SOCIAIS
                <a href="#"><i class= "fa fa-facebook"></i></a>
            <a href="#"><i class= "fa fa-twitter"></i></a>
            <a href="#"><i class= "fa fa-google"></i></a>
            <a href="#"><i class= "fa fa-instagram"></i></a>-->
            <a href="#"><i class= "fa fa-envelope"></i></a>
        </div>
        <p class="copyright">
            Copyright I-Recycling 2020. Todos os direitos reservados.
        </p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
    <script>
        $(".btn-menu").click(function(){
            $(".menu").show();
        });
        $(".btn-close").click(function(){
            $(".menu").hide();
        });
    </script>
</body>    
</head>