<?php
require_once PROJECT_ROOT_PATH . "/DataAccess/DBUtility.php";
 
class TestModel extends DBUtility
{
    public function get($limit)
    {
        return $this->select("SELECT * FROM tests ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    }

    // public function add($limit)
    // {
    //     return $this->select("SELECT * FROM tests ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    // }

    // public function update($limit)
    // {
    //     return $this->select("SELECT * FROM tests ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    // }

    // public function delete($limit)
    // {
    //     return $this->select("SELECT * FROM tests ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    // }
}