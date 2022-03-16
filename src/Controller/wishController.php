<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class wishController extends AbstractController
{
    /**
     * @Route("/list", name="app_list")
     */
    public function list(): Response
    {
        return $this->render('wish/list.html.twig', [
            'controller_name' => 'wishController',
        ]);
    }

    /**
     * @Route("/detail", name="app_detail")
     */
    public function detail(): Response
    {
        return $this->render('wish/detail.html.twig', [
            'controller_name' => 'wishController',
        ]);
    }
}