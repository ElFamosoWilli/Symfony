<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    private string $titre = "Bienvenue en symfony";
    #[Route('/home',name: 'accueil',methods: 'GET' )]
    public function bienvenue()
    {
        return $this->render(
            'front/home.html.twig',[
                'titre' => $this->titre,
            ]
        );
    }

    #[Route('/page/{numero}',name: 'page',requirements: ['numero'=> '\d+'],methods: ['GET', 'POST'],condition: "params['numero'] < 20")]
    public function page(string $numero) : Response
    {
        
        return $this->render(
            "front/page.html.twig",
            ['titre' => $this->titre,
            'numero' => $numero
             ]
        );
    }
    
    #[Route("/listArticle",name:'articles', methods: ['GET'])]
    public function listArticles()
    {
        $articles = [
            ['titre' => 'titre article 1',
            'resume' => 'Ceci est le résumé de l\'article 1 '
            ],
            ['titre' => 'titre article 2',
            'resume' => 'Ceci est le résumé de l\'article 2 '
            ],
            ['titre' => 'titre article 3',
            'resume' => 'Ceci est le résumé de l\'article 3 '
            ]
        ];

        return $this->render(
            'front/_listArticle.html.twig',
            [
                'articles' => $articles
            ]
        );
    }


}