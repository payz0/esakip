<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="jumbotron">
    <h2>CRUD murni dengan CI</h2>
    <strong>{elapsed_time}</strong> seconds
</div>

    <form action="<?php echo ($segment == "") ? base_url('welcome/input') : base_url('welcome/edit/'.$editUser->id);?>" method="post">
        <input type="text" name="username" value="<?php echo ($segment == "") ? "" : $editUser->username;?>">
        <input type="text" name="password" value="<?php echo ($segment == "") ? "" : $editUser->password;?>">
        <button type="submit">Kirim</button>
    </form>

<ul>
    <?php 
        $num = 0;
        foreach($arr as $row){
            $num++;
        
    ?>
        <li>
            <?php echo $num.".  ".$row->username;?> <a href="<?php echo base_url('Welcome/test/'.$row->id)?>">edit</a> || 
            <a href="<?php echo base_url('Welcome/delete/'.$row->id)?>">delete</a>
        </li> 
    <?php } ?>
</ul>

