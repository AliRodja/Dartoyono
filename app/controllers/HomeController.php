<?php

class HomeController extends Controller
    {
        public function index()
        {
            $postModel = new Post();
            $posts = $postModel->getAllPosts();
            $this->view('templates/header');
            $this->view('home/index', ['posts' => $posts]);
            $this->view('templates/footer');
            }

        public function show($post_id)
        {
            $postModel = new Post();
            $post = $postModel->getPostById($post_id);
            $this->view('templates/header');
            $this->view('home/detail', ['post' => $post]);
            $this->view('templates/footer');
        }
    }
?>