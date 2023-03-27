<?php 
    require_once "Classes/Usuarios.php";
    require_once "Classes/Conexao.php";
    require_once "Classes/Agendamento.php";
    if(!isset($_SESSION['id_usuario'])){
        header("location: login.php");
        exit;
    }
    else{
        $u = new Usuario();
        $usuarioLogado = $u->pegarNomeLogin($_SESSION['id_usuario']);
        $nomeUsuario = $usuarioLogado["nome_usuario"];
    }
?>
<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width", initial-scale=1>
    <title> I-Recyling - Construindo um mundo melhor </title>
    <meta name="description" content="Descarte Correto De Lixo Eletrônico e os Benefícios Da Reciclagem De Lixo Eletrônico">
    <meta name="keywords" content="Lixo eletrônico, Reciclagem, TI verde">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Matheus M.O">
    <link rel="stylesheet" href="css/menulogincliente.css">
    <script src="https://kit.fontawesome.com/c0cdb8f95a.js" crossorigin="anonymous"></script>
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link href = "https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"rel =" stylesheet ">
    <link rel="icon" href="img/logo-mobile.png">

<body>
        
        <header>
            <a href="home.html"><h1 class="logocentro">I-Recyling - Construindo um mundo melhor</h1></a>
        </header>
        
        <div class="title">
            <h2> Bem vindo(a), <?php echo $nomeUsuario?></h2>
        </div>
        <div class="buttons">
            <button type="button" class="btn-cadastrar" onclick="Confirma()">Agendar Coleta<i class="fas fa-arrow-right"></i>
            </button>
            <script>
            function Confirma(){
            if (confirm ("Voce esta certo disso?"))
                { 
                    
                    window.location.href= 'agendamentocoleta.php'
                    
                }
            }
            </script>
            <button class="btn-sobre" onclick="window.location.href = 'meusdescartes.php'">Meus Descartes <i class="fas fa-arrow-right"></i>
            </button>
            <button type="button" class="btn-cadastrar" onclick="window.location.href = 'cancelarcoleta.php'">Cancelar Agendamento<i class="fas fa-arrow-right"></i>
            </button>
            <button class="btn-sobre" onclick="window.location.href = 'meusDados.php'">Meus Dados <i class="fas fa-arrow-right"></i>
            </button>
            <button type="button" class="btn-cadastrar" onclick="window.location.href = 'pontoscoleta.php'">Pontos de Coleta<i class="fas fa-arrow-right"></i>
            </button>
            <button type="button" class="btn-sobre" onclick="window.location.href = 'sair.php'">Sair<i class="fas fa-arrow-right"></i>
            </button>
        </div>
        

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
            $(".menu").hide()
        ;});
    </script>
</body>    
</head>

