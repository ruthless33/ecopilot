<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ResultController extends AbstractController
{
    public function calculate(Request $request)
    {	
    	$data = $request->request->get('form');
		var_dump($data);

        return $this->render('results.html.twig', $data);
    }
}
