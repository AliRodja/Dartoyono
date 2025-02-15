<?php

class HomeController extends Controller
{
    public function index()
    {
        $this->view('templates/header');
        $this->view('home/index');
        $this->view('templates/footer');
    }

}