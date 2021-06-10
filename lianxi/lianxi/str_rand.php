<?php 

    function str_rand($lenght=8){
        $str0='QWERTYUIOPASDFGHJKZXCVBNMqwertyuiopasdfghjkzxcvbnm234567890';
        $str="";
        for($i=0;$i<$lenght;$i++){
            $num=mt_rand(0,56);
            $c=$str0[$num];
            $str .=$c;
        }
        return $str;
    }

    var_dump(str_rand());
?>