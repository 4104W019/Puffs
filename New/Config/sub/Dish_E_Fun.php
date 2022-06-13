<?php
    include "db_conn.php";

    $dId = isset($_POST['DishId'])?$_POST['DishId']:"";
    $dName = isset($_POST['DishName'])?$_POST['DishName']:"";
    $dPrice = isset($_POST['DishPrice'])?$_POST['DishPrice']:"";
    $description = isset($_POST['DishDesc'])?$_POST['DishDesc']:"";
    $sNo = isset($_POST['DishSNo'])?$_POST['DishSNo']:"";

    $listSet = array();
    array_push($listSet, "dName = '".$dName."'");
    array_push($listSet, "dPrice = '".$dPrice."'");
    array_push($listSet, "description = '".$description."'");
    array_push($listSet, "sNo = ".$sNo);

    $strSet = implode(",", $listSet);
    $sql = "UPDATE Dish SET ".$strSet." WHERE dId=".$dId;

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
         window.location.href='Dish_Q.php';
        </script>"; 
        return false;
    } 
?>