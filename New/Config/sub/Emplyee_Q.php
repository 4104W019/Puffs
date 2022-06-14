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
				            <div id="ItemContent">
					            <table id="tabBasic" rules=none border=2 style="width:100%;">
                                    <tr>
                                        <td>查詢種類：</td>
                                        <td>
                                            <select id="OrderType" class="Cselesct">
                                                <option value="0" selected>全部</option>
                                                <!--<option value="1">部分</option>-->
                                            </select>
                                        </td>
                                        <td  width = 60% ></td>
                                    </tr>
                                    <tr>
										<td>
											<form method="post">
												<input type="submit" id="EmployeeQuery" name="EmployeeQuery" class="Content_button" value="查詢" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>
											</form>
											<!--<div id="OrderQuery" class="Content_button" onclick="QueryData();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">查詢</div>-->
										</td>
                                    </tr>
					            </table>
                                </br>
                                <span class="span_title">查詢結果</span>
								<table id="tabBasic2" border="1" width="300px;">
									<tr>
										<td>員工編號</td>
										<td>員工姓名</td>
										<td>經手訂單數</td>
									</tr>
									<?php
									if(isset($_POST['EmployeeQuery'])) { 
										include "db_conn.php";
										$query_employee = "SELECT e.eId, e.eName ,COUNT(*) AS oNum FROM employee AS e JOIN orders AS o ON e.eId = o.eId GROUP BY e.eId";
										if($stmt = $db->query($query_employee)){
											while($result=mysqli_fetch_object($stmt)){
												echo "<tr>";
												echo "<td>".$result->eId."</td>";
												echo "<td>".$result->eName."</td>";
												echo "<td>".$result->oNum."</td>";
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
