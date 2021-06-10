<?php
    $link=new mysqli("127.0.0.1","root","root","class");
    $sql="select * from question_bank";
    mysqli_query($link,"set names utf8");
    $res=mysqli_query($link,$sql);
    $rows=mysqli_fetch_all($res,MYSQLI_ASSOC);
//echo "<pre>";
//print_r($rows);
//echo "</pre>";die;

?>
<table border="1">
    <tr>
        <th>题库id</th>
        <th>题库名称</th>
        <th>题库添加人</th>
        <th>题库添加时间</th>
        <th>操作</th>
    </tr>
    
    <?php foreach ($rows as $k=>$v){ ?>
        <?php $times=date("Y-m-d H:i:s",$v['q_time']) ?>
        <tr>
            <td><?php echo $v['q_id'] ?></td>
            <td><?php echo $v['q_name'] ?></td>
            <td><?php echo $v['q_man'] ?></td>
            <td><?php echo $times ?></td>
            <td>
                <a href="#">修改</a>
                <?php echo "<a href=\"delete.php?id={$v['q_id']}\">删除</a>";?>
            </td>
        </tr>
    <?php } ?>

</table>
