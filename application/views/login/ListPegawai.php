<section id="main-content" ng-init="allData = <?php echo htmlspecialchars(json_encode($dataAll)); ?>"> 
        <section  class="wrapper" ng-init="itemsPerPage = 6;customPagination(allData)">
            <div class="container-fluid content-side" >
                <b class="judul">Daftar Pegawai</b>
                <div class="row" style="margin-top:20px;padding: 20px 0px">
                    <div class="col-md-12">

                    <div class="tools" style="text-align:left">
                        <select ng-model="itemsPerPage"  ng-change="customPagination(allData);nama = ''"style="padding:2px">
                            <option value="6" >6</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="1000">Semua</option>
                        </select>
                        <input type="text" ng-model="nama" placeholder="Cari nama ..." ng-focus="focusCari();itemsPerPage = 1000;jumlahPage = [0]" > 
                        <a href="#" class="btn btn-primary btn-xs" ng-click="getDuaJabatan();addForm();inputan={}">+ Pegawai</a>
                        <button class="btn btn-default btn-xs" style="float: right;margin-left: 5px;">
                            <a href="<?php echo base_url(); ?>../assets/doc/pegawai.xlsx">
                                <img src="<?php echo base_url(); ?>../assets/img/excel.png" style="width: 23px">
                            </a>
                        </button>
                        <label for="upload" class="btn btn-info btn-xs" >Upload excel</label>
                        <js-xls onread="read" onerror="error" id="upload" style="display:none" ></js-xls>
                    </div>
                    <div ng-if="adding" style="    position: absolute;
                                background: white;
                                padding: 20px;
                                z-index:9;
                                
                                margin: 0 auto;
                                left: 0;
                                right: 0;top:30px;
                                box-shadow: 0px 1px 3px 0px black;" class="col-md-6 animate__animated animate__bounceIn">
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
                                        <li > 
                                            <label> Password :</label>
                                            <input ng-if="!editPegawai" class="form-control" type="password" ng-model="inputan.password">
                                            <input ng-if="editPegawai" ng-init="inputan.password = hash(inputan.password)" class="form-control" type="password" ng-model="inputan.password">
                                            
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
                                    <a ng-if="editPegawai" href="#" class='btn btn-info btn-sm' ng-click="simpanEdit()">Update</a>
                                    <button ng-if="!editPegawai" class="btn btn-primary btn-sm" ng-click="pegawaiBaru()" >Simpan</button>
                                    <button class="btn btn-default btn-sm" ng-click="addForm()" >Batal</button>
                                </div>
                    </div>
                        <table>
                            <thead class="bg-primary">
                                <tr>
                                    <th class="tengah">No</th>
                                    <!-- <th class="tengah">Foto</th> -->
                                    <th class="tengah">Nama</th>
                                    <th class="tengah">NIP</th>
                                    <th class="tengah">Jabatan</th>
                                    <th class="tengah">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="pegawai in allData  | filter:nama |orderBy:'+esselon' | limitTo:itemsPerPage:offsetItems">
                                    <td class="tengah" style="width:45px">{{$index+1}}</td>
                                    <td >
                                        <!-- <div class="thumb"> -->
                                            <img ng-src="<?php echo base_url(); ?>../assets/img/{{pegawai.foto ? 'profil/'+pegawai.foto : 'man.svg'}}" width="35px" height="35px" >
                                        <!-- </div> -->
                                    <!-- </td> -->
                                    <!-- <td> -->
                                        {{pegawai.nama}}</td>
                                    <td class="tengah">{{pegawai.nip}}</td>
                                    <td >{{pegawai.jabatan}}</td>
                                    <td class="tengah" style="max-width:40px">
                                        <a href="#" class='btn btn-default btn-xs' ng-click="reload();editPeg(pegawai);">
                                            <span ng-if="!editPegawai || i != pegawai.id_peg ">Edit</span>
                                            <span ng-if="editPegawai && i == pegawai.id_peg">Batal</span>    
                                        </a>
                                        <a href="#" class='btn btn-danger btn-xs' ng-click="hapusPegawai(pegawai.id_peg)">&times;</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <!-- batas -->
                   <?php $this->load->view('dialog/pagination');?>
                    
                </div>
            </div>
            </div>
        </section>
    </section>
    