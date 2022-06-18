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

		function SupplierBack() {
		    parent.ConfigMain.location.replace('Supplier_Q.php');
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
                <td align ="left" valign ="center" bgcolor ="#000000" colspan="2" height = "20px"><font color="#FFFFFF" size="3" style="font-weight: bold">&nbsp;廠商新增</font></td>
            </tr>
            <tr>
                <td width = 100% >
			        <div id="tableContent">
                        <div id="table_SubContent">
				            <div id="ItemContent">
                                <span class="span_title">新增廠商項目</span>
                                <form method="post" action="Supplier_A_Fun.php">
                                    <table id="tabBasic" rules=none border=2 style="width:100%;">
                                        <tr>
                                            <td>廠商編號：</td>
                                            <td>
                                                <input type="text" name="SupplierSNo" id="SupplierSNo" class="Cinput" maxlength="15">
                                            </td>
                                            <td  width = 60% ></td>
                                        </tr>
                                        <tr>
                                            <td>廠商名稱：</td>
                                            <td>
                                                <input type="text" name="SupplierName" id="SupplierName" class="Cinput" maxlength="15">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>廠商電話：</td>
                                            <td>
                                                <input type="text" name="SupplierPhone" id="SupplierPhone" class="Cinput" maxlength="15">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>廠商住址：</td>
                                            <td>
                                                <input type="text" name="SupplierAddr" id="SupplierAddr" class="Cinput" maxlength="15">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!-- <div id="SupplierAdd" class="Content_button" onclick="AddData();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">新增</div> -->
                                                <input type="submit" value="新增" id="Add_btn" class="Content_button" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>
                                            </td>
                                            <td>
                                                <div id="SupplierBack" class="Content_button" onclick="SupplierBack();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">返回</div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
				            </div>
                        </div>
			        </div>
                </td>
            </tr>
        </table>
	</div>
</body>
</html>
