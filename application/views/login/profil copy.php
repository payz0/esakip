<section id="main-content"> 
    <section class="wrapper" id="wrap">
            <div class="row" >
                <div id="badan" class="col-md-12" style="background: #ffffff6b;box-shadow: 0px 0px 70px -1px #88888">
                <h5 id="judul" style="    top: -18px;">Data profil</h5>
                    <div class="row">
                        <?php if($this->session->userdata('sebagai') == "pegawai"){?>
                            <div class="col-md-8">    
                                <form action= "<?php echo base_url('login/editStaf')?>" method="post">
                                    <label style="margin-bottom:1px" for="">Nama</label>    
                                    <input class="form-control" type="text" style="width:100%;margin-bottom:5px" placeholder="Nama" name="nama" value="<?php echo $dataAll->nama;?>">
                                    <label  style="margin-bottom:1px" for="">NIP</label>
                                    <label style="background: #aeaeae;" class="form-control"><?php echo $dataAll->nip;?></label>
                                    <label style="margin-bottom:1px" for="">Pangkat</label>
                                    <input class="form-control" type="text" style="width:100%;margin-bottom:5px" placeholder="Pangkat" name="pangkat" value="<?php echo $dataAll->pangkat;?>">
                                    <label style="margin-bottom:1px" for="">Jabatan</label>
                                    <label class="form-control" style="background: #aeaeae;"><?php echo $dataAll->jabatan;?></label>
                                    <label style="margin-bottom:1px" for="">Email</label>
                                    <input class="form-control" type="text" style="width:100%;margin-bottom:5px" placeholder="Email" name="email" value="<?php echo $dataAll->email;?>">
                                    <label style="margin-bottom:1px" for="">Password</label>
                                    <input class="form-control" type="password" style="width:100%;margin-bottom:5px" placeholder="Password" name="password" value="<?php echo substr(base64_decode($dataAll->password),0,strlen(base64_decode($dataAll->password))-4)?>">
                                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                                </form>
                                
                                <br><br>
                            </div>
                            <div class="col-md-3" style="box-shadow: 0px 0px 8px 0px inset black;background: white;padding: 15px;margin: 20px 35px;">
                                <b>Foto Profil</b>
                                <!-- <?php echo form_open_multipart('../login/upload/foto/profil/foto_profil_/profil') ?>
                                    <input type="file" name="file">
                                    <button type="submit">upload</button>
                                </form> -->
                                 <form action="<?php echo base_url();?>login/upload/foto/profil/foto_profil_/profil" class="dropzone" id="zone1">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple  />
                                    </div>
                                </form>
                            </div>
                        <?php } ?>

                        <?php if($this->session->userdata('sebagai') == "admin"){ ?>
                        <div class="col-md-4" ng-show="!admin"> 
                                
                                <form  action="<?php echo base_url('login/editProfil')?>" method="post">
                                    <?php if($this->session->userdata('level_lap') != "admin_kab"){?>
                                        <label style="margin-bottom:1px" for="">SKPD</label>    
                                        <input class="form-control" type="text" style="width:100%;margin-bottom:5px" placeholder="Nama" name="skpd" value="<?php echo $dataAll->skpd;?>">
                                    <?php } ?>
                                    <label style="margin-bottom:1px" for="">Username</label>
                                    <input class="form-control" type="text" style="width:100%;margin-bottom:5px" placeholder="Username" name="username" value="<?php echo $dataAll->username;?>">
                                    <label style="margin-bottom:1px" for="">Password</label>
                                    <input class="form-control" type="password" style="width:100%;margin-bottom:5px" placeholder="Password" name="password" value="<?php echo substr(base64_decode($dataAll->password),0,strlen(base64_decode($dataAll->password))-4)?>">
                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                    <?php if($this->session->userdata('level_lap') == "admin_kab"){?>
                                        <a ng-show="!admin" href="#" ng-click="admin = true" >Tambah Admin</a>
                                    <?php } ?>
                                </form>
                        </div>
                                <!-- <br><br> -->
                                    <?php if($this->session->userdata('level_lap') == "admin_kab"){?>
                                    <!-- <div class="row"> -->
                                        
                                        <div class="col-md-4" ng-show="admin">
                                            
                                            <form  action="<?php echo base_url('login/tambahAdmin')?>" method="post">
                                                    <label style="margin-bottom:1px" for="">Username</label>
                                                    <input class="form-control" type="text" style="width:100%;margin-bottom:5px" placeholder="Username" name="username" >
                                                    <label style="margin-bottom:1px" for="">Password</label>
                                                    <input class="form-control" type="password" style="width:100%;margin-bottom:5px" placeholder="Password" name="password" >
                                                    <button class="btn btn-primary btn-sm" type="submit" ng-click="admin = false">Tambah</button>
                                                    <a href="#" class="btn btn-danger btn-sm" ng-click="admin = false">Batal</a>
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            <b>Daftar Admin Kabupaten</b>
                                            <ol>
                                                <?php
                                                $datas = $this->db->get_where('tabel_skpd',array('level_lap'=>'admin_kab'))->result();
                                                
                                                foreach($datas as $data){?>
                                                <li><?php echo $data->username; ?></li>
                                                <?php } ?>
                                            </ol>
                                        </div>
                                    <!-- </div> -->
                                    <?php }?>
                            <!-- </div> -->
                        <?php } ?>

                       
                    </div>
                </div>
            </div>
       
    </section>
</section>

<script>
Dropzone.options.zone1 = {
        init: function(){
        var th = this;
            this.on('queuecomplete', function(){
                //   ImageUpload.loadImage();  // CALL IMAGE LOADING HERE
                setTimeout(function(){
                    location.reload();
                },1000);
            })
        }
    }

</script>