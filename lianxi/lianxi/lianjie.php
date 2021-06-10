<?php 
    $link= new mysqli("127.0.0.1","root","root","class");
    

    $sql="insert into users (username,email,mobile,password) values ('wangwu','wangwu@qq.com','13411112222','odirjfoejflks')";
    $sql_a = "select * from users";

    $res = mysqli_query($link,$sql);
    if($res){
        $res_a=mysqli_query($link,$sql_a);
        $rows = mysqli_fetch_all($res_a,MYSQLI_ASSOC);
        echo '<pre>';print_r($rows);echo '</pre>';

    }
    

    
?>