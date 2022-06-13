<?php
	include('dbFun.php');
	session_start();

	if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] === true){
		header("location: main.php");
		exit;  //記得要跳出來，不然會重複轉址過多次
	}
?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
    <head>
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta HTTP-EQUIV="Expires" CONTENT="-1">
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <script lang="JavaScript" src="common/Jq/jquery-1.6.2.min.js"></script>
    <script lang="JavaScript" src="common/JSONParser.js"></script>
    <style>body {cursor: default;}</style>
    <title>Login</title>
    <script type="text/javascript">
	    $(document).bind("contextmenu",function(event){return false;});

	    function OnButtonDown(button) {
	        button.style.backgroundImage = "url(image/main/apply_down1.png)";
	    }
	    function OnButtonUp(button) {
	        button.style.backgroundImage = "url(image/main/apply_up1.png)";
	    }
	    function OnButtonOver(button) {
	        button.style.backgroundImage = "url(image/main/apply_focus1.png)";
	    }
	    function OnButtonOut(button) {
	        button.style.backgroundImage = "url(image/main/apply_up1.png)";
	    }

	    $(document).ready( function(){
			console.log("<?php echo isset($_SESSION["isLogin"])?$_SESSION["isLogin"]:"" ?>")
		    $("#UserName").focus();
		    $("#UserName").keypress(function(event) {
			    if ( event.keyCode == 13 ) {
				    input_chk = true;
				    $("#Password1").select();
			    }
		    });
		
		    $("#Password1").keypress(function(event) {
			    if ( event.keyCode == 13 ) $("#login_btn").click();
		    });
		
		    // $("#UserName").alphanumeric({allow:"~!;#$%^&*(),+{}:\"><\?`-=[]_'./@"});
		    // $("#Password").alphanumeric({allow:"~!;#$%^&*(),+{}:\"><\?`-=[]_'./@"});
	    });
	
    </script>
</head>
<body onload="">
	<div id="loginarea" style="width: 544px; height: 343px; background-image: url('image/login_main.png'); background-repeat: no-repeat; text-align:center;">
        &nbsp;
        </br>
        <span style="color:white;font-size: 30px; top:8px;position: relative;">beard mama's泡芙專賣店-管理系統</span>
		<form method="post" action="loginfun.php">
	    <table style="width:63%; margin-left: 100px; margin-top: 70px; text-align:left;">
            <tr>
                <td class="auto-style1" align="right"><span id="sname" style="font-size: 16px;">員工編號</span>:</td>
                <td class="auto-style4"><input type="text" name="UserName" id="UserName" class="longinput" maxlength="32" size="17"></td>
            </tr>
            <tr>
                <td class="auto-style1" align="right"><span id="spasswd" style="font-size: 16px;">密　　碼</span>:</td>
                <td class="auto-style4"><input type="password" name="Password" id="Password" class="longinput" maxlength="32" size="18"></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="登入" id="login_btn" class="MenuButton" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/></td>
			</tr>
        </table>
		</form>
	</div>
</body>
</html>
