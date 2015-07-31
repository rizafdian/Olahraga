<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_pelatih extends CI_Controller {
	function __construct() {
            parent::__construct();
            $this->load->model( 'user' );
            $this->load->library( 'session' );
            $this->load->library( 'upload' );

            if ( !$this->session->userdata( 'username_pelatih' ) && !$this->session->userdata( 'pass_pelatih' ) ){
                $this->session->set_userdata( 'gaklogin' , 'gaklogin' );
                redirect( base_url().'index.php/login' );
            }
        }

	public function index(){
			$pelatih              = $this->session->userdata( 'username_pelatih' );
            $hasil['profile']     = $this->user->getProfilePelatih( $pelatih);
            $this->load->view('pelatih/profile_pelatih', $hasil);
            
	}

    public function profile(){
            $pelatih                      =       $this->session->userdata( 'username_pelatih' );
            $hasil['profile']           =       $this->user->getProfilePelatih( $pelatih );
            //$hasil['data']              =       $this->model->GetSlide();
            $this->load->view('pelatih/profile_pelatih', $hasil);
    }

	function logout() {
            $this->session->sess_destroy();
            redirect( base_url().'index.php/login' );
        }
        function upload(){
            $nama_gambar        =   '';

            if ( file_exists( './assets/profil/'.$_FILES['gambar']['name'] ) ){ $nama_gambar  =   $_FILES['gambar']['name'];  }
            else{
                $config['upload_path']              =       './assets/profil';
                $config['allowed_types']            =       'jpg|jpeg|png';
                $config['max_size']                 =       '512000';

                $this->upload->initialize( $config );
                $this->upload->do_upload( 'gambar' );
                $this->upload->data();
                $gambar                             =       $this->upload->data();
                $nama_gambar                        =       $gambar['file_name'];
            }

            $pelatih                                    =       $this->session->userdata( 'username_pelatih' );
            $update['gambar']                       =       $nama_gambar;
            $this->user->updateDataPelatih( $pelatih , $update );

            redirect( base_url().'index.php/c_pelatih/profile' );
    }
    public function ganti_foto(){
            $pelatih                      =       $this->session->userdata( 'username_pelatih' );
            $hasil['profile']           =       $this->user->getProfilePelatih( $pelatih );
            $this->load->view('pelatih/ganti_foto', $hasil);
    }
}