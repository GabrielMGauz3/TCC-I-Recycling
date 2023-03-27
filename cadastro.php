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
                <li><a href="home.html">Home</a></li>
                <li><a href="cadastro.php">Cadastrar</a></li>
                <!--li><a href="#">Serviços</a></li>-->
                <li><a href="login.php">Login</a></li>
                <li><a href="sobrenos.html">Quem Somos</a></li>
                <!--<li><a href="#">Contato</a></li>-->
            </ul>
        </nav>
    </header>
    <div class="banner">
        <div class="title">
            <h2>Junte-se a nós</h2>
            <h3>Fazemos coleta de equipamentos eletrônicos para empresas e residências e pontos de coleta. Cadastre-se e tenha disponível o serviço de Retirada no local através de agendamento</h3>
        </div>      
    </div>
    <main class="servicos">
        <article class="servico">
            <a href="#"><img src="img/bg.jpg" alt="Coleta e Reciclagem"></a>
            <div class="inner">
                <form action="#" method="post">
                    <fieldset>
                        <div class="campo">
                            <label>CPF</label>
                            <!--<label>
                                <input type="radio" name="clienteempresa" value="cliente"> Pessoa física
                            </label>
                            <label>
                                <input type="radio" name="clienteempresa" value="empresa"> Pessoa Jurídica
                            </label>-->
                            <input type="text" placeholder="Ex 000.000.000-00" id="cpf" name="cpf" style="width: 22em" value="">
                        </div>
                        <fieldset class="grupo">
                            <div class="campo">
                                <label for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" required="true" style="width: 10em" value="">
                            </div>
                            <div class="campo">
                                <label for="snome">Sobrenome</label>
                                <input type="text" id="snome" name="snome" required="true" style="width: 10em" value="">
                            </div>
                        </fieldset>
                        <div class="campo">
                            <label>Sexo</label>
                            <label>
                                <input type="radio" name="sexo" value="M"> Masculino
                            </label>
                            <label>
                                <input type="radio" name="sexo" value="F"> Feminino
                            </label>
                        </div>
                        <div class="campo">
                            <label for="email">E-mail</label>
                            <input type="text" id="email" required="true" name="email" style="width: 22em" value="">
                        </div>
                        <fieldset class="grupo">
                            <div class="campo">
                                <label for="senha">Defina uma senha:</label>
                                <input type="password" id="senha" required="true" name="senha" style="width: 10em" value="">
                            </div>
                            <div class="campo">
                                <label for="rsenha">Repita sua senha:</label>
                                <input type="password" id="rsenha" required="true" name="rsenha" style="width: 10em" value="">
                            </div>
                        </fieldset>
                        <div class="campo">
                            <label for="ddd">DDD</label>
                            <input type="text" minlenght= "2" maxlength="2" placeholder="00"id="ddd" pattern="[1-9]+$" required="true" name="ddd" style="width: 10em" value="">
                        </div>
                        <div class="campo"> <!--AQUI, POR CONTA DO BANCO, ACHEI MELHOR FOCARMOS EM APENAS NO CADASTRO DE
                            CELULAR-->
                            <label for="telefone">Celular</label>
                            <input type="tel" minlenght= "9" maxlength="9" placeholder="00000-0000" id="telefone" required="true" name="telefone" style="width: 10em" value="">
                        </div>
                
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
                            <input type="text" id="rua"  name="rua" style="width: 22em" value="">
                        </div>
                        <fieldset class="grupo">
                            <div class="campo">
                                <label for="bairro">Bairro</label>
                                <input type="text" id="bairro"  name="bairro" style="width: 15em" value="">
                            </div>
                            <div class="campo">
                                <label for="numcasa">n°/apt</label>
                                <input type="text" placeholder="Ex 000/000"  id="numcasa" name="numcasa" style="width: 5em" value="">
                            </div>   
                        </fieldset>
                
                        <!--NAO VEJO SENTIDO EM TERMOS ESSA CAIXA DE SUGESTAO NO CADASTRO...<div class="campo">
                            <label for="mensagem">Mensagem</label>
                            <textarea rows="6" placeholder="Fique à vontade para tirar suas dúvidas" style="width: 22em" id="mensagem" name="mensagem"></textarea>
                        </div>-->
                        <button class="botao" type="submit" name="submit">Cadastrar</button>
                    </fieldset>
                </form>
            </div>
        </article>
    </main>
<?php


if(isset($_POST['nome'])){
    $nome = addslashes($_POST['nome']);//addslashes torna mais seguro o formulario contra hackers
    $snome = addslashes($_POST['snome']);
    $cpf = addslashes($_POST['cpf']);
    $sexo = addslashes($_POST['sexo']);
    $ddd = addslashes($_POST['ddd']);
    $telefone = addslashes($_POST['telefone']);
    $rua = addslashes($_POST['rua']);
    $numeroCasa = addslashes($_POST['numcasa']);
    $bairro = addslashes($_POST['bairro']);
    $cidade = addslashes($_POST['cidade']);
    $estado = addslashes($_POST['estado']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $rsenha = addslashes($_POST['rsenha']);
    
    //verifica preenchimento de todos campos
    if(!empty($nome) && !empty($snome) && !empty($cpf) && !empty($sexo)
    && !empty($ddd) && !empty($telefone) && !empty($rua) && !empty($bairro) && !empty($cidade) 
    && !empty($estado) && !empty($email) && !empty($senha) && !empty($rsenha)){
    //pgsql:host=127.0.0.1;port=5432;dbname=projeto_login', 'postgres','1234'
    
        //verifica o cpf digitado
        if($v->validaCPF($cpf)==true){
            /*$conn->conectar();
            if($u->msgErro == ""){*/
                if($senha == $rsenha){
                    if($u->cadastrarUsuarioPF($nome,$snome,$cpf,$sexo,$ddd,$telefone,$email,$senha,$rua,$numeroCasa,
                    $bairro,$cidade,$estado)){
                        echo "<script>alert('Cadastro Realizado com Sucesso!O meio ambiente Agradece!');</script>";
                    }
                    else{
                        echo "<script>alert('Email já cadastrado!');</script>";
                        
                    }
                }
                else{
                    echo "<script>alert('Senha e confirmar senha não coincidem');</script>";
                }    
            //}
            /*else{
                echo "<script>alert('Erro: .$u->msgErro');</script>";
            }*/
        }
        else{
            echo "<script>alert('CPF Inválido');</script>";
        }
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
