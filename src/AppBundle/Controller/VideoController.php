<?php
/**
 * Created by PhpStorm.
 * User: yiming
 * Date: 08/12/2018
 * Time: 21:50
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Video;
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

class VideoController extends Controller
{
    /**
     *
     * @Route("/video/create")
     */
    public function createVideo(Request $request)
    {

        $video = new Video();


        $form = $this->createFormBuilder($video)
            ->add('titreVideo', TextType::class, array(
                    'label' => 'Ajouter un titre ',
                    'required' => true,
                )
            )
            ->add('descriptionVideo', TextareaType::class, array(
                    'label' => 'Description de la vidéo',
                    'required' => true,
                )
            )
            ->add('urlVideo', FileType::class, array(
                    'data_class' => null,
                    'label' => 'Uploader la vidéo ',
                    'required' => true,
                )
            )
            ->add('save', SubmitType::class, array(
                    'label' => 'Crée la vidéo '
                )
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            // but, the original `$task` variable has also been updated
            $video = $form->getData();

            $videoFile = $video->getUrlVideo();
            $videoName = md5(uniqid()).'.'.$videoFile->guessExtension();

            $videoFile->move(
                $this->getParameter('video_directory'), $videoName
            );

            // Move the file to the directory where brochures are stored

            setlocale(LC_TIME, "fr_FR");

            $video->setDatecreationVideo(new \DateTime(date('d-m-Y h:i:s'))); //ajoute la date de création
            $video->setDatemodificationVideo(new \DateTime(date('d-m-Y h:i:s'))); // ajoute la date de modif


            $video->setUrlVideo($videoName); // ajoute le podcast

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($video);
            $entityManager->flush();

            return $this->redirectToRoute('video_view');
        }

        return $this->render('video/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     *
     * @Route("/videos/view")
     */
    public function viewVideo()
    {
        $repository = $this->getDoctrine()->getRepository(Video::class);
        $videos = $repository->findAll();

        return $this->render('video/view.html.twig', array(
            'videos' => $videos,
        ));
    }

    /**
     *
     * @Route("/video/view/{id}")
     */
    public function viewIdVideo($id)
    {
        $repository = $this->getDoctrine()->getRepository(Video::class);
        $video = $repository->find($id);

        return $this->render('video/viewId.html.twig', array(
            'video' => $video,
        ));
    }

    /**
     *
     * @Route("/video/update/{id}")
     */
    public function updateVideo(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository(Video::class)->find($id);
        $viewVideo = $post;
        if(!$post) {
            throw $this->createNotFoundException('Impossible de trouver cette vidéo');
        }

        $urlVideoOriginal = $post->getUrlVideo();
        $fileUrl = new File($this->getParameter('video_directory') . '/' . $post->getUrlVideo());

        $post->setTitreVideo($post->getTitreVideo());
        $post->setDescriptionVideo($post->getDescriptionVideo());
        $post->setUrlVideo($fileUrl);

        $form = $this->createFormBuilder($post)
            ->add('titreVideo', TextType::class, array(
                    'label' => 'Ajouter un titre ',
                    'required' => true,
                )
            )
            ->add('descriptionVideo', TextareaType::class, array(
                    'label' => 'Description de la vidéo',
                    'required' => true,
                )
            )
            ->add('urlVideo', FileType::class, array(
                    'data_class' => null,
                    'label' => 'Uploader la vidéo ',
                    'required' => true,
                )
            )
            ->add('save', SubmitType::class, array(
                    'label' => 'Modifier la vidéo '
                )
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $post = $em->getRepository(Video::class)->find($id);
            $titreVideo = $form['titreVideo']->getData();
            $descriptionVideo = $form['descriptionVideo']->getData();

            if($form['urlVideo']->getData() && $form['urlVideo']->getData() != null){
                $urlVideo = $form['urlVideo']->getData();
                if($urlVideo != "" && $urlVideo != null && $urlVideo){
                    $videoFile = $urlVideo;
                    $videoName = md5(uniqid()).'.'.$videoFile->guessExtension();

                    $videoFile->move(
                        $this->getParameter('video_directory'), $videoName
                    );
                    $post->setUrlV($videoName);
                }
            }

            $post->setTitreVideo($titreVideo);
            $post->setDescriptionVideo($descriptionVideo);
            $post->setDatecreationVideo(new \DateTime(date('d-m-Y h:i:s'))); // ajoute la date de modif

            $em->flush();

            return $this->redirectToRoute('video_viewId', array('id' => $id));
        }

        return $this->render('video/update.html.twig', array(
            'form' => $form->createView(),
            'urlVideo' => $urlVideoOriginal,
            'video' => $viewVideo,
        ));

    }

    /**
     *
     * @Route("/video/delete/{id}")
     */
    public function deleteVideo($id)
    {
        $repository = $this->getDoctrine()->getRepository(Video::class);
        $video = $repository->remove($id);
        $video->flush();

        return $this->render('video/view.html.twig', array(
            'video' => $video,
        ));
    }
}