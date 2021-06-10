<?php

    $host = "127.0.0.1";        //数据库地址
    $db = 'class';            //数据库名
    $user = 'root';             //数据库用户名
    $pass = 'root';        // 数据库的用户密码
    $dbh = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
//    sql语句
    $sql = "select user_id,user_name from p_users where user_id= ?";
//    预处理
    $stmt = $dbh->prepare($sql);
//    执行sql语句
    $id = $_GET['id'];
    $res = $stmt->execute([$id]);
//    获取错误信息
    $err_code=$stmt->errorCode();
    if ($err_code!='00000'){
        $err_msg=$stmt->errorInfo();
        echo "出错了：".$err_msg[2];
        die;
    }

    var_dump($res);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';print_r($rows);echo '</pre>';