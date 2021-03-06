<!DOCTYPE html>
<html>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
	<title>Config</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!--Jquery-->
	<script lang="JavaScript" src="../common/Jq/jquery-1.6.2.min.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="../css/ConfigStyle.css">
    <style>
        DIV {cursor: default;}     
    </style>
	<script type="text/javascript">
	    $(document).bind("contextmenu", function (event) { return false; });

	    function Init()
	    {
			ChangeItem(0);
			//$("#Config_Content").css('width' , parent.parent.g_window_width - 200);
			//$("#Config_Content").css('width' , '100%');
			//$(window).resize( function(){
			//	//console.log(parent.parent.g_window_height);
			//	//console.log(parent.parent.g_window_width);
			//    $("#Config_Page").height(parent.parent.g_window_height - 110);
			//    $("#ConfigMain").height(parent.parent.g_window_height - 110);
			//});
			//$("#Config_Page").height("100%");
			//$("#ConfigMain").height("100%");
	    }

	    function mouseover_menu(button) {
	    	button.style.backgroundImage = "url(../image/config/bar_up.png)";
	    }
	    function mouseout_menu(button) {
	    	button.style.backgroundImage = "url(../image/config/bar.png)";
	    }

		function ChangeItem(elemName)
	    {    		
		    switch (elemName) {
		        case 0:
		            ConfigMain.location.replace('../Config/sub/title.html');
		            break;
			    case 1:
			        ConfigMain.location.replace('../Config/sub/Dish_Q.php');
			        break;
			    case 2:
			        ConfigMain.location.replace('../Config/sub/Supplier_Q.php');
			        break;
			    case 3:
			        ConfigMain.location.replace('order/orderList.php');
			        break;
			    case 4:
                    ConfigMain.location.replace('../Config/sub/Emplyee_Q.php');
			        break;
			    default:
			        alert(elemName.split('_')[2]);
			        break;
			}
	    }
	</script>
</head>
<body onload="Init();">
	<div id="Config_Page">
		<div id="Config_MainMenu">
			<table id="tabMainMenu" cellspacing="0" cellPadding="0" border="0">
                <tr>
                    <td>
                        <div class="TitleBar"><div class="Text_Over_Image">??????</div> </div>
                    </td>
                </tr>
                <tr onclick="ChangeItem(1)">
                    <td>
                        <div id="mbackground1" class="TitleButton" onmouseover="mouseover_menu(this)" onmouseout="mouseout_menu(this)">
                        <div id="mtext1" class="SubText_Over_Image" style="padding-top: 5px">????????????</div> </div>
                    </td>
                </tr>
                <tr onclick="ChangeItem(2)">
                    <td>
                        <div id="mbackground2" class="TitleButton" onmouseover="mouseover_menu(this)" onmouseout="mouseout_menu(this)">
                        <div id="mtext2" class="SubText_Over_Image" style="padding-top: 5px">????????????</div> </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="TitleBar"><div class="Text_Over_Image">??????</div> </div>
                    </td>
                </tr>
                <tr onclick="ChangeItem(3)">
                    <td>
                        <div id="mbackground3" class="TitleButton" onmouseover="mouseover_menu(this)" onmouseout="mouseout_menu(this)">
                        <div id="mtext3" class="SubText_Over_Image" style="padding-top: 5px">??????</div> </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="TitleBar"><div class="Text_Over_Image">??????</div> </div>
                    </td>
                </tr>
                <tr onclick="ChangeItem(4)">
                    <td>
                        <div id="mbackground4" class="TitleButton" onmouseover="mouseover_menu(this)" onmouseout="mouseout_menu(this)">
                        <div id="mtext4" class="SubText_Over_Image" style="padding-top: 5px">??????</div> </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="Logo" style="padding-top: 7px"><img id="img_logo" src="../image/config/Logo.png" alt="logo" height="120" width="120" style="margin-top:2px;"/></div> 
                    </td>
                </tr>
			</table>
		</div>
		<div id="Config_Content">
			<iframe id="ConfigMain" name="ConfigMain" src="" scrolling="no"	frameBorder="no"></iframe>
		</div>
	</div>

</body>
</html>

