<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ControllerController extends AbstractController
{
    #[Route('/control/1', name: 'controller_1')]
    public function controllOne(){
        return $this->render('control_1.html.twig');
    }

    #[Route('/control/2', name: 'controller_2')]
    public function controlTwo(){
        return $this->render('control_2.html.twig');
    }

    #[Route('/control/3', name: 'controller_3')]
    public function controlThree(){
            return $this->render('control_3.html.twig');
    }
}