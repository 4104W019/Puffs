<?php
    include "db_conn.php";

    $sNo = isset($_GET['sno'])?$_GET['sno']:"";

    $sql = "delete FROM supplier where sNo=$sNo";

    $result = $db->query($sql);
    
    if($result === TRUE){
        function_alert("Success");
    }
    else{
        function_alert("Error: ".$db->error);
    }

    function function_alert($message) { 
        // Display the alert box  
        echo "<script>alert('$message');
         window.location.href='Supplier_Q.php?isd=true';
        </script>"; 
        return false;
    } 
?>