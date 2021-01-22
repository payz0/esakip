<section id="main-content" ng-init="allData = <?php echo htmlspecialchars(json_encode($dataAll)); ?>"> 
        <section  class="wrapper" ng-init="itemsPerPage = 6;customPagination(allData)">
            <div class="row" >
                <div class="col-lg-12 ds" id="badan" style="background: #eaeaea;">
                    
                <h4 id="judul" class="centered mt">DAFTAR PEGAWAI <?php echo strtoupper($this->session->userdata('skpd'));?></h4>
                <select ng-model="itemsPerPage"  ng-change="customPagination(allData)"style="padding:2px">
                    <option value="6" >6</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="1000">Semua</option>
                </select>
                <input type="text" ng-model="nama" placeholder="Cari nama ..." ng-focus="focusCari()"> 
                <div ng-if="adding" style="    position: absolute;
                            background: white;
                            padding: 20px;
                            z-index:9;
                            width: 80%;
                            margin: 0 auto;
                            left: 0;
                            right: 0;top:30px;
                            box-shadow: 0px 1px 3px 0px black;" class="animate__animated animate__bounceIn">
                            <?php $this->load->view('dialog/headerBox');?>
                                <ul style="padding-left: 0px;margin-top: 45px;">
                                    <li>
                                        <label> Nama :</label>
                                        <input class="form-control" type="text" ng-model="inputan.nama">
                                    </li>
                                    <li> 
                                        <label> Nip :</label>
                                        <input class="form-control" type="text" ng-model="inputan.nip">
                                    </li>
                                    <li> 
                                        <label> Password :</label>
                                        <input class="form-control" type="text" ng-model="inputan.password">
                                    </li>
                                    <li> 
                                        <label> Jabatan :</label>
                                        <select class="form-control" ng-model="data" ng-change="cekJabatan(inputan,data)">
                                            <option value="">--pilih jabatan --</option>
                                            <?php if(strtolower($this->session->userdata('skpd')) == "inspektorat"){?>
                                            <option value="Inspektur">Inspektur</option>
                                            <?php }else{ ?>
                                                <option value="Kepala Dinas">Kepala Dinas</option>
                                            <?php } ?>
                                            <option ng-repeat="kabag in dataKabag" value="{{kabag}}" ng-init="kabag.esselon = 'esselon III'">{{kabag.kabag}}</option>
                                            <option ng-repeat="kasi in dataKasi" value="{{kasi}}" ng-init="kasi.esselon = 'esselon IV'">{{kasi.kasi}}</option>
                                            <option value="Staf">Staf</option>
                                        </select>
                                    </li>
                                    <li ng-if="data == 'Staf' ">
                                    <label> Atasan :</label>
                                        <select class="form-control"ng-model="kasih" ng-change="cekAtasan(inputan,kasih)">
                                            <option value="">- Pilih atasan-</option>
                                            <option ng-repeat="kasi in dataKasi" value="{{kasi}}" >{{kasi.kasi}}</option>
                                        </select>
                                    </li>
                            </ul>
                            <div style="text-align:right">
                                <button class="btn btn-primary btn-sm" ng-click="pegawaiBaru()" >Simpan</button>
                                <button class="btn btn-danger btn-sm" ng-click="addForm()" >Batal</button>
                            </div>
                </div>
                <a href="#" class="btn btn-primary btn-xs" ng-click="getDuaJabatan();addForm();inputan={}">+ Pegawai</a>
                <a href="<?php echo base_url(); ?>../assets/doc/pegawai.xlsx">
                    <img src="<?php echo base_url(); ?>../assets/img/excel.png" style="width: 23px;float: right;margin-left: 5px;">
                </a>
                <label for="upload" class="btn btn-info btn-xs" style="float:right">Upload data</label>
                <js-xls onread="read" onerror="error" id="upload" style="display:none" ></js-xls>
                <hr>
                    <!-- First Member -->
                    <div  class="desc" ng-repeat="pegawai in allData  | filter:nama |orderBy:'+esselon' | limitTo:itemsPerPage:offsetItems" style="padding: 2px 0px;" >
                        <div class="thumb">
                            <img class="img-circle" ng-src="<?php echo base_url(); ?>../assets/img/{{pegawai.foto ? 'profil/'+pegawai.foto : 'man.svg'}}" width="35px" height="35px" >
                        </div>
                        <div class="det">
                            <p>
                                <a href="#" style="font-size: 12pt;color: black;">{{pegawai.nama}}</a><br/>
                                <muted style="font-size: 11px;">{{pegawai.jabatan}}</muted>
                               
                                <span style="float:right">
                                    <a href="#" class='btn btn-primary btn-xs' ng-click="reload(pegawai.id_peg);editPeg(pegawai)">
                                        <span ng-if="!editPegawai || i != pegawai.id_peg ">Edit</span>
                                        <span ng-if="editPegawai && i == pegawai.id_peg">Batal</span>    
                                    </a>
                                    <a href="#" class='btn btn-danger btn-xs' ng-click="hapusPegawai(pegawai.id_peg)">Delete</a>
                                </span>
                                <ul ng-if="editPegawai && i == pegawai.id_peg">
                                    <li> <span style="padding:0px 31px 0px 20px"> Nama :</span>
                                        <input type="text" ng-model="pegawai.nama">
                                    </li>
                                    <li> <span style="padding:0px 46px 0px 20px"> Nip :</span>
                                        <input type="text" ng-model="pegawai.nip">
                                    </li>
                                    <!-- <li> <span style="padding:0px 19px 0px 20px"> Pangkat :</span>
                                        <input type="text" ng-model="pegawai.pangkat">
                                    </li> -->
                                    <li> <span style="padding:0px 10px 0px 20px"> Password :</span>
                                        <input type="text" ng-init="pegawai.password = hash(pegawai.password)" ng-model="pegawai.password" >
                                    </li>
                                    <li> <span style="padding:0px 20px 0px 20px"> Jabatan :</span>
                                        <select  ng-model="data" ng-change="cekJabatan(pegawai,data)">
                                            <option value="">--pilih jabatan --</option>
                                            <?php if(strtolower($this->session->userdata('skpd')) == "inspektorat"){?>
                                            <option value="Inspektur">Inspektur</option>
                                            <?php }else{ ?>
                                                <option value="Kepala Dinas">Kepala Dinas</option>
                                            <?php } ?>
                                            <option ng-repeat="kabag in dataKabag" value="{{kabag}}" ng-init="kabag.esselon = 'esselon III'">{{kabag.kabag}}</option>
                                            <option ng-repeat="kasi in dataKasi" value="{{kasi}}" ng-init="kasi.esselon = 'esselon IV'">{{kasi.kasi}}</option>
                                            <option value="Staf">Staf</option>
                                        </select>
                                    </li>
                                    <li ng-if="data == 'Staf' ">
                                    <span style="padding:0px 26px 0px 20px"> Atasan :</span>
                                        <select ng-model="kasih" ng-change="cekAtasan(pegawai,kasih)">
                                            <option value="">- Pilih atasan-</option>
                                            <option ng-repeat="kasi in dataKasi" value="{{kasi}}" >{{kasi.kasi}}</option>
                                        </select>
                                    </li>
                                    <li>
                                    <a href="#" class='btn btn-warning btn-xs' ng-click="simpanEdit()">Simpan</a>
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <!-- batas -->
                   <?php $this->load->view('dialog/pagination');?>
                    
                </div>
            </div>
        </section>
    </section>
    