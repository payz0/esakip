<!DOCTYPE html>
<html lang="en"  ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Esakip">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>     -->
    <script src="<?php echo base_url(); ?>../assets/js/angularjs.js"></script>
    <script src="<?php echo base_url(); ?>../assets/js/angular_excel.js"></script>
    <script src="<?php echo base_url(); ?>../assets/js/angHash.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.9.13/xlsx.full.min.js"></script> -->
    <script src="<?php echo base_url(); ?>../assets/js/excel.min.js"></script>
    
    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>../assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url(); ?>../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link href="<?php echo base_url(); ?>../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!--external css-->
    <link href="<?php echo base_url(); ?>../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>../assets/css/esakipv1.css" rel="stylesheet" />
    
    <!-- <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script> -->
    <script src="<?php echo base_url();?>../assets/js/dropzone.js"></script>

    <link href="<?php echo base_url(); ?>../assets/css/dropzone.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>../assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>../assets/css/style-responsive.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->
    <link href="<?php echo base_url(); ?>../assets/css/animate.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>../assets/js/ui-bootstrap-tpls-0.12.1.min.js"></script>
    <script src="<?php echo base_url();?>../assets/lib/chart-master/Chart.js"></script>
    <style>
      #judul{
        background: #2f323a;
        padding: 10px 15px;
        color: #eaeaea;
        width: fit-content;
        box-shadow: 4px 0px 3px -1px #7b7b7b;
        border-radius: 2px;

        text-align: center;
        margin: 0 auto;
        position: relative;
        top: -35px;
      }
      #tab3d{
        box-shadow: 0px 0px 15px 4px inset #b7b7b7;
        border: 10px solid #f8f9ff;
      }
      #badan{
        /* float: none;
        margin: 0 auto;
        background: white;
        padding: 10px 30px;
        box-shadow: 0px 0px 4px -1px black;
        margin-top: 10px; */

        float: none;
        margin: 0 auto;
        /* box-shadow: 0px 0px 4px -1px black; */
        /* background: #f3f3f3; */
        top: 23px;
      }

      #addForm{
        padding: 20px;
        background: white;
        box-shadow: 0px 0px 4px -1px black;
        position: fixed;
        max-width: 400px;
        margin: 0 auto;
        left: 15%;
        right: 15%;
      }
      .tengah{
        vertical-align: middle !important;
        text-align: center;
    }
    #showFrame{
      z-index: 4;
      position: absolute;
      left: 0px;
      margin: 0 auto;
      right: 0;
      top: 1%;
      /* height:70%; */
      /* min-height: 80%; */
      padding: 1px 0;
      background: #efefef;
      width: 70%;
      box-shadow: 0px 0px 4px 0px black;
    }
    #judulFrame{
      background: #22242a;
      top: 0px;
      color: white;
      font-size: 10pt;
      padding: 4px;
      width: 100%;
      position: absolute;
      left: 0px;
    }
    .acc:checked + label{
      background: #57cdc4;
      color: white;
    }
    #showFrame label{
      padding: 2px 20px;
      margin-top: 3px;
      transition: all 300ms;
      cursor:pointer;
      margin-left: -15px;
      
    }
    .acc{
      Visibility: hidden;
    }
    #z{
      /* background:red; */
      /* box-shadow: -6px -3px 10px -5px black;
    background: lightslategrey; */
      cursor:pointer;
      transition:all 200ms;

    
    }
    #z:hover{
      background: #f3f3f36b;
      box-shadow: 1px -4px 13px -5px inset #757474;
    }

    #wrap{
      background: white;
      min-height: 535px;
    }
    
    @media (max-width: 650px) {
      #judulSKPD{
          display: none;
      }
    }
    </style>
    <title>Dashboard E-SAKIP</title>
</head>
<body ng-controller="controlApp"  ng-init="baseUrl = '<?php echo base_url(); ?>';
id_skpd = <?php echo $this->session->userdata('id_skpd');?>;
<?php if($this->session->userdata('sebagai') == "pegawai"){ ?>id_peg = <?php echo $this->session->userdata('id_peg');}?>" >
  <?php $this->load->view('errors/loading');?> 
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
          TOP BAR CONTENT & NOTIFICATIONS
          *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="#" class="logo"><b>E-<span>SAKIP</span> </b></a>
        <!--logo end-->
       
        <a  id="judulSKPD" style="margin-left:15px"class="logo"><b style="font-size:16pt"><?php echo $this->session->userdata('sebagai') == 'pegawai' ? $this->session->userdata('skpd') : 'Kobar'?></b></a>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><a class="logout" href="<?php echo base_url('login/logout')?>">Logout</a></li>
          </ul>
        </div>
      </header>
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
          MAIN SIDEBAR MENU
          *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
        <aside  >
          <div id="sidebar" class="nav-collapse" >
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
              <?php if($this->session->userdata('sebagai') == "pegawai"){ ?>
              <p class="centered"><a href="#" ng-click="showProf = true"><img src="<?php echo base_url() ?>../assets/img/<?php echo $user->foto ? 'profil/'.$user->foto : 'foto_profil_.png'; ?>" class="img-circle" width="80" height="80"></a></p>
              <?php } ?>
              <?php if($this->session->userdata('sebagai') == "admin"){ ?>
              <p class="centered"><a href="#"><img src="<?php echo base_url() ?>../assets/img/foto_profil_.png" class="img-circle" width="80" ></a></p>
              <?php } ?>
              <h5 class="centered">
                <?php echo $this->session->userdata('sebagai') == 'pegawai' ? $this->session->userdata('nama') : 'Admin'?>
              </h5>
              <li class="mt">
                <a href="<?php echo base_url('login/dashboard')?>" class="<?php echo $url == 'sideHome' ? 'active': '';?>">
                  <i class="fa fa-dashboard"></i>
                  <span>Dashboard</span>
                  </a>
              </li>
              <?php if($this->session->userdata('esselon') != null || $this->session->userdata('sebagai') == 'admin'){?>
              <li class="sub-menu">
                <a href="#" class="<?php 
                echo $url == 'ListLapKab' ? 'active': '';
                echo $url == 'ListLapSKPD' ? 'active': '';
                echo $url == 'ListLapSemuaPegawai' ? 'active': '';
                echo $url == 'ListIKI' ? 'active': '';
                echo $url == 'ListGlobal' ? 'active': '';
                // echo $url == 'kirimLap' ? 'active': '';
                ?>">
                  <i class="fa fa-desktop"></i>
                  <span>Monitoring</span>
                  </a>
                <ul class="sub">
                  <?php if($this->session->userdata('level_lap') == "admin_kab"){?>
                    <!-- <li><a href="<?php //echo base_url('login/dashboard/ListIKI')?>">Laporan SKPD</a></li> -->
                    <li><a href="<?php echo base_url('login/dashboard/ListGlobal')?>">Laporan SKPD</a></li>
                    <li><a href="<?php echo base_url('login/dashboard/ListLapKab')?>">E-Sakip Kabupaten</a></li>
                  <?php } ?>
                  <?php if($this->session->userdata('level_lap') != "admin_kab"){?>
                    <li><a href="<?php echo base_url('login/dashboard/ListLapSKPD')?>">E-Sakip SKPD</a></li>
                    <li><a href="<?php echo base_url('login/dashboard/ListLapSemuaPegawai')?>">Laporan Pegawai</a></li>
                  <?php } ?>
                </ul>
              </li>
              <?php } ?>
              <li class="sub-menu">
                <a href="#" class="<?php 
                echo $url == 'SakipKab' ? 'active': '';
                echo $url == 'SakipSKPD' ? 'active': '';
                echo $url == 'buatLap' ? 'active': '';
                echo $url == 'CekLaporan' ? 'active': '';
                echo $url == 'buatLapPK' ? 'active': '';
                echo $url == 'buatLapIKI' ? 'active': '';
                ?>">>
                  <i class="fa fa-book"></i>
                  <span>Pelaporan</span>
                  </a>
                <ul class="sub">
                  <?php if($this->session->userdata('level_lap') == "admin_kab"){?>
                    <li><a href="<?php echo base_url('login/dashboard/SakipKab')?>">Input E-Sakip Kabupaten</a></li>
                  <?php } ?>
                  <?php if($this->session->userdata('sebagai') == "admin" && $this->session->userdata('level_lap') != "admin_kab"){?>
                  <li><a href="<?php echo base_url('login/dashboard/SakipSKPD')?>">Input E-Sakip SKPD</a></li>
                  <?php } ?>
                  <?php if($this->session->userdata('esselon') != null){?>
                  <li><a href="<?php echo base_url('login/dashboard/CekLaporan')?>">Cek Laporan</a></li>
                  <?php } ?>
                  <?php if($this->session->userdata('sebagai') == "pegawai" ){?>
                  <li><a href="<?php echo base_url('login/dashboard/buatLap')?>">Rencana Aksi</a></li>
                  <li><a href="<?php echo base_url('login/dashboard/buatLapIKI')?>">Indikator Kinerja Individu</a></li>
                  <li><a href="<?php echo base_url('login/dashboard/buatLapPK')?>">Perjanjian Kinerja</a></li>
                  <?php } ?>
                  
                </ul>
              </li>
              <?php if($this->session->userdata('sebagai') == "pegawai" ){ ?>
              <li>
                <a href="<?php echo base_url('login/dashboard/sidePesan')?>" >
                
                  <i class="fa fa-history"></i>
                  <span>History </span>
                  </a>
              </li>
              <?php } ?>
              <li class="sub-menu">
                <a href="#" class="<?php 
                echo $url == 'ListPegawai' ? 'active': '';
                echo $url == 'profil' ? 'active': '';
                echo $url == 'ListAdmin' ? 'active': '';
                echo $url == 'ListJabatan' ? 'active': '';
                echo $url == 'kirimLap' ? 'active': '';
                ?>">
                  <i class="fa fa-cogs"></i>
                  <span>Pengaturan</span>
                  </a>
                <ul class="sub">
                  <li><a href="<?php echo base_url('login/dashboard/profil');?>">Profil</a></li>
                  <?php if($this->session->userdata('level_lap') == "admin_kab"){?>
                  <li><a href="<?php echo base_url('login/dashboard/ListAdmin/skpd');?>">Daftar SKPD</a></li>
                  <?php } ?>
                  <?php if($this->session->userdata('sebagai') == "admin" && $this->session->userdata('level_lap') != "admin_kab"){?>
                  <li><a href="<?php echo base_url('login/dashboard/ListPegawai/pegawai');?>" >Daftar Pegawai</a></li>
                  <li><a href="<?php echo base_url('login/dashboard/ListJabatan/jabatan');?>" >Daftar Jabatan</a></li>
                  <?php }?>
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('login/logout')?>">
                  <i class="fa fa-sign-out"></i>
                  <span>Logout </span>
                  </a>
              </li>
            </ul>
            <!-- sidebar menu end-->
          </div>
        </aside>

        <!-- **********************************************************************************************************************************************************
          isi dashboard
          *********************************************************************************************************************************************************** -->
          <?php $this->load->view('login/'.$url);?>

      <!-- ************************************** 
        dialog blox global 
      **********************************************-->
      
      <section id="main-content"  ng-if="dialogBox"> 
        <section class="wrapper">
          <div class="row" style="position:relative" >
                <div class="col-md-8 mb" style="position: fixed;z-index: 9; margin: 0 auto;left: 0;max-width:800px;
                    top: 15%;right: 0;">
                  <div class="message-p pn" style="height:auto">
                    <div class="message-header">
                      <h5> Form <?php echo ($box != null) ? $box: '404'; ?>
                        <span style="float:right;margin-right:10px">
                          <a href="#" ng-click="dialog()">&times;</a>
                        </span>
                      </h5>
                        
                    </div>
                    <div class="row">
                      <div class="container-fluid">
                            <?php 
                            if($box != null){
                              $this->load->view('dialog/'.$box);
                            }
                            ?>
                      </div>
                    </div>
                    <br>
                  </div>
                  <!-- /Message Panel-->
                </div>
                </div>
            </section>
      </section>
    
      
      

      <!-- ***************** notif -->
      <div class="animate__animated animate__bounceInRight" style=" position: fixed;
          top: 10px;
          background: #15521d;
          right: 1px;
          padding: 8px 25px;
          color: white;
          box-shadow: -5px 0px 0px 0px #90922bd4;
          z-index: 9999;" ng-if="notif">
          <div>
              {{pesan}}
          </div>
      </div>
      <!-- versi php -->
      <?php if($this->session->flashdata('upload')){ ?>
      <div class="animate__animated animate__bounceInRight" style=" position: fixed;
          top: 10px;
          background: #15521d;
          right: 1px;
          padding: 8px 25px;
          color: white;
          box-shadow: -5px 0px 0px 0px #90922bd4;
          z-index: 9999;" id="upload">
          <div>
             <?php echo $this->session->flashdata('pesan');?>

             <script>
               setTimeout(() => {
                $("#upload").hide();
               }, 3000);
             </script>
          </div>
      </div>
      <?php }?>

    <!-- ***************** notif -->

      <!-- **********Peringatan ******************-->
        <div class="container" ng-if="delBox">
            <div  class="col-md-4 mb"  >
              <div class="container" style="position: fixed;background: #dfdfe1;min-width:200px;max-width:400px;
              box-shadow: 1px 1px 4px -3px black;top: 120px;left: 0px;right: 0px;margin: 0 auto;">
                <div style="position: absolute;background: #e98c55;width: 100%;left: 0px;color: white;padding: 7px;">
                      Peringatan hapus data!
                </div>
                <div style="margin-top: 30px;padding: 10px; text-align:center">
                  <i>Penghapusan data bisa berdampak dengan data laporan...</i>
                  <br>
                  <b>Anda yakin ingin menghapus data ini ?</b>
                  <hr>
                  <button class="btn btn-secondary btn-xs" ng-click="yes()">Ya</button>
                  <button class="btn btn-danger btn-xs" ng-click="batal()">Tidak</button>
                </div>
              </div>
            </div>
          </div>
    <!-- **********Peringatan ******************-->

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="<?php echo base_url(); ?>../assets/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>../assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>../assets/lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url(); ?>../assets/lib/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>../assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>../assets/lib/common-scripts.js"></script>
    <!--script for this page-->
    <!-- <script src="<?php echo base_url(); ?>../assets/lib/jquery-ui-1.9.2.custom.min.js"></script> -->
    <!--custom switch-->
    <!-- <script src="<?php echo base_url(); ?>../assets/lib/bootstrap-switch.js"></script> -->
    <!--custom tagsinput-->
    <!-- <script src="<?php echo base_url(); ?>../assets/lib/jquery.tagsinput.js"></script> -->
    <!--custom checkbox & radio-->
  
    
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>../assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>../assets/lib/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>../assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>../assets/lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>../assets/lib/form-component.js"></script> -->
   
    <script src="<?php echo base_url(); ?>../assets/js/app.js"></script>

    <?php if($this->session->userdata('sebagai') == "pegawai"){ ?>
          <div class="row animate__animated animate__swing" style="position: fixed;
    z-index: 99999999;
    top: 122px;
    background: white;
    left: 0px;
    right: 0px;" ng-show="showProf">
                <div class="col-md-5 mb" style="position: fixed;z-index: 9; margin: 0 auto;left: 0;max-width:800px;
                    top: 15%;right: 0;">
                  <div class="message-p pn" style="height:auto;background: linear-gradient(133deg, whitesmoke,#c7c7ff, #ff9d9d,#8fc58f, transparent);    box-shadow: 0px 0px 15px 0px black;">
                    <div class="message-header" style="    background: #2f323a;">
                      <h5> Profil
                        <span style="float:right;margin-right:10px">
                          <a href="#" ng-click="showProf = false">&times;</a>
                        </span>
                      </h5>
                        
                    </div>
                    <!-- <div class="row"> -->
                      <div class="container-fluid" style="padding: 20px;display: flex;flex-direction: column;">
                          
                      <label  style="border-bottom: 1px dotted grey;">Nama: <b><?php echo $user->nama; ?></b></label>
                      <label style="border-bottom: 1px dotted grey;" > NIP: <b><?php echo $user->nip; ?></b></label>
                      <label style="border-bottom: 1px dotted grey;" > Pangkat: <b><?php echo $user->pangkat; ?></b></label>
                      <label style="border-bottom: 1px dotted grey;" >Jabatan: <b><?php echo $user->jabatan; ?></b></label>
                        <?php if($user->foto != null){ ?>
                          <img style="width: 250px;" src="<?php echo base_url().'../assets/img/profil/'.$user->foto; ?>" alt="">
                        <?php }?>
                      </div>
                    <!-- </div> -->
                    <br>
                  </div>
                  <!-- /Message Panel-->
                </div>
                </div>
    <?php }?>
    
</body>
</html>