<?php 
    require_once "Classes/Usuarios.php";
    require_once "Classes/Conexao.php";
    if(!isset($_SESSION['id_usuario'])){
        header("location: login.php");
        exit;
    }
    $u = new Usuario;
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
                <form action="#" method="post">
                    <fieldset>
                        <fieldset class="grupo">
                                <div class="campo">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" id="cidade" name="cidade" style="width: 10em" value="">
                                </div>
                                <div class="campo">
                                    <label for="estado">Estado</label>
                                    <select name="estado" id="estado">
                                        <option value="">--</option>
                                        <option value="PR">PR</option>
                                        <option value="SC">SC</option>
                                        <option value="RS">RS</option>
                                    </select>
                                </div>
                            </fieldset>
                            <div class="campo">
                                <label for="nomerua">Rua</label>
                                <input type="text" id="nomerua" name="nomerua" style="width: 22em" value="">
                            </div>
                            <fieldset class="grupo">
                                <div class="campo">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" id="bairro" name="bairro" style="width: 15em" value="">
                                </div>
                                <div class="campo">
                                    <label for="numcasa">n°/apt</label>
                                    <input type="text" placeholder="Ex 000/000" id="numcasa" name="numcasa" style="width: 5em" value="">
                                </div>   
                            </fieldset>
                        <button class="botao" type="submit" name="submit">Atualizar</button>
                        <button class="botao" type="button" name="atualizar" onclick="window.location.href = 'meusDados.php'">Meus Dados</button>
                    </fieldset>
                </form>
            </div>
        </article>
    </main>
<?php
    if(isset($_POST['nomerua'])){
        $rua = addslashes($_POST['nomerua']);
        $numeroCasa = addslashes($_POST['numcasa']);
        $bairro = addslashes($_POST['bairro']);
        $cidade = addslashes($_POST['cidade']);
        $estado = addslashes($_POST['estado']);
        $idUsuario = addslashes($_SESSION['id_usuario']);
        
        if(!empty($rua) && !empty($numeroCasa) && !empty($bairro) &&!empty($cidade) && !empty($estado)){
            $u->atualizaEndereco($rua,$numeroCasa,$bairro,$cidade,$estado,$idUsuario);
            echo "<script>alert('Informações de endereço atualizados');</script>";
        }
        else{
            echo "<script>alert('Preencha todos os campos!');</script>";
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
