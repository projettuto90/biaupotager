<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_m');
        //$this->user = ($this->sitemodel->is_logged()) ? $this->sitemodel->get_user($this->session->userdata('lastname')) : false;
    }
    public function index()
    {
        // A TESTER DANS TOUTES LES METHODES
        if($this->session->userdata('droit')!='administrateur'){
            redirect('users_c');
        }
        $this->load->view('v_head.php');
        $this->load->view('v_menu.php');
        $this->load->view('admin/admin_index.php');
        //$this->load->view('admin/v_foot.php');

    }
}