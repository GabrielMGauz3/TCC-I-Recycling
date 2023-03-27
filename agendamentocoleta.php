<?php 
    require_once "Classes/Usuarios.php";
    require_once "Classes/Conexao.php";
    require_once "Classes/Agendamento.php";
    require_once "Classes/testeConecta.php";
    global $pdo;
    $a = new Agendamentos();
    $conn = new conexaoTeste();
    if(!isset($_SESSION['id_usuario'])){
        header("location: login.php");
        exit;
    }
    else{
        $criaIdAgenda = new Agendamentos();
        $idUsuario = addslashes($_SESSION['id_usuario']);
        $statuscoleta = addslashes('Em andamento');
        $criaIdAgenda->criarAgenda($idUsuario,$statuscoleta);
        $idAgenda = $pdo->lastInsertId();
        
        /*$sqlInsert = "INSERT INTO tb_agendamentos (fk_id_usuario,statuscoleta) values ('2','em andamento') RETURNING id_agendamento";
        $resultado = pg_query($conn,$sqlInsert);
        $ultimoID = pg_fetch_array($resultado,0)[0];
        $criaIdAgenda->criarAgenda($idUsuario,$statuscoleta);
        
        $stmt = $pdo->prepare("INSERT INTO tb_agendamentos (fk_id_usuario,statuscoleta) VALUES (?,?) RETURNING id_agendamento");

        $stmt->execute(array($idUsuario,$statuscoleta));
        $pdo->commit();
        $ultimo_id = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $ultimo_id;*/
    }
        
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=deice-width", initial-scale=1>
        <title> I-Recyling - Construindo um mundo melhor </title>
        <meta name="description" content="Descarte Correto De Lixo Eletrônico e os Benefícios Da Reciclagem De Lixo Eletrônico">
        <meta name="keywords" content="Lixo eletrônico, Reciclagem, TI verde">
        <meta name="robots" content="index, follow">
        <meta name="author" content="Gabriel Matheus e Matheus Silva">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/agendamentocoleta.css">
        <script src="https://kit.fontawesome.com/c0cdb8f95a.js" crossorigin="anonymous"></script>
        <link rel = "preconnect" href = "https://fonts.gstatic.com">
        <link href = "https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"rel =" stylesheet ">
        <link rel="icon" href="img/logo-mobile.png">    
    </head>
    <body>
        <header class= "cabecalho">
            <button class="btn-menu"> <i class="fas fa-bars"></i></button>
            <nav class="menu">
                <a class="btn-close"><i class="fas fa-times"></i>
                </a>
                <ul>
                    <li><a href="menuposlogincliente.php"style="font-size: medium">Home</a></li>
                    <li><a href="sobrenosPosLogin.php"style="font-size: medium">Quem Somos</a></li>
                    <li><a href="sair.php"style="font-size: medium">Sair</a></li>                
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
                        <fieldset class="grupo">
                            <h1 class="text-center">Agendamento</h1>
                        </fieldset>
                        <fieldset class="grupo">
                                <div>
                                    <h3>Escolha uma data:</h3>
                                    <input id="date" type="date"name="data_coleta" id="data_coleta">
                                </div>
                            <div class="control4">
                                <h4>Escolha o melhor periodo:</h4>                                
                                <select class="form-control" style="width: 10em" name="periodo" id="periodo">
                                    <option>Matutino</option>
                                    <option>Vespertino</option>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="grupo">
                                <div class="control1">
                                    <h4>Itens para descarte:</h4>
                                    <select class="form-control" style="width: 10em"
                                    name="itemum" id="itemum">
                                        <option>Vazio</option>
                                        <option>HD</option>
                                        <option>Teclado</option>
                                        <option>Mouse</option>
                                        <option>Monitor</option>
                                        <option>Impressora</option>
                                    </select>
                                </div>
                                <div class="control2">
                                    <h4>Quantidade:</h4>
                                    <select class="form-control" style="width: 10em"
                                    name="qntdum" id="qntdum">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>                        
                        </fieldset>
                        <fieldset class="grupo">
                                <div class="control1">
                                    <h4>Itens para descarte:</h4>
                                    <select class="form-control" style="width: 10em"
                                    name="itemdois" id="itemdois">
                                        <option>Vazio</option>
                                        <option>HD</option>
                                        <option>Teclado</option>
                                        <option>Mouse</option>
                                        <option>Monitor</option>
                                        <option>Impressora</option>
                                        <option>HD</option>
                                        <option>Teclado</option>
                                        <option>Mouse</option>
                                        <option>Monitor</option>
                                        <option>Impressora</option>
                                    </select>
                                </div>
                                <div class="control2">
                                    <h4>Quantidade:</h4>
                                    <select class="form-control" style="width: 10em"
                                    name="qntddois" id="qntddois">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>                        
                        </fieldset>
                        <!--<fieldset class="grupo">
                            <form class="form-inline">
                                <div class="control1">
                                    <h4>Itens para descarte:</h4>
                                    <select class="form-control" style="width: 10em" 
                                    name="descarteTres" id="descarteTres">
                                        <option>HD</option>
                                        <option>Teclado</option>
                                        <option>Mouse</option>
                                        <option>Monitor</option>
                                        <option>Impressora</option>
                                    </select>
                                </div>
                                <div class="control2">
                                    <h4>Quantidade:</h4>
                                    <select class="form-control" style="width: 10em">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>                        
                            </form>
                        </fieldset>-->
                        <fieldset class="grupo">
                                <!--<div class="control5">
                                    <h3>Observações:</h3>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>-->
                                <button class="botao" type="submit" name="submit">Agendar</button>
                        </fieldset>  
                    </form>     
                </div>
            </article>
        </main>
    <?php
        
        
        //$dataColeta,$periodo,$itemUm,$qUm,$itemDois,$qDois,$idUsuario
        if(isset($_POST['data_coleta']))
        {
            $dataColeta = addslashes($_POST['data_coleta']);//addslashes torna mais seguro o formulario contra hackers
            $periodo = addslashes($_POST['periodo']);
            $itemUm = addslashes($_POST['itemum']);
            $qUm = addslashes($_POST['qntdum']);
            $itemDois = addslashes($_POST['itemdois']);
            $qDois = addslashes($_POST['qntddois']);
                //$idUsuario = addslashes($_SESSION['id_usuario']);            
            
            if(($itemUm == 'Vazio' && $itemDois == 'Vazio') && ($qUm == 0 && $qDois == 0)){
                echo "<script>alert('Voce precisa selecionar um item para criar a agenda');</script>";
            }
            else{
                if($a->agendarColeta($dataColeta,$periodo,$itemUm,$qUm,$itemDois,$qDois,$idUsuario,$idAgenda)){
                    echo "<script>alert('Agenda cadastrada');</script>";
                }
                else{
                    echo "<script>alert('Erro na agenda');</script>";
                }
            }
        }
        
        
        

        /*$pgsql = $pdo->prepare("SELECT * FROM tb_descartes");
        $pgsql->execute();

        foreach($fetch as $descarte){
            echo 'Item:'.$descarte['nome_descarte'].'&nbsp;
            Quantidade: '.$descarte['quantidade'];
            '<a href="carrinho.php?add=carrinho&id='.$descarte['id_descarte'].'">Adicionar item</a>
            </br>';
        }*/
        



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
        <script>
            $(".btn-menu").click(function(){
                $(".menu").show();
            });
            $(".btn-close").click(function(){
                $(".menu").hide();
            });
        </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>    
</html>