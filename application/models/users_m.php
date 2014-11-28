<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model {

    public function add_user($donnees)
    {
        $this->db->insert("user",$donnees);

    }

    public function verif_connexion($donnees)
    {
        $sql = "SELECT * from user WHERE mail=\"".$donnees['mail']."\"
        and mdp=\"".$donnees['mdp']."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()==1)
        {
            $row=$query->result_array();
            $donnees_resultat=$row[0];
            return $donnees_resultat;
        }
        else
            return false;
    }

    function EST_connecter()
    {
         return $this->session->userdata('mail') &&  $this->session->userdata('droit') ;
    }

    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect();exit;
    }
    public function test_email($email)
    {
        $sql = "SELECT mail  from user WHERE mail=\"".$email."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()>=1)
            return true;
        else
            return false;
    }

    function getAllUtilisateurs()
    {
        $sql = "SELECT * FROM user;";
        $query = $this->db->query($sql);
        return $query->result();
    }

    /*function getUnUtilisateur($id){

        $sql = "SELECT * FROM utilisateurs WHERE id = $id;";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    function insertUtilisateur($donnees){
        $this->db->insert("utilisateurs",$donnees);

    }

    function supprimerUtilisateur($idUtilisateur){
        $this->db->delete("utilisateurs",array('id'=>$idUtilisateur));

    }
    function modifierUtilisateur($id, $donnees) {
        $this->db->where("id", $id);
        $this->db->update("utilisateurs", $donnees);

    }

    function getDroitUtilisateurDropDown(){
        $this->db->from("droit");
        $this->db->order_by('id');
        $result=$this->db->get();
        $retour=array();
        if($result->num_rows()>0){
            $retour['']="selectionner ses droits :";
            foreach ($result->result_array() as $row){
                $retour[$row['id']]=$row['libelle'];
            }
        }
        return $retour;
    }
    */
}