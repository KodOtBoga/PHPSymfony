<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FooController extends AbstractController
{

    #[Route('/foo/create', name: 'create_foo')]
    public function createFoo(){

    }
    
}