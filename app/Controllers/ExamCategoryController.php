<?php

namespace App\Controllers;

use App\Models\ExamCategoryModel;
use CodeIgniter\Controller;

class ExamCategoryController extends Controller
{
    public function index()
    {
        $model = new ExamCategoryModel();
        $data['categories'] = $model->findAll();

        return view('exam_categories/index', $data);
    }

    public function create()
    {
        helper('form');

        if ($this->request->getMethod() === 'post') {
            $model = new ExamCategoryModel();

            $data = [
                'exam_category_name' => $this->request->getPost('exam_category_name'),
                'school_id' => $this->request->getPost('school_id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            dd($data);

            $model->insert($data);

            return redirect()->to('/exam-category')->with('success', 'Exam category created successfully.');
        }

        return view('exam_categories/create');
    }

    public function edit($id)
    {
        helper('form');

        $model = new ExamCategoryModel();
        $data['category'] = $model->find($id);

        if ($this->request->getMethod() === 'post') {
            $data = [
                'exam_category_name' => $this->request->getPost('exam_category_name'),
                'school_id' => $this->request->getPost('school_id'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $model->update($id, $data);

            return redirect()->to('/exam-category')->with('success', 'Exam category updated successfully.');
        }

        return view('exam_categories/edit', $data);
    }

    public function delete($id)
    {
        $model = new ExamCategoryModel();
        $model->delete($id);

        return redirect()->to('/exam-category')->with('success', 'Exam category deleted successfully.');
    }
}
