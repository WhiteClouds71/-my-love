<?php
//    接收表单
    $sousuo=$_GET['sousuo'];
//    链接数据库
    $link= new mysqli("127.0.0.1","root","root","class");
//    尾页
    $sql_last_s="select count(*) as qwe from p_goods where goods_name like '%$sousuo%'";
    mysqli_query($link,"set names utf8");
    $res_l_s=mysqli_query($link,$sql_last_s);
    $rows_l_s=mysqli_fetch_all($res_l_s,MYSQLI_ASSOC);
    $last_num=ceil($rows_l_s['0']['qwe']/5);

//    分页
    $ye=0;
    if (!empty($_GET['page'])){
        $page=$_GET['page'];
        if ($page<0){
            echo "<script>alert('这已经是第一页了')</script> ";
            $page=0;
        }
        if ($page>$last_num-1){
            $page=$last_num-1;
        }
        if ($page)

        $ye=$page;
    }
    $b=$ye-1;
    $c=$ye+1;
    $first=$ye*0;
    $last=$ye+$last_num-1;
    $a=$ye*5;

//    列表数据
    $sql_sou="select * from p_goods where goods_name like '%$sousuo%' order by goods_id desc limit $a,5";
    mysqli_query($link,"set names utf8");
    $res_sou=mysqli_query($link,$sql_sou);
    $row_sou=mysqli_fetch_all($res_sou,MYSQLI_ASSOC);

?>
<!--    列表-->
    <ul>
        <?php foreach ($row_sou as $k=>$v){ ?>
           <li>
           <a href='xiangqing.php?id=<?php echo $v['goods_id'] ?>'><?php echo str_replace($sousuo, "<strong style='color:#f00;'>{$sousuo}</strong>", $v['goods_name']); ?></a>;
          <a href='bianji.php?id=<?php echo $v['goods_id'] ?>'>编辑商品信息</a>
          </li>
        <?php } ?>
    </ul>

    <a href="jieguo.php?sousuo=<?php echo $sousuo; ?>&page=<?php echo $first;?>">首页</a>
    <a href="jieguo.php?sousuo=<?php echo $sousuo; ?>&page=<?php echo $b;?>">上一页</a>|<?php echo $c; ?>|
    <a href="jieguo.php?sousuo=<?php echo $sousuo; ?>&page=<?php echo $c;?>">下一页</a>
    <a href="jieguo.php?sousuo=<?php echo $sousuo; ?>&page=<?php echo $last;?>">尾页</a><br>

