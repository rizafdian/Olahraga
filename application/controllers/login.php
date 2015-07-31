<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Login extends CI_Controller {
        function __construct() {
            parent::__construct();
        }
        function index() {
            if($this->session->userdata('username')) {
                redirect('c_atlit', 'refresh');
            }
            else {
                if($this->session->userdata('username_pelatih')) {
                redirect('c_pelatih', 'refresh');
                }
                 else {
                    if($this->session->userdata('username_admin')) {
                        redirect('c_admin', 'refresh');
                    }
                    /*else {
                        if($this->session->userdata('id_super')) {
                            redirect('crud_super', 'refresh');
                        }*/
                         else {
                            $this->load->helper(array('form'));
                            //$data                =       $this->model->GetSlide();
                            $this->load->view('index'); 
                        }  
                    //}  
                }   
            }
        }
    }
?>
                    