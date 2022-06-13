<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <title></title>
    <script lang="JavaScript" src="common/Jq/jquery-1.6.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <style>
        DIV {cursor: default;}
    </style>
    <script type="text/javascript">
	
	    $(document).bind("contextmenu",function(event){return false;});
	

	    //$(document).ready(
	    //function(){	
	    //	$(window).resize( function (){
	    //	    $("#article").height(parent.g_window_height - 110);
	    //	    $("#IfrmMain").height(parent.g_window_height - 110);
	    //	});
	    //	$("#article").height(parent.g_window_height - 110);
	    //	$("#IfrmMain").height(parent.g_window_height - 110);
	    //});
	
	    //function block_UI(){
		//	    $.blockUI({ 
		//			    message: $('#upload_content'), 
		//			    css: { top: '50%' } 
		//	    }); 
	    //}
	
	    //function busy_block(sec){
		//    if(typeof(sec) == 'undefined' || sec == null) sec = 5000;
		//    $.blockUI({ 
		//		    message: null, 
		//		    overlayCSS:  { 
		//			    backgroundColor: '#000', 
		//			    opacity:         0, 
		//		    }, 
		//    }); 
		
		//    setTimeout('unblock_UI()' , sec);
		
	    //}
	
	    //function unblock_UI(){
		//    $.unblockUI();
	    //}
	
	    function refresh() {
	        //parent.window.location.reload();
	        parent.window.location.replace('index.html');
	    }
	    function mouseover_Loginout() {
	        document.getElementById("imgLoginout").src = "image/main/logout04.png";
	    }
	    function mouseout_Loginout() {
	        document.getElementById("imgLoginout").src = "image/main/logout03.png";
	    }
	
	    function add_lead_zero(v){
		    v = parseInt(v);
		    if( v < 10 && v >= 0 ) v = '0'+v;
		    return v;
	    }
	
	    //function callback_code_resolve(code){
		//    code = String(code);
		//    var str = '';
		//    switch(code){
		//	    case '200' : str = [ 'Success' ];
		//		    break;
		//	    case '400' : str = [ 'Bad Request' ];
		//		    break;
		//	    case '12029' : str = [ 'Fail' , 'AST_NETWORK_FAILED' ];
		//		    break;
		//	    default : str = [ 'Unsure error' ];
		//		    break;
		//    }
		
		//    for(var i in str) str[i] = psLang._(str[i]);
		
		//    return str;
	    //}
	
	    //$(document).ready(function(){
	    //	switch(parseInt(parent.access_level)){
	    //		case 0 : 					
	    //			break;
	    //		default: window.location.replace('./index.html');
	    //			break;
	    //	}
	    //});
	
	    function get_multiL( mode , str ){
		    if(mode == 0){ //return success and fail
			    return { 's' : psLang._('AST_SUCCESS') , 'f' : psLang._('AST_FAILURE') };
		    }
		    else if(mode == 1){ //parse str to multi
			    return psLang._(str);
		    }	
	    }
	
	
    </script>
</head>
<body>
	<header>
		<img class="header_img" src="image/main/head.png" />
		<nav id="Logo">
            <table width="300px">
                <tr>
                    <td>
                        <img id="img_logo" src="./image/main/Logo.png" alt="logo"/>
                    </td>
                </tr>
            </table>
		</nav>
		<nav id="Menu">
            <table cellpadding="0" cellspacing="0" style="height: 60px; vertical-align: middle;">
                <tr>
                    <td>
                        <!-- <div id="div_Loginout" class="MenuButton" onclick="refresh();"> -->
						<div id="div_Loginout" class="MenuButton">
							<a href="logoutfun.php">
								<img id="imgLoginout" src="./image/main/logout03.png" height="40" width="40" alt="logout" title="logout" onmouseover="mouseover_Loginout()" onmouseout="mouseout_Loginout()" />
							</a>
						</div>
                    </td>
                </tr>
            </table>
		</nav>
	</header>
	<div id="article">
		<iframe id="IfrmMain" name="IfrmMain" src="./Config/Config.html" scrolling="no" frameBorder="no"></iframe>
	</div>
	<footer>
		<img class="header_img" src="./image/main/bg_footer.png">
	</footer>
</body>
</html>



