<?php 
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Objets_model extends CI_Model { 
        
        public function insertNewObjet ($idCategorie,$idUser,$nom,$description)
        {
            $sql="insert into Objet values(null,%d,%d,'%s','%s')";
            $sql=sprintf($sql,$idCategorie,$idUser,$nom, $this->db->escape_str($description));
            try {
                $this->db->query($sql);
            } catch (Exception $e) {
               throw new Exception($e->getMessage());
            }
        }

        public function getObjet($idObjet)
        {
            $sql = "SELECT * FROM Objet  where idObjet=%d";
            $sql = sprintf($sql, $idObjet);

            $query = $this->db->query($sql);

            $objet = $query->row_array();

            return $objet;
        }
        
        public function getUserObjet($idUser){
            $sql = "SELECT * FROM Objet  where idUser='$idUser'";
            $query = $this->db->query($sql);
            
            $listes=array();

            if($query !== FALSE && $query->num_rows() > 0){
                foreach ($query->result_array() as $row) {
                    $listes[] = $row;
                }
            }

            return $listes;
        }

        public function updateObjet ($idObjet,$idCategorie,$idUser,$nom,$description)
        {
            $sql="update Objet set idCategorie=%d , idUser=%d ,nom='%s',description='%s' where idObjet=%d";
            $sql=sprintf($sql,$idCategorie,$idUser,$nom,$this->db->escape_str($description),$idObjet);
            try {
               $this->db->query($sql);
            } catch (Exception $th) {
                throw new Exception($th->getMessage());
            }
        }

        public function getUserOb($idObjet)
        { //dpcklc,
           $sql="select u.idUser,u.nom,u.prenom,u.mail,u.tel from Objet o join User u on o.idUser=u.idUser where  o.idObjet=%d";
           $sql=sprintf($sql,$idObjet);  
           $query=$this->db->query($sql);
           $liste=$query->row_array();
           return $liste;                                                                                       
        }

        public function supprimerObjet($idObjet)
        {
            try {
                $this->db->query("DELETE FROM Objet where idObjet='$idObjet'");
                $this->db->query("DELETE photo FROM photo where idObjet='$idObjet'");
                } catch (\Throwable $th) {
                    throw $th;
                }
        }      

    // Traitement Photo
    function getAllPhoto() {
        $sql = "select * from Photo order by id desc";
        $query = $this->db->query($sql);
        $photo = array();
        foreach ($query->result_array() as $row) {
            $photo[] = $row;
        }
        return $photo;
    }

    function insertNewPhoto($photoName, $idObjet) {
        // Inserer la nouvelle photo dans la base de donnees
        $sql = "insert into Photo values (null, %d, '%s')";
        $sql = sprintf($sql, $idObjet, $photoName);
        $this->db->query($sql);
    }

    function avoidDoublonFileName($fichier)
    {
        $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='Photo'";
        $query = $this->db->query($sql);

        $nextval = $query->row_object();

        $fichier = $nextval->Auto_increment.$fichier;
        return $fichier; 
    }

    function uploadPhoto($idObjet)
    {
        $this->load->model("mesObjets");

        $dossier = base_url("assets/images/objet");
        $fichier = basename($_FILES['nouveau']['name']);
        $taille_maxi = 10000000;
        $taille = filesize($_FILES['nouveau']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.webp');
        $extension = strrchr($_FILES['nouveau']['name'], '.');

        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) {
            $erreur = "Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc";
        }
        if($taille>$taille_maxi) {
            $erreur = "Le fichier est trop gros...";
        }

        if(!isset($erreur)) {   //S'il n'y a pas d'erreur, on upload
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

            $fichier = avoidDoublonFileName($fichier);      // Evite les photos de meme nom
            insertNewPhoto($fichier, $idObjet);    // Enregistre le nouveau photo dans la base 

            if(move_uploaded_file($_FILES['nouveau']['tmp_name'], $dossier . $fichier)) //Si
            {
                echo 'Upload effectué avec succès !';
            }
            else //Sinon (la fonction renvoie FALSE).
            {
                echo 'Echec de l\'upload !';
            }
        }
        else
        {
            throw new Exception($erreur, 1);
        }
    }
}
?>