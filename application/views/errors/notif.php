        <?php if($this->session->flashdata('sukses')){?>
            <div ng-app="notifApp">
                <div ng-controller="myControlNotif">
                <div class="notif animate__animated animate__bounceInRight"  ng-if="notif">
                    <div>
                      <?php echo $this->session->flashdata('pesan'); ?>
                    </div>
                </div>
                </div>
            </div>
               
        <?php }?>

        <script>
            let app = angular.module("notifApp",[]);

            app.controller("myControlNotif", function ($scope){
                // $scope.datas = []
                $scope.notif = true
                $scope.notify = function(){
                    // $scope.pesan_notif = pesan;
                    $scope.notif = true;
                    setTimeout(function() {
                        $scope.$apply(function(){
                            $scope.notif = false;
                        })
                    }, 2000);
                }
                $scope.notify();
            });
        </script>