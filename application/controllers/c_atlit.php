<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_atlit extends CI_Controller {
	function __construct() {
            parent::__construct();
            $this->load->model( 'user' );
            $this->load->library( 'session' );
            $this->load->library( 'upload' );

            if ( !$this->session->userdata( 'nis' ) && !$this->session->userdata( 'pass' ) ){
                $this->session->set_userdata( 'gaklogin' , 'gaklogin' );
                redirect( base_url().'index.php/login' );
            }
        }

	public function index(){
			$atlit               = $this->session->userdata( 'username' );
            $hasil['profile']    = $this->user->getProfileAtlit( $atlit );
            //$hasil['data'] 				=		$this->model->GetSlide();
            $this->load->view('atlit/profile', $hasil);	
            
	}

    public function profile(){
            $atlit                      =       $this->session->userdata( 'username' );
            $hasil['profile']           =       $this->user->getProfileAtlit( $atlit );
            //$hasil['data']              =       $this->model->GetSlide();
            $this->load->view('atlit/profile', $hasil);
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

            $atlit                                    =       $this->session->userdata( 'username' );
            $update['gambar']                       =       $nama_gambar;
            $this->user->updateDataAtlit( $atlit , $update );

            redirect( base_url().'index.php/c_atlit/profile' );
    }
        public function ganti_foto(){
            $atlit                      =       $this->session->userdata( 'username' );
            $hasil['profile']           =       $this->user->getProfileAtlit( $atlit );
            $this->load->view('atlit/ganti_foto', $hasil);
    }
    public function edit_data(){
        $atlit                        =       $this->session->userdata( 'username' );
        $hasil['profile']           =       $this->user->getProfileAtlit( $atlit );
        $this->load->view('atlit/edit',$hasil);
    }
    public function do_update_atlit(){
        $username_atlit = $_POST['username_atlit'];
        $password_atlit = $_POST['password_atlit'];
        $data_update = array(
            'username_atlit' => $username_atlit,
            'password_atlit' => $password_atlit,
            );
        $where = array('username_atlit' => $username_atlit);
        $res = $this->model->UpdateData('atlit',$data_update,$where);
        if($res >= 1){
            redirect('c_atlit/profile');
        }
    }


}