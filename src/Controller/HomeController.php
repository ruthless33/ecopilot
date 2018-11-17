<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function index()
    {
        return $this->render('index.html.twig');
    }

    public function dataform()
    {
        return $this->render('dataform.html.twig');
    }

    public function results()
    {
        return $this->render('results.html.twig');
    }
}
//05368a30f30aa3de0d153301a9ac52f6