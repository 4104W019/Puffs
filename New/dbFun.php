<?php
define("DB_HOST", "172.17.0.3");
define("DB_USERNAME", "web");
define("DB_PASSWORD", "1qaz@WSX");
define("DB_DATABASE_NAME", "puffs");
header("Pragma: no-cache");
class dbFun
{
    protected $conn = null;

    public function __construct()
    {
        $this->conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) {
            echo "Connect failed: ".mysqli_connect_error();
            exit();
        }
        mysqli_set_charset($this->conn,"utf8");//設定編碼
        mysqli_select_db($this->conn,DB_DATABASE_NAME); //連線狀態中更換資料庫
    }
    
    // 登入的方法
    public function login($name="" , $passwd="") {
        $stmt = $this->conn->query("SELECT eId FROM employee WHERE eName='$name' AND ePassword='$passwd';");
        $result = mysqli_fetch_object($stmt);
        if (!is_null($result))
        {
            return true;
        }
        else {
            return false;
        }
    }

    
    public function listOrders($oName, $oPhone, $eId, $startDate, $endDate, $index, $row)
    {
        $sql = "SELECT * FROM orders";

        $listWhere = array();
        if(!is_null($oName) && $oName !== ""){
            array_push($listWhere, "oName = '".$oName."'");
        }

        if(!is_null($oPhone) && $oPhone !== ""){
            array_push($listWhere, "oPhone = '".$oPhone."'");
        }

        if(!is_null($eId) && $eId !== ""){
            array_push($listWhere, "eId = ".$eId);
        }

        if(!is_null($startDate) && $startDate !== ""){
            array_push($listWhere, "oDate >= '".$startDate."'");
        }
        if(!is_null($endDate) && $endDate !== ""){
            array_push($listWhere, "oDate <= '".$endDate."'");
        }

        if(count($listWhere) > 0){
            $sql = $sql." WHERE ".implode(" AND " ,$listWhere);
        }

        $stmt = $this->conn->query($sql);
        $result = mysqli_fetch_object($stmt);

        return $result;
    }

    public function createOrder($oId, $oDate, $oSendDate, $oName, $oPhone, $oAddress, $eId)
    {
        $sql = "INSERT INTO 'orders'('oId','oDate','oSendDate','oName','oPhone','oAddress','eId') VALUES('$oId','$oDate','$oSendDate','$oName','$oPhone','$oAddress','$eId')";
        
        $result = $this->conn->query($sql);

        if($result === TRUE){
            return "Success";
        }
        else{
            return "Error: ".$this->conn->error;
        }
    }

    public function updateOrder($oId, $oDate, $oSendDate, $oName, $oPhone, $oAddress, $eId)
    {
        $sql = "";

        $listSet = array();
        if(!is_null($oName) && $oName !== ""){
            array_push($listSet, "oName = '".$oName."'");
        }
        if(!is_null($oPhone) && $oPhone !== ""){
            array_push($listSet, "oPhone = '".$oPhone."'");
        }
        if(!is_null($oSendDate) && $oSendDate !== ""){
            array_push($listSet, "oDate <= '".$oSendDate."'");
        }
        if(!is_null($oAddress) && $oAddress !== ""){
            array_push($listSet, "oDate <= '".$oAddress."'");
        }
        if(!is_null($eId) && $eId !== ""){
            array_push($listSet, "oDate <= '".$eId."'");
        }
        
        $result = $this->conn->query($sql);
        
        if($result === TRUE){
            return "Success";
        }
        else{
            return "Error: ".$this->conn->error;
        }
    }

    public function deleteOrder($oId)
    {
        $sql = "";

        $listSet = array();
        if(!is_null($oName) && $oName !== ""){
            array_push($listSet, "oName = '".$oName."'");
        }
        if(!is_null($oPhone) && $oPhone !== ""){
            array_push($listSet, "oPhone = '".$oPhone."'");
        }
        if(!is_null($oSendDate) && $oSendDate !== ""){
            array_push($listSet, "oDate <= '".$oSendDate."'");
        }
        if(!is_null($oAddress) && $oAddress !== ""){
            array_push($listSet, "oDate <= '".$oAddress."'");
        }
        if(!is_null($eId) && $eId !== ""){
            array_push($listSet, "oDate <= '".$eId."'");
        }
        
        $result = $this->conn->query($sql);
        
        if($result === TRUE){
            return "Success";
        }
        else{
            return "Error: ".$this->conn->error;
        }
    }

    public function UpdateDish($dId)
    {
        $sql = "SELECT * FROM dish NATURAL JOIN supplier WHERE dId=$dId";
        $stmt = $this->conn->query($sql);
        $result = mysqli_fetch_object($stmt);
    }

    // //斷掉連接
    // public function close(){
    //     mysqli_close();
    // }
}

?>