<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
    $this->load->library('cart');
	}
 
	/* LOGIN DAN REGISTER */
	public function upload_ktp($foto)
  	{
    	$data = array(
                  	  'NAMA_PENYEWA'    => $this->input->post('nama_penyewa'),
                  	  'ALAMAT_PENYEWA'  => $this->input->post('alamat_penyewa'),
                  	  'NO_HP_PENYEWA'   => $this->input->post('no_hp_penyewa'),
                  	  'EMAIL_PENYEWA'   => $this->input->post('email_penyewa'),
                  	  'USERNAME_PENYEWA'=> $this->input->post('username_penyewa'),
                  	  'PASSWORD_PENYEWA'=> $this->input->post('password_penyewa'),
                  	  'FOTO'            => $foto['file_name']
        );

      	$this->db->insert('tb_penyewa', $data);
      	$this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
      	return $r;
  	}

  	public function cek_user()
    {
		  $username = $this->input->post('username_penyewa');
		  $password = $this->input->post('password_penyewa');

    	$query = $this->db->where('username_penyewa',$username)
                      	->where('password_penyewa',$password)
                        ->get('tb_penyewa');

    	if ($query->num_rows() > 0) 
    	{
      		$data_penyewa = $query->row();
      		$session = array(
      			'logged_in'		=> TRUE,
      			'id_penyewa'	=> $data_penyewa->id_penyewa,
      			'nama_penyewa'	=> $data_penyewa->nama_penyewa,
      			'no_hp_penyewa'	=> $data_penyewa->no_hp_penyewa
      		);

      		$this->session->set_userdata($session);

      		return TRUE;
    	} else {
      		return FALSE;
   		}
	}
	/* END LOGIN DAN REGISTER */


	/* VIEW MOBIL */
	public function get_car()
	{
		return $this->db->select('*')
						->from('tb_mobil')
            ->where('STATUS_C', 'TERSEDIA')
            ->where('jenis', 'Mobil')
						->get()
						->result();
	}

	public function lihat()
	{
		return $this->db->order_by('ID_MOBIL','DESC')
            ->where('STATUS_C', 'TERSEDIA')
            ->where('jenis', 'Mobil')
						->get('tb_mobil')
						->result();
	}
	/* END VIEW MOBIL */


	/* VIEW MOTOR */
	public function get_motor()
	{
		return $this->db->select('*')
            ->from('tb_mobil')
            ->where('STATUS_C', 'TERSEDIA')
            ->where('jenis', 'Motor')
            ->get()
            ->result();
	}

	public function lihat_motor()
	{
		return $this->db->order_by('ID_MOBIL','DESC')
            ->where('STATUS_C', 'TERSEDIA')
            ->where('jenis', 'Motor')
            ->get('tb_mobil')
            ->result();
	}
	/* END VIEW MOTOR */


	/* KONTAK */
  public function cek_id_penyewa()
  {
    $query = $this->db->query("SELECT MAX(id_penyewa) as id_penyewa from tb_penyewa");
    $hasil = $query->row();
    return $hasil->id_penyewa;
  }

  public function get_penyewa($id)
  {
    	return $this->db->get_where('tb_penyewa', array('id_penyewa' => $id))
                    	->row();
  }

  public function get_transaksi_by_penyewa($id)
  {
      $this->db->from('tb_transaksi')
               ->join('tb_penyewa', 'tb_transaksi.id_penyewa = tb_penyewa.id_penyewa')
               ->join('tb_mobil', 'tb_mobil.ID_MOBIL=tb_transaksi.ID_KENDARAAN')
               ->where('tb_penyewa.id_penyewa', $this->session->userdata('id_penyewa'));

      return $this->db->get()->result();
  }


  public function detil_edit_mobil($id_mobil)
  {
      return $this->db->get_where('tb_mobil', array('ID_MOBIL' => $id_mobil))
                      ->row();
  }

   public function detil_edit_penyewa($id)
  {
      return $this->db->get_where('tb_penyewa', array('id_penyewa' => $id))
                      ->row();
  } 	

  	public function edit_penyewa($id)
  	{
    	$data = array('ID_PENYEWA'        => $this->input->post('id_penyewa'),
                  	  'NAMA_PENYEWA'    => $this->input->post('nama_penyewa'),
                  	  'ALAMAT_PENYEWA'  => $this->input->post('alamat_penyewa'),
                  	  'NO_HP_PENYEWA'   => $this->input->post('no_hp_penyewa'),
                  	  'EMAIL_PENYEWA'   => $this->input->post('email_penyewa'),
                  	  'USERNAME_PENYEWA'=> $this->input->post('username_penyewa'),
      );

    	$this->db->where('ID_PENYEWA', $id)->update('tb_penyewa',$data);
   	  $this->db->affected_rows() > 0 ? $r = TRUE : $r=FALSE;
   	  return $r;
  	}
	/*END KONTAK */


  /* TRANSAKSI */
  public function lihat_harga_mobil($id){
    return $this->db->limit(1)->where('ID_MOBIL',$id)->get('tb_mobil')->result()[0]->harga_sewa;
  }

  public function lihat_harga_driver($id){
    return $this->db->limit(1)->where('ID_DRIVER',$id)->get('tb_driver')->result()[0]->harga_driver;
  }


  public function mobil()
  {
    return $this->db->where('STATUS_C', 'TERSEDIA')->get('tb_mobil')->result();
  }

  public function driver()
  {
    return $this->db->order_by('ID_DRIVER','ASC')
                    ->where('status_d', 'Tersedia')
                    ->get('tb_driver')
                    ->result();
  }

  public function transaksi()
  {
    return $this->db->order_by('ID_TRANSAKSI','ASC')
                    ->get('tb_driver')
                    ->result();
  }

  public function cek_id_transaksi()
  {
    $this->db->select('RIGHT(tb_transaksi.id_transaksi,2) as kode', FALSE);
    $this->db->order_by('id_transaksi','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('tb_transaksi');     

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
    $kodejadi = "T".$kodemax;    // hasilnya ODJ-9921-0001 dst.
    return $kodejadi;
  }

  public function tambah()
  {
    $t_pinjam       = date_create($this->input->post('tgl_sewa'));
    $t_kembali      = date_create($this->input->post('tgl_kembali'));
    $interval_hari  = date_diff($t_pinjam,$t_kembali)->days;

    $total_mobil    = ($this->lihat_harga_mobil($this->input->post('id_kendaraan')))*$interval_hari;
    $total_driver   = ($this->lihat_harga_driver($this->input->post('id_driver')))*$interval_hari;

    $totaljadi      = $total_driver + $total_mobil;

    $pinjam         = array('ID_TRANSAKSI'=> $this->input->post('id_transaksi'),
                            'ID_PENYEWA'  => $this->input->post('id_penyewa'),
                            'ID_DRIVER'   => $this->input->post('id_driver'),
                            'ID_KENDARAAN'=> $this->input->post('id_kendaraan'),
                            'TGL_SEWA'    => $this->input->post('tgl_sewa'),
                            'TGL_KEMBALI' => $this->input->post('tgl_kembali'),
                            'STATUS'      => 'Belum Kembali',
                            'TOTAL_SEWA'  => $totaljadi
    );

    $this->db->insert('tb_transaksi', $pinjam);

    $data = array('status_c' => 'Disewa');
    $this->db->where('ID_MOBIL',$this->input->post('id_kendaraan'))->update('tb_mobil',$data);

    $data = array('status_d' => 'Disewa');
    $this->db->where('ID_DRIVER',$this->input->post('id_driver'))->update('tb_driver',$data);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else{
      return false;
    }
    
  }

  public function hasil_transaksi($id)
  {
    return $this->db->get_where('tb_transaksi', array('id_transaksi' => $id))
            ->row();

    if ($query->num_rows() > 0) 
      {
          $data_transaksi = $query->row();
          $session = array(
            'logged_in'   => TRUE,
            'id_transaksi'  => $data_transaksi->id_transaksi
          );

          $this->session->set_userdata($session);

          return TRUE;
      } else {
          return FALSE;
      }
  }

  /* END TRANSAKSI */
	

}

/* End of file home_m.php */
/* Location: ./application/models/home_m.php */