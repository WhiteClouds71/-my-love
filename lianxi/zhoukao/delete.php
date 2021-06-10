<?php
    $q_id=$_GET['id'];
//    echo "$q_id";
    $link=new mysqli("127.0.0.1","root","root","class");
    $sql="delete from question_bank where q_id='$q_id'";
    $res=mysqli_query($link,$sql);
    if ($res){
        echo "删除成功";
        header('Refresh:1;url="question_list.php');
    }