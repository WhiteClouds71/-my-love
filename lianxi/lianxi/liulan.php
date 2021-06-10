<?php
    $f="./num";
    $number=file_get_contents($f);
    echo"访问量：",$number;

    $number=$number+1;
    file_put_contents($f,$number)
?>