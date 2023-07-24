<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TestRoleModel;
class TestRoleController extends BaseController
{
    public function index()
    {
        $modelIns = new TestRoleModel();
        $data= $modelIns->testModelFun();
        echo "<pre>";
        var_dump($data);
       
    }
}
