<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_m');
		$this->load->model('admin_m');
		$this->load->library('form_validation');
		$this->load->library('cart');
	}

	public function index()
	{
		$data['car'] = $this->home_m->get_car();
		$data['motor'] = $this->home_m->get_motor();
		$data['data'] = $this->home_m->get_penyewa($this->session->userdata('id_penyewa'));

		$data['panggil_view'] = 'home/cars_v';
		$this->load->view('home/home_template', $data);
	}

	/* LOGIN DAN REGISTER */
	public function register()
	{
		$dariDB = $this->home_m->cek_id_penyewa();
		$no = substr($dariDB, 1, 2);
		$id_penyewa_new = $no + 1;
		$data = array('id_penyewa' => $id_penyewa_new);
		$this->load->view('home/register_v', $data);
	}

	public function tambah_user() 
	{
		if($this->input->post('submit'))
		{
			//$this->form_validation->set_rules('id_penyewa', 'ID Penyewa', 'trim|required');
			$this->form_validation->set_rules('nama_penyewa', 'Nama', 'trim|required');
			$this->form_validation->set_rules('alamat_penyewa', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('no_hp_penyewa', 'Nomor HP', 'trim|required');
			$this->form_validation->set_rules('email_penyewa', 'Email', 'trim|required');
			$this->form_validation->set_rules('username_penyewa', 'Username', 'trim|required');
			$this->form_validation->set_rules('password_penyewa', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE) 
			{
				$config['upload_path'] = './uploads/ktp/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '2000';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto'))
				{
					if($this->home_m->upload_ktp($this->upload->data()) == TRUE)
					{
						$this->session->set_flashdata('notif', 'Tambah Berhasil');
						redirect('home/login_user');
					} else {
						$this->session->set_flashdata('notif', 'Pendaftaran Gagal');
						redirect('hihihi');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('huhuhu');
				}

			} else {
				redirect('hehehe');
			}

		} else {
			redirect('hohoho');
		}	
	}

	public function login_user()
	{
		$this->load->view('home/user_login_v');
	}

	public function masuk()
  	{
    	if($this->input->post('submit')) {
      		$this->form_validation->set_rules('username_penyewa', 'Username', 'trim|required');
      		$this->form_validation->set_rules('password_penyewa', 'Password', 'trim|required');

      		if($this->form_validation->run() == TRUE){

        		if($this->home_m->cek_user() == TRUE){

      				$this->session->set_userdata($session);

        			$data['notif'] = 'Login Berhasil';
          			redirect('home');

        		} else {
          			$data['notif'] = 'Login Gagal';
          			redirect('haha');
        		} 
      		} else {
        		$data['notif'] = validation_errors();
        		redirect('hihi');
      		}
    	} else {
      		$data['notif'] = 'Login Gagal';
      		redirect('haha');
    	}
  	}

  	public function logout()
  	{
    	$this->session->sess_destroy();
    	redirect('home','refresh');
    	//$data['panggil_view'] = 'home/cars_v';
		//$this->load->view('home/home_template', $data);
  	}
	/* END LOGIN DAN REGISTER */


	/* KONTAK */
	public function view_penyewa()
  	{
  		if ($this->session->userdata('logged_in') == TRUE) 
		{
			$data['data'] = $this->home_m->get_penyewa($this->session->userdata('id_penyewa'));

      		$data['panggil_view'] = 'home/contact_v';
			$this->load->view('home/home_template', $data);
    	} 

    	else {
    		redirect('home/login_user');
    	}
  	}
  	

	public function edit_kontak($id)
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$this->form_validation->set_rules('id_penyewa', 'ID PENYEWA', 'trim|required');
			$this->form_validation->set_rules('nama_penyewa', 'NAMA', 'trim|required');
			$this->form_validation->set_rules('alamat_penyewa', 'NO HP', 'trim|required');
			$this->form_validation->set_rules('no_hp_penyewa', 'NO HP', 'trim|required');
			$this->form_validation->set_rules('email_penyewa', 'EMAIL', 'trim|required');
			$this->form_validation->set_rules('username_penyewa', 'USERNAME', 'trim|required');


			if ($this->form_validation->run() == TRUE) {

				$this->home_m->edit_penyewa($this->input->post('id_penyewa'));

				if($this->db->affected_rows())
				{
					$this->session->set_flashdata('notif', 'Edit data Berhasil');
					redirect('home/view_penyewa');
				} else {
					$this->session->set_flashdata('notif', 'Edit data Gagal');
					redirect('hihi');
				}
				
			} else {
				$this->session->set_flashdata('notif', 'Edit data Gagal');
				redirect('hoho');
			}
		}
	}

	public function edit_car($id)
	{
		$this->form_validation->set_rules('id_mobil', 'ID MOBIL', 'trim|required');
		$this->form_validation->set_rules('stock', 'STOCK', 'trim|required');
		$this->form_validation->set_rules('merk', 'MERK', 'trim|required');
		$this->form_validation->set_rules('door', 'DOOR', 'trim|required');
		$this->form_validation->set_rules('seats', 'SEATS', 'trim|required');
		$this->form_validation->set_rules('transmission', 'TRANSMISSION', 'trim|required');
		$this->form_validation->set_rules('harga_sewa', 'HARGA SEWA', 'trim|required');


		if ($this->form_validation->run() == TRUE) {

			$this->admin_m->edit_mobil($this->input->post('id_mobil'));

				if($this->db->affected_rows())
				{
					$this->session->set_flashdata('notif', 'Edit data Berhasil');
					redirect('admin');
				} else {
					$this->session->set_flashdata('notif', 'Edit data Gagal');
					redirect('hihi');
				}
				
			} else {
				$this->session->set_flashdata('notif', 'Edit data Gagal');
				redirect('hoho');
			}
	}
	/* END KONTAK */


	/* TRANSAKSI */
	public function lihat($id)
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$data['panggil_view']	= 'home/transaksi_v';
			$data['data'] 			= $this->admin_m->detil_edit_mobil($id);
			$data['user'] 			= $this->home_m->get_penyewa($this->session->userdata('id_penyewa'));
			$data['kode_transaksi'] = $this->home_m->cek_id_transaksi();
				//$data['mobil'] 		= $this->home_m->get_mobil();
			$data['driver'] 	    = $this->home_m->driver();
			
			$this->load->view('home/home_template', $data);
		} else {
			$this->session->set_flashdata('notif', 'Anda Belum Login, Silahkan Login Terlebih Dahulu');
			redirect('home');
		}
	}

	public function hasil_transaksi_v($id) 
	{
		$data['panggil_view'] 	= 'home/transaksi_hasil_v';
		$data['data'] 			= $this->home_m->hasil_transaksi($id);
		$this->load->view('home/home_template', $data);
	}

	public function view_transaksi()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			$data['data'] 		= $this->home_m->get_penyewa($this->session->userdata('id_penyewa'));
			$data['kode_transaksi'] = $this->home_m->cek_id_transaksi();
			//$data['mobil'] 		= $this->home_m->get_mobil();
			$data['driver'] 	= $this->home_m->driver();

      		$data['panggil_view'] = 'home/transaksi_v';
			$this->load->view('home/home_template', $data);
		} else {
			redirect('home');
		}
	}

	public function tambah_transaksi()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('tgl_sewa', 'Tanggal Kembali', 'trim|required');
				$this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'trim|required');
				$id = $this->input->post('id_transaksi');

				if ($this->form_validation->run() == TRUE)
				{
					if ($this->home_m->tambah() == TRUE)
					{
						$this->session->set_flashdata('notif', 'Penyewaan Berhasil');
						redirect('home/hasil_transaksi_v/'.$id);
					} else {
						$this->session->set_flashdata('notif', 'Peminjaman Gagal');
						redirect('haha');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('hihi');
				}

			} else {
				redirect('huhu');
			}
		} else {
			
			redirect('hehe');
		}
	}

	public function view_all_transaksi()
  	{
  		if ($this->session->userdata('logged_in') == TRUE) 
		{
			$data['peminjaman'] = $this->home_m->get_transaksi_by_penyewa($this->session->userdata('id_penyewa'));
			
      		$data['panggil_view'] = 'home/transaksi_all_v';
			$this->load->view('home/home_template', $data);
    	} 

    	else {
    		redirect('home/login_user');
    	}
  	}

	/* END TRANSAKSI */

	public function services_v()
	{
		$data['panggil_view'] = 'home/services_v';
		$this->load->view('home/home_template', $data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */