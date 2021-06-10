<?php
//    接收id
    $id=$_GET['id'];

    include "pdo.php";
//    sql语句
    $sql="delete from login_history where sid=?";
//    准备执行
    $stmt=$dbh->prepare($sql);
//    执行
    $res=$stmt->execute([$id]);
//    判断
    if ($res){
        echo "删除成功";
        header("Refresh:2;url='user.php'");
    }else{
        echo "删除失败";
    }