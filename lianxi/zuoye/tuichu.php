<?php
        session_start();
        unset($_SESSION['uname']);
        echo "退出成功";
        header('Refresh:1;url="denglu.php');

    ?>

