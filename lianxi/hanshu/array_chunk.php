<?php
#将一个数组分割成多个
    $array=["qwe","asd","zxc","wer","sdf","xcv"];
    $lenght=6;
    print_r(array_chunk($array,$lenght,false));
?>