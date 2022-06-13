<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>廠商查詢</title>
 </head>
 <center>
     <body>
         <h2>
         <a href=./puffs.php> 回首頁 </a>
         <hr>
         廠商查詢
</h2>
        <table border='1'>
            <tr>
                <th>廠商編號</th>
                <th>廠商名稱</th>
                <th>廠商電話</th>
                <th>廠商住址</th>
            </tr>
            <?php
            include "db_conn.php";
            $query1 = "select * from supplier";
            if($stmt = $db->query($query1)){
                while($result=mysqli_fetch_object($stmt)){
                    echo "<tr>";
                        echo "<td>".$result->sNo."</td>";
                        echo "<td>".$result->name."</td>";
                        echo "<td>".$result->phone."</td>";
                        echo "<td>".$result->address."</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

     </body>
 </center>
</html> 