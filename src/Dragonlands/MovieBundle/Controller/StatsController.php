<?php

namespace Dragonlands\MovieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dragonlands\MovieBundle\Entity\Movie;
use Dragonlands\MovieBundle\Entity\User;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class StatsController extends Controller
{
    /*
    *   shows some stats in a box
    */
    public function indexAction()
    {

        $repo = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:Movie');
        $movies = $repo->findAll();
        $movies_count = count($movies);

        $repo = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:User');
        $users = $repo->findAll();
        $users_count = count($users);
        
        return $this->render('DragonlandsMovieBundle:Stats:index.html.twig', 
            array('movies_count' => $movies_count,
                'users_count' => $users_count));
    }

}
