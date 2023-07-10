<?php

namespace App\Controllers;

use App\Models\ExamCategoryModel;
use CodeIgniter\Controller;

class ExamCategoryController extends Controller
{
    protected $examCategoryModel;

    public function __construct()
    {
        $this->examCategoryModel = new ExamCategoryModel();
    }

    public function index()
    {
        $data['categories'] = $this->examCategoryModel->findAll();

        return view('exam_categories/index', $data);
    }

    public function create()
    {
        return view('exam_categories/create');
    }

    public function store()
    {
       
        helper('form');

        $data = [
            'exam_category_name' => $this->request->getVar('exam_category_name'),
            'status' => $this->request->getVar('status'),
            'created_at' => '2023-07-10 05:06:00',
            'updated_at' => '2023-07-10 05:06:00'
        ];

        $model = model(ExamCategoryModel::class);
        $model->save($data);
        
        return redirect()->to('/exam-category')->with('success', 'Exam category created successfully.');
    
    }

    public function edit($id)
    {
        helper('form');

        $data['category'] = $this->examCategoryModel->find($id);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'exam_category_name' => 'required',
            'status' => 'required'
        ])) {
            $dataToUpdate = [
                'exam_category_name' => $this->request->getVar('exam_category_name'),
                'status' => $this->request->getVar('status')
            ];

            $this->examCategoryModel->update($id, $dataToUpdate);

            return redirect()->to('/exam-category')->with('success', 'Exam category updated successfully.');
        }

        return view('exam_categories/edit', $data);
    }

    public function delete($id)
    {
        $this->examCategoryModel->delete($id);

        return redirect()->to('/exam-category')->with('success', 'Exam category deleted successfully.');
    }
}
