<?php
//    打开session
    session_start();
//    session接收数据
    $goods_id=$_SESSION['goods_id'];
//    post接收数据
    $goods_name=$_POST['goods_name_a'];
    $shop_price=$_POST['shop_price_a'];
    $goods_number=$_POST['goods_number_a'];
    include "pdo.php";
//    sql语句'$goods_name''$shop_price''$goods_number''$goods_id'
    $sql="update p_goods set goods_name=?,shop_price=?,goods_number=? where goods_id=?";
//        预处理
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(1,$goods_name);
    $stmt->bindParam(2,$shop_price);
    $stmt->bindParam(3,$goods_number);
    $stmt->bindParam(4,$goods_id);
//执行sql
    $stmt->execute();
//    mysqli_query($link,"set names utf8");
    if ($stmt){
        echo "修改成功";
        header('Refresh:1;url=liebiao.php');
        die;
    }else{
        echo "修改失败";
        die;
    }
    ?>
