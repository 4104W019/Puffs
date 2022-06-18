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
		
		var isdelete = false;

		//CreatTab
		function init()
		{
			// var getUrlString = location.href;
			// var url = new URL(getUrlString);
			// isDelete = url.searchParams.get('isd');

			// location.href = ""

			// if(isDelete || isDelete == 'true'){
			// 	$('#SupplierQuery').click();
			// }

		    //var GetCmd_url = "http://" + parent.parent.g_ip + ":" + parent.parent.g_port_num + "/cmd";
		    //tmpDataArr_result = cjp_getData(GetCmd_url);
		}

		function QueryData() {

		}

		function CreatTable() {

		}

		function SupplierAdd() {
		    parent.ConfigMain.location.replace('Supplier_A.php');
		}

        function SupplierModify(id) {
            var tt='Supplier_E.php?id='+id;
		    parent.ConfigMain.location.replace(tt);
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
                <td align ="left" valign ="center" bgcolor ="#000000" colspan="2" height = "20px"><font color="#FFFFFF" size="3" style="font-weight: bold">&nbsp;廠商查詢</font></td>
            </tr>
            <tr>
                <td width = 100% >
			        <div id="tableContent">
                        <div id="table_SubContent">
				            <div id="ItemContent">
                                <div id="SupplierAdd_btn" class="Content_button" onclick="SupplierAdd();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">新增廠商</div>
					            <table id="tabBasic" rules=none border=2 style="width:100%;">

                                    <tr>
                                        <td>
                                            <form method="post">
												<input type="submit" id="Query" name="Query" class="Content_button" value="查詢" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>
											</form>
                                            <!--<div id="OrderQuery" class="Content_button" onclick="QueryData();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">查詢</div>-->
                                        </td>
                                    </tr>
					            </table>
                                </br>
                                <span class="span_title">查詢結果</span>
                                <table id="tabBasic2" border="1" width="100%">
                                    <tr>
                                        <td>廠商編號</td>
                                        <td>廠商名稱</td>
                                        <td>廠商電話</td>
                                        <td>廠商住址</td>
                                        <td>修改</td>
                                        <td>刪除</td>
                                    </tr>

                                    <?php
									$isDelete = isset($_GET['isd'])?$_GET['isd']:"";

									if(isset($_POST['Query']) || $isDelete) { 
										include "db_conn.php";
										$query_supplier = "SELECT * FROM supplier";
										if($stmt = $db->query($query_supplier)){
											while($result=mysqli_fetch_object($stmt)){
												echo "<tr>";
												echo "<td>".$result->sNo."</td>";
												echo "<td>".$result->name."</td>";
                                                echo "<td>".$result->phone."</td>";
                                                echo "<td>".$result->address."</td>";
                                                echo "<td>".'<input type="button" onclick="SupplierModify('.$result->sNo.');" value="修改" id="'.$result->sNo.'" class="Content_button" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>'."</td>";
                                                echo "<td>".'<input type="button" onclick="window.location.href=\'Supplier_D_Fun.php?sno='.$result->sNo.'\';" value="刪除" id="'.$result->sNo.'" class="Content_button" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>'."</td>";
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
