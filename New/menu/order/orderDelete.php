<?php
    function function_alert($message) { 
        // Display the alert box  
        echo "<script>alert('$message');
         window.location.href='orderList.php?isd=true';
        </script>"; 
        return false;
    } 

    $oId = isset($_GET['id'])?$_GET['id']:"";
    if($oId != ''){
        include("orderFun.php");
        $db = new orderFun();

        $result = $db->deleteOrder($oId);

        if($result === TRUE){
            function_alert("Success");
        }
        else{
            function_alert("Error: ".$db->error);
        }
    }
    else{
        function_alert("Error: 未帶入訂單編號");
    }


?>