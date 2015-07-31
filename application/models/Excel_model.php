<?php 
class Excel_model extends CI_Model {

    function tambahuser($dataarray)
    {
        for($i=0;$i<count($dataarray);$i++){
            $data = array(
                'username_admin'=>$dataarray[$i]['username_admin'],
                'password_admin'=>$dataarray[$i]['password_admin'],
                'nm_admin'=>$dataarray[$i]['nm_admin'],
                'kontak_admin'=>$dataarray[$i]['kontak_admin'],
                'email'=>$dataarray[$i]['email'],
                'alamat'=>$dataarray[$i]['alamat']
            );
            $this->db->insert('admin', $data);
        }
    }
    

}
?>