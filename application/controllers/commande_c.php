<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commande_c extends CI_Controller {
    public function __construct() {
        parent ::__construct();
        $this->load->model('commande_m');
    }

    public function afficherCommande() {
        $this->load->view('v_head');
        $this->load->view('v_menu');
        $id=$this->session->userdata('id_User');
        $donnees['commande']=$this->commande_m->getCommandes($id);
        $this->load->view('clients/v_table_commande',$donnees);
        $this->load->view('v_foot');
    }

    public function afficherProduits($id) {
        $this->load->view('v_head');
        $this->load->view('v_menu');
        $donnees['produits']=$this->commande_m->getProduits($id);
        $this->load->view('clients/v_table_produits',$donnees);
        $this->load->view('v_foot');
    }

    public function Commander(){
        $this->load->view('v_head');
        $this->load->view('v_menu');
        $donnees['articles']=$this->commande_m->getAllArticles();
        $donnees['libelle']=$this->commande_m->getSecteur();
        $this->load->view('clients/v_commander',$donnees);
        $this->load->view('v_foot');
    }

    public function ValiderCommande(){
        $this->load->view('v_head');
        $this->load->view('v_menu'); 

        $dispo=$this->commande_m->getProdDispo();
                             
        $id=$this->session->userdata('id_User');
       $secteur=$_GET['secteur'];
        if ($secteur==null)
        {
            $this->load->view('v_head');
        $this->load->view('v_menu');
        $donnees['articles']=$this->commande_m->getAllArticles();
        $donnees['libelle']=$this->commande_m->getSecteur();
        $this->load->view('clients/v_commander',$donnees);
        $this->load->view('v_foot');
        }
else{
     $secteur=$_GET['secteur'];
       $this->commande_m->InsertCommande($id,$secteur);

        $nb=$this->commande_m->NombreCommande();
        foreach ($nb as $p){
            $nbtot= $p->nbtotal;
        }
        foreach ($dispo as $dispo1){
     
            $nbprod= $dispo1->id_Produit;
           // echo $nbprod;
            if($nbprod=='1'){
                 $qte2= $_GET["1qte"];
            }
            if($nbprod=='2'){
                 $qte2= $_GET["2qte"];
            }
            if($nbprod=='3'){
                 $qte2= $_GET["3qte"];
            }
            if($nbprod=='4'){
                 $qte2= $_GET["4qte"];
            }
            if($nbprod=='5'){
                 $qte2= $_GET["5qte"];
            }
            if($nbprod=='6'){
                 $qte2= $_GET["6qte"];
            }
            if($nbprod=='7'){
                 $qte2= $_GET["7qte"];
            }
            if($nbprod=='8'){
                 $qte2= $_GET["8qte"];
            }
            if($nbprod=='9'){
                 $qte2= $_GET["9qte"];
            }
            if($nbprod=='10'){
                 $qte2= $_GET["10qte"];
            }
            if($qte2!=0){
                $this->commande_m->insertLigneCommande($nbtot,$qte2,$nbprod);
            }
             
      
        }
         
          $donnees['commande']=$this->commande_m->getCommandes($id);
        $this->load->view('clients/v_table_commande',$donnees);
        $this->load->view('v_foot');
}
       

    }
}
