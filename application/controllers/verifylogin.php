<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class VerifyLogin extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->library( 'session' );
            $this->load->model('user','',TRUE); //nantinya diteruskan di user.php pada folder models
        }
    function index() {
        //Aksi untuk melakukan validasi
        $this->load->library('form_validation');

        $nis        =   $this->input->post('username');
        $pass       =   $this->input->post('password');

        $authAtlit       =   $this->user->cekLoginAtlit( $nis , $pass );
        if ( $authAtlit ){
                foreach ( $authAtlit as $keyAuth ) {
                    $this->session->set_userdata( 'username' , $keyAuth->username_atlit );
                    $this->session->set_userdata( 'pass' , $keyAuth->password_atlit );
                    redirect( base_url().'index.php/c_atlit' );
                }
        }
        else{
            $authPelatih       =   $this->user->cekLoginPelatih( $nis , $pass );
            if ( $authPelatih ){
                    foreach ( $authPelatih as $keyPelatih ) {
                        $this->session->set_userdata( 'username_pelatih' , $keyPelatih->username_pelatih );
                        $this->session->set_userdata( 'pass_pelatih' , $keyPelatih->password_pelatih );
                        redirect( base_url().'index.php/c_pelatih' );
                    }
            }
            else{
                $authAdmin      =   $this->user->cekLoginAdmin( $nis , $pass );
                if ( $authAdmin ){
                        foreach ( $authAdmin as $keyAdmin ) {
                            $this->session->set_userdata( 'username_admin' , $keyAdmin->username_admin );
                            $this->session->set_userdata( 'pass_admin' , $keyAdmin->password_admin );
                            redirect( base_url().'index.php/c_admin' );       
                        }
                }
               /*else{
                    $authSuper      =   $this->user->cekLoginSuper( $nis , $pass );
                        if ( $authSuper ){
                            foreach ( $authSuper as $keySuper ) {
                                $this->session->set_userdata( 'id_super' , $keySuper->id_super );
                                $this->session->set_userdata( 'pass_super' , $keySuper->password_super );
                                redirect( base_url().'index.php/crud_super' );          
                            }
                        }*/
                        else{
                            $this->session->set_userdata( 'gagal' , 'gagal' );
                            redirect( base_url().'index.php/login' );
                        }
                    //}
                }
            }
        }

        // echo '<pre>';
        // print_r($auth);
        // echo '</pre>';

        // die();
    // }

    function cek_session(){
        echo '<pre>';
        print_r($this->session->all_userdata());
        echo '</pre>';
    }

    function logout(){
        $this->session->sess_destroy();
        redirect( base_url().'login' );
    }

    function check_database($password) {
        //validasi field terhadap database
        $nis = $this->input->post('username');
        //query ke database
        $result = $this->user->login($nis, $password);
    
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                $sess_array = array(
                'username' => $row->nis,
                'password' => $row->password
                );
            $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
       }
       else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
       }
    }
    }
    ?>