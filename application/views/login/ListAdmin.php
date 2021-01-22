<section id="main-content" ng-init="allData = <?php echo htmlspecialchars(json_encode($dataAll)); ?>"> 
    <section class="wrapper" ng-init="itemsPerPage = 6;customPagination(allData)">
        <div class="container-fluid content-side" >
            <b class="judul">Daftar Admin SKPD</b>
            <div class="row" style="margin-top:20px;padding: 20px 0px">
                <div class="col-md-12">
                    
                    <div id="addForm" class="animate__animated animate__bounceIn" ng-if="adding">
                    <?php $this->load->view('dialog/headerBox');?>
                        <div ng-show="!editForm" style="margin-top: 30px;">
                            <form action="{{id}}"  method="POST">
                                <label style="margin:0px" for="">Nama SKPD</label>
                                <input style="margin-bottom:10px;" name="skpd" ng-focus="generateUser()" ng-model="skpd" class="form-control" type="text" placeholder="Nama SKPD">
                                <label style="margin:0px" for="">User admin</label>
                                <input style="margin-bottom:10px;" readonly="readonly" name="username" ng-model="user" class="form-control" type="text" placeholder="Username admin">
                                <label style="margin:0px" for="">Password</label>
                                <input style="margin-bottom:10px;" readonly="readonly" name="password" ng-model="password" class="form-control" type="text" placeholder="Password admin">
                                <input style="margin-bottom:10px;display:none" readonly="readonly" name="level" ng-model="lefel" class="form-control" type="text">
                                <br>
                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                <button type="button" class="btn btn-danger btn-sm" ng-click="addForm()">Batal</button>
                            </form>
                        </div>
                        <div ng-show="editForm" style="margin-top: 30px;">
                            <?php echo form_open('../login/add') ?>
                                <label style="margin:0px" for="">Nama SKPD</label>
                                <input style="margin-bottom:10px;" name="skpd" ng-focus="generateUser()" ng-model="skpd" class="form-control" type="text" placeholder="Nama SKPD">
                                <label style="margin:0px" for="">User admin</label>
                                <input style="margin-bottom:10px;" readonly="readonly" name="username" ng-model="user" class="form-control" type="text" placeholder="Username admin">
                                <label style="margin:0px" for="">Password</label>
                                <input style="margin-bottom:10px;" readonly="readonly" name="password" ng-model="password" class="form-control" type="text" placeholder="Password admin">
                                <input style="margin-bottom:10px;display:none" readonly="readonly" name="level" ng-model="lefel" class="form-control" type="text">
                                <br>
                                <button class="btn btn-primary btn-sm" type="submit">Tambah</button>
                                <button type="button" class="btn btn-danger btn-sm" ng-click="addForm()">Batal</button>
                            </form>
                        </div>
                    
                    </div>
                    <div class="tools" style="display: flex;flex-direction: row;align-items: center;justify-content: space-between;">
                        <div style="display: flex;">
                            <select ng-model="itemsPerPage"  ng-change="customPagination(allData)"style="padding:2px">
                                <option value="6" >6</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="1000">Semua</option>
                            </select>
                            <input type="text" ng-model="namaSkpd" placeholder="Cari skpd ..." style="max-width: 250px;width: 80%;">
                        </div>
                        <div >
                            
                            <label style="margin-right:2px" for="exel" class="btn btn-primary btn-xs">Upload</label>
                            <js-xls onread="excels" onerror="error" id="exel" style="display:none"></js-xls>
                            
                            <button class="btn btn-info btn-xs" style="margin-right:2px" ng-click="addForm()">+ SKPD</button>
                            <button class="btn btn-default btn-xs">
                                <a href="<?php echo base_url(); ?>../assets/doc/skpd.xlsx" >
                                    <img src="<?php echo base_url(); ?>../assets/img/excel.png" style="width: 20px;float: right;">
                                </a>
                            </button>
                        </div>
                    </div>
                   
                        <!-- start revisi -->
                    <table>
                        <thead class="bg-primary">
                            <tr>
                                <th class="tengah">No</th>
                                <th class="tengah">SKPD</th>
                                <th class="tengah">Username</th>
                                <th class="tengah">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "data in allData |filter:{level_lap:'!admin_kab'} | filter:namaSkpd | limitTo:itemsPerPage:offsetItems" >
                                <td class="tengah">{{$index+1}}</td>
                                <td>{{data.skpd}}</td>
                                <td>{{data.username}}</td>
          
                                <td class="tengah">
                                    <button ng-click="resetPassword(data.id_skpd)">reset</button>
                                    <button ng-click="editSKPD(data.id_skpd)">Edit</button>
                                    <button ng-click="hapusSKPD(data.id_skpd)">&times;</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        <!-- batas revisi -->
    
                    <?php $this->load->view('dialog/pagination');?>
                </div>
            </div>
       
    </section>
</section>

