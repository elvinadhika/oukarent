

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('<?php echo base_url(); ?>assets/images/hero_2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>YOUR ACCOUNT</h1>
              <p>Outlet Kesayangan Anda Rent</p>
              <p>Your only one solution for an exciting journey in Pulau Dewata, Bali</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">

          <h2>Y O U R - A C C O U N T</h2>
          <p>Outlet Kesayangan Anda Rent</p>
          <p>Your only one solution for an exciting journey in Pulau Dewata, Bali</p>

        </div>
      </div>

        <div class="row">
          <div class="col-lg-8 mb-5" >
            <form method="post" action="<?php echo base_url('index.php/home/edit_kontak/');?>" enctype="multipart/form-data">

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" value="<?php echo $data->id_penyewa?>" name="id_penyewa" readonly>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" value="<?php echo $data->nama_penyewa?>" name="nama_penyewa">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" value="<?php echo $data->alamat_penyewa?>" name="alamat_penyewa">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" value="<?php echo $data->no_hp_penyewa?>" name="no_hp_penyewa">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" value="<?php echo $data->email_penyewa?>" name="email_penyewa">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" value="<?php echo $data->username_penyewa?>" name="username_penyewa">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
                  <input type="reset" class="btn btn-default" value="Reset">
                </div>
              </div>

            </form>
          </div>

          <div class="col-lg-4 ml-auto">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-black mb-4">Contact Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black">Address:</span>
                  <span>Denpasar, Bali</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+62 834 882 290</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>oukarent@yourdomain.com</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


    


