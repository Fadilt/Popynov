<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Podcast;
use AppBundle\Entity\Video;
use AppBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // on va récupérer les podcasts
        $repositoryPodcast = $this->getDoctrine()->getRepository(Podcast::class);
        $podcasts = $repositoryPodcast->findAll();

        // on va récupérer les articles
        $repositoryArticle = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repositoryArticle->findAll();

        // on va récupérer les vidéos
        $repositoryVideo = $this->getDoctrine()->getRepository(Video::class);
        $videos = $repositoryVideo->findAll();


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'podcasts' => $podcasts,
            'articles' => $articles,
            'videos' => $videos

        ));
    }
}
