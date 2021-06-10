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

//        接收数据
        $uname=$_POST['uname'];
        $utel=$_POST['utel'];
        $u_pwd=$_POST['upwd'];
        $qpwd=$_POST['qpwd'];
        $uemail=$_POST['uemail'];
        $upwd=password_hash($u_pwd,PASSWORD_BCRYPT);

//        非空验证
        if(empty($uname)){
            echo "用户名不能为空";
            die;
        }else if(preg_match('/^[\u4e00-\u9fa5a-z][\u4e00-\u9fa5\w]{2,19}$/',$uname) == 0){
            echo "用户名不合法";
            die;
        }

        if(empty($utel)){
            echo "手机号不能为空";
            die;
        }else if(preg_match('/^1(?:5|3|8)\d{9}$/', $utel) == 0){
            die('手机号不合法');
        }

        if(empty($upwd)){
            echo "密码不能为空";
            die;
        }

        if(empty($qpwd)){
            echo "确认密码不能为空";
            die;
        }

        if(empty($uemail)){
            echo "邮箱不能为空";
            die;
        }else if(preg_match('/^\w+@+\w{2,4}(\.)(?:com|cn|net)$/', $uemail) == 0){
            die('邮箱不合法');
        }

        include "pdo.php";

//        sql语句
        $sql_a="select * from biaodan where uname=?";

//       预处理
        $stmt_a = $dbh->prepare($sql_a);

//       执行sql语句
        $res_a = $stmt_a->execute([$uname]);

//       获取错误信息
        $err_code_a=$stmt_a->errorCode();
        if ($err_code_a!='00000'){
            $err_msg=$stmt_a->errorInfo();
            echo "出错了：".$err_msg[2];
            die;
        }

//        获取数据
        $rows_a = $stmt_a->fetchAll(PDO::FETCH_ASSOC);

//        判断唯一
        if($rows_a){
            echo "用户已存在";
            die;
        }
        $account = mt_rand(0,100000);

//        sql语句
        $sql="insert into biaodan (uname,utel,upwd,qpwd,uemail) values (?,?,?,?,?)";

//        预处理
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(1,$uname);
        $stmt->bindParam(2,$utel);
        $stmt->bindParam(3,$upwd);
        $stmt->bindParam(4,$qpwd);
        $stmt->bindParam(5,$uemail);

        //执行sql
        $stmt->execute();

//        错误信息
        $err_code=$stmt->errorCode();
        $err_info=$stmt->errorInfo();

//        判断是否注册成功
        if($stmt){
            echo "注册成功";
            header('Refresh:1;url="denglu.php');

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
<h1>注册界面</h1>
<form action="zhuce.php" method="POST">
    <table>
        <tr>
            <td>用户名：</td>
            <td>
                <input type="text" name="uname" id="" placeholder="用户名" >
                <span>3-20位，中文、字母、数字、下划线的组合，以中文或字母开头</span>
            </td>
        </tr>
        <tr>
            <td>手机号：</td>
            <td><input type="text" name="utel" id="">
                请填写11位有效的手机号
            </td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input type="password" name="upwd" id="" >
                6-20位英文（区分大小写）数字、字符的组合
            </td>
        </tr>
        <tr>
            <td>确认密码：</td>
            <td><input type="password" name="qpwd" id="" >
                请再输入一遍上面的密码
            </td>
        </tr>
        <tr>
            <td>邮箱：</td>
            <td><input type="email" name="uemail" id="">
                请按照****@**.com的格式写
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="注册">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>


</form>
<br>
<br>
<a href="denglu.php">已有账号？点击登录>></a>

</body>
</html>



