

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('<?php echo base_url(); ?>assets/images/hero_2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>DAFTAR PEMESANAN</h1>
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

          <h2>CHECK YOUR ORDERS HERE</h2>
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

              <?php
                          $notif = $this->session->flashdata('notif');
                          if (!empty($notif))
                            echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                          ?>
                          
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Penyewa</th>
                                        <th>Mobil</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($peminjaman as $pinjam): ?>
                                    <tr>
                                    <td><?php echo $pinjam->nama_penyewa; ?></td>
                                    <td><?php echo $pinjam->merk; ?></td>
                                    <td><?php $tanggalkembali = date_create($pinjam->tgl_kembali);echo date_format($tanggalkembali, "d M Y"); ?></td>
                                    <td><?php echo $pinjam->status; ?></td>
                                  </tr>
                                  <?php endforeach; ?></tbody>
                            </table>

            </form>
          </div>
        </div>

      </div>
    </div>