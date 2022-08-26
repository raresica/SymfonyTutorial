<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {

        $tracks = [
            ['song' => 'Ryan Star', 'artist' => 'Brand New Day'],
            ['song' => 'Linkin Park', 'artist' => 'CASTLE OF GLASS'],
            ['song' => 'T-pain', 'artist' => 'Wake up Dead'],
            ['song' => 'Joyner Lucas', 'artist' => 'I Don\'t Die'],
            ['song' => 'Eminem', 'artist' => 'Lucky you'],
        ];


        return $this->render('vinyl/homepage.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Genre:' . u(str_replace('-', ' ', $slug))->title(true);

        } else {
            $title = 'All Genres';
        }

        return new Response('Scriu ceva: ' . $title);
    }
}