<?php
    
    $sname=$_POST['sname'];
    $sage=$_POST['sage'];
    $sadd=$_POST['sadd'];

    $link= new mysqli("127.0.0.1","root","root","class");
    $account = mt_rand(0,100000);
    $sql= "insert into study(sname,sage,sadd) values('{$sname}','{$sage}','{$sadd}')";
    $stmt = mysqli_prepare($link,$sql);
    $stmt->execute();
    
    if($stmt){
        echo "成功";
        header('location:list.php');
    }
    

?>