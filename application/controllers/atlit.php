<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atlit extends CI_Controller {
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
			$nis                      	=       $this->session->userdata( 'username' );
            $hasil['profile']           =       $this->user->getProfileData( $nis );
            //$hasil['data'] 				=		$this->model->GetSlide();
            $this->load->view('atlit/page_atlit', $hasil);	
            
	}

	function upload(){
            $nama_gambar        =   '';

            if ( file_exists( './asset/profil/'.$_FILES['gambar']['name'] ) ){ $nama_gambar  =   $_FILES['gambar']['name'];  }
            else{
                $config['upload_path']              =       './asset/profil';
                $config['allowed_types']            =       'jpg|jpeg|png';
                $config['max_size']                 =       '512000';

                $this->upload->initialize( $config );
                $this->upload->do_upload( 'gambar' );
                $this->upload->data();
                $gambar                             =       $this->upload->data();
                $nama_gambar                        =       $gambar['file_name'];
            }

            $nis                                    =       $this->session->userdata( 'nis' );
            $update['gambar']                       =       $nama_gambar;
            $this->user->updateDataUser( $nis , $update );

            redirect( base_url().'index.php/atlit/profile' );
    }


	function upload_berkas(){
            $nama_gambar        =   '';
            
            if ( file_exists( './asset/berkas/'.$_FILES['berkas']['name'] ) ){ $nama_gambar  =   $_FILES['berkas']['name'];  }
            else{
                $config['upload_path']              =       './asset/berkas/';
                $config['allowed_types']            =       '*';
                $config['max_size']                 =       '5000000';

                $this->upload->initialize( $config );
                $this->upload->do_upload( 'berkas' );
                $this->upload->data();
                $gambar 							=		$this->upload->data();
                $nama_gambar						=		$gambar['file_name'];
            }

            $nis                                    =       $this->session->userdata( 'nis' );
            $update['tugas1']                       =       $nama_gambar;
            $this->user->updateDataTugas( $nis , $update );

            redirect( base_url().'index.php/crud' );
    }

    function upload_berkas1(){
            $nama_gambar        =   '';
            
            if ( file_exists( './asset/berkas/'.$_FILES['berkas']['name'] ) ){ $nama_gambar  =   $_FILES['berkas']['name'];  }
            else{
                $config['upload_path']              =       './asset/berkas/';
                $config['allowed_types']            =       '*';
                $config['max_size']                 =       '5000000';

                $this->upload->initialize( $config );
                $this->upload->do_upload( 'berkas' );
                $this->upload->data();
                $gambar 							=		$this->upload->data();
                $nama_gambar						=		$gambar['file_name'];
            }

            $nis                                    =       $this->session->userdata( 'nis' );
            $update['tugas2']                       =       $nama_gambar;
            $this->user->updateDataTugas( $nis , $update );

            redirect( base_url().'index.php/crud' );
    }

    function upload_berkas2(){
            $nama_gambar        =   '';
            
            if ( file_exists( './asset/berkas/'.$_FILES['berkas']['name'] ) ){ $nama_gambar  =   $_FILES['berkas']['name'];  }
            else{
                $config['upload_path']              =       './asset/berkas/';
                $config['allowed_types']            =       '*';
                $config['max_size']                 =       '5000000';

                $this->upload->initialize( $config );
                $this->upload->do_upload( 'berkas' );
                $this->upload->data();
                $gambar 							=		$this->upload->data();
                $nama_gambar						=		$gambar['file_name'];
            }

            $nis                                    =       $this->session->userdata( 'username' );
            $update['tugas3']                       =       $nama_gambar;
            $this->user->updateDataTugas( $nis , $update );

            redirect( base_url().'index.php/atlit' );
    }


    
        function logout() {
            $this->session->sess_destroy();
            redirect( base_url().'index.php/login' );
        }
	
	
	public function do_insert_atlit(){
		$id_atlit 	= $_POST['id_atlit'];
		$nm_atlit 	= $_POST['nm_atlit'];
		$tmpt_lahir = $_POST['tmpt-lahir'];
		$tgl_lahir 	= $_POST['tgl_lahir'];
		$alamat 	= $_POST['alamat'];
		$kabupaten 	= $_POST['kabupaten'];
		$propinsi 	= $_POST['propinsi'];
		$pekerjaan 	= $_POST['pekerjaan'];
        $kontak     = $_POST['kontak'];
        $kejuaraan_ygdiikuti  = $_POST['kejuaraan_ygdiikuti'];
        $hasil_kejuaraan  = $_POST['hasil_kejuaraan'];
        $kekuatan  = $_POST['kekuatan'];
        $kelenturan  = $_POST['kelenturan'];
        $kecepatan  = $_POST['kecepatan'];
        $reasksi  = $_POST['reaksi'];
        $power  = $_POST['power'];
        $dayatahanotot  = $_POST['dayatahanotot'];
        $v02max  = $_POST['v02max'];
        $kelincahan  = $_POST['kelincahan'];
        $teknik  = $_POST['teknik'];
        $kesehatan  = $_POST['kesehatan'];
        $psikologi  = $_POST['psikologi'];
        $username_atlit  = $_POST['username_atlit'];
        $password_atlit  = $_POST['password_atlit'];
		
		$data_insert = array(
			'id_atlit' 		=> $id_atlit,
			'nm_atlit' 	=> $nm_atlit,
			'tmpt_lahir' 		=> $tmpt_lahir,
			'tgl_lahir' 	=> $tgl_lahir,
			'alamat' 	=> $alamat,
			'kabupaten' 	=> $kabupaten,
			'propinsi' 	=> $propinsi,
			'pekerjaan' => $pekerjaan,
            'kontak' => $kontak,
            'kejuaraan_ygdiikuti' => $kejuaraan_ygdiikuti,
            'hasil_kejuaraan' => $hasil_kejuaraan,
            'kekuatan' => $kekuatan,
            'kelenturan' => $kelenturan,
            'kecepatan' => $kecepatan,
            'reaksi' => $reaksi,
            'power' => $power,
            'dayatahanotot' => $dayatahanotot,
            'v02max' => $v02max,
            'kelincahan' => $kelincahan,
            'teknik' => $teknik,
            'kesehatan' => $kesehatan,
            'psikologi' => $psikologi,
            'username_atlit' => $username_atlit,
            'password_atlit' => $password_atlit,
			
			);
		$res = $this->model->InsertData('atlit',$data_insert);
		if($res >= 1){
			redirect('index.php/atlit/index');
		}else{
			echo "INSERT DATA GAGAL";
		}
	}

	public function edit_data_atlit(){
		$nis                        =       $this->session->userdata( 'username' );
        $hasil['profile']           =       $this->user->getProfileData( $nis );
		$this->load->view('fatlit/edit',$hasil);
	}
	
	public function do_update_atlit(){
		$id_atlit = $_POST['id_atlit'];
		$nm_atlit = $_POST['nm_atlit'];
		$tmpt_lahir = $_POST['tmpt_lahir'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$alamat = $_POST['alamat'];
		$kabupaten = $_POST['kabupaten'];
		$propinsi = $_POST['propinsi'];
        $pekerjaan = $_POST['pekerjaan'];
        $kontak = $_POST['kontak'];
        $kejuaraan_ygdiikuti = $_POST['kejuaraan_ygdiikuti'];
        $hasil_kejuaraan = $_POST['hasil_kejuaraan'];
        $kekuatan = $_POST['kekuatan'];
        $kelenturan = $_POST['kelenturan'];
        $kecepatan = $_POST['kecepatan'];
        $reaksi = $_POST['reaksi'];
        $power = $_POST['power'];
        $dayatahanotot = $_POST['dayatahanotot'];
        $v02max = $_POST['v02max'];
        $kelincahan = $_POST['kelincahan'];
        $teknik = $_POST['teknik'];
        $kesehatan = $_POST['kesehatan'];
        $psikologi = $_POST['psikologi'];
        $username_atlit = $_POST['username_atlit'];
        $password_atlit = $_POST['password_atlit'];
		$data_update = array(
			'id_atlit' => $id_atlit,
			'nm_atlit' => $nm_atlit,
			'tmpt_lahir' => $tmpt_lahir,
			'Alamat' => $alamat,
			'kabupaten' => $kabupaten,
            'propinsi' => $propinsi,
            'pekerjaan' => $pekerjaan,
            'kontak' => $kontak,
            'kejuaraan_ygdiikuti' => $kejuaraan_ygdiikuti,
            'hasil_kejuaraan' => $hasil_kejuaraan,
            'kekuatan' => $kekuatan,
            'kelenturan' => $kelenturan,
            'kecepatan' => $kecepatan,
            'reaksi' => $reaksi,
            'power' => $power,
            'dayatahanotot' => $dayatahanotot,
            'v02max' => $v02max,
            'kelincahan' => $kelincahan,
            'teknik' => $teknik,
            'kesehatan' => $kesehatan,
            'psikologi' => $psikologi,
            'username_atlit' => $username_atlit,
            'password_atlit' => $password_atlit,
			);
		$where = array('id_atlit' => $nis);
		$res = $this->model->UpdateData('atlit',$data_update,$where);
		if($res >= 1){
			redirect('atlit/profile');
		}
	}


	public function contact(){
            $hasil['data']              =       $this->model->GetSlide();
			$data = $this->model->GetAdmin();
			$this->load->view('siswa/contact',array('data' => $data));
	}

	public function profile(){
			$nis                        =       $this->session->userdata( 'username' );
            $hasil['profile']           =       $this->user->getProfileData( $nis );
            $hasil['data']              =       $this->model->GetSlide();
            $this->load->view('fatlit/profile', $hasil);
	}
	
	
	public function galery()
		{
			$nis                        =       $this->session->userdata( 'username' );
            $hasil['profile']           =       $this->user->getProfileData( $nis );
			$this->load->view('fatlit/Galery',array('data' => $hasil));
		}
	public function ganti_foto(){
			$nis                        =       $this->session->userdata( 'username' );
            $hasil['profile']           =       $this->user->getProfileData( $nis );
            $this->load->view('fatlit/ganti_foto', $hasil);
	}

	public function tugas(){
        $hasil['data'] 				=		$this->user->getTugas($nis);
        $hasil['profile']           =       $this->user->getProfileData( $nis );
		$this->load->view('siswa/tugas',$hasil);
	}

}