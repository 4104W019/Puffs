<!DOCTYPE HTML>
<html>
<head>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Expires" CONTENT="-1">
	<!--Jquery-->
	<script lang="JavaScript" src="../../common/Jq/jquery-1.6.2.min.js"></script>
    <!--<script src="../../common/Jq/jquery.ui.datepicker.min.js"></script>-->
	<!--<link rel="stylesheet" href="../../common/Jq/jquery-ui-1.8.16.custom.css">-->
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
		    if ($("#OrderType").val() == "0") {
		        $('#OrderID, #OrderPhone, #OrderDate').attr("disabled", true);
		    }

		    $('#OrderType').change(function (event) {
		        if ($("#OrderType").val() == "0") {
		            $('#OrderID, #OrderPhone, #OrderDate').attr("disabled", true);
		        }
		        else {
		            $('#OrderID, #OrderPhone, #OrderDate').attr("disabled", false);
		        }
		    });
		    //var GetCmd_url = "http://" + parent.parent.g_ip + ":" + parent.parent.g_port_num + "/cmd";
		    //tmpDataArr_result = cjp_getData(GetCmd_url);

		    //$("#AST_DATE_select_button").datepicker();
		    //$("#AST_DATE_select_button").datepicker("option", "changeYear", true);
		    //$("#AST_DATE_select_button").datepicker("option", "yearRange", "1971:2036");
		}

		function QueryData() {

		}

		function CreatTable() {

		}

		function OrderAdd() {
		    parent.ConfigMain.location.replace('orderAdd.php');
		}

        function OrderModify(id) {
		    parent.ConfigMain.location.replace('orderEdit.php?id='+id);
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
                <td align ="left" valign ="center" bgcolor ="#000000" colspan="2" height = "20px"><font color="#FFFFFF" size="3" style="font-weight: bold">&nbsp;訂單查詢</font></td>
            </tr>
            <tr>
                <td width = 100% >
			        <div id="tableContent">
                        <div id="table_SubContent">
                            <div id="OrderAdd_btn" class="Content_button" onclick="OrderAdd();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">新增訂單</div>
				            <div id="ItemContent">
                                <form method="post">
                                    <table id="tabBasic" rules=none border=2 style="width:100%;">
                                        <!-- <tr>
                                            <td>查詢種類：</td>
                                            <td>
                                                <select id="OrderType" class="Cselesct">
                                                    <option value="0" selected>全部</option>
                                                    <option value="1">部分</option>
                                                </select>
                                            </td>
                                            <td  width = 60% ></td>
                                        </tr> -->
                                        <tr>
                                            <td>訂單編號：</td>
                                            <td>
                                                <input type="text" value="<?php echo isset($_POST['oId'])?$_POST['oId']:""; ?>" name="oId" id="oId" class="Cinput" maxlength="32" size="17">
                                            </td>
                                            <td  width = 60% ></td>
                                        </tr>
                                        <tr>
                                            <td>訂購人姓名：</td>
                                            <td>
                                                <input type="text" value="<?php echo isset($_POST['oName'])?$_POST['oName']:""; ?>" name="oName" id="oName" class="Cinput" maxlength="32" size="17">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>訂購人電話：</td>
                                            <td>
                                                <input type="text" value="<?php echo isset($_POST['oPhone'])?$_POST['oPhone']:""; ?>" name="oPhone" id="oPhone" class="Cinput" maxlength="32" size="17">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>訂購日期：</td>
                                            <td>
                                                <!--<input type="button" id="DATE_select_button" style="width:200px;height:22px"/>-->
                                                <input type="date" value="<?php echo isset($_POST['startDate'])?$_POST['startDate']:""; ?>" name="startDate" id="startDate" class="Cinput" maxlength="10" size="17">
                                                ~
                                                <input type="date" value="<?php echo isset($_POST['endDate'])?$_POST['endDate']:""; ?>" name="endDate" id="endDate" class="Cinput" maxlength="10" size="17">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
												<input type="submit" id="Query" name="Query" class="Content_button" value="查詢" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                </br>
                                <span class="span_title">查詢結果</span>
                                <table id="tabBasic2" border="1" width="100%">
                                    <tr>
                                        <td>訂單編號</td>
                                        <td>訂購日期</td>
                                        <td>配送日期</td>
                                        <td>訂購人姓名</td>
                                        <td>訂購人電話</td>
                                        <td>訂購人住址</td>
                                        <td>建單員工</td>
                                        <td>商品名稱</td>
                                        <td>數量</td>
                                        <td>總金額</td>
                                        <td>修改</td>
                                        <td>刪除</td>
                                    </tr>
                                    <?php
                                    include("orderFun.php");
                                    
									$isDelete = isset($_GET['isd'])?$_GET['isd']:"";

                                    $oId = isset($_POST['oId'])?$_POST['oId']:"";
                                    $oName = isset($_POST['oName'])?$_POST['oName']:"";
                                    $oPhone = isset($_POST['oPhone'])?$_POST['oPhone']:"";
                                    $startDate = isset($_POST['startDate'])?$_POST['startDate']:"";
                                    $endDate = isset($_POST['endDate'])?$_POST['endDate']:"";
                                    $eId = isset($_POST['eId'])?$_POST['eId']:"";


									if(isset($_POST['Query']) || $isDelete) { 
                                        $db = new orderFun();
                                        $stmt = $db->listOrders($oId, $oName, $oPhone, $eId, $startDate, $endDate, 1, 10);
                                        
                                        if($stmt){
											while($result=mysqli_fetch_object($stmt)){
                                                echo "<tr>";
                                                echo "<td>".$result->oId."</td>";
                                                echo "<td>".$result->oDate."</td>";
                                                echo "<td>".$result->oSendDate."</td>";
                                                echo "<td>".$result->oName."</td>";
                                                echo "<td>".$result->oPhone."</td>";
                                                echo "<td>".$result->oAddress."</td>";
                                                echo "<td>".$result->eId."</td>";
                                                echo "<td>".$result->dName."</td>";
                                                echo "<td>".$result->dNum."</td>";
                                                echo "<td>".$result->dNum*$result->dPrice."</td>";
                                                echo "<td>".'<input type="button" onclick="window.location.href=\'orderEdit.php?id='.$result->oId.'\';" value="修改" id="'.$result->dId.'" class="Content_button" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>'."</td>";
                                                echo "<td>".'<input type="button" onclick="window.location.href=\'orderDelete.php?id='.$result->oId.'\';" value="刪除" id="'.$result->dId.'" class="Content_button" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>'."</td>";
                                                echo "</tr>";
                                            }
                                        }
									}
									?>
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
