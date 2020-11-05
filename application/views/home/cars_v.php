

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('<?php echo base_url(); ?>assets/images/hero_2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>O U K A R E N T</h1>
              <p>Your only one solution for an exciting journey in Pulau Dewata, Bali</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      $notif = $this->session->flashdata('notif');
      if (!empty($notif))
        echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
    ?>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          
            <?php
              foreach ($car as $data) {
                echo '
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="item-1" id="car'.$data->id_mobil.'">
                <a href="'.base_url('index.php/home/lihat/'.$data->id_mobil.'').'"><img style="height:250px" src="'.base_url('uploads/kendaraan/'.$data->foto_kendaraan.'').'" alt="Image" class="img-fluid"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="#">'.$data->merk.'</a></h3>
                  <div class="rating">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                  </div>
                  <div class="rent-price"><span>Rp.'.$data->harga_sewa.'/</span>day</div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Doors</span>
                      <span class="spec">'.$data->door.'</span>
                    </li>
                    <li>
                      <span>Seats</span>
                      <span class="spec">'.$data->seats.'</span>
                    </li>
                    <li>
                      <span>Transmission</span>
                      <span class="spec">'.$data->transmission.'</span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                    <a href="'.base_url('index.php/home/lihat/'.$data->id_mobil.'').'" class="btn btn-primary">Rent Now</a>
                  </div>
                </div>
              </div>
            </div>
                  ';
                }
              ?>

          <!--MOTOR-->   
          <?php
              foreach ($motor as $data) {
                echo '
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="item-1" id="car'.$data->id_mobil.'">
                <a href="'.base_url('index.php/home/lihat/'.$data->id_mobil.'').'"><img style="height:250px"  src="'.base_url('uploads/kendaraan/'.$data->foto_kendaraan.'').'" alt="Image" class="img-fluid"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="#">'.$data->merk.'</a></h3>
                  <div class="rating">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                  </div>
                  <div class="rent-price"><span>Rp.'.$data->harga_sewa.'/</span>day</div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Transmission</span>
                      <span class="spec">'.$data->transmission.'</span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                    <a href="'.base_url('index.php/home/lihat/'.$data->id_mobil.'').'" class="btn btn-primary">Rent Now</a>
                  </div>
                </div>
              </div>
            </div>
                  ';
                }
              ?>

          <!--
          <div class="col-12">
            <span class="p-3">1</span>
            <a href="#" class="p-3">2</a>
            <a href="#" class="p-3">3</a>
            <a href="#" class="p-3">4</a>
          </div>
        -->

        </div>
      </div>
    </div>
    

    <div class="container site-section mb-5">
      <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2>How it works</h2>
          <p>STEP BY STEP HOW TO ORDER OR RENT A TRANSPORTATION</p>
        </div>
      </div>
      <div class="how-it-works d-flex">
        <div class="step">
          <span class="number"><span>01</span></span>
          <span class="caption"> Login Or Register</span>
        </div>
        <div class="step">
          <span class="number"><span>02</span></span>
          <span class="caption">Pick Your Fav Transportation</span>
        </div>
        <div class="step">
          <span class="number"><span>03</span></span>
          <span class="caption">Order Your Fav Transportation</span>
        </div>
        <div class="step">
          <span class="number"><span>04</span></span>
          <span class="caption">Wait For Confirmation From The Admin</span>
        </div>
        <div class="step">
          <span class="number"><span>05</span></span>
          <span class="caption">Pay Your Orders and HAVE FUN!</span>
        </div>

      </div>
    </div>



    
