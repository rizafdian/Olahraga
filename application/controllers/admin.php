<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_admin extends CI_Controller {
	 	function __construct() {
            parent::__construct();
            $this->load->model( 'user' );
            $this->load->library( 'session' );
            $this->load->library( 'upload' );

            if ( !$this->session->userdata( 'id_admin' ) && !$this->session->userdata( 'password_admin' ) ){
                $this->session->set_userdata( 'gaklogin' , 'gaklogin' );
                redirect( base_url().'index.php/login' );
            }
    	}
	 	function logout() {
            $this->session->sess_destroy();
            redirect( base_url().'index.php/login' );
        }
        public function index(){
        	$id_admin                        =       $this->session->userdata( 'id_admin' );
            $hasil['profile']         		 =       $this->user->getProfileAdmin( $id_admin );
        	$this->load->view("admin/index", $hasil);
        }
        public function profile(){
        	$id_admin                        =       $this->session->userdata( 'id_admin' );
            $hasil['profile']         		 =       $this->user->getProfileAdmin( $id_admin );
            $this->load->view('admin/profile', $hasil);
        	
        }
         public function edit_profile_admin(){
        	$id_admin                        =       $this->session->userdata( 'id_admin' );
            $hasil['profile']    	         =       $this->user->getProfileAdmin( $id_admin );
            $this->load->view('admin/edit_admin', $hasil);
        	
        }
        public function do_update(){
			$id_admin 		= $_POST['id_admin'];
			$password_admin = $_POST['password_admin'];
			$nama_admin 	= $_POST['nama_admin'];
			$hp_admin 		= $_POST['hp_admin'];
			$alamat 		= $_POST['alamat'];
			$kelamin 		= $_POST['kelamin'];
			$email 			= $_POST['email'];
			$agama 			= $_POST['agama'];
			$data_update 	= array(
				'password_admin' => $password_admin,
				'nama_admin' 	 => $nama_admin,
				'hp_admin' 		 => $hp_admin,
				'alamat' 		 => $alamat,
				'kelamin' 		 => $kelamin,
				'email' 		 => $email,
				'agama' 		 => $agama,
				);
			$where = array('id_admin' => $id_admin);
			$res = $this->model->UpdateAdmin('admin',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/profile');
			}
		}

        public function guru(){
        	$data = $this->model->GetGuru();
        	$this->load->view("admin/guru",array('data'=>$data));


        	
        }
        public function siswa(){
        	$data = $this->model->GetData();
        	$this->load->view("admin/siswa",array('data'=>$data));
        }
        public function slide(){
        	$this->load->view("admin/slide");
        }

        public function edit_data_guru($id_guru){
			$sw 			= $this->model->GetGuru("where id_guru = '$id_guru'");
			$profile 		= array(
			"id_guru" 		=> $sw[0]['id_guru'],
			"nama_guru" 	=> $sw[0]['nama_guru'],
			"password_guru" => $sw[0]['password_guru'],
			"kelamin" 		=> $sw[0]['kelamin'],
			"hp_guru" 		=> $sw[0]['hp_guru'],
			"alamat_guru" 	=> $sw[0]['alamat_guru'],
			"email_guru" 	=> $sw[0]['email_guru'],
			"bidang" 		=> $sw[0]['bidang'],
			"agama" 		=> $sw[0]['agama'],
			);
			$this->load->view('admin/edit_guru',$profile);
	
		}
		public function do_update_guru(){
			$id_guru 		= $_POST['id_guru'];
			$password_guru 	= $_POST['password_guru'];
			$nama_guru 		= $_POST['nama_guru'];
			$kelamin 		= $_POST['kelamin'];
			$hp_guru 		= $_POST['hp_guru'];
			$alamat_guru 	= $_POST['alamat_guru'];
			$email_guru 	= $_POST['email_guru'];
			$bidang 		= $_POST['bidang'];
			$agama 			= $_POST['agama'];
			$data_update 	= array(
				'password_guru' => $password_guru,
				'nama_guru' 	=> $nama_guru,
				'kelamin' 		=> $kelamin,
				'hp_guru' 		=> $hp_guru,
				'alamat_guru' 	=> $alamat_guru,
				'email_guru' 	=> $email_guru,
				'bidang' 		=> $bidang,
				'agama' 		=> $agama,
				);
			$where = array('id_guru' => $id_guru);
			$res = $this->model->UpdateGuru('guru',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/guru');
			}
		}

		public function edit_data_siswa($NIS){
			$sw 			= $this->model->GetData("where NIS = '$NIS'");
			$profile 		= array(
			"NIS" 			=> $sw[0]['NIS'],
			"password" 		=> $sw[0]['password'],
			"Nama" 			=> $sw[0]['Nama'],
			"Kelas" 		=> $sw[0]['Kelas'],
			"Agama" 		=> $sw[0]['Agama'],
			"Nomor_HP" 		=> $sw[0]['Nomor_HP'],
			"Alamat" 		=> $sw[0]['Alamat'],
			"Nama_Ortu" 	=> $sw[0]['Nama_Ortu'],
			"Kelamin" 		=> $sw[0]['Kelamin'],
			"email" 		=> $sw[0]['email'],
			);
			$this->load->view('admin/edit_siswa',$profile);
	
		}

		public function do_update_siswa(){
			$NIS 			= $_POST['NIS'];
			$password_guru  = $_POST['password'];
			$Nama 			= $_POST['Nama'];
			$Kelas 			= $_POST['Kelas'];
			$Agama 			= $_POST['Agama'];
			$Nomor_HP 		= $_POST['Nomor_HP'];
			$Alamat 		= $_POST['Alamat'];
			$Nama_Ortu 		= $_POST['Nama_Ortu'];
			$Kelamin 		= $_POST['Kelamin'];
			$email 			= $_POST['email'];
			$data_update 	= array(
				'password' 		=> $password,
				'Nama' 			=> $Nama,
				'Kelas' 		=> $Kelas,
				'Agama' 		=> $Agama,
				'Nomor_HP' 		=> $Nomor_HP,
				'Alamat' 		=> $Alamat,
				'Nama_Ortu' 	=> $Nama_Ortu,
				'Kelamin' 		=> $Kelamin,
				'email' 		=> $email,
				);
			$where = array('NIS' => $NIS);
			$res = $this->model->UpdateData('data',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/siswa');
			}
		}


		public function do_delete_guru($id_guru){
			$where 			= array('id_guru' => $id_guru);
			$res 			= $this->model->DeleteGuru('guru',$where);
			if($res >= 1){
				redirect('crud_admin/guru');
			}else{
				echo "HAPUS DATA GAGAL";
			}
		}

		public function do_delete_siswa($NIS){
			$where 			= array('NIS' => $NIS);
			$res 			= $this->model->DeleteData('data',$where);
			if($res >= 1){
				redirect('crud_admin/guru');
			}else{
				echo "HAPUS DATA GAGAL";
			}

		}

		public function X_TKJ(){
			$data = $this->model->GetJadwal_x_tkj();
			$this->load->view('admin/jadwal_siswa/x_tkj',array('data'=>$data));
		}
		public function edit_X_TKJ($id_jadwal){
			$sw 			= $this->model->GetJadwal_x_tkj("where id_jadwal = '$id_jadwal'");
			$profile 		= array(
			"id_jadwal" 		=> $sw[0]['id_jadwal'],
			"hari" 				=> $sw[0]['hari'],
			"pertama"			=> $sw[0]['pertama'],
			"kedua" 			=> $sw[0]['kedua'],
			"ketiga" 			=> $sw[0]['ketiga'],
			"keempat" 			=> $sw[0]['keempat'],
			"kelima" 			=> $sw[0]['kelima'],
			);
			$this->load->view('admin/jadwal_siswa/edit_x_tkj',$profile);
	
		}
		public function update_X_TKJ(){
			$id_jadwal 		= $_POST['id_jadwal'];
			$hari 			= $_POST['hari'];
			$pertama 		= $_POST['pertama'];
			$kedua 			= $_POST['kedua'];
			$ketiga 		= $_POST['ketiga'];
			$keempat 		= $_POST['keempat'];
			$kelima 		= $_POST['kelima'];
			$data_update 	= array(
				'pertama' 		=> $pertama,
				'kedua' 		=> $kedua,
				'ketiga' 		=> $ketiga,
				'keempat' 		=> $keempat,
				'kelima' 		=> $kelima,
				);
			$where = array('id_jadwal' => $id_jadwal);
			$res = $this->model->Update_x_tkj('x_tkj',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/X_TKJ');
			}
		}
		public function X_RPL(){
			$data = $this->model->GetJadwal_x_rpl();
			$this->load->view('admin/jadwal_siswa/x_rpl',array('data'=>$data));
		}
		public function edit_X_RPL($id_jadwal){
			$sw 			= $this->model->GetJadwal_x_rpl("where id_jadwal = '$id_jadwal'");
			$profile 		= array(
			"id_jadwal" 		=> $sw[0]['id_jadwal'],
			"hari" 				=> $sw[0]['hari'],
			"pertama" 			=> $sw[0]['pertama'],
			"kedua" 			=> $sw[0]['kedua'],
			"ketiga" 			=> $sw[0]['ketiga'],
			"keempat" 			=> $sw[0]['keempat'],
			"kelima" 			=> $sw[0]['kelima'],
			);
			$this->load->view('admin/jadwal_siswa/edit_x_rpl',$profile);
	
		}
		public function update_X_RPL(){
			$id_jadwal 		= $_POST['id_jadwal'];
			$hari 			= $_POST['hari'];
			$pertama 		= $_POST['pertama'];
			$kedua 			= $_POST['kedua'];
			$ketiga 		= $_POST['ketiga'];
			$keempat 		= $_POST['keempat'];
			$kelima 		= $_POST['kelima'];
			$data_update 	= array(
				'pertama' 		=> $pertama,
				'kedua' 		=> $kedua,
				'ketiga' 		=> $ketiga,
				'keempat' 		=> $keempat,
				'kelima' 		=> $kelima,
				);
			$where = array('id_jadwal' => $id_jadwal);
			$res = $this->model->Update_x_rpl('x_rpl',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/X_RPL');
			}
		}

		public function X_MM(){
			$data = $this->model->GetJadwal_x_mm();
			$this->load->view('admin/jadwal_siswa/x_mm',array('data'=>$data));
		}
		public function edit_X_MM ($id_jadwal){
			$sw 			= $this->model->GetJadwal_x_mm("where id_jadwal = '$id_jadwal'");
			$profile 		= array(
			"id_jadwal" 	=> $sw[0]['id_jadwal'],
			"hari" 			=> $sw[0]['hari'],
			"pertama" 		=> $sw[0]['pertama'],
			"kedua" 		=> $sw[0]['kedua'],
			"ketiga" 		=> $sw[0]['ketiga'],
			"keempat" 		=> $sw[0]['keempat'],
			"kelima" 		=> $sw[0]['kelima'],
			);
			$this->load->view('admin/jadwal_siswa/edit_x_mm',$profile);
	
		}
		public function update_X_MM(){
			$id_jadwal 		= $_POST['id_jadwal'];
			$hari 			= $_POST['hari'];
			$pertama 		= $_POST['pertama'];
			$kedua 			= $_POST['kedua'];
			$ketiga 		= $_POST['ketiga'];
			$keempat 		= $_POST['keempat'];
			$kelima 		= $_POST['kelima'];
			$data_update 	= array(
				'pertama' 		=> $pertama,
				'kedua' 		=> $kedua,
				'ketiga' 		=> $ketiga,
				'keempat' 		=> $keempat,
				'kelima' 		=> $kelima,
				);
			$where = array('id_jadwal' => $id_jadwal);
			$res = $this->model->Update_x_mm('x_mm',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/X_MM');
			}
		}

		public function XI_TKJ(){
			$data = $this->model->GetJadwal_xi_tkj();
			$this->load->view('admin/jadwal_siswa/xi_tkj',array('data'=>$data));
		}
		public function edit_XI_TKJ($id_jadwal){
			$sw 			= $this->model->GetJadwal_xi_tkj("where id_jadwal = '$id_jadwal'");
			$profile 		= array(
			"id_jadwal" 	=> $sw[0]['id_jadwal'],
			"hari" 			=> $sw[0]['hari'],
			"pertama" 		=> $sw[0]['pertama'],
			"kedua" 		=> $sw[0]['kedua'],
			"ketiga" 		=> $sw[0]['ketiga'],
			"keempat" 		=> $sw[0]['keempat'],
			"kelima" 		=> $sw[0]['kelima'],
			);
			$this->load->view('admin/jadwal_siswa/edit_xi_tkj',$profile);
	
		}
		public function update_XI_TKJ(){
			$id_jadwal 		= $_POST['id_jadwal'];
			$hari 			= $_POST['hari'];
			$pertama 		= $_POST['pertama'];
			$kedua 			= $_POST['kedua'];
			$ketiga 		= $_POST['ketiga'];
			$keempat 		= $_POST['keempat'];
			$kelima 		= $_POST['kelima'];
			$data_update 	= array(
				'pertama' 		=> $pertama,
				'kedua' 		=> $kedua,
				'ketiga' 		=> $ketiga,
				'keempat' 		=> $keempat,
				'kelima' 		=> $kelima,
				);
			$where = array('id_jadwal' => $id_jadwal);
			$res = $this->model->Update_xi_tkj('xi_tkj',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/XI_TKJ');
			}
		}

		public function XI_RPL(){
			$data = $this->model->GetJadwal_xi_rpl();
			$this->load->view('admin/jadwal_siswa/xi_rpl',array('data'=>$data));
		}
		public function edit_XI_RPL($id_jadwal){
			$sw 			= $this->model->GetJadwal_xi_rpl("where id_jadwal = '$id_jadwal'");
			$profile 		= array(
			"id_jadwal" 	=> $sw[0]['id_jadwal'],
			"hari" 			=> $sw[0]['hari'],
			"pertama"		=> $sw[0]['pertama'],
			"kedua" 		=> $sw[0]['kedua'],
			"ketiga" 		=> $sw[0]['ketiga'],
			"keempat" 		=> $sw[0]['keempat'],
			"kelima" 		=> $sw[0]['kelima'],
			);
			$this->load->view('admin/jadwal_siswa/edit_xi_rpl',$profile);
	
		}
		public function update_XI_RPL(){
			$id_jadwal 		= $_POST['id_jadwal'];
			$hari 			= $_POST['hari'];
			$pertama 		= $_POST['pertama'];
			$kedua 			= $_POST['kedua'];
			$ketiga 		= $_POST['ketiga'];
			$keempat 		= $_POST['keempat'];
			$kelima 		= $_POST['kelima'];
			$data_update 	= array(
				'pertama' 		=> $pertama,
				'kedua' 		=> $kedua,
				'ketiga' 		=> $ketiga,
				'keempat' 		=> $keempat,
				'kelima' 		=> $kelima,
				);
			$where = array('id_jadwal' => $id_jadwal);
			$res = $this->model->Update_xi_rpl('xi_rpl',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/XI_RPL');
			}
		}

		public function XI_MM(){
			$data = $this->model->GetJadwal_xi_mm();
			$this->load->view('admin/jadwal_siswa/xi_mm',array('data'=>$data));
		}
		public function edit_XI_MM($id_jadwal){
			$sw 			= $this->model->GetJadwal_xi_mm("where id_jadwal = '$id_jadwal'");
			$profile 		= array(
			"id_jadwal" 	=> $sw[0]['id_jadwal'],
			"hari" 			=> $sw[0]['hari'],
			"pertama" 		=> $sw[0]['pertama'],
			"kedua" 		=> $sw[0]['kedua'],
			"ketiga" 		=> $sw[0]['ketiga'],
			"keempat" 		=> $sw[0]['keempat'],
			"kelima" 		=> $sw[0]['kelima'],
			);
			$this->load->view('admin/jadwal_siswa/edit_xi_mm',$profile);
	
		}
		public function update_XI_MM(){
			$id_jadwal 		= $_POST['id_jadwal'];
			$hari 			= $_POST['hari'];
			$pertama 		= $_POST['pertama'];
			$kedua 			= $_POST['kedua'];
			$ketiga 		= $_POST['ketiga'];
			$keempat 		= $_POST['keempat'];
			$kelima 		= $_POST['kelima'];
			$data_update 	= array(
				'pertama' 		=> $pertama,
				'kedua' 		=> $kedua,
				'ketiga' 		=> $ketiga,
				'keempat' 		=> $keempat,
				'kelima' 		=> $kelima,
				);
			$where = array('id_jadwal' => $id_jadwal);
			$res = $this->model->Update_xi_mm('xi_mm',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/XI_MM');
			}
		}

		public function XII_TKJ(){
			$data = $this->model->GetJadwal_xii_tkj();
			$this->load->view('admin/jadwal_siswa/xii_tkj',array('data'=>$data));
		}
		public function edit_XII_TKJ($id_jadwal){
			$sw 			= $this->model->GetJadwal_xii_tkj("where id_jadwal = '$id_jadwal'");
			$profile 		= array(
			"id_jadwal" 	=> $sw[0]['id_jadwal'],
			"hari" 			=> $sw[0]['hari'],
			"pertama" 		=> $sw[0]['pertama'],
			"kedua" 		=> $sw[0]['kedua'],
			"ketiga" 		=> $sw[0]['ketiga'],
			"keempat" 		=> $sw[0]['keempat'],
			"kelima" 		=> $sw[0]['kelima'],
			);
			$this->load->view('admin/jadwal_siswa/edit_xii_tkj',$profile);
	
		}
		public function update_XII_TKJ(){
			$id_jadwal 		= $_POST['id_jadwal'];
			$hari 			= $_POST['hari'];
			$pertama 		= $_POST['pertama'];
			$kedua 			= $_POST['kedua'];
			$ketiga 		= $_POST['ketiga'];
			$keempat	 	= $_POST['keempat'];
			$kelima 		= $_POST['kelima'];
			$data_update 	= array(
				'pertama' 		=> $pertama,
				'kedua' 		=> $kedua,
				'ketiga' 		=> $ketiga,
				'keempat' 		=> $keempat,
				'kelima' 		=> $kelima,
				);
			$where = array('id_jadwal' => $id_jadwal);
			$res = $this->model->Update_xii_tkj('xii_tkj',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/XII_TKJ');
			}
		}

		public function XII_RPL(){
			$data = $this->model->GetJadwal_xii_rpl();
			$this->load->view('admin/jadwal_siswa/xii_rpl',array('data'=>$data));
		}
		public function edit_XII_RPL($id_jadwal){
			$sw 			= $this->model->GetJadwal_xii_rpl("where id_jadwal = '$id_jadwal'");
			$profile 		= array(
			"id_jadwal" 	=> $sw[0]['id_jadwal'],
			"hari" 			=> $sw[0]['hari'],
			"pertama" 		=> $sw[0]['pertama'],
			"kedua" 		=> $sw[0]['kedua'],
			"ketiga" 		=> $sw[0]['ketiga'],
			"keempat" 		=> $sw[0]['keempat'],
			"kelima" 		=> $sw[0]['kelima'],
			);
			$this->load->view('admin/jadwal_siswa/edit_xii_rpl',$profile);
	
		}
		public function update_XII_RPL(){
			$id_jadwal 		= $_POST['id_jadwal'];
			$hari 			= $_POST['hari'];
			$pertama 		= $_POST['pertama'];
			$kedua 			= $_POST['kedua'];
			$ketiga 		= $_POST['ketiga'];
			$keempat 		= $_POST['keempat'];
			$kelima 		= $_POST['kelima'];
			$data_update 	= array(
				'pertama' 		=> $pertama,
				'kedua' 		=> $kedua,
				'ketiga' 		=> $ketiga,
				'keempat' 		=> $keempat,
				'kelima' 		=> $kelima,
				);
			$where = array('id_jadwal' => $id_jadwal);
			$res = $this->model->Update_xii_rpl('xii_rpl',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/XII_RPL');
			}
		}

		public function XII_MM(){
			$data = $this->model->GetJadwal_xii_mm();
			$this->load->view('admin/jadwal_siswa/xii_mm',array('data'=>$data));
		}
		public function edit_XII_MM($id_jadwal){
			$sw 			= $this->model->GetJadwal_xii_mm("where id_jadwal = '$id_jadwal'");
			$profile 		= array(
			"id_jadwal" 		=> $sw[0]['id_jadwal'],
			"hari" 				=> $sw[0]['hari'],
			"pertama"			=> $sw[0]['pertama'],
			"kedua" 			=> $sw[0]['kedua'],
			"ketiga" 			=> $sw[0]['ketiga'],
			"keempat" 			=> $sw[0]['keempat'],
			"kelima" 			=> $sw[0]['kelima'],
			);
			$this->load->view('admin/jadwal_siswa/edit_xii_mm',$profile);
	
		}
		public function update_XII_MM(){
			$id_jadwal 		= $_POST['id_jadwal'];
			$hari 			= $_POST['hari'];
			$pertama 		= $_POST['pertama'];
			$kedua 			= $_POST['kedua'];
			$ketiga 		= $_POST['ketiga'];
			$keempat 		= $_POST['keempat'];
			$kelima 		= $_POST['kelima'];
			$data_update 	= array(
				'pertama' 		=> $pertama,
				'kedua' 		=> $kedua,
				'ketiga' 		=> $ketiga,
				'keempat' 		=> $keempat,
				'kelima' 		=> $kelima,
				);
			$where = array('id_jadwal' => $id_jadwal);
			$res = $this->model->Update_xii_mm('xii_mm',$data_update,$where);
			if ($res >= 1) {
				redirect ('crud_admin/XII_MM');
			}
		}


		function upload_slide1(){
            $nama_gambar        =   '';
           

            if ( file_exists( './asset/slide/'.$_FILES['gambar1']['name'] ) ){ $nama_gambar  =   $_FILES['gambar1']['name'];  }
            else{
                $config['upload_path']              =       './asset/slide';
                $config['allowed_types']            =       'jpg|jpeg|png';
                $config['max_size']                 =       '1020000';

                $this->upload->initialize( $config );
                $this->upload->do_upload( 'gambar1' );
                $this->upload->data();
                $gambar                             =       $this->upload->data();
                $nama_gambar                        =       $gambar['file_name'];
            }

            $id_gambar                               =       "1";
           
            $update['gambar1']                       =       $nama_gambar;
            $this->user->InsertSlide1($id_gambar, $update );

            redirect( base_url().'index.php/crud_admin/slide' );
    	}

    	function upload_slide2(){
            $nama_gambar        =   '';
           

            if ( file_exists( './asset/slide/'.$_FILES['gambar2']['name'] ) ){ $nama_gambar  =   $_FILES['gambar2']['name'];  }
            else{
                $config['upload_path']              =       './asset/slide';
                $config['allowed_types']            =       'jpg|jpeg|png';
                $config['max_size']                 =       '1020000';

                $this->upload->initialize( $config );
                $this->upload->do_upload( 'gambar2' );
                $this->upload->data();
                $gambar                             =       $this->upload->data();
                $nama_gambar                        =       $gambar['file_name'];
            }

            $id_gambar                               =       "1";
           
            $update['gambar2']                       =       $nama_gambar;
            $this->user->InsertSlide1($id_gambar, $update );

            redirect( base_url().'index.php/crud_admin/slide' );
    	}

    	function upload_slide3(){
            $nama_gambar        =   '';
           

            if ( file_exists( './asset/slide/'.$_FILES['gambar3']['name'] ) ){ $nama_gambar  =   $_FILES['gambar3']['name'];  }
            else{
                $config['upload_path']              =       './asset/slide';
                $config['allowed_types']            =       'jpg|jpeg|png';
                $config['max_size']                 =       '1020000';

                $this->upload->initialize( $config );
                $this->upload->do_upload( 'gambar3' );
                $this->upload->data();
                $gambar                             =       $this->upload->data();
                $nama_gambar                        =       $gambar['file_name'];
            }

            $id_gambar                                =      "1";
           
            $update['gambar3']                       =       $nama_gambar;
            $this->user->InsertSlide1($id_gambar, $update );

            redirect( base_url().'index.php/crud_admin/slide' );
    	}

    	function upload_slide4(){
            $nama_gambar        =   '';
           

            if ( file_exists( './asset/slide/'.$_FILES['gambar4']['name'] ) ){ $nama_gambar  =   $_FILES['gambar4']['name'];  }
            else{
                $config['upload_path']              =       './asset/slide';
                $config['allowed_types']            =       'jpg|jpeg|png';
                $config['max_size']                 =       '1020000';

                $this->upload->initialize( $config );
                $this->upload->do_upload( 'gambar4' );
                $this->upload->data();
                $gambar                             =       $this->upload->data();
                $nama_gambar                        =       $gambar['file_name'];
            }

            $id_gambar                               =       "1";
           
            $update['gambar4']                       =       $nama_gambar;
            $this->user->InsertSlide1($id_gambar, $update );

            redirect( base_url().'index.php/crud_admin/slide' );
    	}
    	function laporan(){
    		$this->load->view('admin/laporan/pilihLaporan');
    	}

    	


}


