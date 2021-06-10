<?php
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";die;
    $q_name=$_POST['q_name'];
    $q_man=$_POST['q_man'];
    $q_time=time()+28800;
//    echo $q_name;
//    echo $q_man;
//    echo $q_time;
//    die;

    if (empty($q_name)){
        echo "题库名称不能为空";
        header('Refresh:1;url="question.html');
        die;
    }
    if (empty($q_man)){
        echo "题库添加人不能为空";
        header('Refresh:1;url="question.html');
        die;
    }

    $link=new mysqli("127.0.0.1","root","root","class");
    $sql="insert into question_bank(q_name,q_man,q_time) values ('$q_name','$q_man','$q_time')";
//    echo $sql;die;
    mysqli_query($link,"set names utf8");
    $res=mysqli_query($link,$sql);
    if ($res){
        echo "添加成功";
        header('Refresh:1;url="question_list.php');
    }else{
        echo "添加失败";
    }