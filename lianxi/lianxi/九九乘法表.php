<?php 
    
    echo "<table width='600' border='200px'>";
    for($j=1;$j<=9;$j++)    {
    echo "<tr>";
    for($i=1;$i<=$j;$i++){
    echo "<td>{$i}x{$j}=".($i*$j)."</td>";
    }
    echo "</tr>";
    }
    echo "</table>";
?>

