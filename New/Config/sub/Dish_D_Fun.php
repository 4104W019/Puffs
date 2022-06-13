<?php
    include "db_conn.php";

    $dId = isset($_GET['did'])?$_GET['did']:"";

    $sql = "delete FROM dish where did=$dId";

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
         window.location.href='Dish_Q.php?isd=true';
        </script>"; 
        return false;
    } 
?>