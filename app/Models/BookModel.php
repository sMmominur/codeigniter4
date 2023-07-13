<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Book;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $returnType = Book::class;
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'author', 'published_at'];
}
