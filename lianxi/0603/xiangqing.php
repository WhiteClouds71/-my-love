<?php
//    接受get传值
    $id=$_GET['id'];
//    链接数据库
    $link= new mysqli("127.0.0.1","root","root","class");
//    查询商品详情
    $sql="select goods_id,goods_name,click_count,shop_price,add_time from p_goods where goods_id='$id'";
    mysqli_query($link,"set names utf8");
    $res=mysqli_query($link,$sql);
    $rows=mysqli_fetch_all($res,MYSQLI_ASSOC);

    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!--        循环输出详情数据-->
        <?php foreach ($rows as $k=>$v){
            $num="{$v['click_count']}";
            $num=$num+1;
            $sqli="update p_goods set click_count='$num' where goods_id='{$v['goods_id']}'";
            $resi=mysqli_query($link,$sqli);
            echo "商品ID：{$v['goods_id']} <br>";
            echo "商品名：{$v['goods_name']} <br>";
            echo "商品价格：{$v['shop_price']} <br>";
            echo "上架时间：{$v['add_time']} <br>";
            echo "浏览量：{$num} <br>";
        } ?>






</body>
</html>


