<?php 
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Echange_model extends CI_Model {  

        public function __construct()
        {
            parent::__construct();
            $this->load->model("echange_model", "model");
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

        public function getUserObjet($idUser)
        {
            $currentUser = array();
            $resultat = array();

            $objets = $this->model->getAllObjet();
            foreach ($objets as $objet) {
                $currentUser = $this->getCurrentProprietaire($objet['idObjet']);
                if ($currentUser == $idUser) {
                    $resultat[] = $objet;
                }
            }

            return $resultat;       
        } 


        public function getCurrentProprietaire($idObjet)
        {
            $sql = "SELECT * FROM Echange WHERE dateHeureAccepte is not null and (idObjetDemande = %d or idObjetEchange = %d) order by idEchange desc limit 1";
            $sql = sprintf($sql, $idObjet, $idObjet);
            $query=$this->db->query($sql);
            $resultat = $query->row_array();

            if ($resultat == null) {
                $objet = $this->model->getObjet($idObjet);
                return $objet['idUser'];
            }

            if ($idObjet == $resultat['idObjetDemande']) {
                return $resultat['idEnvoyeur'];
            }
            return $resultat['idRecepteur'];
        }

        public function getUser($idProprietaire)
        {
            $sql = "SELECT * from User WHERE idUser = %d";
            $sql = sprintf($sql, $idProprietaire);
            $query = $this->db->query($sql);

            return $query->row_array();
        }

        public function getOtherObjet($idUser){
            $userObjets = $this->model->getUserObjet($idUser);
            $allObjets = $this->model->getAllObjet();
            $resultat = array();

            foreach ($allObjets as $allObjet) {
                $test = true;
                foreach ($userObjets as $userObjet) {
                    if($userObjet['idObjet'] == $allObjet['idObjet']) {
                        $test = false;
                    }
                }
                if ($test == true) {
                    $resultat[] = $allObjet;
                }
            }

            return $resultat;
        } 

        public function getObjet($idObjet)
        {
            $sql = "SELECT * FROM Objet where idObjet=%d";
            $sql=sprintf($sql,$idObjet);
            $query = $this->db->query($sql);
            $resultat = $query->row_array();
            return $resultat;
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
            $sql=sprintf($sql, $idProposition);
            echo $sql;
            $this->db->query($sql);
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
