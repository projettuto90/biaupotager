<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produit_c extends CI_Controller{


    public function index()
    {
        $donnees['titre']="connexion";
        $this->load->view('v_head');
        $this->load->view('users_index',$donnees);
        $this->load->view('v_foot');
    }

    public function afficheProduit(){
        $crud = new grocery_CRUD();

        $crud->set_theme('flexigrid');
        $crud->set_table('produit');
        $crud->set_subject('Produits');
        $crud->required_fields('id_Type_Produit','prix','libelle','poids_piece','disponibilite');
        $crud->display_as('id_Type_Produit','Type du produit');
        $crud->display_as('poids_piece','Poids ou Piece');

        $crud->field_type('id_Type_Produit','dropdown',
            array('1' => 'Legumes', '2' => 'Fruits','3' => 'Epices' , '4' => 'Herbes'));

        $crud->field_type('poids_piece','set',
            array('poids', 'piece'));

        $crud->set_field_upload('file_url','assets/uploads/files');
        $output = $crud->render();
        $this->_example_output($output);
    }


    public function _example_output($output = null)
    {

        $this->load->view('v_head');
        $this->load->view('v_menu');
        $this->load->view('v_gestion_produits',$output);
        $this->load->view('v_foot');
    }


}
       