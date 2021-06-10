<?php
//    开启session
    session_start();

//    判断是否登录
    if(isset($_SESSION['uname'])){

//        接收session存值
        $uname=$_SESSION['uname'];
        $utel=$_SESSION['utel'];
        $uemail=$_SESSION['uemail'];
        $times=date("Y-m-d H:i:s",$_SESSION['times']);

//        连接数据库
        include "db.php";

//        sql语句
        $sql = "select * from login_history";

//        执行sql语句
        $res = mysqli_query($link,$sql);

//        获取数据
        $rows = mysqli_fetch_all($res,MYSQLI_ASSOC);

//        读取session存值
        echo "<h1>您好，{$uname}</h1>
        <p>您的手机号为{$utel},最后一次登录的时间{$times}</p>
        <p>找回密码时请注意邮箱{$uemail},祝您生活愉快！</p><hr>";
        echo "<a href=\"tuichu.php\">退出登录</a>";

    }else {
        echo "请先登录";
        die;
    }
?>
    <h1>登录记录</h1>
    <table border="100px">
        <thead>
        <tr>
            <th>用户ID</th>
            <th>登录时间</th>
            <th>登录IP</th>
            <th>操作</th>
        </thead>
        <tbody>
        <?php

            foreach($rows as $k=>$v){
                $time_s=date("Y-m-d H:i:s",$v['login_time']);
            echo "<tr>";
            echo "<td>{$v['uid']}</td>";
            echo "<td>$time_s</td>";
            echo "<td>{$v['login_ip']}</td>";
            echo "<td><a href='shanchu.php?id={$v['sid']} '>删除</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
