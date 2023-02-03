<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('/home',name: 'accueil',methods: 'GET' )]
    public function bienvenue()
    {
        $titre = "Bienvenue en symfony";
        return $this->render(
            'front/home.html.twig',[
                'titre' => $titre,
            ]
        );
    }

    #[Route('/page/{numero}',name: 'page',requirements: ['numero'=> '\d+'],methods: ['GET', 'POST'],condition: "params['numero'] < 20")]
    public function page(string $numero) : Response
    {
        
        return $this->render(
            "<html>
            <head>
                <title> firstPage </title>
            </head>
            <body>
                <h1>Page n° $numero </h1>
                </body>
            </html>"
        );
    }


}