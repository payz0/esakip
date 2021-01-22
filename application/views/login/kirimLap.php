<section id="main-content" ng-init="allData = <?php echo htmlspecialchars(json_encode($dataAll['lapIKI'])); ?>;
                                    allPegawai = <?php echo htmlspecialchars(json_encode($dataAll['pegawai'])); ?>;
                                    allLaporan = <?php echo htmlspecialchars(json_encode($dataAll['lapSKPD'])); ?>"> 
    <section class="wrapper">
        <div class="row" >
            <div class="col-lg-11" id="badan" >
                    <h4 style="top:-20px;font-size: 10pt;" id="judul">Kirim Laporan</h4>
                    <b>Laporan IKI tahun {{tahun}} triwulan ke-{{triwulan}}</b>
                    <table class="table">
                        <tr ng-repeat="pegawai in allPegawai" ng-if="allDataIki(pegawai.id_peg,<?php echo Date("Y"); ?>,triwulan).berkas != null">
                            <td>
                                {{pegawai.nama}}
                            </td>
                            <td>{{allDataIki(pegawai.id_peg,<?php echo Date("Y"); ?>,triwulan).laporan}}</td>
                            <td>
                                <input type="checkbox">
                            </td>
                        </tr>
                    </table>
            </div>
        </div>
    </section>
</section>