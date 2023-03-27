<?php
    class conexaoTeste{

    public function conectarBancoTeste(){
    
    $host = '127.0.0.1';
    $port = '5432';
    $nomeBD = 'Teste2021v1';
    $usuario = 'postgres';
    $senha = '1234';
    //$conecta = pg_connect("host=$host port=$port dbname=$nomeBD user=$usuario password=$senha");
    
    //ORIENTADA A OBJETOS
    try{
        $pdo = new PDO('pgsql:host='.$host.';port='.$port.';dbname='.$nomeBD,$usuario,$senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*$sql = $pdo->query("SELECT * FROM tb_usuarios");
    $sql->execute();

    echo "Existem ".$sql->rowCount()." registros";*/
    }
    catch(PDOException $e){
        echo "Erro: ".$e->getMessage();
        exit;
    }
    /*private $pdo;
    public $msgErro = "";

    //CONEXAO AO BANCO
    public function conectar($host,$port,$nomeBD,$usuario,$senha){
        global $pdo;
        $pdo = new PDO('127.0.0.1','5432','Teste2021v1','postgres','1234');

        try{   
            if($pdo){
                return true;
                //echo "Conexão ao Banco bem sucedida";
            }
        }
        catch(PDOException $e){
            //Caso o banco não conecte, dispara mensagem
            $msgErro = $e->getMessage();
        }
    }*/
        }
    }
?>
