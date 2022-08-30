<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {

        $tracks = [
            ['song' => 'Ryan Star', 'artist' => 'Brand New Day'],
            ['song' => 'Linkin Park', 'artist' => 'CASTLE OF GLASS'],
            ['song' => 'T-pain', 'artist' => 'Wake up Dead'],
            ['song' => 'Joyner Lucas', 'artist' => 'I Don\'t Die'],
            ['song' => 'Eminem', 'artist' => 'Lucky you'],
        ];


        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name:'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        return $this->render('vinyl/browse.html.twig',[
            'genre' => $genre,
        ]);
    }
}