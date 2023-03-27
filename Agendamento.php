<?php

    class Agendamentos{
    private $pdo;

        public function agendarColeta($dataColeta,$periodo,$itemUm,$qUm,$itemDois,$qDois,$idUsuario,$idAgenda){
        
            global $pdo;
            $pgsql = $pdo->prepare ("INSERT INTO tb_teste_agenda (data_coleta,periodo,itemum,quantidadeum,itemdois,quantidadedois,fk_id_usuario,fk_id_agendamento)
            VALUES (:dtcoleta,:periodo,:ium,:qum,:idois,:qdois,:iduser,:idagenda)");
            $pgsql->bindValue(":dtcoleta",$dataColeta);
            $pgsql->bindValue(":periodo",$periodo);
            $pgsql->bindValue(":ium",$itemUm);
            $pgsql->bindValue(":qum",$qUm);
            $pgsql->bindValue(":idois",$itemDois);
            $pgsql->bindValue(":qdois",$qDois);
            $pgsql->bindValue(":iduser",$idUsuario);
            $pgsql->bindValue(":idagenda",$idAgenda);
            $pgsql->execute();
            return true;
        }
        public function agendarColetaTeste($dataColeta,$periodo,$itemUm,$qUm,$itemDois,$qDois,$idColeta){
        
            global $pdo;
            $pgsql = $pdo->prepare ("INSERT INTO tb_agenda_descartes (data_coleta,periodo,itemum,quantidadeum,itemdois,quantidadedois,fk_id_agendamento)
            VALUES (:dtcoleta,:periodo,:ium,:qum,:idois,:qdois,:idagend)");
            $pgsql->bindValue(":dtcoleta",$dataColeta);
            $pgsql->bindValue(":periodo",$periodo);
            $pgsql->bindValue(":ium",$itemUm);
            $pgsql->bindValue(":qum",$qUm);
            $pgsql->bindValue(":idois",$itemDois);
            $pgsql->bindValue(":qdois",$qDois);
            $pgsql->bindValue(":idagend",$idColeta);
            $pgsql->execute();
            return true;
        }

        public function criarAgenda($idUsuario,$statuscoleta){

            global $pdo;
            $pgsql = $pdo->prepare ("INSERT INTO tb_agendamentos (fk_id_usuario,statuscoleta) VALUES (:iduser,:st) RETURNING id_agendamento");
            $pgsql->bindValue(":iduser",$idUsuario);
            $pgsql->bindValue(":st",$statuscoleta);
            $pgsql->execute();
            return true;
        }

        /*public function listarAgendas($idUser){
            global $pdo;

            $pgsql = $pdo->prepare("SELECT tb_teste_agenda.data_coleta, tb_teste_agenda.periodo,tb_teste_agenda.itemum,tb_teste_agenda.quantidadeum,tb_teste_agenda.itemdois,tb_teste_agenda.quantidadedois,tb_usuarios.nome_usuario,tb_agendamentos.statuscoleta FROM tb_agendamentos
            INNER JOIN tb_teste_agenda
            ON tb_agendamentos.id_agendamento = tb_teste_agenda.fk_id_agendamento
            INNER JOIN tb_usuarios
            ON tb_agendamentos.fk_id_usuario = tb_usuarios.id_usuario
            WHERE id_usuario = :iduser");
            $pgsql->bindValue(":iduser",$idUser);
            $pgsql->execute();
        }*/
        public function cancelarColeta($idUsuario,$numColeta){
        
            global $pdo;
            $pgsql = $pdo->prepare ("UPDATE tb_agendamentos SET statuscoleta = 'Cancelado' WHERE id_agendamento = :numerocoleta
            AND fk_id_usuario = :iduser AND statuscoleta = 'Em andamento' ");
            $pgsql->bindValue(":numerocoleta",$numColeta);
            $pgsql->bindValue(":iduser",$idUsuario);
            $pgsql->execute();
            if($pgsql->rowCount() == 0){
                echo "<script>alert('Verifique o numero da coleta');</script>";
            }
            else{
                return true;
            }
        }
        public function cancelarColetaEmpresa($numColeta){
        
            global $pdo;
            $pgsql = $pdo->prepare ("UPDATE tb_agendamentos SET statuscoleta = 'Cancelado' WHERE id_agendamento = :numerocoleta
            AND statuscoleta = 'Em andamento' ");
            $pgsql->bindValue(":numerocoleta",$numColeta);
            $pgsql->execute();
            if($pgsql->rowCount() == 0){
                echo "<script>alert('Verifique o numero da coleta');</script>";
            }
            else{
                return true;
            }
        }
        public function concluirColeta($numColeta){
        
            global $pdo;
            $pgsql = $pdo->prepare ("UPDATE tb_agendamentos SET statuscoleta = 'Concluído' WHERE id_agendamento = :numerocoleta
            AND statuscoleta = 'Em andamento' ");
            $pgsql->bindValue(":numerocoleta",$numColeta);
            $pgsql->execute();
            if($pgsql->rowCount() == 0){
                echo "<script>alert('Verifique o numero da coleta');</script>";
            }
            else{
                return true;
            }
        }
    }
?>