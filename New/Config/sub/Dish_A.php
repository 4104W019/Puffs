<!DOCTYPE HTML>
<html>
<head>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Expires" CONTENT="-1">
	<!--Jquery-->
	<script lang="JavaScript" src="../../common/Jq/jquery-1.6.2.min.js"></script>
	<!--Else-->
    <script lang="JavaScript" src="../../common/JSONParser.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/ConfigStyle.css" />
	
	<style>
        DIV {cursor: default;}   
	</style>
	<script>
		$(document).bind("contextmenu",function(event){return false;});
		
		//CreatTab
		function init()
		{
		    //var GetCmd_url = "http://" + parent.parent.g_ip + ":" + parent.parent.g_port_num + "/cmd";
		    //tmpDataArr_result = cjp_getData(GetCmd_url);
		}

		function AddData() {

		}

		function DishBack() {
		    parent.ConfigMain.location.replace('Dish_Q.php');
		}

		function OnButtonDown(button) {
		    button.style.backgroundImage = "url(../../image/main/apply_down1.png)";
		}
		function OnButtonUp(button) {
		    button.style.backgroundImage = "url(../../image/main/apply_up1.png)";
		}
		function OnButtonOver(button) {
		    button.style.backgroundImage = "url(../../image/main/apply_focus1.png)";
		}
		function OnButtonOut(button) {
		    button.style.backgroundImage = "url(../../image/main/apply_up1.png)";
		}

		function c_log(v) { try {/*console.log(v)*/ } catch (e) { } }
		
	</script>
</head>
<body onload="init();">
	<div id="Config_SubContent">
        <table id="Config_table" >
            <tr>
                <td align ="left" valign ="center" bgcolor ="#000000" colspan="2" height = "20px"><font color="#FFFFFF" size="3" style="font-weight: bold">&nbsp;單點查詢</font></td>
            </tr>
            <tr>
                <td width = 100% >
			        <div id="tableContent">
                        <div id="table_SubContent">
				            <div id="ItemContent">
                                <span class="span_title">新增單品項目</span>
					            <table id="tabBasic" rules=none border=2 style="width:100%;">
                                    <tr>
                                        <td>商品名稱：</td>
                                        <td>
                                            <input type="text" name="DishName" id="DishName" class="Cinput" maxlength="15">
                                        </td>
                                        <td  width = 60% ></td>
                                    </tr>
                                    <tr>
                                        <td>價格：</td>
                                        <td>
                                            <input type="text" name="DishPrice" id="DishPrice" class="Cinput" maxlength="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>說明：</td>
                                        <td>
                                            <input type="text" name="DishDesc" id="DishDesc" class="Cinput" maxlength="30">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>廠商名稱：</td>
                                        <td>
                                            <input type="text" name="DishDesc" id="Text1" class="Cinput" maxlength="15">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>廠商電話：</td>
                                        <td>
                                            <input type="text" name="DishDesc" id="Text2" class="Cinput" maxlength="15">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>廠商住址：</td>
                                        <td>
                                            <input type="text" name="DishDesc" id="Text3" class="Cinput" maxlength="15">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="DishAdd" class="Content_button" onclick="AddData();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">新增</div>
                                        </td>
                                        <td>
                                            <div id="DishBack" class="Content_button" onclick="DishBack();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">返回</div>
                                        </td>
                                    </tr>
					            </table>
				            </div>
                        </div>
			        </div>
                </td>
            </tr>
        </table>
	</div>
</body>
</html>
