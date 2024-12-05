<?php

namespace App\Controllers;

use Database;

class CategoryController
{
    public function __construct(protected Database $pdo)
    {}

    public function getAllCategories()
    {
        $sql = "SELECT * FROM Categories";
        return $this->pdo->fetchAll($sql);
    }
}