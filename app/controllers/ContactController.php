<?php
namespace app\controllers;

class ContactController extends Controller
{
    public function index()
    {
        $this->view('contact');
    }

    public function store()
    {
        var_dump('Store Contact');
    }
}
