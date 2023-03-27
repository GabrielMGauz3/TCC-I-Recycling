<?php

class Usuario{
    private $pdo;
    //public $msgErro = "";

    //CONEXAO AO BANCO
    /*public function conectar($host,$port,$nomeBD,$usuario,$senha){
        global $pdo;
        $pdo = new PDO('pgsql:host='.$host.';port='.$port.';dbname='.$nomeBD,$usuario,$senha);

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
    //FUNÇÃO CADASTRAR USUÁRIO PF
    public function cadastrarUsuarioPF($nome,$snome,$cpf,$sexo,$ddd,$telefone,$email,$senha,$rua,$numeroCasa,
    $bairro,$cidade,$estado){
        global $pdo;//Driver utilizado para implementar a interface do PHP para acesso a um SGBD
        //Verifica se o email já consta no sistema
        $pgsql = $pdo->prepare ("SELECT id_usuario FROM tb_usuarios WHERE email = :e");
        $pgsql->bindValue(":e",$email);
        $pgsql->execute();
        
        if($pgsql->rowCount() > 0){
            echo "<script>alert('Email já cadastrado!');</script>";
        }
        else{
            $pgsql = $pdo->prepare("INSERT INTO tb_usuarios (Nome_Usuario,Sobrenome_Usuario,CPF,Sexo,Email,Senha,Tipo) VALUES (:n,:sn,:cpf,:sx,:e,:s,'u')");
            $pgsql->bindvalue(":n",$nome);
            $pgsql->bindvalue(":sn",$snome);
            $pgsql->bindvalue(":cpf",$cpf);
            $pgsql->bindvalue(":sx",$sexo);
            $pgsql->bindvalue(":e",$email);
            $pgsql->bindvalue(":s",md5($senha));
            $pgsql->execute();
            
            $pgsql = $pdo->prepare("INSERT INTO tb_telefones (CPF,DDD,Telefone) VALUES (:cpf,:ddd,:telefone)");
            $pgsql->bindvalue(":cpf",$cpf);
            $pgsql->bindvalue(":ddd",$ddd);
            $pgsql->bindvalue(":telefone",$telefone);
            $pgsql->execute();

            $pgsql = $pdo->prepare("INSERT INTO tb_enderecos (Rua,Numero_Casa,Bairro,Cidade,Estado) VALUES (:r,:nCasa,:b,:c,:e)");
            $pgsql->bindvalue(":r",$rua);
            $pgsql->bindvalue(":nCasa",$numeroCasa);
            $pgsql->bindvalue(":b",$bairro);
            $pgsql->bindvalue(":c",$cidade);
            $pgsql->bindvalue(":e",$estado);
            $pgsql->execute();
            return true;
        }
    }
    //FUNÇÃO CADASTRAR USUÁRIO PJ
    public function cadastrarUsuarioPJ($nome,$snome,$cpf,$sexo,$telefone,$email,$senha){
        
    }
    public function logar($email,$senha){
        global $pdo;
        //verifica se o email ja ta cadastrado
        $pgsql = $pdo->prepare("SELECT id_usuario,tipo FROM tb_usuarios WHERE
        Email = :e AND Senha = :s");
        $pgsql->bindvalue(":e",$email);
        $pgsql->bindvalue(":s",md5($senha)); //md5 serve para criptografar VERIFICAR TBM O BCRYPT
        $pgsql->execute();
        if($pgsql->rowCount() > 0 ){
            $dado = $pgsql->fetch();
            //session_start();
            //$_SESSION["id_usuario"] = $dado["id_usuario"];
            //return true;//login realizado
            if($dado['tipo'] == 'u'){
                session_start();
                $_SESSION["id_usuario"] = $dado["id_usuario"];
                header("location: menuposlogincliente.php");
            }
            else if($dado['tipo'] == 'a'){
                session_start();
                $_SESSION["id_usuario"] = $dado["id_usuario"];
                header("location: menuposloginemp.php");
            }
            
        }
        else{
            return false;//nao foi possivel logar
        }
    }
    public function redefinirSenha($cpf,$email,$senha){
        global $pdo;

        $pgsql = $pdo->prepare("SELECT id_usuario FROM tb_usuarios WHERE
        email = :e AND cpf = :cpf");
        $pgsql->bindValue(":e",$email);
        $pgsql->bindValue(":cpf",$cpf);
        $pgsql->execute();

        if($pgsql->rowCount() > 0){
            $dados = $pgsql->fetch();
            $dadoAtualiza = $dados["id_usuario"];

            $pgsql = $pdo->prepare("UPDATE tb_usuarios SET senha = :s 
            WHERE id_usuario = $dadoAtualiza AND cpf = :cpf");
            $pgsql->bindValue(":s",md5($senha));
            $pgsql->bindValue(":cpf",$cpf);
            $pgsql->execute();
            return true;
        }
        else{
            return false;
        }
    }
    public function pegarNomeLogin($id){
        global $pdo;

        $array = array();

        $pgsql = $pdo->prepare("SELECT Nome_Usuario FROM tb_usuarios WHERE id_usuario = :i");
        $pgsql->bindvalue(':i',$id);
        $pgsql->execute();
        

        if($pgsql->rowCount() > 0){
            $array = $pgsql->fetch();
            return $array;
        }
        else{
            echo "erro";
        }
        
    }
    public function pegarDados($id){
        global $pdo;

        $array = array();

        $pgsql = $pdo->prepare("SELECT tb_usuarios.nome_usuario,tb_usuarios.sobrenome_usuario,
        tb_usuarios.email,tb_enderecos.cidade,tb_enderecos.rua,tb_enderecos.bairro,
        tb_enderecos.estado,tb_enderecos.numero_casa,tb_telefones.ddd,tb_telefones.telefone FROM tb_usuarios
        INNER JOIN tb_enderecos
        ON tb_usuarios.id_usuario = tb_enderecos.fk_id_usuario
        INNER JOIN tb_telefones
        ON tb_usuarios.id_usuario = tb_telefones.fk_id_usuario
        WHERE id_usuario = :i");
        $pgsql->bindvalue(':i',$id);
        $pgsql->execute();
        

        if($pgsql->rowCount() > 0){
            $array = $pgsql->fetch();
            return $array;
        }
        else{
            echo "erro";
        }
        
    }
    public function atualizaNomeSobrenome($nome,$sobrenome,$idUsuario){
        global $pdo;
        $pgsql = $pdo->prepare ("UPDATE tb_usuarios SET nome_usuario = :n
        WHERE id_usuario = :iduser");
        $pgsql->bindvalue(":n",$nome);
        $pgsql->bindvalue(":iduser",$idUsuario);
        $pgsql->execute();

        $pgsql = $pdo->prepare ("UPDATE tb_usuarios SET sobrenome_usuario = :sn
        WHERE id_usuario = :iduser");
        $pgsql->bindvalue(":sn",$sobrenome);
        $pgsql->bindvalue(":iduser",$idUsuario);
        $pgsql->execute();
    }
    public function atualizaEndereco($rua,$numeroCasa,$bairro,$cidade,$estado,$idUsuario){
        
        global $pdo;   
        $pgsql = $pdo->prepare("UPDATE tb_enderecos SET rua = :r 
        WHERE fk_id_usuario = :iduser");
        $pgsql->bindvalue(":r",$rua);
        $pgsql->bindvalue(":iduser",$idUsuario);
        $pgsql->execute();

        $pgsql = $pdo->prepare("UPDATE tb_enderecos SET numero_casa = :ncasa
        WHERE fk_id_usuario = :iduser");
        $pgsql->bindvalue(":ncasa",$numeroCasa);        
        $pgsql->bindvalue(":iduser",$idUsuario);
        $pgsql->execute();
        
        $pgsql = $pdo->prepare("UPDATE tb_enderecos SET bairro = :b
        WHERE fk_id_usuario = :iduser");
        $pgsql->bindvalue(":b",$bairro);
        $pgsql->bindvalue(":iduser",$idUsuario);
        $pgsql->execute();

        $pgsql = $pdo->prepare("UPDATE tb_enderecos SET cidade = :c
        WHERE fk_id_usuario = :iduser");
        $pgsql->bindvalue(":c",$cidade);
        $pgsql->bindvalue(":iduser",$idUsuario);
        $pgsql->execute();

        $pgsql = $pdo->prepare("UPDATE tb_enderecos SET estado = :e
        WHERE fk_id_usuario = :iduser");
        $pgsql->bindvalue(":e",$estado);
        $pgsql->bindvalue(":iduser",$idUsuario);
        $pgsql->execute();

    }
    public function atualizaContato($ddd,$telefone,$idUsuario)
    {
        global $pdo;
        $pgsql = $pdo->prepare("UPDATE tb_telefones SET ddd = :ddd
        WHERE fk_id_usuario = :iduser");
        $pgsql->bindvalue(":ddd",$ddd);
        $pgsql->bindvalue(":iduser",$idUsuario);
        $pgsql->execute();

        $pgsql = $pdo->prepare("UPDATE tb_telefones SET telefone = :telefone
        WHERE fk_id_usuario = :iduser");
        $pgsql->bindvalue(":telefone",$telefone);
        $pgsql->bindvalue(":iduser",$idUsuario);
        $pgsql->execute();
    }
}
?>