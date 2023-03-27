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
        $a = new Agendamentos();
        $usuarioLogado = $u->pegarNomeLogin($_SESSION['id_usuario']);
        $idUsuario = $_SESSION['id_usuario'];
        $buscaGeral = "SELECT tb_agendamentos.id_agendamento,tb_teste_agenda.data_coleta, tb_teste_agenda.periodo,tb_teste_agenda.itemum,tb_teste_agenda.quantidadeum,tb_teste_agenda.itemdois,tb_teste_agenda.quantidadedois,tb_usuarios.nome_usuario,tb_agendamentos.statuscoleta FROM tb_agendamentos
        INNER JOIN tb_teste_agenda
        ON tb_agendamentos.id_agendamento = tb_teste_agenda.fk_id_agendamento
        INNER JOIN tb_usuarios
        ON tb_agendamentos.fk_id_usuario = tb_usuarios.id_usuario
        WHERE id_usuario = $idUsuario
        AND statuscoleta = 'Em andamento'";
            

        if(isset($_POST['buscarbtn'])){
            $buscaTermo = addslashes($_POST['buscabox']);
            //UTILIZAR ILIKE PARA PESQUISA 
            //IGNORAR MAIUSCULAS OU MINUSCULAS
            $buscaGeral .= "AND data_coleta ILIKE '%{$buscaTermo}%' ";
            $buscaGeral .= "OR periodo ILIKE '%{$buscaTermo}%' ";
            $buscaGeral .= "OR itemum ILIKE '%{$buscaTermo}%' ";
            $buscaGeral .= "OR itemdois ILIKE '%{$buscaTermo}%' ";
            
            
        }
        $resultadoBusca = $pdo->prepare($buscaGeral);
        $resultadoBusca->execute();
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
        <meta name="author" content="Gabriel Matheus">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/meusdescartes.css">
        <script src="https://kit.fontawesome.com/c0cdb8f95a.js" crossorigin="anonymous"></script>
        <link rel = "preconnect" href = "https://fonts.gstatic.com">
        <link href = "https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"rel =" stylesheet ">
        <link rel="icon" href="img/logo-mobile.png">    
    </head>
    <body>
        <header class= "cabecalho">
        <nav class="menu">
            <button class="btn-menu"> <i class="fas fa-bars"></i></button>
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
                    <fieldset class="grupo">
                        <h1 class="text-center">Cancelar Agendamento</h1>
                    </fieldset>
                    <fieldset>
                        <form name="form_buscar" method="post" action="cancelarcoleta.php">
                                FAZER BUSCA:<input type="text" name="buscabox" class="form-control" style="width: 12em" value=""/>
                                <input type="submit" class="botao" name="buscarbtn" value="Buscar"/>
                        </form>
                    </fieldset>
                    <fieldset class="grupo">
                        <table style="font-size: small" class="table table-bordered" style="width:60%">
                            <tr>
                                <th class="success"></thclass>Nº COLETA</th>
                                <th class="success"></thclass>DATA</th>
                                <th class="success"></thclass>PERIODO</th>
                                <th class="success"></thclass>ITEM 1</th>
                                <th class="success"></thclass>ITEM 2</th>
                                <!--<th class="success"></thclass>NOME</th>-->
                                <!--<th class="success"></thclass>STATUS</th>-->
                            </tr>
                            <?php
                                
                                /*$resultadoConsulta = "SELECT tb_agendamentos.id_agendamento,tb_teste_agenda.data_coleta, tb_teste_agenda.periodo,tb_teste_agenda.itemum,tb_teste_agenda.quantidadeum,tb_teste_agenda.itemdois,tb_teste_agenda.quantidadedois,tb_usuarios.nome_usuario,tb_agendamentos.statuscoleta FROM tb_agendamentos
                                INNER JOIN tb_teste_agenda
                                ON tb_agendamentos.id_agendamento = tb_teste_agenda.fk_id_agendamento
                                INNER JOIN tb_usuarios
                                ON tb_agendamentos.fk_id_usuario = tb_usuarios.id_usuario
                                WHERE id_usuario = $idUsuario
                                AND statuscoleta = 'Em andamento'";*/
                                $resultadoConsulta = $pdo->prepare($buscaGeral);
                                $resultadoConsulta->execute();
                                while($dado = $resultadoConsulta->fetch(PDO::FETCH_ASSOC)/*ELE IMPRIME O VALOR ATRAVES DO
                                NOME DA COLUMA, POR EXEMPLO A TABELA TEM 3 COLUNAS, LOGO NAO SERA PRECISO INFORMAR COMO 
                                COLUNA 0, COLUNA 1, COLUNA 2 E SIM, COMO O CASO AQUI MOSTRADO, COLUNA DATA_COLETA, PERIODO
                                E ETC*/){?>
                                    <tr>
                                        <td><?=$dado['id_agendamento']?></td>
                                        <td><?=$dado['data_coleta']?></td>
                                        <td><?=$dado['periodo']?></td>
                                        <td><?=$dado['itemum']."\n Qntd: "?><?=$dado['quantidadeum']?></td>
                                        <td><?=$dado['itemdois']."\n Qntd: "?><?=$dado['quantidadedois']?></td>
                                        <!--<td><?=$dado['nome_usuario']?></td>-->
                                        <!--<td><?=$dado['statuscoleta']?></td>-->
                                    </tr>
                                    
                            <?php }?>
                        </table>
                    </fieldset>
                    <fieldset class="grupo">
                        <form class="form-inline" action="#" method="post">
                            
                            <div class="control5">
                                <h4>Informe o numero de coleta:</h4>
                                <input type="text" class="form-control" autocomplete="off" id="numColeta" name="numColeta" placeholder="Digite o número da sua coleta pendente">
                                <!--<h4>Motivo do cancelamento:</h4>
                                <textarea class="form-control" rows="3"></textarea>-->
                            </div>

                            <button class="botao"  type="submit" name="submit" onclick="redireciona()">Confirmar</button>
                            
                        </form>
                        <!--<button class="botao" onclick="window.location.href = 'cancelarcoleta.php'">Atualizar</button>-->
                    </fieldset>      
                </div>
            </article>
        </main>
<?php
    
    if(isset($_POST['numColeta']))
    {
        
        $numColeta = addslashes($_POST['numColeta']);
        if(!empty($numColeta)){
            if($a->cancelarColeta($idUsuario,$numColeta)){
                echo "<script>alert('Coleta Cancelada! Que pena');location.href='cancelarcoleta.php'</script>";
            } 
        }
        else{
            echo "<script>alert('Verifique o numero de coleta informado');location.href='cancelarcoleta.php';</script>";
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>    
</html>