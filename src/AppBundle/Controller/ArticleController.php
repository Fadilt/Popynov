<?php
/**
 * Created by PhpStorm.
 * User: yiming
 * Date: 05/10/2018
 * Time: 15:05
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ArticleController extends Controller
{
    /**
     *
     * @Route("/article/create")
     */
    public function createArticle(Request $request)
    {

        $article = new Article();


        $form = $this->createFormBuilder($article)
            ->add('nomArticle', TextType::class, array(
                    'label' => 'Ajouter un titre ',
                    'required' => true,
                )
            )
            ->add('contenuArticle', TextareaType::class, array(
                    'label' => 'Description du article',
                    'required' => true,
                )
            )
            ->add('imgArticle', FileType::class, array(
                    'label' => 'Ajouter une image ',
                    'required' => true,
                )
            )
            ->add('save', SubmitType::class, array(
                    'label' => 'Créer l\'article '
                )
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            // but, the original `$task` variable has also been updated
            $article = $form->getData();




            // Move the file to the directory where brochures are stored


            setlocale(LC_TIME, "fr_FR");

            $article->setDatecreationArticle(new \DateTime(date('d-m-Y h:i:s')));
            $article->setDatemodifArticle(new \DateTime(date('d-m-Y h:i:s')));

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_creation');
        }

        //return $this->redirectToRoute('article_creation');


        return $this->render('article/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     *
     * @Route("/article/view")
     */
    public function viewArticle(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repository->findAll();

        return $this->render('article/view.html.twig', array(
            'articles' => $articles,
        ));
    }

}