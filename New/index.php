<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
    <meta http-equiv="Expires" content="-1">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <script src="./common/Jq/jquery-1.6.2.min.js"></script>
    <!--<style></style>-->
    <title>beard mama's</title>
    <script language="JavaScript"> 

        var g_host = top.location.host;
        var g_ip = g_host.split(":")[0];
        var g_port_num = g_host.split(":")[1];

        function c_log(str) {
            try {
                console.log(str);
            }
            catch (e) {

            }
        }

        function Init() {
            IFrameShell.location.replace('login.php');
        }

    </script>
</head>
<body onload="Init();" onbeforeunload="">
    <div id="divShell">
        <iframe id="IFrameShell" name="IFrameShell" src="" scrolling="no" frameborder="no" style="min-height: 700px; min-width: 980px;width:100%; height:100%"></iframe>
    </div>
</body>
</html>