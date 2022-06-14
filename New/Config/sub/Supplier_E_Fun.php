<?php
    include "db_conn.php";

    $sNo = isset($_POST['SupplierSNo'])?$_POST['SupplierSNo']:"";
    $name = isset($_POST['SupplierName'])?$_POST['SupplierName']:"";
    $phone = isset($_POST['SupplierPhone'])?$_POST['SupplierPhone']:"";
    $address = isset($_POST['SupplierAddr'])?$_POST['SupplierAddr']:"";

    $listSet = array();
    array_push($listSet, "name = '".$name."'");
    array_push($listSet, "phone ='".$phone."'");
    array_push($listSet, "address ='".$address."'");

    $strSet = implode(",", $listSet);
    $sql = "UPDATE supplier SET ".$strSet." WHERE sNo=".$sNo;
    print_r($sql);
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
         window.location.href='Supplier_Q.php';
        </script>"; 
        return false;
    }
?>
