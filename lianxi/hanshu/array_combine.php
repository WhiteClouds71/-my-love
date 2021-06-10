<?php
#创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值
    $a=["first","center","last"];
    $b=["a","b","c"];
    $c=array_combine($a,$b);

    print_r($c);

?>