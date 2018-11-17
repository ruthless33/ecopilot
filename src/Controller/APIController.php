<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class APIController extends AbstractController
{
    public function getAllBrands()
    {
    	$em = $this->getDoctrine()->getManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare("SELECT DISTINCT marca FROM coche");
		$statement->execute();
		$results = $statement->fetchAll();

    	$response = new Response();
		$response->setContent(json_encode($results));
		$response->headers->set('Content-Type', 'application/json');


        return $response;
    }

    public function getModels($brand) {
    	$em = $this->getDoctrine()->getManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare("SELECT DISTINCT generacion FROM coche WHERE marca = :marca");
		$statement->bindValue('marca', $brand);
		$statement->execute();
		$results = $statement->fetchAll();

    	$response = new Response();
		$response->setContent(json_encode($results));
		$response->headers->set('Content-Type', 'application/json');


        return $response;
    }

    public function getEngines($model) {
    	$em = $this->getDoctrine()->getManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare("SELECT DISTINCT mod_motor FROM coche WHERE generacion = :generacion");
		$statement->bindValue('generacion', $model);
		$statement->execute();
		$results = $statement->fetchAll();

    	$response = new Response();
		$response->setContent(json_encode($results));
		$response->headers->set('Content-Type', 'application/json');


        return $response;
    }

    public function getPeopleCapacity($brand,$model,$engine) {
    	$em = $this->getDoctrine()->getManager();
		$connection = $em->getConnection();
		$statement = $connection->prepare("SELECT plazas FROM coche WHERE marca=:marca AND generacion=:generacion AND mod_motor=:mod_motor");
		$statement->bindValue('marca', $brand);
		$statement->bindValue('generacion', $model);
		$statement->bindValue('mod_motor', $engine);
		$statement->execute();
		$results = $statement->fetchAll();

    	$response = new Response();
		$response->setContent(json_encode($results));
		$response->headers->set('Content-Type', 'application/json');


        return $response;
    }
}
