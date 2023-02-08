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

        public function preparePropositionDisplay($listes)
        {
            $this->load->model("objets_model","model");

            $resultat = array();
            for ($i=0; $i < count($listes); $i++) { 
                $resultat[$i]['objetDemande'] = $this->model->getObjet($listes[$i]['idObjetDemande']);
                $resultat[$i]['objetEchange'] = $this->model->getObjet($listes[$i]['idObjetEchange']);
                $resultat[$i]['idEchange'] = $listes[$i]['idEchange'];
            }
            return $resultat;
        }

        public function getPropositionRecu($idRecepteur)
        {
            $this->load->model("Echange_model", "model");
            $sql="select idEchange, idObjetDemande,idObjetEchange,idEnvoyeur from Echange where idRecepteur=%d and dateHeureAccepte is null and EtatEchange = 1";
            $sql=sprintf($sql,$idRecepteur);
            $query = $this->db->query($sql);
            $listes=array();
            foreach($query->result_array() as $row){
                $listes[]=$row;
            }
            $listes = $this->model->preparePropositionDisplay($listes);
            return $listes;
        }

        public function getPropositionEnvoyer($idEnvoyeur)
        {
            $sql="select idEchange, idObjetDemande,idObjetEchange,idEnvoyeur from Echange where idEnvoyeur=%d and dateHeureAccepte is null and EtatEchange = 1";
            $sql=sprintf($sql,$idEnvoyeur);
            $query = $this->db->query($sql);
            $liste=array();
            foreach($query->result_array() as $row){
                $liste[]=$row;
            }
            $liste = $this->model->preparePropositionDisplay($liste);
          return $liste;
        }


        public function accepterProposition($idProposition)
        {   
            // Transaction d'acceptation
            $sql="UPDATE Echange SET dateHeureAccepte=NOW()  WHERE idEchange= %d";
            $sql=sprintf($sql,$this->db->escape($idProposition));
            $this->db->query($sql);
        
            $sql1="select idObjetDemande,idObjetEchange,idRecepteur,idEnvoyeur from Echange where idEchange=%d";
            $sql1=sprintf($sql1,$idProposition);
            $query = $this->db->query($sql1);
            $liste=$query->result_array();

            $sql2="UPDATE Objet SET idUser=%d  WHERE idObjet= %d";
            $sql2=sprintf($sql2,$liste[0]['idEnvoyeur'],$liste[0]['idObjetDemande']);
            $this->db->query($sql2);

            
            $sql3="UPDATE Objet SET idUser=%d  WHERE idObjet= %d";
            $sql3=sprintf($sql3,$liste[0]['idRecepteur'],$liste[0]['idObjetEchange']);
            $this->db->query($sql3);
        }
                

        
        public function refuserProposition($idProposition)
        {
            try {
                $sql="UPDATE Echange SET EtatEchange=0  WHERE idEchange= %d";
                $sql=sprintf($sql, $idProposition);
                $this->db->query($sql);
                echo $this->db->affected_rows();
                echo $sql;
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
                   
        }
    }
?>
