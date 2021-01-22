                <div class="container-fluid" style="overflow:auto; max-height:450px">
                    <table class="table table-bordered table-hover" >
                        <thead class="thead-dark">
                            <th>No</th>
                            <th>Nama SKPD</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="data in dataSkpd track by $index" >
                                <td class="tengah">{{$index+1}}</td>
                                <td style="vertical-align: middle">{{data.skpd}}</td>
                                <td style="margin: 0px;padding: 2px;">
                                    <label for="" style="padding:6px">{{data.username}}</label>
                                    <!-- <input style="width: 100%;padding: 8px;border: 1px solid #d0d0d0;" type="text" ng-model="data.username" ng-change="rubah('username',data.username,$index)" class="inputan" ng-blur="cekUser(data.username,$index)"> -->
                                    <!-- {{data.username}} -->
                                </td>
                                <td style="margin: 0px;padding: 2px;">
                                    <!-- {{data.password}} -->
                                    <input style="width: 100%;padding: 8px;border: 1px solid #d0d0d0;" type="text" ng-model="data.password" ng-change="rubah('password',data.password,$index)" class="inputan">
                                </td>
                                <td class="tengah">
                                    <span ng-click="hapus($index)" style="padding: 12px; cursor:pointer">
                                        &times;
                                    </span>
                                </td>
                            </tr>
                            <tr ng-if="dataSkpd == undefined || dataSkpd.length == 0">
                               <td colSpan="7" style="text-align: center;font-size: 16pt;color: #8080806b;">
                                   <i>Data kosong</i>
                               </td> 
                            </tr>
                        </tbody>
                    </table>
                    <div class="float-right">
                            <button class="btn btn-info" ng-click="simpan()">Simpan</button>
                    </div>
                    
                </div>