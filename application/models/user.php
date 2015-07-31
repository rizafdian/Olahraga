<?php 
Class User extends CI_Model {
        function login($nis, $password) {
            $this   ->db -> select('username_atlit, password_atlit'); 
            $this   ->db -> from('atlit'); //nama tabel pada database
            $this   ->db -> where('username_atlit', $nis);
            $this   ->db -> where('password_atlit', $password);
            $this   ->db -> limit(1); //menandakan data ditemukan atau sama dengan satu
            $query = $this ->db -> get();

            if($query -> num_rows() == 1) {
                return $query->result();
            }
            else {
                return false;
            }
        }

        function cekLoginAtlit( $nis , $pass ){
            $this->db->where( 'username_atlit' , $nis );
            $this->db->where( 'password_atlit' , $pass );
            $query      =       $this->db->get( 'atlit' );
            return      $query->result();
        }

        function cekLoginPelatih( $nis , $pass ){
            $this->db->where( 'username_pelatih' , $nis );
            $this->db->where( 'password_pelatih' , $pass );
            $query      =       $this->db->get( 'pelatih' );
            return      $query->result();   
        }

        function cekLoginAdmin( $nis , $pass ){
            $this->db->where( 'username_admin' , $nis );
            $this->db->where( 'password_admin' , $pass );
            $query      =       $this->db->get( 'admin' );
            return      $query->result();   
        }

        function cekLoginSuper( $nis , $pass ){
            $this->db->where( 'id_super' , $nis );
            $this->db->where( 'password_super' , $pass );
            $query      =       $this->db->get( 'super_admin' );
            return      $query->result();   
        }

        function getProfileAtlit( $nis ){
            $this->db->where( 'username_atlit' , $nis );
            $query      =       $this->db->get( 'atlit' );
            return      $query->result();
        }

        function getProfilePelatih( $nis ){
            $this->db->where( 'username_pelatih' , $nis );
            $query      =       $this->db->get( 'pelatih' );
            return      $query->result();
        }

        function getProfileAdmin( $nis ){
            $this->db->where( 'username_admin' , $nis );
            $query      =       $this->db->get( 'admin' );
            return      $query->result();
        }

        function updateDataAtlit( $atlit , $update ){
            $this->db->where( 'username_atlit' , $atlit );
            $this->db->update( 'atlit' , $update );
        }

        function updateDataPelatih( $pelatih , $update ){
            $this->db->where( 'username_pelatih' , $pelatih );
            $this->db->update( 'pelatih' , $update );
        }

        function updateDataTugas( $nis , $update ){
            $this->db->where( 'NIS' , $nis );
            $this->db->update( 'tugas' , $update );
        }

        function getTugas($nis){
            $this->db->where('NIS' , $nis );
            $query= $this->db->get('tugas');
            return $query->result();
        }

    
       function InsertSlide1($id_gambar,$update){
            $res = $this->db->where('id_gambar',$id_gambar);
            $this->db->update('slider',$update);
        }

}
