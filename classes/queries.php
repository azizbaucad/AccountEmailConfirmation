<?php 

class queries extends db {

    public $result;

    // CRUD Method
    public function query($qry, $params=[]) {
        if(empty($params)){
            $this->result = $this->connect->prepare($qry);
            return $this->result->execute();
        } else {
            $this->result = $this->connect->prepare($qry);
            return $this->result->execute($params);
        }
    }

    //count the number of rows in the result
    public function count(){
        return $this->result->rowCount();
    }

    // fetch a single row from the result
    public function fetch(){
        return $this->result->fetch(PDO::FETCH_OBJ);
    }

}
?>