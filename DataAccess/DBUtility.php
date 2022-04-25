<?php
require_once("ConnectionConfig.php");

public class DBUtility{
    // 連線
    public function getConnection(){
        $conn = mysqli_connect($this->host,$this->user,$this->passwd,$this->db);
        return $conn;
    }

    // 查詢
    public function execute($sql){
        $conn = $this->getConnection();
        $arr = array();
        if($conn!=null){
            $rtn = mysqli_query($conn,$sql);
            while($rtn!==false&&($row=mysqli_fetch_array($rtn))!=null){
                $index = -1;
                $obj = new $this->modelName();
                foreach($columns as $column){
                    $obj->{"set".ucfirst($column)}($row[  $index]);
                }
                $arr[] = $obj;
            }
            mysqli_close($conn);
        }
        return $arr;
    }

    // 新增
    public function create($sql){
        $tag = false;
        $conn = $this->getConnection();
        mysqli_query($conn,$sql);
        $tag = true;
        mysqli_close($conn);
        return $tag;
    }

    // 修改
    public function update($sql){
        $tag = false;
        $conn = $this->getConnection();
        mysqli_query($conn,$sql);
        $tag = true;
        mysqli_close($conn);
        return $tag;
    }

    // 刪除
    public function delete($sql){
        $tag = false;
        $conn = $this->getConnection();
        mysqli_query($conn,$sql);
        $tag = true;
        mysqli_close($conn);
        return $tag;
    }
}

?>