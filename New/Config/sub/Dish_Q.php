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
			// 	$('#DishQuery').click();
			// }

		    //var GetCmd_url = "http://" + parent.parent.g_ip + ":" + parent.parent.g_port_num + "/cmd";
		    //tmpDataArr_result = cjp_getData(GetCmd_url);
		}

		function QueryData() {

		}

		function CreatTable() {

		}

		function DishAdd() {
		    parent.ConfigMain.location.replace('Dish_A.php');
		}

        function DishModify(id) {
            //console.log(id)
            var tt='Dish_E.php?id='+id;
			//var tt='Dish_E.php';
            //console.log(tt)
		    parent.ConfigMain.location.replace(tt);
		}
        function DishDelete() {
		    
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
                                <div id="DishAdd_btn" class="Content_button" onclick="DishAdd();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">新增單點</div>
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
												<input type="submit" id="DishQuery" name="DishQuery" class="Content_button" value="查詢" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>
											</form>
                                            <!--<div id="OrderQuery" class="Content_button" onclick="QueryData();" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)">查詢</div>-->
                                        </td>
                                    </tr>
					            </table>
                                </br>
                                <span class="span_title">查詢結果</span>
                                <table id="tabBasic2" border="1" width="100%">
                                    <tr>
                                        <td>泡芙編號</td>
                                        <td>名稱</td>
                                        <td>價格</td>
                                        <td>單點說明</td>
                                        <td>廠商編號</td>
                                        <td>廠商名稱</td>
                                        <td>廠商電話</td>
                                        <td>廠商住址</td>
                                        <td>修改</td>
                                        <td>刪除</td>
                                    </tr>

                                    <?php
									$isDelete = isset($_GET['isd'])?$_GET['isd']:"";

									if(isset($_POST['DishQuery']) || $isDelete) { 
										include "db_conn.php";
										$query_dish = "SELECT * FROM dish NATURAL JOIN supplier";
										if($stmt = $db->query($query_dish)){
											while($result=mysqli_fetch_object($stmt)){
												echo "<tr>";
												echo "<td>".$result->dId."</td>";
												echo "<td>".$result->dName."</td>";
                                                echo "<td>".$result->dPrice."</td>";
                                                echo "<td>".$result->description."</td>";
                                                echo "<td>".$result->sNo."</td>";
                                                echo "<td>".$result->name."</td>";
                                                echo "<td>".$result->phone."</td>";
                                                echo "<td>".$result->address."</td>";
                                                echo "<td>".'<input type="button" onclick="DishModify('.$result->dId.');" value="修改" id="'.$result->dId.'" class="Content_button" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>'."</td>";
                                                echo "<td>".'<input type="button" onclick="window.location.href=\'Dish_D_Fun.php?did='.$result->dId.'\';" value="刪除" id="'.$result->dId.'" class="Content_button" onmouseover="OnButtonOver(this)" onmouseout="OnButtonOut(this)" onmousedown="OnButtonDown(this)" onmouseup="OnButtonUp(this)"/>'."</td>";
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
