<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_m');
    }
    public function index()
    {
        $donnees['titre']="connexion";
        $this->load->view('v_head');
        $this->load->view('users_index',$donnees);
        $this->load->view('v_foot');
    }

    public function afficheUtilisateur()
    {
        $crud = new grocery_CRUD();

        $crud->set_theme('flexigrid');
        $crud->set_table('user');
        $crud->set_subject('Utilisateurs');
        $crud->required_fields('nom','prenom','num_Tel','adresse','mail','mdp','droit');
        $crud->display_as('num_Tel','Telephone');
        $crud->display_as('mdp','Mot de passe');

        // A MODIFIER -----------------------------
        $crud->field_type('status','true_false',
            array('administrateur', 'client'));
        // -------------------------------------------
        $crud->set_field_upload('file_url','assets/uploads/files');
        $output = $crud->render();
        $this->_example_output($output);
    }


    public function _example_output($output = null){
        $this->load->view('v_menu');
        $this->load->view('v_gestion_utilisateurs',$output);
    }




    public function inscription()
    {
        $this->form_validation->set_rules('nom','nom','trim|required');
        $this->form_validation->set_rules('prenom','prenom','trim|required');
        $this->form_validation->set_rules('numTel','numero de telephone','trim|required');
        $this->form_validation->set_rules('codePostal','code postal','trim|required');
        $this->form_validation->set_rules('ville','ville','trim|required');
        $this->form_validation->set_rules('rue','rue','trim|required');
        $this->form_validation->set_rules('mail','mail','trim|required|valid_email|is_unique[user.mail]');
        $this->form_validation->set_rules('pass','Mot de passe','trim|required|matches[pass2]');
        $this->form_validation->set_rules('pass2','Confirmation du mot de passe','trim|required');
                // rappeler la vue à la fin de la méthode
        if($this->form_validation->run()){

                    $code=$this->input->post('codePostal');
                    $ville=$this->input->post('ville');
                    $rue=$this->input->post('rue');
                    $adresse=$code.' '.$ville.' '.$rue;


                    $donnees= array(
                        'nom'=>$this->input->post('nom'),
                        'prenom'=>$this->input->post('prenom'),
                        'num_Tel'=>$this->input->post('numTel'),
                        'adresse'=>$adresse,
                        'mail'=>$this->input->post('mail'),
                        'mdp'=>$this->input->post('pass'),
                        'droit'=>'client',
                    );
                    $this->users_m->add_user($donnees);
                    // fin d'ajout et redirection
                    redirect(base_url());

        }
        $donnees['titre']="inscription";
        $this->load->view('users_inscription',$donnees);
    }

    public function aff_connexion()
    {
        if ($this->users_m->EST_connecter()){
            redirect('users_c/aff_deconnexion');
        }

        $this->form_validation->set_rules('mail','e-mail','trim|required');
        $this->form_validation->set_rules('mdp','Mot de passe','trim|required');

        /* rappeler la vue à la fin de la méthode */
        if($this->form_validation->run()){
            $donnees= array(
                'mail'=>$this->input->post('mail'),
                'mdp'=>$this->input->post('mdp')
            );
            $donnees_session=$this->users_m->verif_connexion($donnees);

            if(isset($donnees_session)){
                $this->session->set_userdata($donnees_session);
                redirect('users_c/aff_connexion');
            }
            else{
                $donnees['erreur']="mot de passe ou email incorrect";
                $donnees['titre']="connexion";
            }
        }
        $donnees['titre']="connexion";
        // fin d'ajout et redirection
        $this->load->view('users_index',$donnees);
    }

    public function aff_deconnexion(){
        if( $this->session->userdata('droit')=='administrateur'){
            redirect('admin_c');
        }
        if( $this->session->userdata('droit')=='client'){
            redirect('client_c');
        }
        $donnees['titre']="deconnexion";
        $this->load->view('usersss_index',$donnees);
    }
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('users_c');
        exit;
    }


    public function afficherUtilisateur(){

        if($this->session->userdata('droit')!='administrateur'){
            redirect('users_c');
        }

        $this->load->view('v_head');
        //$this->load->view('v_menu');
        $donnees['user']=$this->users_m->getAllUtilisateurs();
        $this->load->view('v_head');
        $this->load->view('v_menu');
        $this->load->view('admin/v_table_utilisateur',$donnees);
        //$this->load->view('v_foot');
    }

    public function creerUtilisateur()
    {
        $this->form_validation->set_rules('nom','nom','trim|required');
        $this->form_validation->set_rules('prenom','prenom','trim|required');
        $this->form_validation->set_rules('numTel','numero de telephone','trim|required');
        $this->form_validation->set_rules('codePostal','code postal','trim|required');
        $this->form_validation->set_rules('ville','ville','trim|required');
        $this->form_validation->set_rules('rue','rue','trim|required');
        $this->form_validation->set_rules('mail','mail','trim|required|valid_email|is_unique[user.mail]');
        $this->form_validation->set_rules('pass','Mot de passe','required');
        $this->form_validation->set_rules('droit','droit','trim|required');

        // rappeler la vue à la fin de la méthode
        if($this->form_validation->run()){

            //Initialisation de l'adresse
            $code=$this->input->post('codePostal');
            $ville=$this->input->post('ville');
            $rue=$this->input->post('rue');
            $adresse=$code.' '.$ville.' '.$rue;


            $donnees= array(
                'nom'=>$this->input->post('nom'),
                'prenom'=>$this->input->post('prenom'),
                'num_Tel'=>$this->input->post('numTel'),
                'adresse'=>$adresse,
                'mail'=>$this->input->post('mail'),
                'mdp'=>$this->input->post('pass'),
                'droit'=>$this->input->post('droit'),
            );
            $this->users_m->add_user($donnees);
            // fin d'ajout et redirection
            redirect('users_c/afficherUtilisateur');

        }
        $donnees['titre']="";
        $this->load->view('v_head');
        $this->load->view('v_menu');
        $this->load->view('users_form_ajout',$donnees);
    }
}