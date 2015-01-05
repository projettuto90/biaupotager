<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commande_m extends CI_Model {

     public function InsertLigneCommande($donnees,$qte,$prod){
        $data = array(
               'id_Commmande' => $donnees,
               'id_Produit' => $prod,
               'qte_Commandee' => $qte     
            );
       $this->db->insert("ligneCommande",$data);
      
        
    }

    public function InsertCommande($user,$secteur){
        $data = array(
               'etat' =>'En cours',
                'date_Commande'=>date("Y-m-d H:i:s"),
                'id_User'=> $user,
                'id_Secteur'=>$secteur
                         
            );
       $this->db->insert("commandes",$data);

    }

    public function NombreCommande(){
        $sql="select count(*) as nbtotal from commandes;";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getCommandes($id) {
        $sql = "SELECT C.id_Commande, C.etat, C.date_Commande, C.date_Livraison, S.lieu FROM commandes C JOIN secteur S ON C.id_Secteur=S.id_Secteur WHERE C.id_User=$id;";
        $query = $this->db->query($sql);
        return $query->result();
    }
	public function getProduits($id) {
        $sql = "SELECT L.id_ligne_Commande, L.qte_Commandee, P.libelle, P.poids_piece, T.libelle AS type FROM ligneCommande L JOIN produit P ON P.id_Produit=L.id_Produit JOIN 
        type T ON T.id_Type_Produit = P.id_Type_Produit WHERE L.id_Commmande=$id;";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getAllArticles() {
        $sql = "SELECT P.id_Produit, P.id_Type_Produit, P.prix, P.libelle AS lib_produit, T.libelle AS lib_type, P.poids_piece, P.disponibilite FROM produit P JOIN 
        type T ON T.id_Type_Produit = P.id_Type_Produit ORDER BY P.id_Produit;";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getProdDispo(){
        $sql = "SELECT id_Produit from produit where disponibilite='1';";
        $query = $this->db->query($sql);
        return $query->result();
    }
       function getSecteur(){

        $this->db->from("secteur")->order_by("id_Secteur");
        $result=$this->db->get();
        $retour=array();
        if($result->num_rows()>0)
        {
            $retour['']="selectionner un champ";
            foreach ($result->result_array() as $row) {
                $retour[$row['id_Secteur']]=$row['lieu'];
            }
        }
        return $retour;
    }
    
}
