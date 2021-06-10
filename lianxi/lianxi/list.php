<?php 
    $link= new mysqli("127.0.0.1","root","root","class");
    $sql="select * from study";
    $res=mysqli_query($link,$sql);
    $rows=mysqli_fetch_all($res,MYSQLI_ASSOC);

    // echo "<hr/><pre>";
    // print_r($rows);
    // echo "</pre>";

?> 

<table border="1">
    <thead>
        <tr>
            <th>姓名</th>
            <th>年龄</th>
            <th>住址</th>
        </tr>
    </thead>
    <tbody>
        <?php
            
            foreach($rows as $k=>$v){
                if($v['sage']>=18){
                    $a="成年";
                }else{
                    $a="未成年";
                }
                echo "<tr>";
                echo "<td>{$v['sname']}</td>";
                echo "<td>{$a}</td>";
                echo "<td>{$v['sadd']}</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>