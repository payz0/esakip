                <div style="text-align:center" >
                        <ul style="display: flex;justify-content: center;margin-top: 20px;">
                            <li class="page"  style="border-radius:3px 0px 0px 3px;" ng-click="goto(0)" ng-class="currentPage == 0 ? 'disab':''">
                            Sebelum
                            </li>
                            <li class="page" ng-repeat="p in jumlahPage" ng-click="goto(p)" ng-class="currentPage == p ? 'aktif':''" >{{p+1}}</li>
                            <li class="page" style="border-radius:0px 3px 3px 0px;" ng-click="goto(jumlahPage.length-1)" ng-class="currentPage == jumlahPage.length-1 ? 'disab':''">
                            Berikutnya
                            </li>
                        </ul>
                        <style>
                            .disab{
                                color: #9e9e9e !important;
                                background: #cacaca42 !important;
                                box-shadow: 0px 0px 2px -1px inset black !important;
                            }
                            .aktif{
                                background: #377ab7 !important;
                                box-shadow: 0px 0px 2px 0px inset #16345278;
                                color: white !important;
                            }
                            .page{
                                background: white;
                                border: 1px solid #d8d8d8;
                                padding: 3px 8px;
                                cursor:pointer;
                                color:black;
                                transition:all 100ms;
                            }
                            .page:hover{
                                background:#f3f3f3;
                                box-shadow:0px 0px 3px 0px inset black;
                            }
                        </style>
                        
                    </div>