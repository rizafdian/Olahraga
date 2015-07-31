<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin extends CI_Controller {
	function __construct() {
            parent::__construct();
            $this->load->model( 'user' );
            $this->load->library( 'session' );
            $this->load->library( 'upload' );

            if ( !$this->session->userdata( 'username_admin' ) && !$this->session->userdata( 'pass_admin' ) ){
                $this->session->set_userdata( 'gaklogin' , 'gaklogin' );
                redirect( base_url().'index.php/login' );
            }
    	}
        public function index(){
        	$admin                        =       $this->session->userdata( 'username_admin' );
            $hasil['profile']         		 =       $this->user->getProfileAdmin( $admin );
        	$this->load->view("admin/index", $hasil);
        }
         public function profile(){
            $admin                      =       $this->session->userdata( 'username_admin' );
            $hasil['profile']           =       $this->user->getProfileAdmin( $admin );
            //$hasil['data']              =       $this->model->GetSlide();
            $this->load->view('admin/profile', $hasil);
    }
        public function keatlitan(){
            $data = array(
                "atl" => $this->model->GetAtlit(),
            );
            $this->load->view('admin/page_atlit',$data);
        }
        public function kepelatihan(){
            $data = array(
                "atl" => $this->model->GetPelatih(),
            );
            $this->load->view('admin/page_pelatih',$data);
        }
        public function keadminan(){
            $data = array(
                "atl" => $this->model->GetAdmin(),
            );
            $this->load->view('admin/page_admin',$data);
        }
        public function cbOlahraga(){
            $data = array(
                "atl" => $this->model->GetcbOlahraga(),
            );
            $this->load->view('admin/page_cbOlahraga',$data);
        }
        function logout() {
            $this->session->sess_destroy();
            redirect( base_url().'index.php/login' );
        }
        public function add_data(){
            $this->load->view('admin/insert_atlit'); 
        }
        public function do_insert_atlit(){
        $id_atlit   = $_POST['id_atlit'];
        $nm_atlit   = $_POST['nm_atlit'];
        $tmpt_lahir = $_POST['tmpt_lahir'];
        $tgl_lahir  = $_POST['tgl_lahir'];
        $alamat     = $_POST['alamat'];
        $kabupaten  = $_POST['kabupaten'];
        $propinsi   = $_POST['propinsi'];
        $pekerjaan  = $_POST['pekerjaan'];
        $kontak     = $_POST['kontak'];
        $kejuaraan_ygdiikuti  = $_POST['kejuaraan_ygdiikuti'];
        $hasil_kejuaraan  = $_POST['hasil_kejuaraan'];
        $kekuatan  = $_POST['kekuatan'];
        $kelenturan  = $_POST['kelenturan'];
        $kecepatan  = $_POST['kecepatan'];
        $reaksi  = $_POST['reaksi'];
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
            'id_atlit'      => $id_atlit,
            'nm_atlit'  => $nm_atlit,
            'tmpt_lahir'        => $tmpt_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'alamat'    => $alamat,
            'kabupaten'     => $kabupaten,
            'propinsi'  => $propinsi,
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
            redirect('c_admin/keatlitan');
        }else{
            echo "INSERT DATA GAGAL";
        }
    }
    public function edit_data($id_atlit){
        $us = $this->model->GetAtlit(" where id_atlit = '$id_atlit'");
        $data = array(
            "id_atlit" => $us[0]['id_atlit'],
            "nm_atlit" => $us[0]['nm_atlit'],
            "tmpt_lahir" => $us[0]['tmpt_lahir'],
            "tgl_lahir" => $us[0]['tgl_lahir'],
            "alamat" => $us[0]['alamat'],
            "kabupaten" => $us[0]['kabupaten'],
            "propinsi" => $us[0]['propinsi'],
            "pekerjaan" => $us[0]['pekerjaan'],
            "kontak" => $us[0]['kontak'],
            "kejuaraan_ygdiikuti" => $us[0]['kejuaraan_ygdiikuti'],
            "hasil_kejuaraan" => $us[0]['hasil_kejuaraan'],
            "kekuatan" => $us[0]['kekuatan'],
            "kelenturan" => $us[0]['kelenturan'],
            "kecepatan" => $us[0]['kecepatan'],
            "reaksi" => $us[0]['reaksi'],
            "power" => $us[0]['power'],
            "dayatahanotot" => $us[0]['dayatahanotot'],
            "v02max" => $us[0]['v02max'],
            "kelincahan" => $us[0]['kelincahan'],
            "teknik" => $us[0]['teknik'],
            "kesehatan" => $us[0]['kesehatan'],
            "psikologi" => $us[0]['psikologi'],
            "username_atlit" => $us[0]['username_atlit'],
            "password_atlit" => $us[0]['password_atlit'],
        );
         $this->load->view('admin/edit',$data);
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
            'tgl_lahir' => $tgl_lahir,
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
        $where = array('id_atlit' => $id_atlit);
        $res = $this->model->UpdateAtlit('atlit',$data_update,$where);
        if($res >= 1){
            redirect('c_admin/keatlitan');
        }
    }
        public function do_delete($id_atlit){
        $where = array('id_atlit' => $id_atlit);
        $res = $this->model->DeleteData('atlit',$where);
        if($res>=1){
                redirect('c_admin/keatlitan');
            }else{
                echo "<h2>Delete data failed</h2>";
            }
    }
        public function add_pelatih(){
            $this->load->view('admin/insert_pelatih'); 
        }
        public function do_insert_pelatih(){
        $id   = $_POST['id'];
        $nm_pelatih   = $_POST['nm_pelatih'];
        $tmpt_lhr = $_POST['tmpt_lhr'];
        $tgl_lhr  = $_POST['tgl_lhr'];
        $alamat     = $_POST['alamat'];
        $kabupaten  = $_POST['kabupaten'];
        $propinsi   = $_POST['propinsi'];
        $kontak     = $_POST['kontak'];
        $username_pelatih  = $_POST['username_pelatih'];
        $password_pelatih  = $_POST['password_pelatih'];
        
        $data_insert = array(
            'id'      => $id,
            'nm_pelatih'  => $nm_pelatih,
            'tmpt_lhr'        => $tmpt_lhr,
            'tgl_lhr'     => $tgl_lhr,
            'alamat'    => $alamat,
            'kabupaten'     => $kabupaten,
            'propinsi'  => $propinsi,
            'kontak' => $kontak,
            'username_pelatih' => $username_pelatih,
            'password_pelatih' => $password_pelatih,
            
            );
        $res = $this->model->InsertPelatih('pelatih',$data_insert);
        if($res >= 1){
            redirect('c_admin/kepelatihan');
        }else{
            echo "INSERT DATA GAGAL";
        }
    }
    public function edit_pelatih($id){
        $us = $this->model->GetPelatih(" where id = '$id'");
        $data = array(
            "id" => $us[0]['id'],
            "nm_pelatih" => $us[0]['nm_pelatih'],
            "tmpt_lhr" => $us[0]['tmpt_lhr'],
            "tgl_lhr" => $us[0]['tgl_lhr'],
            "alamat" => $us[0]['alamat'],
            "kabupaten" => $us[0]['kabupaten'],
            "propinsi" => $us[0]['propinsi'],
            "kontak" => $us[0]['kontak'],
            "username_pelatih" => $us[0]['username_pelatih'],
            "password_pelatih" => $us[0]['password_pelatih'],
        );
         $this->load->view('admin/edit_pelatih',$data);
    }
        public function do_update_pelatih(){
        $id = $_POST['id'];
        $nm_pelatih = $_POST['nm_pelatih'];
        $tmpt_lhr = $_POST['tmpt_lhr'];
        $tgl_lhr = $_POST['tgl_lhr'];
        $alamat = $_POST['alamat'];
        $kabupaten = $_POST['kabupaten'];
        $propinsi = $_POST['propinsi'];
        $kontak = $_POST['kontak'];
        $username_pelatih = $_POST['username_pelatih'];
        $password_pelatih = $_POST['password_pelatih'];
        $data_update = array(
            'id' => $id,
            'nm_pelatih' => $nm_pelatih,
            'tmpt_lhr' => $tmpt_lhr,
            'tgl_lhr' => $tgl_lhr,
            'Alamat' => $alamat,
            'kabupaten' => $kabupaten,
            'propinsi' => $propinsi,
            'kontak' => $kontak,
            'username_pelatih' => $username_pelatih,
            'password_pelatih' => $password_pelatih,
            );
        $where = array('id' => $id);
        $res = $this->model->UpdatePelatih('pelatih',$data_update,$where);
        if($res >= 1){
            redirect('c_admin/kepelatihan');
        }
    }
        public function do_delete_pelatih($id){
        $where = array('id' => $id);
        $res = $this->model->DeletePelatih('pelatih',$where);
        if($res>=1){
                redirect('c_admin/kepelatihan');
            }else{
                echo "<h2>Delete data failed</h2>";
            }
    }
        public function add_admin(){
            $this->load->view('admin/insert_admin'); 
        }
        public function do_insert_admin(){
        $id_admin   = $_POST['id_admin'];
        $username_admin   = $_POST['username_admin'];
        $password_admin = $_POST['password_admin'];
        $nm_admin  = $_POST['nm_admin'];
        $kontak_admin     = $_POST['kontak_admin'];
        $email  = $_POST['email'];
        $alamat   = $_POST['alamat'];
        
        $data_insert = array(
            'id_admin'      => $id_admin,
            'username_admin'  => $username_admin,
            'password_admin'        => $password_admin,
            'nm_admin'     => $nm_admin,
            'kontak_admin'    => $kontak_admin,
            'email'     => $email,
            'alamat'  => $alamat,
            );
        $res = $this->model->InsertAdmin('admin',$data_insert);
        if($res >= 1){
            redirect('c_admin/keadminan');
        }else{
            echo "INSERT DATA GAGAL";
        }
    }
    public function edit_admin($id_admin){
        $us = $this->model->GetAdmin(" where id_admin = '$id_admin'");
        $data = array(
            "id_admin" => $us[0]['id_admin'],
            "username_admin" => $us[0]['username_admin'],
            "password_admin" => $us[0]['password_admin'],
            "nm_admin" => $us[0]['nm_admin'],
            "kontak_admin" => $us[0]['kontak_admin'],
            "email" => $us[0]['email'],
            "alamat" => $us[0]['alamat'],
            );
         $this->load->view('admin/edit_admin',$data);
    }
        public function do_update_admin(){
        $id_admin = $_POST['id_admin'];
        $username_admin = $_POST['username_admin'];
        $password_admin = $_POST['password_admin'];
        $nm_admin = $_POST['nm_admin'];
        $kontak_admin = $_POST['kontak_admin'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $data_update = array(
            'id_admin' => $id_admin,
            'username_admin' => $username_admin,
            'password_admin' => $password_admin,
            'nm_admin' => $nm_admin,
            'kontak_admin' => $kontak_admin,
            'email' => $email,
            'alamat' => $alamat,
            );
        $where = array('id_admin' => $id_admin);
        $res = $this->model->UpdateAdmin('admin',$data_update,$where);
        if($res >= 1){
            redirect('c_admin/keadminan');
        }
    }
        public function do_delete_admin($id_admin){
        $where = array('id_admin' => $id_admin);
        $res = $this->model->DeleteAdmin('admin',$where);
        if($res>=1){
                redirect('c_admin/keadminan');
            }else{
                echo "<h2>Delete data failed</h2>";
            }
    }

    public function add_cb_olahraga(){
            $this->load->view('admin/insert_cb_olahraga'); 
        }
        public function do_insert_cb_olahraga(){
        $kd_cb_olahraga   = $_POST['kd_cb_olahraga'];
        $nm_cb_olahraga   = $_POST['nm_cb_olahraga'];
        
        $data_insert = array(
            'kd_cb_olahraga'      => $kd_cb_olahraga,
            'nm_cb_olahraga'  => $nm_cb_olahraga,
            );
        $res = $this->model->InsertCbOlahraga('cb_olahraga',$data_insert);
        if($res >= 1){
            redirect('c_admin/cbOlahraga');
        }else{
            echo "INSERT DATA GAGAL";
        }
    }
    public function edit_cbOlahraga($kd_cb_olahraga){
        $us = $this->model->GetcbOlahraga(" where kd_cb_olahraga = '$kd_cb_olahraga'");
        $data = array(
            "kd_cb_olahraga" => $us[0]['kd_cb_olahraga'],
            "nm_cb_olahraga" => $us[0]['nm_cb_olahraga'],
            );
         $this->load->view('admin/edit_cb_olahraga',$data);
    }
        public function do_update_cb_olahraga(){
        $kd_cb_olahraga = $_POST['kd_cb_olahraga'];
        $nm_cb_olahraga = $_POST['nm_cb_olahraga'];
        $data_update = array(
            'kd_cb_olahraga' => $kd_cb_olahraga,
            'nm_cb_olahraga' => $nm_cb_olahraga,
            );
        $where = array('kd_cb_olahraga' => $kd_cb_olahraga);
        $res = $this->model->UpdatecbOlahraga('cb_olahraga',$data_update,$where);
        if($res >= 1){
            redirect('c_admin/cbOlahraga');
        }
    }
        public function do_delete_cb_olahraga($kd_cb_olahraga){
        $where = array('kd_cb_olahraga' => $kd_cb_olahraga);
        $res = $this->model->DeletecbOlahraga('cb_olahraga',$where);
        if($res>=1){
                redirect('c_admin/cbOlahraga');
            }else{
                echo "<h2>Delete data failed</h2>";
            }
    }
   
}