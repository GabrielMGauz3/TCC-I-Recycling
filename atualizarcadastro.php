<?php 
    require_once "Classes/Usuarios.php";
    require_once "Classes/Conexao.php";
    require_once "Classes/Agendamento.php";
    if(!isset($_SESSION['id_usuario'])){
        header("location: login.php");
        exit;
    }
        
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
    <link rel="stylesheet" href="css/atualizarcadastro.css">
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
                <li><a href="menuposlogincliente.php">Home</a></li>
                        <li><a href="sobrenosPosLogin.php">Quem Somos</a></li>
                        <li><a href="sair.php">Sair</a></li>                
                        <!--<li><a href="cadastro.php">Cadastrar</a></li>-->
                        <!--li><a href="#">Serviços</a></li>-->
                        <!--<li><a href="#">Contato</a></li>-->
            </ul>
        </nav>
    </header>
    <main class="servicos">
        <article class="servico">
            <a href="#"><img src="img/bg.jpg" alt="Coleta e Reciclagem"></a>
            <div class="inner">
                
                    <fieldset>

                    <button class="botao" type="button" name="atualizar" onclick="window.location.href = 'atualizacontato.php'">Atualizar Telefone</button>
                    <button class="botao" type="button" name="atualizar" onclick="window.location.href = 'atualizaendereco.php'">Atualizar Endereço</button>
                    <button class="botao" type="button" name="atualizar" onclick="window.location.href = 'atualizanome.php'">Atualizar Nome</button>
                    <button class="botao" type="button" name="atualizar" onclick="window.location.href = 'meusDados.php'">Meus Dados</button>

                    </fieldset>
                </form>
            </div>
        </article>
    </main>
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
