<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login E-SAKIP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
        <link href="<?php echo base_url()?>../assets/css/esakip.css" rel="stylesheet">
        <!-- <link href="<?php echo base_url()?>../assets/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="<?php echo base_url(); ?>../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    </head>
    <body class="animate__animated animate__fadeIn">
        <div class="bagLog"></div>
        <div class="container">
            <div class="row" >
                <div class="col-md-3"></div>
                <div class="col-md-6" style="margin-top: 100px;">
                    <h1 style="text-align:center;font-family: initial;text-shadow: 0px 2px 5px black;">Login E-SAKIP</h1>
                    <div class="formLogin">
                        <!-- <div class="title">Login user</div> -->
                        <div class="body" >
                            <?php echo form_open('../login/formLogin');    ?>
                  
                            <div style="position:relative">
                            <label for="" style="    margin-bottom: 0px;margin-top: .5em;">Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" style="padding-left:40px">
                                <i class="fa fa-user" aria-hidden="true" style="color: black;
                                position: absolute;
                                left: 1px;
                                top: 33px;
                                background: #b7b7b7;
                                padding: 10px;
                                border-radius: 3px 0px 0px 3px;"></i>
                                
                                <label for="" style="    margin-bottom: 0px;margin-top: .5em;">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" style="padding-left:40px">
                                <i class="fa fa-lock" aria-hidden="true" style="color: black;
                                position: absolute;
                                left: 1px;
                                top: 103px;
                                background: #b7b7b7;
                                padding: 10px;
                                border-radius: 3px 0px 0px 3px;"></i>
                                </input>
                                
                            </div>
                            <div class="tombolLog">
                                <hr>
                                <button class="btn btn-primary btn-sm" type="submit">Login</button>
                                <a href="<?php echo base_url('../');?>" class="btn btn-danger btn-sm">Batal</a>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <?php $this->load->view('errors/notif');?>
    </body>
 
</html>