<?php
namespace app\controllers;

class AdminController extends Controller
{
    public function index()
    {
        $this->view('admin/painelAdmin');
    }

}
