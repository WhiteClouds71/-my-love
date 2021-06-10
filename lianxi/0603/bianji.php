<?php
//    打开session
    session_start();
//    接收列表穿来的id值
    $id=$_GET['id'];
//    链接数据库
    $link= new mysqli("127.0.0.1","root","root","class");
//    查询详情信息
    $sql="select goods_id,goods_name,shop_price,goods_number from p_goods where goods_id='$id'";
    mysqli_query($link,"set names utf8");
    $res=mysqli_query($link,$sql);
    $rows=mysqli_fetch_all($res,MYSQLI_ASSOC);
//    session存入id为修改的sql语句找到where条件
    $_SESSION['goods_id']=$rows[0]['goods_id'];
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
<form action="xiugai.php" method="POST">
    <?php foreach ($rows as $k=>$v){ ?>
    <table>
        <tr>
            <td>商品id：</td>
            <td><input type="text" name="goods_name_a" id="" disabled value="<?php echo "{$v['goods_id']}"?>"></td>
        </tr>
        <tr>
            <td>商品名：</td>
            <td><input type="text" name="goods_name_a" id="" value="<?php echo "{$v['goods_name']}"?>"></td>
        </tr>
        <tr>
            <td>商品价格：</td>
            <td><input type="text" name="shop_price_a" id="" value="<?php echo "{$v['shop_price']}"?>"></td>
        </tr>
        <tr>
            <td>商品库存：</td>
            <td><input type="text" name="goods_number_a" id="" value="<?php echo "{$v['goods_number']}"?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="修改" ></td>
        </tr>
    </table>
    <?php } ?>
</form>
</body>
</html>

