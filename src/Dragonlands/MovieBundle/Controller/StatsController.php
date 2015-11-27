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

        $users_count = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:User')->getEntityCount();
        $movies_count = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:Movie')->getEntityCount();
        $tags_count = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:Tag')->getEntityCount();
        $ratings_count = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:Rating')->getEntityCount();
        
        return $this->render('DragonlandsMovieBundle:Stats:index.html.twig', 
            array('movies_count' => $movies_count,
                'users_count' => $users_count,
                'tags_count' => $tags_count,
                'ratings_count' => $ratings_count));
    }

}
