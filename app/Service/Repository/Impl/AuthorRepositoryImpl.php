<?php

namespace App\Service\Repository\Impl;

use App\Models\Author;
use App\Service\Repository\AuthorRepository;

class AuthorRepositoryImpl implements AuthorRepository
{

    private Author $author;

    /**
     */
    public function __construct()
    {
        $this->author = new Author();
    }


    public function getAuthorList()
    {
        try {
            return $this->author->orderBy('author_name')->get();
        } catch (\Exception $e) {
            return false;
        }
    }
}
