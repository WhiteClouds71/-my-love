<?php
    #使用键名比较计算数组的差集
    $arr1=array('one'=>12,'two'=>23,'trwee'=>34);
    $arr2=array('two'=>32,'trwee'=>43,'furo'=>43);
    var_dump(array_diff_key($arr1,$arr2));
    
?>