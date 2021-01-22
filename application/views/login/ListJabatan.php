<section id="main-content" > 
        <section id="wrap" class="wrapper" ng-init="dataKabag = <?php echo htmlspecialchars(json_encode($dataAll['kabag'])); ?> ;dataKasi = <?php echo htmlspecialchars(json_encode($dataAll['kasi'])); ?>;edit = false">
        <!-- getDuaJabatan() -->
            <!-- <div class="col-md-12" id="badan">
            <div class="row" >
                <div class="container-fluid">
                    <div style="text-align:center">
                        <b style="top:-9px;" id="judul">DAFTAR JABATAN <?php echo strtoupper($this->session->userdata('skpd'));?></b>
                        <p style="text-align:right">
                            <a href="#" class="btn btn-danger btn-xs" ng-click="dialogBox = true">+ Jabatan</a>
                        </p>
                    </div>
                </div>
            </div> -->
<div class="container-fluid content-side" >
    <b class="judul">Daftar Jabatan <?php echo strtoupper($this->session->userdata('skpd'));?></b>
        <div class="row" style="margin-top:20px;padding: 20px 0px">
            <div class="col-md-12">
                <!-- batas -->
                <div ng-show="jabBox" style="display: flex;flex-flow: column;    background: #eaeaea;padding: 10px;margin: 5px;" class="col-md-12" ng-init="inputan.id_skpd = <?php echo $this->session->userdata('id_skpd');?>; getJabatan()">
                    <p class="message">Isi semua jabatan esselon III dan eselon IV beserta yang menaungi bidang jabatan.</p>
                    <select style="margin: 2px;"  ng-model="eselon" ng-init="eselon = 'Eselon III'">
                        <option value="Eselon III">Setara Eselon III</option>
                        <option value="Eselon IV">Setara Eselon IV</option>
                    </select>
                    <select style="margin: 2px; padding:3px"  ng-model="inputan.id_kabag" ng-if="eselon === 'Eselon IV'">
                        <option value="">- pilih jabatan atasan -</option>
                        <option ng-repeat="kabag in dataKabag" value="{{kabag.id_kabag}}">{{kabag.kabag}}</option>
                    </select>
                    <input style="margin: 2px; padding:3px" type="text" ng-model="inputan.kasi" placeholder="Nama jabatan setara kasi" ng-if="eselon === 'Eselon IV'" ng-init="inputan.id_kabag = '';inputan.kasi = ''">
                    <input style="margin: 2px; padding:3px" type="text" ng-model="inputan.kabag" placeholder="Nama jabatan setara kepala bidang" ng-if="eselon === 'Eselon III'">
                    
                    <div style="text-align:center; margin: 2px;">
                        <button class="btn btn-info btn-sm" ng-click="(eselon == 'Eselon III') ? tambahJabatan('tabel_kabag',inputan) : tambahJabatan('tabel_kasi',inputan)">Simpan</button>
                        <button class="btn btn-default btn-sm" ng-click="jabBox = false">Batal</button>
                    </div>
                </div>
                <!-- batas -->
                <p style="text-align:right" >
                    <a href="#"  class="btn btn-danger btn-xs" ng-click="jabBox = true">+ Jabatan</a>
                </p>
            <div class="row">
                <div class="col-lg-12">
                    <table >
                        <thead class="bg-primary">
                            <tr>
                                <th class="tengah">No</th>
                                <th class="tengah">Jabatan Eseleon II</th>
                                <th class="tengah">Jabatan Eseleon III</th>
                                <th class="tengah">Jabatan Eseleon IV</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="data in dataKabag track by $index">
                                <td class="tengah">{{$index + 1}}</td>
                                <td rowspan="{{jumData}}" ng-if="$index == 0" style="vertical-align: top"> 
                                    Kepala <?php echo $this->session->userdata('skpd');?>
                                </td>
                                <td ng-dblclick="editData('id_kabag','tabel_kabag',data,$index);">
                                    <span ng-if="!edit || i != $index">{{data.kabag}}</span>
                                    <input type="text" class="form-control" ng-model="data.kabag" ng-if="edit && i == $index"
                                    ng-keydown="$event.keyCode === 13 && editData('id_kabag','tabel_kabag',data,$index)">
                                    <span ng-if="!edit" style="float:right;cursor:pointer" ng-click="hapusJabatan('tabel_kabag',data.id_kabag,'id_kabag')" >&times;</span>
                                </td>
                                <td >
                                    <ol>
                                        <li ng-repeat="data2 in dataKasi track by $index"  ng-if="data2.id_kabag == data.id_kabag" ng-dblclick="editData('id_kasi','tabel_kasi',data2,$index)">
                                        <span ng-if="!edit2 || i != $index">{{data2.kasi}}</span>
                                        <input type="text" class="form-control" ng-model="data2.kasi" ng-if="edit2 && i == $index"
                                        ng-keydown="$event.keyCode === 13 && editData('id_kasi','tabel_kasi',data2,$index)">
                                        <span ng-if="!edit2" style="float:right;cursor:pointer" ng-click="hapusJabatan('tabel_kasi',data2.id_kasi,'id_kasi')">&times;</span>
                                        </li>
                                    </ol>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
</section>
