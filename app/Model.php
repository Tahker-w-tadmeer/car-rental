<?php

namespace App;

class Model {

    private \mysqli $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect("127.0.0.1", "root", "", "lab1");
    }

    public function execute(string $query, $params=[]): \mysqli_result|bool
    {
        return $this->connection->execute_query($query, $params);
    }
}