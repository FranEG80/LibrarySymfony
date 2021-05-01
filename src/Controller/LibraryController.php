<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\{JsonResponse, Request};
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController {

  /**
   * La ultima linea de \config\services.yaml que pone
   * App\Controller\
   * hace que no necesitemos llamar al constructor para injectar la classe LoggerInterface
   * y se pueda pasar directamente como parámetro de la funcion list()
   * solo funcionará dentro de la carpeta controllers
   * 
   */

  // private $logger;
  //
  // Symfony tiene un Container que permite inyectar clases a un constructor
  // public function __construct(LoggerInterface $logger) 
  // {
  //   $this->logger = $logger;
  // }

  /**
   * @Route("/Books", name="library_list")
   * 
   * @return void
   */
  public function list (Request $request, LoggerInterface $logger) {
    $title = $request->get('title', 'NoParamRequest');
    $logger->info('List action called');
    $response = new JsonResponse();
    $response->setData([
      'success' => true,
      'data' => [
        [
          'id'    => 1,
          'title' => 'En el nombre del Viento'
        ],
        [
          'id'    => 2,
          'title' => 'Caminando siempre'
        ],
        [
          'id'    => 3,
          'title' => $title
        ],
      ]
    ]);
    return $response;
  }

}