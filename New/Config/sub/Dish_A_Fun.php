<?php
    include "db_conn.php";

    $dId = isset($_POST['DishId'])?$_POST['DishId']:"";
    $dName = isset($_POST['DishName'])?$_POST['DishName']:"";
    $dPrice = isset($_POST['DishPrice'])?$_POST['DishPrice']:"";
    $description = isset($_POST['DishDesc'])?$_POST['DishDesc']:"";
    $sNo = isset($_POST['DishSNo'])?$_POST['DishSNo']:"";

    $listSet = array();
    array_push($listSet, $dId);
    array_push($listSet, "'".$dName."'");
    array_push($listSet, "'".$dPrice."'");
    array_push($listSet, "'".$description."'");
    array_push($listSet, $sNo);

    $strSet = implode(",", $listSet);
    $sql = "INSERT INTO dish VALUES(".$strSet.")";
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
         window.location.href='Dish_Q.php';
        </script>"; 
        return false;
    } 
?>