<?php
    require_once 'Classes/Conexao.php';
    require_once 'Classes/Usuarios.php';
    require_once 'Classes/validarCPF.php';
    $u = new Usuario;
    $v = new validacaoCPF;
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
    <meta name="author" content="Gabriel e Matheus">
    <link rel="stylesheet" href="css/atualizarsenha.css">
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
    </header>
    <main class="servicos">
        <article class="servico">
            <a href="#"><img src="img/bg.jpg" alt="Coleta e Reciclagem"></a>
            <div class="inner">
                <form action="#" method="post">
                    <fieldset>

                        <fieldset class="grupo">
                            <div class="campo">
                                <label>CPF</label>
                                <input type="text" placeholder="Ex 000.000.000-00" id="cpf" name="cpf" style="width: 22em" value="">
                            </div>
                            <div class="campo">
                                <label for="email">E-mail</label>
                                <input type="text" id="email" name="email" style="width: 22em" value="">
                            </div>  
                            <div class="campo">
                                <label for="nome">Nova senha:</label>
                                <input type="password" id="senha" name="senha" style="width: 10em" value="">
                            </div>
                            <div class="campo">
                                <label for="snome">Repita sua nova senha:</label>
                                <input type="password" id="rsenha" name="rsenha" style="width: 10em" value="">
                            </div>
                        </fieldset>  
                        </fieldset>
                        <button class="botao" type="submit" name="submit">Redefinir</button>
                    </fieldset>
                </form>
            </div>
        </article>
    </main>
<?php
    if(isset($_POST['cpf'])){
        $cpf = addslashes($_POST['cpf']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $rsenha = addslashes($_POST['rsenha']);


        if(!empty($cpf) && !empty($email) && !empty($senha) && !empty($rsenha)){
            if($v->validaCPF($cpf)==true){
                if($senha == $rsenha){
                    if($u->redefinirSenha($cpf,$email,$senha)){
                        echo "<script>alert('Senha redefinida');</script>";
                    }
                    else{
                        echo "<script>alert('Houve um erro ao redefinir senha');</script>";
                    }
                }
                else{
                    echo "<script>alert('Senha e confirmar senha não coincidem!');</script>";
                }
            }
            else{
                echo "<script>alert('CPF inválido');</script>";
            }
        }       
        else{
            echo"<script>alert('Por favor, preencha todos os campos');</script>";
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