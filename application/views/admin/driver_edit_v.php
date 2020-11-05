<div id="page-wrapper">
    <div class="row">
      	<div class="col-lg-12">
        	<h1 class="page-header"> Edit Data Driver</h1>
    	</div>

    	<div class="row">
    		<div class="col-lg-12">
    			<div class="panel panel-default">
					<div class="panel-body">

						<?php
                $notif = $this->session->flashdata('notif');
                if (!empty($notif))
                    echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
            ?>
                		
						<form method="post" action="<?php echo base_url('index.php/admin/edit_driver/');?>" enctype="multipart/form-data">
							<div class="col-lg-6">
								<div class="form-group">
                  <div class="form-group">
                      <label>ID DRIVER</label>
                      <input class="form-control" type="text" name="id_driver" value="<?php echo $data->id_driver?>" required readonly>
                  </div>

                  <div class="form-group">
                      <label>NAMA</label>
                      <input class="form-control" type="text" name="nama_driver" value="<?php echo $data->nama_driver?>" required>
                  </div>

                  <div class="form-group">
                      <label>ALAMAT</label>
                      <input class="form-control" type="text" name="alamat_driver" value="<?php echo $data->alamat_driver?>" required>
                  </div>

                  <div class="form-group">
                      <label>NO HP</label>
                      <input class="form-control" type="text" name="no_hp" value="<?php echo $data->no_hp?>" required>
                  </div>

                  <div class="form-group">
                      <label> BIAYA SEWA </label>
                      <input class="form-control" type="text" name="harga_driver" value="<?php echo $data->harga_driver?>" required>
                  </div>    				

                  				<!--
                  				<div class="form-group">
                        			<label>Foto</label>
                       				<input type='file' id="imgInp" class="form-control" name="foto_kendaraan" required/>
                  				</div>
                  				-->

                  <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
                  <input type="reset" class="btn btn-default" value="Reset">


              </div>
							
						</form>
					</div>    				
    			</div>
    			
    		</div>

    	</div>
	</div>
</div>