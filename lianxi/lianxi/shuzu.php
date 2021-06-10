<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul>
<?php
        $list=[
            'AAAAA',
            'SSSSS',
            'DDDDD',
            'FFFFF'

        ];
            $arr1=count($list);
            // echo $arr1;
            for($i=0;$i<$arr1;$i++){
                echo "<li>$list[$i]</li>";
            };

    ?>
</ul>

<table border="1">
    <tr>
        <th>姓名</th>
        <th>年龄</th>
        <th>邮箱</th>    

    </tr>
    
    <?php
        $list2 = [
            ["name"=>"zhangsan","age"=>11,"email"=>"zhangsan@qq.com"],
            ["name"=>"lisi","age"=>22,"email"=>"lisi@qq.com"],
            ["name"=>"wangwu","age"=>33,"email"=>"wangwu@qq.com"],
            ["name"=>"zhaoliu","age"=>44,"email"=>"zhaoliu@qq.com"],
        ];
        
            foreach($list2 as $k=>$v){
                echo "<tr>
                        <td>".$v['name']."</td>
                        <td>".$v['age']."</td>
                        <td>".$v['email']."</td>
                    </tr>";
            }

    ?>
</table>
    
</body>
</html>