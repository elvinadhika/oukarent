

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('<?php echo base_url(); ?>assets/images/hero_2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>FORM PENYEWAAN</h1>
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

          <h2>YOUR ORDER DETILS HERE!</h2>
          <p>Outlet Kesayangan Anda Rent</p>
          <p>Your only one solution for an exciting journey in Pulau Dewata, Bali</p>

        </div>
      </div>

        <div class="row">
          <div class="col-lg-8 mb-5" >

            <?php
              $notif = $this->session->flashdata('notif');
              if (!empty($notif))
                echo "<div class='alert alert-danger'>$notif</div>";
            ?>

            <form method="post" action="<?php echo base_url('home/hasil_transaksi_v/$data->id_transaksi');?>" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Sewa</label>
                        <div class="col-xs-8">
                            <input name="tgl_sewa" class="form-control" type="date" value="<?php echo $data->tgl_sewa?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Kembali</label>
                        <div class="col-xs-8">
                            <input name="tgl_kembali" class="form-control" type="date" value="<?php echo $data->tgl_kembali?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >TOTAL PEMBAYARAN</label>
                        <div class="col-xs-8">
                            <input name="total_sewa" class="form-control" type="number" value="<?php echo $data->total_sewa?>" readonly>
                        </div>
                    </div>
                    
                    <!--
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Total Sewa</label>
                        <div class="col-xs-8">
                            <input name="total_sewa" class="form-control" type="text" placeholder="Total Sewa" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah kendaraan</label>
                        <div class="col-xs-8">
                            <input name="stock_t" class="form-control" type="text" placeholder="Jumlah" required>
                        </div>
                    </div>
                  -->
 
                </div>

            </form>
          </div>
        </div>
      </div>
    </div>