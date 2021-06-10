<?php
//    判断是否接收到数据
if ($_POST){
//    接受数据
    $goods_name=$_POST['goods_name'];
    $shop_price=$_POST['shop_price'];
    $goods_number=$_POST['goods_number'];
    $add_time=time();

    include "pdo.php";

//    插入数据
    $sql="insert into p_goods (goods_name,shop_price,add_time,goods_number) values (?,?,?,?)";
//        预处理
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(1,$goods_name);
    $stmt->bindParam(2,$shop_price);
    $stmt->bindParam(3,$add_time);
    $stmt->bindParam(4,$goods_number);
//      执行sql
    $stmt->execute();

//        错误信息
    $err_code=$stmt->errorCode();
    $err_info=$stmt->errorInfo();

    if ($stmt){
        echo "添加成功";
        header('Refresh:1;url=liebiao.php');
        die;
    }else{
        echo "添加失败";
    }
}

    

?>
<!--表单-->
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
<form action="tianjia.php" method="post">
    <table>
        <tr>
            <td>商品名：</td>
            <td><input type="text" name="goods_name" id=""></td>
        </tr>
        <tr>
            <td>商品价格：</td>
            <td><input type="text" name="shop_price" id=""></td>
        </tr>
        <tr>
            <td>库存：</td>
            <td><input type="text" name="goods_number" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="添加"></td>
        </tr>
    </table>
</form>
</body>
</html>
