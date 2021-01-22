<section id="main-content" ng-init = "allData = <?php echo htmlspecialchars(json_encode($dataAll)); ?>;
                                    id_pegawai = '<?php echo $this->session->userdata('id_peg')?>'"> 
    <section class="wrapper" id="wrap">
            <!-- <div class="row" >
            <div class="col-md-12" id="badan">
                <h5 style="top: -10px;" id="judul">Perjanjian Kinerja</h5> -->
        <div class="container-fluid content-side" >
            <b class="judul">Perjanjian Kinerja</b>
            <div class="row" style="margin-top:20px;padding: 20px 0px">
                <div class="col-md-12">
                    <?php 
                    $nama = str_replace(' ','_',explode(',',$this->session->userdata('nama'))[0]);
                    echo form_open_multipart('../login/newUpload/pk/lap_pk_'.$nama.'_/buatLapPK');?>   
                    
                    <div ng-show="ajuanIKU" class="animate__animated animate__bounceInDown animate__faster"> 
                        <table >
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Sasaran</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Sasaran" name="sasaran">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Indikator</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" type="text" placeholder="Indikator" name="indikator">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid; vertical-align: top; ">Target</td>
                                <td style="border:0px solid ">
                                    <ul style="padding-left:0px">
                                        <li>
                                        a. Triwulan I
                                        <input class="form-control" type="text" placeholder="Target triwulan 1"  name="target1">
                                        </li>
                                        <li>
                                        b. Triwulan I
                                        <input class="form-control" type="text" placeholder="Target triwulan 2"  name="target2">
                                        </li>
                                        <li>
                                        c. Triwulan I
                                        <input class="form-control" type="text" placeholder="Target triwulan 3"  name="target3">
                                        </li>
                                        <li>
                                        d. Triwulan I
                                        <input class="form-control" type="text" placeholder="Target triwulan 4"  name="target4">
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Dokumen</td>
                                <td style="border:0px solid ">
                                <input type="file" name="file" id="iku" onchange="angular.element(this).scope().cekFileIKI()">
                                </td>
                            </tr>
                            <tr style="border:0px solid ">
                                <td style="border:0px solid ">Tahun</td>
                                <td style="border:0px solid ">
                                    <input class="form-control" style="max-width:100px" type="number" name="tahun" placeholder="tahun" ng-model="tahun" ng-change="cekTriwulan()">
                                </td>
                            </tr>
                        </table>
                        <div>
                            <span ng-show="uploadIki" class="btn btn-primary btn-sm" ng-click="nextLanjut = true">Ajukan</span>
                            <span ng-if="!uploadIki" class="btn btn-primary btn-sm" ng-click="alert('Dokumen belum di tentukan')">Ajukan</span>
                            <span class="btn btn-danger btn-sm" ng-click="ajuanIKU = !ajuanIKU">Batal</span>
                        </div>
                        <div ng-show="nextLanjut " class="col-md-4" style="position: fixed;top: 0px;    background: #d0d0d0;color: #585858;padding: 20px;margin: 0 auto;left: 0px;right: 0px;box-shadow: 2px 3px 4px -1px black;text-align: center;">
                            <div style="    position: absolute;background: #ff8d00;left: 0px;top: 0px;width: 100%;padding: 2px;">
                                Peringatan !
                            </div>
                            <div style="margin-top: 15px;">
                                <b>Hanya ingin memastikan</b> <br>
                                Apakah anda akan meinput data untuk tahun <b style="font-size:!2pt; color:black">{{tahun}}</b>
                               <br><br><br>
                                <div >
                                    <button class="btn btn-primary btn-sm" type="submit">Ya</button>
                                    <span class="btn btn-danger btn-sm" ng-click="nextLanjut = false">Tidak</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    </form>
                    <div style="overflow:auto">
                        <button ng-show="!ajuanIKU" class="btn btn-info btn-sm" ng-click="ajuanIKU = !ajuanIKU">Ajuan Perjanjian Kinerja</button> <br>
                        
                        <br>
                        <table>
                            <thead class="bg-primary">
                                <tr>
                                    <th rowspan="2" class="tengah">No</th>
                                    <th rowspan="2" class="tengah">Sasaran</th>
                                    <th rowspan="2" class="tengah">Indikator</th>
                                    <th class="tengah" colSpan="4">Target</th>
                                    <th rowspan="2" class="tengah">Tahun</th>
                                    <th rowspan="2" class="tengah">Berkas</th>
                                    
                                </tr>
                                <tr>
                                    <th class="tengah">I</th>
                                    <th class="tengah">II</th>
                                    <th class="tengah">III</th>
                                    <th class="tengah">IV</th>
                                </tr>
                            </thead>
                            <tbody style="text-align:center">
                                <?php forEach($dataAll as $key => $val){ ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td style="text-align:justify"><?php echo $val->sasaran; ?></td>
                                    <td style="text-align:justify"><?php echo $val->indikator; ?></td>
                                    <td><?php echo $val->target1; ?></td>
                                    <td><?php echo $val->target2; ?></td>
                                    <td><?php echo $val->target3; ?></td>
                                    <td><?php echo $val->target4; ?></td>
                                    <td><?php echo $val->tahun; ?></td>
                                    <td>
                                    
                                        <div ng-show="iframe<?php echo $key; ?>" id="showFrame" class="animate__animated animate__bounceIn">
                                            <div id="judulFrame">Berkas Perjanjian Kinerja
                                                <a href="#" ng-click="iframe<?php echo $key; ?> = false" style="float:right;margin-right:5px">&times;</a>
                                            </div>
                                            <iframe src="<?php echo base_url() ?>../assets/berkas/<?php echo $val->berkas; ?>" frameborder="0" style="width: 99%;margin-top: 20px;min-height: 220px;"></iframe>
                                            <!-- <div style="    box-shadow: 0px 3px 8px -4px inset black;padding: 5px;background: white;">
                                                <br> -->
                                                <button class="btn btn-info btn-sm" ng-click="iframe<?php echo $key; ?> = false">Ok</button>
                                            <!-- </div> -->
                                            <br>
                                        </div>
                                       
                                           
                                            <button class="btn btn-default btn-xs" ng-click="iframe<?php echo $key; ?> = true">
                                                <img src="<?php echo base_url() ?>../assets/img/doc.png" style="width: 16px;"> 
                                            </button>
                                    </td>
                                </tr>
                                <?php } ?> 
                            </tbody>
                        </table>

                        </div>  
                    </div>
                </div>
            </div>
    </section>
</section>

