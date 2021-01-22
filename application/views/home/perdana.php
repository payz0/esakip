<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/bootstrap.min.css" />
</head>
<body>
    <div class="container" style="margin-top:20%">
        <div class="row">
            <div class="col-md-4" style="float:none;margin:0 auto;    background: #e0e0e0;padding: 25px;">
            <b style="position: absolute;
    top: 0px;
    left: 0px;
    background: #4c4c4c;
    width: 100%;
    padding: 2px 15px;
    color: white;
    font-size: 9pt;
    font-weight: 100;"> Setup admin</b>
            <form action="<?php echo base_url() ?>login/tambahAdmin" style="padding-top:20px" method="post">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <br>
                <input type="text" class="form-control" name="password" placeholder="Password">
                <br>
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>