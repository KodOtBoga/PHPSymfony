<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EchoController extends AbstractController
{
    #[Route('/echo/simple', name: 'echo_simple')]
    public function echoSimple(Request $request){
        $data = $request->query->all();
        if(!$data){
            $data[] = "There is Nothing";
        }

        return $this->render('echo.html.twig', [
            'data' => $data,
        ]);
    }

    #[Route('/echo/json', name: 'echo_json')]
    public function echoJson(Request $request){
        $data = $request->query->all();
        if(!$data){
            $data[0] = "There is Nothing";
        }

        return $this->json($data);
    }

    #[Route('/echo/difficult', name: 'echo_difficult')]
    public function echoDifficult(Request $request){
        $data = $request->query->all();
        if(!$data){
            $data[] = "There is Nothing";
        }

        $result = [];

        foreach($data as $info){
            $result = [
                [
                    'color' => 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')',
                    'value' => $info,
                ]
                ];
        }



        return $this->render('echo.html.twig', [
            'result' => $result,
        ]);
    }

    #[Route('/echo/strange', name: 'echo_strange')]
    public function echoStrange(Request $request){
        $data = $request->query->all();
        if(!$data){
            $data[0] = "There is Nothing";
        }
        $cryptedData = [];
        foreach($data as $info){
            $cryptedData[] = md5($info);
        }

        return $this->json($cryptedData);
    }
}