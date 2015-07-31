<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_guru extends CI_Controller {
	function __construct() {
            parent::__construct();
            $this->load->model( 'user' );
            $this->load->library( 'session' );
            $this->load->library( 'upload' );

            if ( !$this->session->userdata( 'id_guru' ) && !$this->session->userdata( 'password_guru' ) ){
                $this->session->set_userdata( 'gaklogin' , 'gaklogin' );
                redirect( base_url().'index.php/login' );
            }
        }

	public function index(){
			$id_guru                    =       $this->session->userdata( 'id_guru' );
            $hasil['profile']           =       $this->user->getProfileGuru( $id_guru );
            $this->load->view('guru/index', $hasil);
            
	}

	function logout() {
            $this->session->sess_destroy();
            redirect( base_url().'index.php/login' );
        }
	
	
		
	
	public function do_update(){
		$id_guru = $_POST['id_guru'];
		$password_guru = $_POST['password_guru'];
		$nama_guru = $_POST['nama_guru'];
		$kelamin = $_POST['kelamin'];
		$hp_guru = $_POST['hp_guru'];
		$alamat_guru = $_POST['alamat_guru'];
		$email_guru = $_POST['email_guru'];
		$bidang = $_POST['bidang'];
		$agama = $_POST['agama'];
		$data_update = array(
			'password_guru' => $password_guru,
			'nama_guru' => $nama_guru,
			'kelamin' => $kelamin,
			'hp_guru' => $hp_guru,
			'alamat_guru' => $alamat_guru,
			'email_guru' => $email_guru,
			'bidang' => $bidang,
			'agama' => $agama,
			);
		$where = array('id_guru' => $id_guru);
		$res = $this->model->UpdateGuru('guru',$data_update,$where);
		if ($res >= 1) {
			redirect ('crud_guru/profile');
		}
	}
	
	public function delete($id_guru){
		$where = array('id_guru' => $id_guru);
		$res = $this->model->DeleteData('guru',$where);
		if ($res >= 1){
			redirect ('crud_guru/index');
		}
	}

	public function profile(){
			$id_guru                    =       $this->session->userdata( 'id_guru' );
            $hasil['profile']           =       $this->user->getProfileGuru( $id_guru );
            $this->load->view('guru/profile_guru', $hasil);
	}

	public function jadwal()
	{
		$data = $this->model->GetJadwal_x_tkj();
		$this->load->view('guru/jadwal',array('data' => $data));
	}
	public function edit_data_guru()
	{
			$id_guru                =       $this->session->userdata( 'id_guru' );
            $hasil['profile']       =       $this->user->getProfileGuru( $id_guru );
            $this->load->view('guru/edit', $hasil);
	}

	public function galery()
		{
			$id_guru                    =       $this->session->userdata( 'id_guru' );
            $hasil['profile']           =       $this->user->getProfileGuru( $id_guru );
			$this->load->view('guru/Galery',$hasil);
		}

	public function contact(){
		$data = $this->model->GetAdmin();
		$this->load->view('guru/contact',array('data' => $data));
	}

	public function ganti_foto(){
			$id_guru                    =       $this->session->userdata( 'id_guru' );
            $hasil['profile']           =       $this->user->getProfileGuru( $id_guru );
            $this->load->view('guru/ganti_foto', $hasil);
	}
	function upload_foto(){
            $nama_gambar        =   '';

            if ( file_exists( './asset/profil/'.$_FILES['gambar']['name'] ) ){ $nama_gambar  =   $_FILES['gambar']['name'];  }
            else{
                $config['upload_path']              =       './asset/profil';
                $config['allowed_types']            =       'jpg|jpeg|png';
                $config['max_size']                 =       '512000';

                $this->upload->initialize( $config );
                $this->upload->do_upload( 'gambar' );
                $this->upload->guru();
                $gambar                             =       $this->upload->guru();
                $nama_gambar                        =       $gambar['file_name'];
            }

            $id_guru                                =       $this->session->userdata( 'id_guru' );
            $update['gambar']                       =       $nama_gambar;
            $this->user->updateDataGuru( $id_guru , $update );

            redirect( base_url().'index.php/crud_guru/profile' );
        }

    function upload_tugas(){
    	$id_guru                    =       $this->session->userdata( 'id_guru' );
        $hasil['profile']           =       $this->user->getProfileGuru( $id_guru );
    	$this->load->view('guru/upload_tugas',$hasil);

    }
}
