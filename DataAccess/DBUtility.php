<?php
class DBUtility {
    protected $connection = null;
    // 連線
    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // 查詢
    public function execute($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    protected function executeStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);

            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }

            if( $params ) {
                $stmt->bind_param($params[0], $params[1]);
            }

            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

    // // 新增
    // public function create($sql){
    //     $tag = false;
    //     $conn = $this->getConnection();
    //     mysqli_query($conn,$sql);
    //     $tag = true;
    //     mysqli_close($conn);
    //     return $tag;
    // }

    // // 修改
    // public function update($sql){
    //     $tag = false;
    //     $conn = $this->getConnection();
    //     mysqli_query($conn,$sql);
    //     $tag = true;
    //     mysqli_close($conn);
    //     return $tag;
    // }

    // // 刪除
    // public function delete($sql){
    //     $tag = false;
    //     $conn = $this->getConnection();
    //     mysqli_query($conn,$sql);
    //     $tag = true;
    //     mysqli_close($conn);
    //     return $tag;
    // }
}

?>