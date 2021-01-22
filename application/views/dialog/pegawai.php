<div class="container-fluid" style="overflow:auto; max-height:450px">
	<p class="message">Cek data semua pegawai beserta dengan atasan dan jabatannya sebelum di simpan</p>

	<table class="table table-bordered table-responsive">
		<thead class="bg-primary">
			<tr >
			<th style="text-align:center; ">No</th>
			<th style="text-align:center; ">Nama</th>
			<th style="text-align:center; ">NIP</th>
			<th style="text-align:center; ">Pangkat</th>
			<th style="text-align:center; ">Email</th>
			<th style="text-align:center; ">Jabatan</th>
			<th style="text-align:center; ">Atasan <br>(Khusus Staf)</th>
			</tr>
		</thead>
		<tbody style="max-width:800px; height:700px;overflow:auto">
			<tr ng-repeat="data in dataExcel">
				<td>{{1+ $index}}</td>
				<td>{{data.nama}}</td>
				<td>{{data.nip}}</td>
				<td>{{data.pangkat}}</td>
				<td>{{data.email}}</td>
				<td>
					<select ng-model="esselon" ng-change="viewJabatan(esselon,$index)">
						<option value="">-- pilih jabatan--</option>
						<?php if(strtolower($this->session->userdata('skpd')) == "inspektorat"){?>
							<option value="Inspektur">Inspektur</option>
                        <?php }else{ ?> -->
                        	<option value="Kepala Dinas">Kepala Dinas</option>
                        <?php } ?>
						<option ng-repeat="kabag in dataKabag" value="{{kabag}}" ng-init="kabag.esselon = 'esselon III';kabag.jab = kabag.kabag" >{{kabag.kabag}}</option>
						<option ng-repeat="kasi in dataKasi" value="{{kasi}}" ng-init="kasi.esselon = 'esselon IV';kasi.jab = kasi.kasi">{{kasi.kasi}}</option>
						<option value="Staf">Staf</option>
					</select>
				</td>
				<td>
					<span ng-if="dataExcel[$index].atasan != undefined ">{{data.atasan}}</span>
					<select ng-if="data.jabatan == 'Staf'" ng-model="kasi" ng-change="viewKasi(kasi,$index)">
						<option value="">-- pilih atasan --</option>
						<option ng-repeat="kasi in dataKasi" value="{{kasi}}" >{{kasi.kasi}}</option>
					</select>
				</td>
			</tr>
			
		</tbody>
	</table>
	<div style="text-align:right">
		<button class="btn btn-info btn-xs" ng-click="simpanPegawai()">Simpan</button>
		<button class="btn btn-danger btn-xs" ng-click="dialog()">Batal</button>
	</div>
</div>