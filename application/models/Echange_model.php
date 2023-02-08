<?php 
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Echange_model extends CI_Model {  
        public function getUserObjet($idUser){
            $sql = "SELECT * FROM Objet  where idUser='$idUser'";
            $query = $this->db->query($sql);
            //echo $query;
            //$row = $query->row_object();
            $listes=array();
            $listes[]= $query->result_array();
            echo $sql;
            return $listes;       
        } 

        public function getAllObjet(){
            $sql = "SELECT * FROM Objet";
            $query=$this->db->query($sql);
            $liste=array();
           foreach($query->result_array() as $row){
             $liste[]=$row;
           }
            return $liste;       
        } 

        public function getOtherObjet($idUser){
            $sql = "SELECT * FROM Objet WHERE idUser != %d";
            $sql = sprintf($sql, $idUser);
            $query=$this->db->query($sql);
            $liste=array();
           foreach($query->result_array() as $row){
             $liste[]=$row;
           }
            return $liste;       
        } 

        public function getObjet($idObjet)
        {
            $sql = "SELECT * FROM Objet where idObjet=%d";
            $sql=sprintf($sql,$idObjet);
            $query = $this->db->query($sql);
            $liste=array();
            foreach($query->result_array() as $row){
                $liste[]=$row;
              }
            return $liste;
        }
        public function demanderEchange($idObjetDemande,$idObjetEchange,$idRecepteur,$idEnvoyeur)
        {
           $sql="insert into Echange values (null,%d,%d,1,now(),null,%d,%d)";
           $sql=sprintf($sql,$idObjetDemande,$idObjetEchange,$idRecepteur,$idEnvoyeur);
           try {
            $this->db->query($sql);
           } catch (Exception $th) {
            throw new Exception($th->getMessage());
           }
        }

        public function getPropositionRecu($idRecepteur)
        {
           $sql="select idObjetDemande,idObjetEchange,idEnvoyeur from Echange where idRecepteur=%d and dateHeureAccepte is null and EtatEchange = 1";
           $sql=sprintf($sql,$idRecepteur);
           $query = $this->db->query($sql);
           $liste=array();
           foreach($query->result_array() as $row){
            $liste[]=$row;
          }
          return $liste;
        }

        public function getPropositionEnvoyer($idEnvoyeur)
        {
           $sql="select idObjetDemande,idObjetEchange,idEnvoyeur from Echange where idEnvoyeur=%d and dateHeureAccepte is null and EtatEchange = 1";
           $sql=sprintf($sql,$idEnvoyeur);
           $query = $this->db->query($sql);
           $liste=array();
           foreach($query->result_array() as $row){
            $liste[]=$row;
          }
          return $liste;
        }


        public function accepterProposition($idProposition)
        {
            try {
            $sql="UPDATE echange SET dateHeureAccepte=NOW()  WHERE idEchange= %d";
            $sql=sprintf($sql,$this->db->escape($idProposition));
            $this->db->query($sql);
            echo $this->db->affected_rows();
            echo $sql;
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
       
                $sql="UPDATE echange SET dateHeureAccepte=NOW()  WHERE idEchange= %d";
                $sql=sprintf($sql,$this->db->escape($idProposition));
                $this->db->query($sql);
                echo $this->db->affected_rows();
                echo $sql;
           
                $sql1="select idObjetDemande,idObjetEchange,idRecepteur,idEnvoyeur from Echange where idEchange=%d";
                $sql1=sprintf($sql1,$idProposition);
                $query = $this->db->query($sql1);
                $liste=$query->result_array();
                echo $sql1;
               var_dump($liste);
//dfghj
                $sql2="UPDATE objet SET idUser=%d  WHERE idObjet= %d";
                $sql2=sprintf($sql2,$liste[0]['idEnvoyeur'],$liste[0]['idObjetDemande']);
                $this->db->query($sql2);
                echo $liste[0]['idObjetDemande'];
                echo $this->db->affected_rows();
                echo $sql2;

                
                $sql3="UPDATE objet SET idUser=%d  WHERE idObjet= %d";
                $sql3=sprintf($sql3,$liste[0]['idRecepteur'],$liste[0]['idObjetEchange']);
                $this->db->query($sql3);
                echo $this->db->affected_rows();
                echo $sql3;
                }

                 catch (Exception $e) {
                    throw new Exception($e->getMessage());
                   }
                }
                

        
        public function refuserProposition($idProposition)
        {
            try {
                $sql="UPDATE echange SET EtatEchange=0  WHERE idEchange= %d";
                $sql=sprintf($sql,$this->db->escape($idProposition));
                $this->db->query($sql);
                echo $this->db->affected_rows();
                echo $sql;
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                   }
                   
        }
    }
?>
