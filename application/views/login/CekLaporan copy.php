<section id="main-content" ng-init = "allPegawai = <?php echo htmlspecialchars(json_encode($dataAll['pegawai'])); ?>;allData =<?php echo htmlspecialchars(json_encode($dataAll['laporan'])); ?>"> 
    <section class="wrapper" id="wrap" ng-init="inputan.jabatan = '<?php echo $user->jabatan;?>';inputan.oleh = '<?php echo $user->nama;?>'"> 
        <div class="container-fluid content-side" >
        <b class="judul">Cek Laporan Rencana Aksi</b>
        <div class="row" style="margin-top:20px;padding: 20px 0px">
            <div class="col-md-12">
                    <div style="text-align:right" class="tools">
                        <label for="">Tahun</label>
                        <input type="number" name="tahun" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan()">
                        <select style="padding: 2px;" name="triwulan" ng-model="dataTri" ng-init="dataTri = triwulan" ng-change="cekTriwulan(dataTri)">
                            <option value="">-- pilih triwulan --</option>
                            <option value="1">Triwulan I</option>
                            <option value="2">Triwulan II</option>
                            <option value="3">Triwulan III</option>
                            <option value="4">Triwulan IV</option>
                        </select>
                    </div>
                    <div style="overflow:auto">
                    <table   class=" table-hover" >
                        <thead class="bg-primary">
                            <tr>
                                <th class="tengah" rowSpan="2">No</th>
                                <th class="tengah" rowSpan="2">Nama Staf</th>
                                <th class="tengah" colSpan="8">Tahun {{tahun}} Triwulan ke {{dataTri}}</th>
                                <th class="tengah" rowSpan="2">Tanggapan</th>
                            </tr>
                            <tr>
                                <th class="tengah">Aksi</th>
                                <th class="tengah">Indikator</th>
                                <th class="tengah">Capaian</th>
                                <th class="tengah">Evaluasi</th>
                                <th class="tengah">Hambatan</th>
                                <th class="tengah">Strategi</th>
                                <!-- <th class="tengah">Berkas</th> -->
                                <th class="tengah">Tgl</th>
                                <th class="tengah">Status</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr ng-repeat="pegawai in allPegawai" >
                                <td class="tengah">{{1+$index}}</td>
                                <td style="vertical-align:middle">{{pegawai.nama | uppercase}}</td>
                                <td  >{{get3wulanA(pegawai.id_peg,dataTri).aksi}}</td>
                                <td  >{{get3wulanA(pegawai.id_peg,dataTri).laporan}}</td>
                                <td  >{{get3wulanA(pegawai.id_peg,dataTri).capaian}}</td>
                                <td  >{{get3wulanA(pegawai.id_peg,dataTri).evaluasi}}</td>
                                <td  >{{get3wulanA(pegawai.id_peg,dataTri).hambatan}}</td>
                                <td  >{{get3wulanA(pegawai.id_peg,dataTri).strategi}}</td>
                                <!-- <td  class="tengah">
                                    
                                    <span ng-click="iframeOpen(pegawai)" ng-show="allDataIki(pegawai.id_peg,tahun,dataTri).berkas != undefined"  class="btn btn-secondary btn-xs">
                                           <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;">  {{get3wulanA(pegawai.id_peg,dataTri).berkas}}
                                    </span>
                                   
                                </td> -->
                                <td class="tengah">{{get3wulanA(pegawai.id_peg,dataTri).tgl | date : "dd/M/y"}}</td>
                                <td class="tengah" ><span ng-if="get3wulanA(pegawai.id_peg,dataTri).status != 'terima'">
                                        {{get3wulanA(pegawai.id_peg,dataTri).status}}
                                        </span>
                                        <img ng-if="get3wulanA(pegawai.id_peg,dataTri).status == 'terima'" src="<?php echo base_url() ?>../assets/img/ok2.png" alt="" style="width: 20px;">
                                </td>
                                <td class="tengah">
                                    <button ng-show="allDataIki(pegawai.id_peg,tahun,dataTri).status != undefined" class="btn btn-secondary btn-xs" ng-click="iframeOpen(pegawai)">
                                    <img src="<?php echo base_url() ?>../assets/img/respon.png" alt="" style="width: 15px;margin-right:10px">
                                        Tanggapan
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <!-- dialogbox -->
                    <div ng-if="iframe" id="showFrame"   ng-init="inputan.id_peg = individu.id_peg; inputan.id_lap = allDataIki(individu.id_peg,tahun,dataTri).id_lap">
                        <div id="judulFrame">Ajuan Rencana Aksi oleh {{individu.nama}}
                            <a href="#" ng-click="iframeOpen()" style="float:right;margin-right:5px">&times;</a>
                        </div>
                            <iframe ng-src="{{urlBerkas(allDataIki(individu.id_peg,tahun,dataTri).berkas)}}" frameborder="0"style="width: 99%;margin-top: 20px;min-height: 220px;" ></iframe>
                            <div style="    box-shadow: 0px 3px 8px -4px inset black;padding: 5px;background: white;">
                                    <ul style="background: #dfdfdf;padding: 6px;">
                                        <li><b>Aksi :</b> {{allDataIki(individu.id_peg,tahun,dataTri).aksi}} </li>
                                        <li><b>Indikator :</b> {{allDataIki(individu.id_peg,tahun,dataTri).laporan}} </li>
                                    </ul>
                                    Komentar :
                                    
                                        <input type="text" ng-model="inputan.tanggapan" class="form-control" placeholder="Tanggapan anda ...">
                                        <div style="text-align:left" ng-init="inputan.status = 'terima'">
                                            <input type="radio"  name="{{individu.id_peg}}" id="{{individu.nama}}" class="acc" ng-model="inputan.status" value="terima" >
                                            <label for="{{individu.nama}}" >Diterima</label>
                                            <input type="radio"  name="{{individu.id_peg}}" id="{{individu.id_peg}}" ng-model="inputan.status" value="tolak" class="acc" >
                                            <label for="{{individu.id_peg}}" >Ditolak</label>
                                        </div>
                                        
                                        <div style="text-align:center">
                                            <button class="btn btn-primary btn-xs" ng-click="tanggapan()">Submit</button>
                                            <span class="btn btn-danger btn-xs" ng-click="iframeOpen();cancel()">Cancel</span>  
                                        </div>
                            </div>
                            <br>
                    </div>
                    <!-- batas box -->
                </div>
            </div>
            </div>
    </section>
</section>

