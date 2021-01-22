<div class="col-md-12" ng-init="inputan.id_skpd = <?php echo $this->session->userdata('id_skpd');?>; getJabatan()">
    <p class="message">Isi semua jabatan esselon III dan eselon IV beserta yang menaungi bidang jabatan.</p>
    <select  class="form-control" ng-model="eselon" ng-init="eselon = 'Eselon III'">
        <option value="Eselon III">Eselon III</option>
        <option value="Eselon IV">Eselon IV</option>
    </select>
    <select  class="form-control" ng-model="inputan.id_kabag" ng-if="eselon === 'Eselon IV'">
        <option value="">- pilih jabatan atasan -</option>
        <option ng-repeat="kabag in dataKabag" value="{{kabag.id_kabag}}">{{kabag.kabag}}</option>
    </select>
    <input type="text" class="form-control" ng-model="inputan.kasi" placeholder="Nama jabatan setara kasi" ng-if="eselon === 'Eselon IV'" ng-init="inputan.id_kabag = '';inputan.kasi = ''">
    <input type="text" class="form-control" ng-model="inputan.kabag" placeholder="Nama jabatan setara kepala bidang" ng-if="eselon === 'Eselon III'">
    <hr>
    <div style="text-align:right">
        <button class="btn btn-primary btn-sm" ng-click="(eselon == 'Eselon III') ? tambahJabatan('tabel_kabag',inputan) : tambahJabatan('tabel_kasi',inputan)">Simpan</button>
        <button class="btn btn-danger btn-sm" ng-click="dialog()">Batal</button>
    </div>
</div>
