<?php
define("DB_HOST", "172.17.0.3");        // MySql主機位置
define("DB_USERNAME", "web");           // MySql帳號
define("DB_PASSWORD", "1qaz@WSX");      // Mysql密碼
define("DB_DATABASE_NAME", "puffs");    // 資料庫名稱
//header("Pragma: no-cache");

class dbFun
{
    // 連線物件
    protected $conn = null;

    // 初始化建構子(建立SQL連線)
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
    
    public function query($sql){
        return $this->conn->query($sql);
    }

    public function error(){
        return $this->conn->error;
    }

    // 登入的方法
    public function login($name="" , $passwd="") {
        $stmt = $this->conn->query("SELECT eId FROM employee WHERE eName='$name' AND ePassword='$passwd';");
        $result = mysqli_fetch_object($stmt);
        return !is_null($result);
    }

    // public function UpdateDish($dId)
    // {
    //     $sql = "SELECT * FROM dish NATURAL JOIN supplier WHERE dId=$dId";
    //     $stmt = $this->conn->query($sql);
    //     $result = mysqli_fetch_object($stmt);
    // }

    // //斷掉連接
    // public function close(){
    //     mysqli_close();
    // }
}

?>