<?php

namespace App\Controllers;

use App\Entities\Book;
use App\Models\BookModel;

class Books extends BaseController
{
    protected $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function index()
    {
        $books = $this->bookModel->findAll();
        // Load the view and pass the data to it
        // Example: return view('books/index', ['books' => $books]);
    }

    public function create()
    {
        $book = new Book();

        // Load the view for creating a new book
        // Example: return view('books/create', ['book' => $book]);
    }

    public function store()
    {
        $book = new Book($this->request->getPost());

        if ($this->bookModel->save($book)) {
            return redirect()->to('/books')->with('success', 'Book created successfully.');
        } else {
            // Handle the error case
        }
    }

    public function edit($id)
    {
        $book = $this->bookModel->find($id);

        // Load the view for editing the book
        // Example: return view('books/edit', ['book' => $book]);
    }

    public function update($id)
    {
        $book = $this->bookModel->find($id);

        $book->fill($this->request->getPost());

        if ($this->bookModel->save($book)) {
            return redirect()->to('/books')->with('success', 'Book updated successfully.');
        } else {
            // Handle the error case
        }
    }

    public function delete($id)
    {
        $book = $this->bookModel->find($id);

        if ($this->bookModel->delete($id)) {
            return redirect()->to('/books')->with('success', 'Book deleted successfully.');
        } else {
            // Handle the error case
        }
    }
}
