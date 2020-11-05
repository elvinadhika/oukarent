<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	} 

	public function cek_petugas()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

    	$query = $this->db->where('USERNAME',$username)
                      	  ->where('PASSWORD',$password)
                          ->get('tb_petugas');

    	if ($query->num_rows() > 0) 
    	{
      		$data_petugas = $query->row();
      		$session = array(
      			'logged_in'		=> TRUE,
      			'id_petugas'	=> $data_petugas->id_petugas,
      			'nama'			=> $data_petugas->nama_petugas,
      			'no_hp_petugas'	=> $data_petugas->no_hp_petugas
      		); 

      		$this->session->set_userdata($session);

      		return TRUE;
    	} else { 
      		return FALSE;
   		} 
	}

	public function get_petugas1()
	{
		return $this->db->get('tb_petugas')
						->result();
	}

	public function get_penyewa1()
	{
		return $this->db->get('tb_penyewa')
						->result();
	}

	public function get_mobil1()
	{
		return $this->db->get_where('tb_mobil', array('jenis' => 'Mobil'))
						->result();
	}

	public function get_motor1()
	{
		return $this->db->get_where('tb_mobil', array('jenis' => 'Motor'))
						->result();
	}

	public function get_driver1()
	{
		return $this->db->get('tb_driver')
						->result();
	}

	public function get_transaksi()
	{
		return $this->db->get('tb_transaksi')
						->result();
	}


	/* MODEL MOBIL */
	public function cek_id_mobil()
  	{
    	$this->db->select('RIGHT(tb_mobil.id_mobil,2) as kode', FALSE);
		$this->db->order_by('id_mobil','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tb_mobil');     

		//cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0)
		{      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;

		} else { 
		   //jika kode belum ada      
		   $kode = 1;    
		}

		$kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "C".$kodemax;    // hasilnya ODJ-9921-0001 dst.
	 	return $kodejadi;
  	}

	public function lihat_mobil()
	{
		//return $this->db->order_by('ID_MOBIL', 'ASC')->get('tb_mobil')->result();
		return $this->db->select('*')
						->from('tb_mobil')
            			->where('jenis', 'Mobil')
            			->order_by('ID_MOBIL', 'ASC')
						->get()
						->result();
	}

	public function upload_mobil($foto_kendaraan)
	{
		$data = array('ID_MOBIL'		=> $this->input->post('id_mobil'),
					  'STATUS_C'		=> $this->input->post('status_c'),
					  'JENIS' 	    	=> $this->input->post('jenis'),
                  	  'MERK' 			=> $this->input->post('merk'),
                      'DOOR'			=> $this->input->post('door'),
                  	  'SEATS' 			=> $this->input->post('seats'),
                  	  'TRANSMISSION'	=> $this->input->post('transmission'),
                  	  'HARGA_SEWA' 		=> $this->input->post('harga_sewa'),
                  	  'FOTO_KENDARAAN'  => $foto['file_name']
        );

    	$this->db->insert('tb_mobil', $data);
    	$this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    	return $r;
	}

	public function detil_edit_mobil($id)
	{
		return $this->db->get_where('tb_mobil', array('id_mobil' => $id))
						->row();
	}

	public function edit_mobil($id)
	{
		$data = array('STOCK' => $this->input->post('stock'),
					  'MERK' => $this->input->post('merk'),
	                  'DOOR' => $this->input->post('door'),
	                  'SEATS' => $this->input->post('seats'),
	                  'TRANSMISSION' => $this->input->post('transmission'),
	                  'HARGA_SEWA' => $this->input->post('harga_sewa')
	              );
		$this->db->where('ID_MOBIL', $id)->update('tb_mobil',$data);
		$this->db->affected_rows() > 0 ? $r = TRUE : $r=FALSE;
    	return $r;
	}

	public function delete_mobil($id)
	{
		return $this->db->delete('tb_mobil', array('ID_MOBIL'=>$id));
	}
	/* END MODEL MOBIL */


	/* MODEL MOTOR */
	public function cek_id_motor()
  	{
    	$this->db->select('RIGHT(tb_motor.id_motor,2) as kode', FALSE);
		$this->db->order_by('id_motor','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tb_motor');     

		//cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0)
		{      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;

		} else { 
		   //jika kode belum ada      
		   $kode = 1;    
		}

		$kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "M".$kodemax;    // hasilnya ODJ-9921-0001 dst.
	 	return $kodejadi;
  	}

	public function lihat_motor()
	{
		//return $this->db->order_by('ID_MOTOR', 'ASC')->get('tb_motor')->result();
		return $this->db->select('*')
						->from('tb_mobil')
            			->where('jenis', 'Motor')
            			->order_by('ID_MOBIL', 'ASC')
						->get()
						->result();
	}

	public function upload_motor($foto_kendaraan)
	{
		$data = array('ID_MOBIL'		=> $this->input->post('id_mobil'),
					  'STATUS_C'		=> $this->input->post('status_c'),
					  'JENIS' 	    	=> $this->input->post('jenis'),
                  	  'MERK' 			=> $this->input->post('merk'),
                  	  'TRANSMISSION'	=> $this->input->post('transmission'),
                  	  'HARGA_SEWA' 		=> $this->input->post('harga_sewa'),
                  	  'FOTO_KENDARAAN'  => $foto['file_name']
        );

    	$this->db->insert('tb_mobil', $data);
    	$this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    	return $r;
	}

	public function detil_edit_motor($id)
	{
		return $this->db->get_where('tb_motor', array('id_motor' => $id))
						->row();
	}

	public function edit_motor($id)
	{
		$data = array('STOCK_M' => $this->input->post('stock_m'),
					  'MERK_M' => $this->input->post('merk_m'),
	                  'TRANSMISSION_M' => $this->input->post('transmission_m'),
	                  'HARGA_SEWA_M' => $this->input->post('harga_sewa_m')
	              );
		$this->db->where('ID_MOtor', $id)->update('tb_motor',$data);
		$this->db->affected_rows() > 0 ? $r = TRUE : $r=FALSE;
    	return $r;
	}

	public function delete_motor($id)
	{
		return $this->db->delete('tb_motor', array('ID_MOTOR'=>$id));
	}
	/* END MODEL MOTOR */


	/* MODEL PENYEWA */
	public function lihat_penyewa()
	{
		return $this->db->order_by('ID_PENYEWA', 'ASC')->get('tb_penyewa')->result();
	}

	public function delete_penyewa($id)
	{
		return $this->db->delete('tb_penyewa', array('ID_PENYEWA'=>$id));
	}
	/* END MODEL PENYEWA */


	/* MODEL DRIVER */
	public function cek_id_driver()
  	{
    	$this->db->select('RIGHT(tb_driver.id_driver,2) as kode', FALSE);
		$this->db->order_by('id_driver','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tb_driver');     

		//cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0)
		{      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;

		} else { 
		   //jika kode belum ada      
		   $kode = 1;    
		}

		$kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "D".$kodemax;    // hasilnya ODJ-9921-0001 dst.
	 	return $kodejadi;
  	}

	public function lihat_driver()
	{
		return $this->db->order_by('ID_DRIVER', 'ASC')->get('tb_driver')->result();
	}

	public function upload_driver()
	{
		$data = array('ID_DRIVER'	=> $this->input->post('id_driver'),
                      'NAMA_DRIVER'	=> $this->input->post('nama_driver'),
                  	  'ALAMAT_DRIVER' => $this->input->post('alamat_driver'),
                      'NO_HP'		=> $this->input->post('no_hp'),
                  	  'HARGA_DRIVER' => $this->input->post('harga_driver')
        );

    	$this->db->insert('tb_driver', $data);
    	$this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    	return $r;
	}

	public function detil_edit_driver($id)
	{
		return $this->db->get_where('tb_driver', array('id_driver' => $id))
						->row();
	}

	public function edit_driver($id)
	{
		$data = array('ID_DRIVER'	=> $this->input->post('id_driver'),
                      'NAMA_DRIVER'	=> $this->input->post('nama_driver'),
                  	  'ALAMAT_DRIVER' => $this->input->post('alamat_driver'),
                      'NO_HP'		=> $this->input->post('no_hp'),
                  	  'HARGA_DRIVER' => $this->input->post('harga_driver')
        );

		$this->db->where('ID_DRIVER', $id)->update('tb_driver',$data);
		$this->db->affected_rows() > 0 ? $r = TRUE : $r=FALSE;
    	return $r;
	}

	public function delete_driver($id)
	{
		return $this->db->delete('tb_driver', array('ID_DRIVER'=>$id));
	}
	/* END MODEL DRIVER */


	/* MODEL PETUGAS */
	public function tampil_petugas()
	{
        // menjalankan stored procedure tampil_penerbit()
        $sql_query=$this->db->query("call tampil_petugas()");                     
        mysqli_next_result( $this->db->conn_id);

        if($sql_query->num_rows()>0)
        {
                return $sql_query->result_array();
        }
    }

	public function cek_id_petugas()
  	{
    	$this->db->select('RIGHT(tb_petugas.id_petugas,2) as kode', FALSE);
		$this->db->order_by('id_petugas','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tb_petugas');     

		//cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0)
		{      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;

		} else { 
		   //jika kode belum ada      
		   $kode = 1;    
		}

		$kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "P".$kodemax;    // hasilnya ODJ-9921-0001 dst.
	 	return $kodejadi;
  	}

	/*public function lihat_petugas()
	{
		return $this->db->order_by('ID_PETUGAS', 'ASC')->get('tb_petugas')->result();
	}*/

	public function upload_petugas()
	{
		$data = array('ID_PETUGAS'		=> $this->input->post('id_petugas'),
                      'NAMA_PETUGAS'	=> $this->input->post('nama_petugas'),
                      'NO_HP_PETUGAS'	=> $this->input->post('no_hp_petugas'),
                  	  'USERNAME' 		=> $this->input->post('username'),
                  	  'PASSWORD' 		=> $this->input->post('password')
        );

    	$this->db->insert('tb_petugas', $data);
    	$this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    	return $r;
	}

	public function detil_edit_petugas($id)
	{
		return $this->db->get_where('tb_petugas', array('id_petugas' => $id))
						->row();
	}

	public function edit_petugas($id)
	{
		$data = array('ID_PETUGAS'		=> $this->input->post('id_petugas'),
                      'NAMA_PETUGAS'	=> $this->input->post('nama_petugas'),
                      'NO_HP_PETUGAS'	=> $this->input->post('no_hp_petugas'),
                  	  'USERNAME' 		=> $this->input->post('username')
        );

		$this->db->where('ID_PETUGAS', $id)->update('tb_petugas',$data);
		$this->db->affected_rows() > 0 ? $r = TRUE : $r=FALSE;
    	return $r;
	}

	/*public function delete_petugas($id)
	{
		return $this->db->delete('tb_petugas', array('ID_PETUGAS'=>$id));
	}*/

	public function delete_petugas($id_petugas1)
	{
		$sql_query = $this->db->query("call hapus_petugas('".$id_petugas1."')");
	}
	/* END MODEL DRIVER */


	/* TRANSAKSI */
	public function detil_edit_transaksi($id_transaksi)
	{
		return $this->db->get_where('tb_transaksi', array('id_transaksi' => $id_transaksi))
						->row();
	}

	public function insert_transaksi()
	{
		$data = array(
			'ID_TRANSAKSI' 	=> $this->input->post('id_transaksi'),
			'id_penyewa'	=> $this->input->post('id_penyewa'),
			'id_kendaraan'	=> $this->input->post('id_kendaraan'),
			'id_driver' 	=> $this->input->post('id_driver'),
			'tgl_sewa'		=> $this->input->post('tgl_sewa'),
			'tgl_kembali'	=> $this->input->post('tgl_kembali'),
			'lama_sewa'		=> $this->input->post('lama_sewa'),
			'total_sewa'	=> $this->input->post('total_sewa'),
			'stock_t'		=> $this->input->post('stock_t')
		);

		$this->db->insert('tb_transaksi', $data);
		$this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    	return $r;

	}

	var $tbale = 'tb_transaksi';
	public function select($table)
	{
		$query = $this->db->select('*')
						  ->from($table)
						  ->get();

		return $query->result_array();
	}

	public function get_mobil_by_id($table,$where)
	{
		$query = $this->db->select('*')
						->from($table)
						->where($where)
						->get();
		return $query->result_array();
	}

	public function update_stock_mobil($table,$data,$where)
	{
		$this->db->where($where);
        $this->db->set($data);
        $this->db->update($table);
	}

	public function lihat()
	{
		$this->db->select('*');
    	$this->db->from('tb_transaksi');
    	$this->db->join('tb_mobil', 'tb_mobil.ID_MOBIL=tb_transaksi.ID_KENDARAAN');
    	$this->db->join('tb_penyewa', 'tb_transaksi.id_penyewa=tb_penyewa.id_penyewa');
    	$this->db->join('tb_driver', 'tb_driver.id_driver=tb_transaksi.id_driver');
    	$this->db->order_by('tb_transaksi.tgl_sewa','desc');

    	return $this->db->get()->result();
	}

	public function kembali($id, $denda)
  	{
  		if ($denda == 0)
  		{
      		$status = 'Sudah Kembali';
    	} else {
      		$status = 'Terlambat Kembali';
    	}
    	

    	$data = array('DENDA'  => $denda,
                  	  'STATUS' => $status
        );

    	$this->db->where('ID_TRANSAKSI',$id)->update('tb_transaksi',$data);

    	$ID_MOBIL = $this->db->select('ID_KENDARAAN')->where('ID_TRANSAKSI', $id)->get('tb_transaksi')->result_array();
    	$ID_MOBIL = array_shift($ID_MOBIL)['ID_KENDARAAN'];

    	$ID_DRIVER = $this->db->select('ID_DRIVER')->where('ID_TRANSAKSI', $id)->get('tb_transaksi')->result_array();
    	$ID_DRIVER  = array_shift($ID_DRIVER)['ID_DRIVER'];

    	$data = array('STATUS_C' => 'Tersedia');
    	$this->db->where('ID_MOBIL',$ID_MOBIL)->update('tb_mobil',$data);

    	$data = array('STATUS_D' => 'Tersedia');
    	$this->db->where('ID_DRIVER',$ID_DRIVER)->update('tb_driver',$data);

    	$this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    	return $r;
  	}

	/* END TRANSAKSI */
	

}

/* End of file admin_m.php */
/* Location: ./application/models/admin_m.php */