<?php
include "db_conn.php";

$eId = $_POST["eId"];
$ePassword = $_POST["ePassword"];
echo " <center><table border='1'>";
$query2 = "select * from employee";
$isEmployee = false;
if($stmt = $db->query($query2)){

    while($result=mysqli_fetch_object($stmt)){
        echo "<tr>";
            echo "<th>".$result->eId."</th>";
            echo "<th>".$result->ePassword."</th>";
        echo "</tr>";
        if($result->eId==$eId && $result->ePassword==$ePassword)
        {
            $isEmployee = true;
            //break;
        }
    }

}
echo "<a href=./index.php> Back Home </a>";
echo "</table> </center>";
return $isEmployee;
?>
