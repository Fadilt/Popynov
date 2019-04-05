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
     * @Route("/article/create", name = "article")
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

            $file = $article->getImgArticle();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('image_directory'), $fileName
            );


            // Move the file to the directory where brochures are stored


            setlocale(LC_TIME, "fr_FR");

            $article->setDatecreationArticle(new \DateTime(date('d-m-Y h:i:s')));
            $article->setDatemodifArticle(new \DateTime(date('d-m-Y h:i:s')));

            $article->setImgArticle($fileName); // ajoute l'image de l'article

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_view');
        }

        return $this->render('article/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     *
     * @Route("/articles/view")
     */
    public function viewArticle(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repository->findAll();

        return $this->render('article/view.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     *
     * @Route("/article/view/{id}")
     */
    public function viewIdArticle($id)
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $article = $repository->find($id);

        return $this->render('article/viewId.html.twig', array(
            'article' => $article,
        ));

    }

    /**
     *
     * @Route("/article/update/{id}")
     */
    public function updateVideo(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository(Article::class)->find($id);
        $viewArticle = $post;
        if(!$post) {
            throw $this->createNotFoundException('Impossible de trouver cette article');
        }
        $imageArticleOriginal = $post->getImgArticle();
        $fileImage = new File($this->getParameter('image_directory') . '/' . $post->getImgArticle());


        $post->setNomArticle($post->getNomArticle());
        $post->setContenuArticle($post->getContenuArticle());
        $post->setImgArticle($fileImage);


        $form = $this->createFormBuilder($post)
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
                    'label' => 'Enregistrer les modifications '
                )
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $post = $em->getRepository(Article::class)->find($id);
            $nomArticle = $form['nomArticle']->getData();
            $contenuArticle = $form['contenuArticle']->getData();
            if($form['imgArticle']->getData() && $form['imgArticle']->getData() != null && $form['imgArticle']->getData() != ""){
                $imgArticle = $form['imgArticle']->getData();
                $file = $imgArticle;
                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('article_directory'), $fileName
                );
                $post->setImgArticle($fileName);
            }


            $post->setNomArticle($nomArticle);
            $post->setContenuArticle($contenuArticle);
            $post->setDatemodifArticle(new \DateTime(date('d-m-Y h:i:s'))); // ajoute la date de modif

            $em->flush();

            return $this->redirectToRoute('article_viewId', array('id' => $id));
        }

        return $this->render('article/update.html.twig', array(
            'form' => $form->createView(),
            'fileImage' => $imageArticleOriginal,
            'article' => $viewArticle,
        ));

    }


}