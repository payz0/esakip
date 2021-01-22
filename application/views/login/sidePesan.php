<!-- RECENT ACTIVITIES SECTION -->
<section id="main-content" <?php if($this->session->userdata('sebagai') == "pegawai"){ ?>ng-init="getHist(<?php echo htmlspecialchars(json_encode($dataAll)); ?>)" <?php }?>> 
        <section class="wrapper" id="wrap" ng-init="itemsPerPage = 10">
            <!-- <div class="row">
                <div class="col-lg-12 ds">
                    <h4 class="centered mt">Aktivitas history</h4> -->
        <div class="container-fluid content-side" >
            <b class="judul">Aktivitas history</b>
            <div class="row" style="margin-top:20px;padding: 20px 0px">
                <div class="col-md-12 ds" style="background:white">
                        <!-- First Activity -->
                        <div class="desc" ng-repeat="pesan in allData | orderBy:'-tgl' | limitTo:itemsPerPage:offsetItems" <?php if($this->session->userdata('sebagai') == "pegawai"){ ?> ng-if="pesan.id_peg == <?php echo $user->id_peg; ?> || pesan.id_pengirim == <?php echo $user->id_peg; ?>" <?php }?>>
                            <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                            </div>
                            <div class="col-md-11">
                            <p>
                                <muted ng-if="diffTime(pesan.tgl) > 60">{{jam(diffTime(pesan.tgl))}} jam  {{diffTime(pesan.tgl)%60}} menit lalu</muted>
                                <muted ng-if="diffTime(pesan.tgl) > 1 && diffTime(pesan.tgl) < 60">{{diffTime(pesan.tgl)}} menit lalu</muted>
                                <muted ng-if="diffTime(pesan.tgl) < 2">Baru saja</muted>
                                <br/>
                                <a href="#">
                                    <span ng-if="pesan.id_pengirim == <?php echo $user->id_peg;?>" >Anda</span>
                                    <span ng-if="pesan.id_pengirim != <?php echo $user->id_peg;?>" >{{pesan.oleh}}</span>
                                </a> {{pesan.history}}<br/>
                            </p>
                            </div>
                        </div>
                        </div>
                        <!-- Second Activity -->
                        <?php $this->load->view('dialog/pagination');?>
                        <!-- <div style="text-align:center">
                            <pagination total-items="totalItems" ng-model="currentPage" items-per-page="itemsPerPage"></pagination>
                        </div> -->
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </section>
    </section>