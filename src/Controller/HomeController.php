<?php

namespace App\Controller;

use App\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @return void
     */
    public function index()
    {
        $this->render('home/home');
    }
}
