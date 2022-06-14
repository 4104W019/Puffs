<?php
    function function_alert($message) { 
        // Display the alert box  
        echo "<script>alert('$message');
            window.location.href='orderList.php';
        </script>"; 
        return false;
    } 

    if(isset($_POST['Edit'])){
        include("orderFun.php");

        $oId = isset($_POST['OrderId'])?$_POST['OrderId']:"";
        $oDate = isset($_POST['OrderoDate'])?$_POST['OrderoDate']:"";
        $oSendDate = isset($_POST['SendDate'])?$_POST['SendDate']:"";
        $oName = isset($_POST['OrderName'])?$_POST['OrderName']:"";
        $oPhone = isset($_POST['OrderPhone'])?$_POST['OrderPhone']:"";
        $oAddress = isset($_POST['OrderAddr'])?$_POST['OrderAddr']:"";
        $eId = isset($_POST['OrderEmp'])?$_POST['OrderEmp']:"";
        $dId = isset($_POST['OrderpName'])?$_POST['OrderpName']:"";
        $dNum = isset($_POST['OrderpNum'])?$_POST['OrderpNum']:"";
    
        $listSet = array();
        array_push($listSet, "oDate = '".$oDate."'");
        array_push($listSet, "oSendDate = '".$oSendDate."'");
        array_push($listSet, "oName = '".$oName."'");
        array_push($listSet, "oPhone = '".$oPhone."'");
        array_push($listSet, "oAddress = '".$oAddress."'");
        array_push($listSet, "eId = $eId");
        array_push($listSet, "dId = $dId");
        array_push($listSet, "dNum = $dNum");
    
        $db = new orderFun();
        $result = $db->updateOrder($oId, $oDate, $oSendDate, $oName, $oPhone, $oAddress, $eId, $dId, $dNum);
        
        if($result === TRUE){
            function_alert("Success");
        }
        else{
            function_alert("Error: ".$db->error);
        }
    }
?>

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
		    <?php
                include("orderFun.php");

                if(isset($_GET['id'])){
                    $db = new orderFun();
                    $stmt = $db->listOrders($_GET['id'], "", "", "", "", "", 1, 1);
                    if($stmt){
                        $result=mysqli_fetch_object($stmt);
                        echo "$('#OrderId').val('".$result->oId."');";
                        echo "$('#OrderoDate').val('".$result->oDate."');";
                        echo "$('#SendDate').val('".$result->oSendDate."');";
                        echo "$('#OrderName').val('".$result->oName."');";
                        echo "$('#OrderPhone').val('".$result->oPhone."');";
                        echo "$('#OrderAddr').val('".$result->oAddress."');";
                        echo "$('#OrderEmp').val('".$result->eId."');";
                        echo "$('#OrderpName').val('".$result->dId."');";
                        echo "$('#OrderpNum').val('".$result->dNum."');";
                    }
                }
                else{
                    echo "Error";
                }
            ?>
		}

		function SaveData() {

		}

		function OrderBack() {
		    parent.ConfigMain.location.replace('orderList.php');
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
                <td align ="left" valign ="center" bgcolor ="#000000" colspan="2" height = "20px"><font color="#FFFFFF" size="3" style="font-weight: bold">&nbsp;修改訂單</font></td>
            </tr>
            <tr>
                <td width = 100% >
			        <div id="tableContent">
                        <div id="table_SubContent">
				            <div id="ItemContent">
                                <span class="span_title">修改訂單</span>
                                <form method="post">
                                    <table id="tabBasic" rules=none border=2 style="width:100%;">
                                        <tr>
                                            <td>訂單編號：</td>
                                            <td>
                                                <input type="text" name="OrderId" id="OrderId" class="Cinput" maxlength="15" readonly>
                                            </td>
                                            <td  width = 60% ></td>
                                        </tr>
                                        <tr>
                                            <td>訂購人姓名：</td>
                                            <td>
                                                <input type="text" name="OrderName" id="OrderName" class="Cinput" maxlength="15">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>訂購人電話：</td>
                                            <td>
                                                <input type="text" name="OrderPhone" id="OrderPhone" class="Cinput" maxlength="10">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>訂購人地址：</td>
                                            <td>
                                                <input type="text" name="OrderAddr" id="OrderAddr" class="Cinput" maxlength="30">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>訂購日期：</td>
                                            <td>
                                                <input type="date" name="OrderoDate" id="OrderoDate" class="Cinput" maxlength="15">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>配送日期：</td>
                                            <td>
                                                <input type="date" name="SendDate" id="SendDate" class="Cinput" maxlength="15">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>商品名稱：</td>
                                            <td>
                                                <input type="text" name="OrderpName" id="OrderpName" class="Cinput" maxlength="15">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>商品數量：</td>
                                            <td>
                                                <input type="text" name="OrderpNum" id="OrderpNum" class="Cinput" maxlength="5">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>接單員工：</td>
                                            <td>
                                                <input type="text" name="OrderEmp" id="OrderEmp" class="Cinput" maxlength="30">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <input type="submit" id="Edit" name="Edit" class="Content_button" value="儲存" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>
                                            </td>
                                            <td>
                                                <div id="OrderBack" class="Content_button" onclick="OrderBack();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">返回</div>
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
