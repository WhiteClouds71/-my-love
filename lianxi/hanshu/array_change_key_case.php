<?php
#将数组中的所有键名修改为全大写或小写
    $array=["qwe","asd","zxc","wer","sdf","xcv"];
    print_r(array_change_key_case($array,CASE_LOWER))
?>