<?php

namespace App\Controllers;
use Database;

class VoteController
{
    public function __construct(protected Database $pdo)
    {}

    public function store($category, $nominee, $user_id, $created_at, $comment)
    {
        return $this->pdo->storeVote($category, $nominee, $user_id, $created_at, $comment);
    }
}