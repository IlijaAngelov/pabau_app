<?php

namespace App\Controllers;
use Database;

class UserController
{
    public function __construct(protected Database $pdo)
    {}

    public function getAllUsers()
    {
        $sql = "SELECT * FROM Users";
        return $this->pdo->fetchAll($sql);
    }
}