<?php
include('dbFun.php');
$username=$_POST["UserName"];
$password=$_POST["Password"];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $db = new dbFun();
    $isLogin = $db->login($username, $password);
    if($isLogin){
        session_start();
        // Store data in session variables
        $_SESSION["isLogin"] = true;
        $_SESSION["eName"] = $username;
        $_SESSION["ePassword"] = $password;
        header("location:main.php");
    }
    else{
        function_alert("帳號或密碼錯誤"); 
    }
}
else{
    function_alert("Something is wrong"); 
}

function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    return false;
} 
?>