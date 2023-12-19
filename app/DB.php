<?php

namespace App;

class DB {

    private \mysqli $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect(
            env("DB_HOST"),
            env("DB_USERNAME"),
            env("DB_PASSWORD"),
            env("DB_DATABASE"),
            env("DB_PORT")
        );
    }

    public function execute(string $query, $params=[]): \mysqli_result|bool
    {
        return $this->connection->execute_query($query, $params);
    }
}