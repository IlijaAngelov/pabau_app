<?php

namespace App\Controllers;
use Database;

class VoteController
{
    public function __construct(protected Database $pdo)
    {}

    public function store($user_id, $nominee, $comment, $created_at, $category)
    {
        return $this->pdo->storeVote($user_id, $nominee, $comment, $created_at, $category);
    }

    public function whoVoted(): array
    {
        return $this->pdo->whoVotedTheMost();
    }
}