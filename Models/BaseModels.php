<?php
require_once PROJECT_ROOT_PATH . "/DataAccess/DBUtility.php";
 
class BaseModel extends DBUtility
{
    protected $_table = "";

    protected $_where = "";
    protected $_select = "*";
    protected $_orderby = "";
    protected $_limit = "";

    protected $statement = "";
    protected $_params = array();

    // 初始化Table
    function __construct($table){
        $this->_table = $table;
    }

    // 要取的欄位
    public function select($select){
        $this->$_select = $select;
        return $this;
    }
    // 條件
    public function where($where){
        $this->$_where = " WHERE $where";
        return $this;
    }
    // 排序
    public function orderby($orderby, $isasc){
        $ad = $isasc ? "AES" : "DESC";
        $this->$_orderby = " ORDER BY $orderby $ad";
        return $this;
    }
    // 分頁
    public function limit(...$args){
        if (count($args) == 2) {
            $this->$_limit = " LIMIT $args[0],$args[1]";
        } else if (count($args) == 1) {
            $this->$_limit = " LIMIT $args[0]";
        } else {
            return "";
        }
        return $this;
    }
    // 執行語句
    public function toArray($where){
        return $this->execute("SELECT $this->_select FROM $this->_table.$this->_where.$this->_orderby.$this->_limit");
    }
    // 新增
    public function add(...$args){
        $arr = array();
        $types = "";
        foreach ($args as $value){
            $data = "";
            if(is_bool($value)){
                $types.="b";
                $data = $value?"1","0";
            }
            elseif(is_double($value)){
                $types.="d";
                $data = $value;
            }
            elseif(is_int($value)){
                $types.="i";
                $data = $value;
            }
            else{
                $types.="s";
                $data = "'$value'";
            }
            
            array_push($arr, $data);
        }
        array_unshift($arr, $types);
        // 建立要帶入的值(一個問號一個洞)
        $values = implode(",", str_split(str_repeat("?",count($args))));

        $this->statement ="INSERT INTO $this->_table VALUES($values)";
        $this->_params = $arr;


    }
    // 更新
    public function update($updatearray){
        $arrkey = array_keys($updatearray);
        foreach ($arrkey as $value){
            $value = $value."=?"
        }
        $values = implode("," $arrkey);

        $arr = array();
        $types = "";
        foreach ($updatearray as $value){
            $data = "";
            if(is_bool($value)){
                $types.="b";
                $data = $value?"1","0";
            }
            elseif(is_double($value)){
                $types.="d";
                $data = $value;
            }
            elseif(is_int($value)){
                $types.="i";
                $data = $value;
            }
            else{
                $types.="s";
                $data = "'$value'";
            }
            
            array_push($arr, $data);
        }
        array_unshift($arr, $types);

        $this->statement ="UPDATE $this->_table SET $values";
        $this->_params = $arr;
    }
    // 刪除
    public function remove(){
        $this->statement ="DELETE $this->_table";
        $this->_params = $arr;
    }
    // 儲存變更(執行語句)
    public function saveChange(){
        return $this->execute("$this->statement.$this->_where", $this->_params);
    }
}