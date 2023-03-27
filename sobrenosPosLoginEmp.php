<?php 
    session_start();
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
    <link rel="stylesheet" href="css/cadastroAtual.css">
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
                <li><a href="sair.php">Sair</a></li>
                <li><a href="pontoscoletaemp.php">Pontos de Coleta</a></li>
                <li><a href="menuposloginemp.php">Home</a></li>
                <!--<li><a href="#">Contato</a></li>-->
            </ul>
        </nav>
        <a href="home.html"><h1 class="logocentro">I-Recyling - Construindo um mundo melhor</h1></a>
    </header>
    <main class="servicos">
        <article class="servico">
            <a href="#"><img src="img/bg7.jpg" alt="Coleta e Reciclagem"></a>
            <div class="inner">
                <a href="#">Nosso Objetivo</a>
                <h4>É deixar um mundo mais ecológico para proxima geração.</h4>
                <p>Esse estudo foi motivado pelas questões relacionadas ao lixo eletrônico e pela crescente aceleração da produção e do consumo de eletrônicos no Brasil. Essa sistemática de disposição do lixo compromete diretamente o meio ambiente, causando poluição do solo, do ar e dos recursos hídricos e afeta a condição sanitária da população, pois propicia a proliferação dos catadores de lixo, e o risco para saúde, além de danos econômicos e ecológicos imensuráveis. O lixo eletrônico é um dos mais novos problemas da modernidade. Como descartar, armazenar e reciclar? O resíduo tecnológico começa a acumular em aterros e lixões, sendo um dos problemas da modernidade e assim um problema de saúde pública. No Brasil ainda não é tratado com a devida atenção. No entanto com o despertar da conscientização ambiental o panorama mudou e hoje o mercado se prepara para reciclar. Converse em casa com sua familia e vamos juntos construir um mundo melhor.
                </p>
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