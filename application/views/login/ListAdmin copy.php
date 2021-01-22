<section id="main-content" ng-init="allData = <?php echo htmlspecialchars(json_encode($dataAll)); ?>"> 
    <section class="wrapper" ng-init="itemsPerPage = 6;customPagination(allData)">
            <div class="row" >
            <div class="col-lg-11 ds" id="badan" style="background: #f3f3f3;">
                    <h4 id="judul">Daftar Admin SKPD</h4>
                    <select ng-model="itemsPerPage"  ng-change="customPagination(allData)"style="padding:2px">
                        <option value="6" >6</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="1000">Semua</option>
                    </select>
                    <input type="text" ng-model="namaSkpd" placeholder="Cari skpd ..." style="max-width: 250px;width: 80%;">
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
                    <a href="<?php echo base_url(); ?>../assets/doc/skpd.xlsx" style="float:right">
                        <img src="<?php echo base_url(); ?>../assets/img/excel.png" style="width: 20px;float: right;">
                    </a>
                    <label style="float:right;margin-right:2px" for="exel" class="btn btn-primary btn-xs">Upload</label>
                    <js-xls onread="excels" onerror="error" id="exel" style="display:none"></js-xls>
                    
                    <button class="btn btn-info btn-xs" style="float:right;margin-right:2px" ng-click="addForm()">+ SKPD</button>
                    
                    <div class="desc" ng-repeat = "data in allData | filter:namaSkpd | limitTo:itemsPerPage:offsetItems" ng-if="data.level_lap != 'admin_kab'">
                        <div class="thumb">
                            <img class="img-circle" src="<?php echo base_url(); ?>../assets/img/man.svg" width="35px" height="35px" >
                        </div>
                        <div class="details" style="width:fit-content" >
                            <p>
                                <a href="#" style="font-size: 18px;color: rgb(34 93 88);">
                                
                                {{data.skpd}}
                                </a><br/>
                                Username :{{data.username}}<br>
                                Password : ***
                            </p>
                        </div>
                        <div style="text-align:right;margin-right:10px" >
                            <p> 
                                    <muted><?php //echo $data->level_lap; ?> {{data.level_lap}}</muted> <br>
                                    <muted><?php //echo $data->level; ?> {{data.level}}</muted><br>
                                    
                                    <button ng-click="resetPassword(data.id_skpd)">reset password</button>
                                    <button ng-click="editSKPD(data.id_skpd)">Edit</button>
                                    
                            </p>
                        </div>
                    </div>

                    <!-- <div style="text-align:center" >
                        <pagination total-items="totalItems" ng-model="currentPage" items-per-page="itemsPerPage"></pagination>
                    </div> -->
                    <?php $this->load->view('dialog/pagination');?>
                </div>
            </div>
       
    </section>
</section>

