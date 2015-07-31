<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_excel extends CI_Controller {
	function __construct() {
            parent::__construct();
            $this->load->model( 'Excel_model' );
            $this->load->library( 'session' );
            $this->load->library( 'upload' );

            if ( !$this->session->userdata( 'username_admin' ) && !$this->session->userdata( 'pass_admin' ) ){
                $this->session->set_userdata( 'gaklogin' , 'gaklogin' );
                redirect( base_url().'index.php/login' );
            }
    	}
    public function do_upload(){
        $config['upload_path'] = './temp_upload/';
        $config['allowed_types'] = 'xls';
                
        $this->load->library('upload', $config);
                

        if ( ! $this->upload->do_upload())
        {
            $data = array('error' => $this->upload->display_errors());
            
        }
        else
        {
            $data = array('error' => false);
            $upload_data = $this->upload->data();

            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');

            $file =  $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);

            // Sheet 1
            $data = $this->excel_reader->sheets[0] ;
                        $dataexcel = Array();
            for ($i = 1; $i <= $data['numRows']; $i++) {

                            if($data['cells'][$i][1] == '') break;
                            $dataexcel[$i-1]['username_admin'] = $data['cells'][$i][1];
                            $dataexcel[$i-1]['password_admin'] = $data['cells'][$i][2];
                            $dataexcel[$i-1]['nm_admin'] = $data['cells'][$i][3];
                            $dataexcel[$i-1]['kontak_admin'] = $data['cells'][$i][4];
                            $dataexcel[$i-1]['email'] = $data['cells'][$i][5];
                            $dataexcel[$i-1]['alamat'] = $data['cells'][$i][6];

            }
                        
                        
            delete_files($upload_data['file_path']);
            $this->load->model('Excel_model');
            $this->Excel_model->tambahuser($dataexcel);
            //$data['atl'] = $this->Excel_model->getuser();
        }
        $this->load->view('admin/index');
    }

    }