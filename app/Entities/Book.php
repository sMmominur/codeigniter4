<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Book extends Entity
{
    protected $attributes = [
        'id' => null,
        'title' => null,
        'author' => null,
        'published_at' => null,
    ];

    protected $datamap = [];
}
