<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Utilisateur_c extends CI_Controller {

	public function index()
	{
		$this->load->view('v_head');
		$this->load->view('v_menu');
		$this->load->view('v_foot');
	}


    public function employees_management()
    {
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('employees');
        $crud->set_relation('officeCode','offices','city');
        $crud->display_as('officeCode','Office City');
        $crud->set_subject('Employee');

        $crud->required_fields('lastName');

        $crud->set_field_upload('file_url','assets/uploads/files');

        $output = $crud->render();

        $this->_example_output($output);
    }



	public function afficherUtilisateur(){

        if($this->session->userdata('droit')!=1){
            redirect('users_c');
        }

		$this->load->view('v_head');
		$this->load->view('v_menu');
        $donnees['utilisateurs']=$this->utilisateur_m->getAllUtilisateurs();
		$this->load->view('admin/v_table_utilisateur',$donnees);
		$this->load->view('v_foot');
	}

	public function formCreerUtilisateur(){

        if($this->session->userdata('droit')!=1){
            redirect('users_c');
        }

        $_POST['utilisateur_login']='';
        $_POST['utilisateur_email']='';
        $_POST['utilisateur_droit']='';
        $_POST['utilisateur_valide']='';
        $_POST['utilisateur_mdp']='';

		$this->load->view('v_head');
		$this->load->view('v_menu');
        $donnees['droit']=$this->utilisateur_m->getDroitUtilisateurDropDown();
		$this->load->view('admin/v_form_ajout_utilisateur',$donnees);
		$this->load->view('v_foot');
	}

	public function valideCreerUtilisateur()
	{
        if($this->session->userdata('droit')!=1){
            redirect('users_c');
        }
        $this->form_validation->set_rules('utilisateur_login', 'login', 'required|min_length[5]');
        $this->form_validation->set_rules('utilisateur_mdp', 'mot de passe', 'required|min_length[5]');
        $this->form_validation->set_rules('utilisateur_email', 'email', 'required|valid_email|is_unique[utilisateurs.email]');
        $this->form_validation->set_rules('utilisateur_droit', 'droit', 'required');
        $this->form_validation->set_rules('utilisateur_valide', 'validite', 'required');
		$donnees['login']=$_POST['utilisateur_login'];
		$donnees['email']=$_POST['utilisateur_email'];
        $donnees['droit']=$_POST['utilisateur_droit'];
        $donnees['valide']=$_POST['utilisateur_valide'];
        $donnees['motdepasse']=$_POST['utilisateur_mdp'];


    //    $donnees['droit_selected']=$_POST['utilisateur_droit'];
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('v_head');
			$this->load->view('v_menu');
            $donnees['droit']=$this->utilisateur_m->getDroitUtilisateurDropDown();
            $this->load->view('admin/v_form_ajout_utilisateur',$donnees);
			$this->load->view('v_foot');
		}
		else
		{		
			$this->utilisateur_m->insertUtilisateur($donnees);
			redirect('utilisateur_c/afficherUtilisateur');
		}
		
	}
	public function supprimerUtilisateur($idUtilisateur){
        if($this->session->userdata('droit')!=1){
            redirect('users_c');
        }

		$this->utilisateur_m->supprimerUtilisateur($idUtilisateur);
		redirect('utilisateur_c/afficherUtilisateur');
	}

	public function formModifierUtilisateur($id){

        if($this->session->userdata('droit')!=1){
            redirect('users_c');
        }

		$this->load->view('v_head');
		$this->load->view('v_menu');
		$donnees=$this->utilisateur_m->getUnUtilisateur($id);
		$this->load->view('admin/v_form_modifier_utilisateur',$donnees);
		$this->load->view('v_foot');
	}

	public function valideModifierUtilisateur(){

        if($this->session->userdata('droit')!=1){
            redirect('users_c');
        }

		$this->form_validation->set_rules('utilisateur_login', 'login', 'required|min_length[5]');
		$this->form_validation->set_rules('utilisateur_email', 'Email', 'required|valid_email');
		$donnees['id']=$_POST['utilisateur_id'];
		$donnees['login']=$_POST['utilisateur_login'];
		$donnees['email']=$_POST['utilisateur_email'];
		$donnees['droit']=$_POST['utilisateur_droit'];
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('v_head');
			$this->load->view('v_menu');
			$this->load->view('admin/v_form_modifier_utilisateur',$donnees);
			$this->load->view('v_foot');
		}
		else
		{		
			$this->utilisateur_m->modifierUtilisateur($donnees['id'],$donnees);
			redirect('utilisateur_c/afficherUtilisateur');
		}

	}
}
