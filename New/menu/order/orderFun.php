<?php
include("../../dbFun.php");

class orderFun extends dbFun
{
    // 繼承建構子
    function __construct(){
        parent::__construct();
    }

    public function listOrders($oId, $oName, $oPhone, $eId, $startDate, $endDate, $index, $row)
    {
        $sql = "SELECT o.*,d.* FROM orders AS o JOIN dish AS d ON o.dId = d.dId";

        $listWhere = array();
        if(!is_null($oId) && $oId !== ""){
            array_push($listWhere, "o.oId = $oId");
        }
        if(!is_null($oName) && $oName !== ""){
            array_push($listWhere, "o.oName = '".$oName."'");
        }
        if(!is_null($oPhone) && $oPhone !== ""){
            array_push($listWhere, "o.oPhone = '".$oPhone."'");
        }
        if(!is_null($eId) && $eId !== ""){
            array_push($listWhere, "o.eId = $eId");
        }
        if(!is_null($startDate) && $startDate !== ""){
            array_push($listWhere, "o.oDate >= '".$startDate."'");
        }
        if(!is_null($endDate) && $endDate !== ""){
            array_push($listWhere, "o.oDate <= '".$endDate."'");
        }
        if(count($listWhere) > 0){
            $sql = $sql." WHERE ".implode(" AND " ,$listWhere);
        }

        //$stmt = $this->conn->query($sql);
        //$result = mysqli_fetch_object($stmt);

        return $this->conn->query($sql);
    }

    public function createOrder($oDate, $oSendDate, $oName, $oPhone, $oAddress, $eId, $dId, $dNum)
    {
        $sql = "INSERT INTO orders VALUES(null,'$oDate','$oSendDate','$oName','$oPhone','$oAddress',$eId, $dId, $dNum)";
        print_r($sql);
        return $this->conn->query($sql);
    }

    public function updateOrder($oId, $oDate, $oSendDate, $oName, $oPhone, $oAddress, $eId, $dId, $dNum)
    {
        $sql = "";

        $listSet = array();
        if(!is_null($oName) && $oName !== ""){
            array_push($listSet, "oName = '".$oName."'");
        }
        if(!is_null($oPhone) && $oPhone !== ""){
            array_push($listSet, "oPhone='".$oPhone."'");
        }
        if(!is_null($oSendDate) && $oDate !== ""){
            array_push($listSet, "oDate='".$oSendDate."'");
        }
        if(!is_null($oSendDate) && $oSendDate !== ""){
            array_push($listSet, "oSendDate='".$oSendDate."'");
        }
        if(!is_null($oAddress) && $oAddress !== ""){
            array_push($listSet, "oAddress='".$oAddress."'");
        }
        if(!is_null($eId) && $eId !== ""){
            array_push($listSet, "eId='".$eId."'");
        }
        if(!is_null($dId) && $dId !== ""){
            array_push($listSet, "dId='".$dId."'");
        }
        if(!is_null($dNum) && $dNum !== ""){
            array_push($listSet, "dNum='".$dNum."'");
        }

        if(count($listSet) > 0) { $sql = "UPDATE orders SET ".implode("," ,$listSet)." WHERE oId=".$oId; }
        
        return $result = $this->conn->query($sql);
    }

    public function deleteOrder($oId)
    {
        $sql = "DELETE FROM orders WHERE oId=".$oId;
        
        return $this->conn->query($sql);
    }
}

