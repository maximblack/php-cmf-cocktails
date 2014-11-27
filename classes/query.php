<?php

class Query extends Database {

    public $numRows;
    public $insertId;
    private $queryResult = null;
    private $queryResultAsArray = array();

    public function __construct($query) {

        $this->executeQuery($query);
    }

    private function executeQuery($query) {


        $database = parent::getInstance();

        $this->queryResult = $database->query($query);
        
        if ($this->queryResult instanceOf mysqli_result) {
            $this->parseQuery();
        } else {
            $this->insertId = $database->insert_id();
        }


        return $this;
    }

    private function parseQuery() {




        while ($temp = $this->queryResult->fetch_assoc()) {

            $this->queryResultAsArray[] = $temp;
        }

        $this->numRows = $this->queryResult->num_rows;



        return $this;
    }

    public function asArray() {

        return $this->queryResultAsArray;
    }

}

?>