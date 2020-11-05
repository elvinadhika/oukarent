<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
		$this->load->library('cart');
	} 

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) 
		{
			$data['jum_petugas']	= $this->admin_m->get_petugas1();
		    $data['jum_penyewa']	= $this->admin_m->get_penyewa1();
		    $data['jum_mobil'] 		= $this->admin_m->get_mobil1();
		    $data['jum_motor'] 		= $this->admin_m->get_motor1();
		    $data['jum_driver'] 	= $this->admin_m->get_driver1();
		    $data['jum_transaksi'] 	= $this->admin_m->get_transaksi();

			$data['panggil_view'] = 'admin/dashboard';
			$this->load->view('admin/template_admin', $data);
		} else {
			$this->load->view('admin/login_admin_v');
		}
	} 

	public function masuk()
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE)
			{
				if($this->admin_m->cek_petugas() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Login berhasil');
					redirect('admin');
				} else {
          			$this->session->set_flashdata('notif', 'Login Gagal');
         			redirect('haha');
        		} 				

			} else {
        		$this->session->set_flashdata('notif', validation_errors());
        		redirect('hihi');
			}
		} else {
			$data['notif'] = 'Login Gagal';
      		redirect('huhu');
		}
	}

	public function logout()
  	{
    	$this->session->sess_destroy();
    	$this->load->view('admin/login_admin_v');
  	}

  	/* MOBIL */
  	public function view_mobil()
  	{
  		if ($this->session->userdata('logged_in') == TRUE) 
		{
			$data['kode_mobil'] = $this->admin_m->cek_id_mobil();

			$data['tb_mobil'] = $this->admin_m->lihat_mobil();
      		$data['panggil_view'] = 'admin/mobil_v';
			$this->load->view('admin/template_admin', $data);
    	} 

    	else {
    		$this->load->view('admin/login_admin_v');
    	}
  	} 

	public function tambah_mobil()
	{
		if ($this->session->userdata('logged_in') == TRUE) 
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('id_mobil', 'STOCK', 'trim|required');
				$this->form_validation->set_rules('merk', 'MERK', 'trim|required');
				$this->form_validation->set_rules('status_c', 'TRANSMISSION', 'trim|required');
				$this->form_validation->set_rules('transmission', 'TRANSMISSION', 'trim|required');
				$this->form_validation->set_rules('harga_sewa', 'HARGA_SEWA', 'trim|required');
				$this->form_validation->set_rules('seats', 'TRANSMISSION', 'trim|required');
				$this->form_validation->set_rules('door', 'HARGA_SEWA', 'trim|required');
				$this->form_validation->set_rules('jenis', 'HARGA_SEWA', 'trim|required');
				

				if ($this->form_validation->run() == TRUE) {

					$config['upload_path'] = './uploads/kendaraan/';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size'] = '2000';

					$this->load->library('upload', $config);

					if($this->upload->do_upload('foto_kendaraan'))
					{
						if($this->admin_m->upload_mobil($this->upload->data())== TRUE)
						{
							$this->session->set_flashdata('notif', 'Tambah Berhasil');
							redirect('admin/view_mobil');
						} else {
							$this->session->set_flashdata('notif', 'Pendaftaran Gagal');
							redirect('hihihi');
						}
					} else {
						$this->session->set_flashdata('notif', validation_errors());
						redirect('hehehe');
					}

				} else {
					redirect('hihi');
				}
			} else {
				redirect('hohoho');
			}
		}
	}

	public function hapus_mobil($id)
	{
		if ($this->admin_m->delete_mobil($id) == TRUE) {
				$this->session->set_flashdata('notif', 'Hapus Data Berhasil');
				redirect('admin/index');
			} else {
				$this->session->set_flashdata('notif','Hapus Data Gagal');
				redirect('haha');
			}
	}

	public function edit_car_v($id) 
	{
		if ($this->session->userdata('logged_in') == TRUE) 
		{
			$data['panggil_view'] = 'admin/mobil_edit_v';
			$data['data'] = $this->admin_m->detil_edit_mobil($id);
			$this->load->view('admin/template_admin', $data);
		}  else {
			$this->load->view('admin/login_admin_v');
		}
	}

	public function edit_car($id)
	{
		$this->form_validation->set_rules('id_mobil', 'ID MOBIL', 'trim|required');
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
	/* MOBIL END */


	/* MOTOR */
  	public function view_motor()
  	{
  		if ($this->session->userdata('logged_in') == TRUE) 
		{
			$data['kode_mobil'] = $this->admin_m->cek_id_mobil();

			$data['motor'] = $this->admin_m->lihat_motor();
      		$data['panggil_view'] = 'admin/motor_v';
			$this->load->view('admin/template_admin', $data);
    	} 

    	else {
    		$this->load->view('admin/login_admin_v');
    	}
  	}

	public function tambah_motor()
	{
		if ($this->session->userdata('logged_in') == TRUE) 
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('id_mobil', 'STOCK', 'trim|required');
				$this->form_validation->set_rules('status_c', 'TRANSMISSION', 'trim|required');
				$this->form_validation->set_rules('transmission', 'TRANSMISSION', 'trim|required');
				$this->form_validation->set_rules('harga_sewa', 'HARGA_SEWA', 'trim|required');
				$this->form_validation->set_rules('jenis', 'HARGA_SEWA', 'trim|required');
				

				if ($this->form_validation->run() == TRUE) {

					$config['upload_path'] = './uploads/kendaraan/';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size'] = '2000';

					$this->load->library('upload', $config);

					if($this->upload->do_upload('foto_kendaraan'))
					{
						if($this->admin_m->upload_motor($this->upload->data())== TRUE)
						{
							$this->session->set_flashdata('notif', 'Tambah Berhasil');
							redirect('admin/view_motor');
						} else {
							$this->session->set_flashdata('notif', 'Pendaftaran Gagal');
							redirect('hihihi');
						}
					} else {
						$this->session->set_flashdata('notif', validation_errors());
						redirect('hehehe');
					}

				} else {
					redirect('hihi');
				}
			} else {
				redirect('hohoho');
			}
		}
	}

	public function hapus_motor($id)
	{
		if ($this->admin_m->delete_motor($id) == TRUE) {
				$this->session->set_flashdata('notif', 'Hapus Data Berhasil');
				redirect('admin/index');
			} else {
				$this->session->set_flashdata('notif','Hapus Data Gagal');
				redirect('haha');
			}
	}

	public function edit_motor_v($id)
	{
		$data['panggil_view'] = 'admin/motor_edit_v';
		$data['data'] = $this->admin_m->detil_edit_motor($id);
		$this->load->view('admin/template_admin', $data);
	}

	public function edit_motor($id)
	{
		$this->form_validation->set_rules('id_motor', 'ID MOTOR', 'trim|required');
		$this->form_validation->set_rules('stock_m', 'STOCK', 'trim|required');
		$this->form_validation->set_rules('merk_m', 'MERK', 'trim|required');
		$this->form_validation->set_rules('transmission_m', 'TRANSMISSION', 'trim|required');
		$this->form_validation->set_rules('harga_sewa_m', 'HARGA SEWA', 'trim|required');


		if ($this->form_validation->run() == TRUE) {

			$this->admin_m->edit_motor($this->input->post('id_motor'));

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
	/* MOTOR END */


	/* PENYEWA */
	public function view_penyewa()
  	{
  		if ($this->session->userdata('logged_in') == TRUE) 
		{
			$data['penyewa'] = $this->admin_m->lihat_penyewa();
      		$data['panggil_view'] = 'admin/penyewa_v';
			$this->load->view('admin/template_admin', $data);
    	} 

    	else {
    		$this->load->view('admin/login_admin_v');
    	}
  	}

  	public function hapus_penyewa($id)
	{
		if ($this->admin_m->delete_penyewa($id) == TRUE) {
				$this->session->set_flashdata('notif', 'Hapus Data Berhasil');
				redirect('admin/index');
			} else {
				$this->session->set_flashdata('notif','Hapus Data Gagal');
				redirect('haha');
			}
	}
  	/* END PENYEWA */


  	/* DRIVER */
  	public function view_driver()
  	{
  		if ($this->session->userdata('logged_in') == TRUE) 
		{
			$data['kode_driver'] = $this->admin_m->cek_id_driver();

			$data['driver'] = $this->admin_m->lihat_driver();
      		$data['panggil_view'] = 'admin/driver_v';
			$this->load->view('admin/template_admin', $data);
    	} 

    	else {
    		$this->load->view('admin/login_admin_v');
    	}
  	}

	public function tambah_driver()
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('id_driver', 'ID DRIVER', 'trim|required');
			$this->form_validation->set_rules('nama_driver', 'NAMA', 'trim|required');
			$this->form_validation->set_rules('alamat_driver', 'ALAMAT', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'NO HP', 'trim|required');
			$this->form_validation->set_rules('harga_driver', 'HARGA', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				//insert data berhasil
				if($this->admin_m->upload_driver() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Tambah Berhasil');
					redirect('admin/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah Gagal');
					redirect('hihihi');
				}

			} else {
				redirect('hehehe');
			}
		} else {
			redirect('hohoho');
		}
	}

	public function hapus_driver($id)
	{
		if ($this->admin_m->delete_driver($id) == TRUE) {
				$this->session->set_flashdata('notif', 'Hapus Data Berhasil');
				redirect('admin/index');
			} else {
				$this->session->set_flashdata('notif','Hapus Data Gagal');
				redirect('haha');
			}
	}

	public function edit_driver_v($id)
	{
		$data['panggil_view'] = 'admin/driver_edit_v';
		$data['data'] = $this->admin_m->detil_edit_driver($id);
		$this->load->view('admin/template_admin', $data);
	}

	public function edit_driver($id)
	{
		$this->form_validation->set_rules('id_driver', 'ID DRIVER', 'trim|required');
		$this->form_validation->set_rules('nama_driver', 'NAMA', 'trim|required');
		$this->form_validation->set_rules('alamat_driver', 'ALAMAT', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'NO HP', 'trim|required');
		$this->form_validation->set_rules('harga_driver', 'HARGA', 'trim|required');


		if ($this->form_validation->run() == TRUE) {

			$this->admin_m->edit_driver($this->input->post('id_driver'));

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
	/* END DRIVER */


	/* PETUGAS */
	public function tampil_petugas_v()
	{
		$data['kode_petugas'] = $this->admin_m->cek_id_petugas();

		$data['petugas'] 	  = $this->admin_m->tampil_petugas();
		$data['panggil_view'] ='admin/petugas_v';
        $this->load->view('admin/template_admin',$data);
	}

	/*
  	public function view_petugas()
  	{
  		if ($this->session->userdata('logged_in') == TRUE) 
		{
			$data['kode_petugas'] 	= $this->admin_m->cek_id_petugas();

			$data['petugas'] 		= $this->admin_m->lihat_petugas();
      		$data['panggil_view'] 	= 'admin/petugas_v';
			$this->load->view('admin/template_admin', $data);
    	} 

    	else {
    		$this->load->view('admin/login_admin_v');
    	}
  	}
  	*/

	public function tambah_petugas()
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('id_petugas', 'ID PETUGAS', 'trim|required');
			$this->form_validation->set_rules('nama_petugas', 'NAMA', 'trim|required');
			$this->form_validation->set_rules('no_hp_petugas', 'NO HP', 'trim|required');
			$this->form_validation->set_rules('username', 'USERNAME', 'trim|required');
			$this->form_validation->set_rules('password', 'PASSWORD', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				//insert data berhasil
				if($this->admin_m->upload_petugas() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Tambah Berhasil');
					redirect('admin/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah Gagal');
					redirect('hihihi');
				}

			} else {
				redirect('hehehe');
			}
		} else {
			redirect('hohoho');
		}
	}

	public function delete_petugas($id_petugas)
	{
		$this->admin_m->delete_petugas($id_petugas);
		redirect('admin/tampil_petugas_v');

		

		/*if ($this->admin_m->delete_petugas($id) == TRUE) {
				$this->session->set_flashdata('notif', 'Hapus Data Berhasil');
				redirect('admin/index');
			} else {
				$this->session->set_flashdata('notif','Hapus Data Gagal');
				redirect('haha');
			}*/
	}

	public function edit_petugas_v($id)
	{
		$data['panggil_view'] = 'admin/petugas_edit_v';
		$data['data'] = $this->admin_m->detil_edit_petugas($id);
		$this->load->view('admin/template_admin', $data);
	}

	public function edit_petugas($id)
	{
		$this->form_validation->set_rules('id_petugas', 'ID DRIVER', 'trim|required');
		$this->form_validation->set_rules('nama_petugas', 'NAMA', 'trim|required');
		$this->form_validation->set_rules('no_hp_petugas', 'NO HP', 'trim|required');
		$this->form_validation->set_rules('username', 'USERNAME', 'trim|required');


		if ($this->form_validation->run() == TRUE) {

			$this->admin_m->edit_petugas($this->input->post('id_petugas'));

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
	/* END PETUGAS */


	/* TRANSAKSI */
	public function view_transaksi()
	{
		if ($this->session->userdata('logged_in') == TRUE)
		{
			$data['peminjaman'] = $this->admin_m->lihat();

			$data['panggil_view']='admin/transaksi_v';
			$this->load->view('admin/template_admin',$data);
		}  else {
			$this->load->view('admin/login_admin_v');
		}
	}

	public function kembali()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(3);
			// if ($this->uri->segment(4) == '') {
			// 	$denda = $this->uri->segment(4);
			// } else {
			// 	echo "ha";
			// }
			$denda = $this->uri->segment(4);

			if ($this->admin_m->kembali($id,$denda) == TRUE)
			{
				$this->session->set_flashdata('notif', 'Pengembalian Berhasil');
				redirect('admin/view_transaksi');
			} else {
				$this->session->set_flashdata('notif', 'Pengembalian Gagal');
				redirect('haha');
			}
		} else {
			redirect('hihi');
		}
	}

	/* END TRANSAKSI */

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */