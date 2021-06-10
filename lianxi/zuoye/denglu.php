<?php
//    开启session
    session_start();

//    判断是否登录
    if (isset($_SESSION['uname'])){
        echo "您已登录";
        header('Refresh:1;url="user.php');
        die;
    }

//    结合
    if ($_POST){

//    接收数据
    $uname_log=$_POST['uname_log'];
    $upwd_log=$_POST['upwd_log'];

//    非空验证
    if(empty($uname_log)){
        echo "用户名不能为空";
        die;
    }else if(preg_match('/^[\u4e00-\u9fa5a-z][\u4e00-\u9fa5\w]{2,19}$/',$uname_log) == 0){
       echo "用户名不合法";
       die;
    }

    if(empty($upwd_log)){
        echo "密码不能为空";
        die;
    }

    include "pdo.php";

//    sql语句
    $sql = "select * from biaodan where uname=?";

//    预处理
        $stmt=$dbh->prepare($sql);

//    执行sql语句
        $res=$stmt->execute([$uname_log]);

//    获取数据
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

//    用户非空验证
        if(empty($rows)){
        die;("查无此人");
    }

//    密码验证
    if(password_verify($upwd_log,$rows[0]['upwd'])){
        echo "<h2>恭喜您，登录成功！</h2>";

//        session存值
        $_SESSION['uid']=$rows[0]['uid'];
        $_SESSION['times']=time()+28800;
        $u_id=$_SESSION['uid'];
        $time_s=$_SESSION['times'];

//        登录记录IP地址和浏览器
        $logip=$_SERVER['REMOTE_ADDR'];
        $logua=$_SERVER['HTTP_USER_AGENT'];

//        sql语句
        $sql_in="insert into login_history (uid,login_time,login_ip,ua) values (?,?,?,?)";

//        预处理
        $stmt_in=$dbh->prepare($sql_in);
        $stmt_in->bindParam(1,$u_id);
        $stmt_in->bindParam(2,$time_s);
        $stmt_in->bindParam(3,$logip);
        $stmt_in->bindParam(4,$logua);

        //执行sql
        $stmt_in->execute();

//        session存值到个人中心
        $_SESSION['uname']=$rows[0]['uname'];
        $_SESSION['utel']=$rows[0]['utel'];
        $_SESSION['uemail']=$rows[0]['uemail'];
        $_SESSION['times']=time()+28800;
        // setcookie('uid',$rows[0]['uid']);

        header('Refresh:1;url="user.php');
        die;
    }else{
        echo "<h2>很遗憾，登录失败。</h2>";
        die;
    }
    die;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>登录界面</h1>
<form action="denglu.php" method="POST">
    <table>
        <tr>
            <td>用户名：</td>
            <td><input type="text" name="uname_log" id="" placeholder="输入用户名"></td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input type="password" name="upwd_log" id="" placeholder="输入密码"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="登录"></td>
        </tr>
    </table>
</form>
</body>
</html>
