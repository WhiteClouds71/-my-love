<?php
    //    数据库链接
    $link= new mysqli("127.0.0.1","root","root","class");

    //    尾页查询
    $sql_last="select count(*) as qwe from p_goods";
    $res_l=mysqli_query($link,$sql_last);
$rows_l=mysqli_fetch_all($res_l,MYSQLI_ASSOC);
    $last_num=ceil($rows_l['0']['qwe']/10);

    //    分页
    $ye=0;
    if ($_GET){
        $page=$_GET['page'];
        if ($page<0){
            echo "<script>alert('这已经是第一页了')</script> ";
            $page=0;
        }
        if ($page>$last_num-1){
            echo "<script>alert('这已经是最后一页了')</script> ";
            $page=$last_num-1;
        }
        $ye=$page;
    }
        $b=$ye-1;
        $c=$ye+1;
        $first=$ye*0;
        $last=$ye+$last_num-1;
    $a=$ye*10;


    //    详情查询
        $sql="select  * from  p_goods order by goods_id desc limit $a,10";
        mysqli_query($link,"set names utf8");
        $res=mysqli_query($link,$sql);
        $rows=mysqli_fetch_all($res,MYSQLI_ASSOC);
    ?>

<!--    搜索-->
<form action="jieguo.php" method="get">
    <input type="text" name="sousuo" id="">
    <input type="submit" value="搜索">
</form>

<!--    循环输出列表数据-->
    
    <ul>
        <?php foreach ($rows as $k=>$v){
           echo "<li>";
           echo "<a href='xiangqing.php?id={$v['goods_id']}'>{$v['goods_name']}</a>&nbsp;&nbsp;&nbsp;";
           echo "<a href='bianji.php?id={$v['goods_id']}'>编辑商品信息</a>";
           echo "</li>";
        } ?>
    </ul>


<a href="liebiao.php?page=<?php echo $first;?>">首页</a>
<a href="liebiao.php?page=<?php echo $b;?>">上一页</a>|<?php echo $c; ?>|
<a href="liebiao.php?page=<?php echo $c;?>">下一页</a>
<a href="liebiao.php?page=<?php echo $last;?>">尾页</a><br>
<h3><a href="tianjia.php">添加商品</a></h3>







