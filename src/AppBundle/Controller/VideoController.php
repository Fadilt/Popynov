<?php
/**
 * Created by PhpStorm.
 * User: fadil
 * Date: 13/12/2018
 * Time: 15:05
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
     * @Route("/video/create", name = "video")
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
                    'label' => 'Ajouter une vidéo ',
                    'required' => true,
                )
            )
            ->add('save', SubmitType::class, array(
                    'label' => 'Créer l\'article video '
                )
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            // but, the original `$task` variable has also been updated
            $video = $form->getData();

            $file = $video->getUrlVideo();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('image_directory'), $fileName
            );

            $videoFile = $video->getUrlVideo();
            $videoName = md5(uniqid()).'.'.$videoFile->guessExtension();

            $videoFile->move(
                $this->getParameter('video_directory'), $videoName
            );

            // Move the file to the directory where brochures are stored


            setlocale(LC_TIME, "fr_FR");

            $video->setDatecreationVideo(new \DateTime(date('d-m-Y h:i:s')));
            $video->setDatemodificationVideo(new \DateTime(date('d-m-Y h:i:s')));

            $video->setUrlVideo($fileName); // ajoute l'image de l'video


            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($video);
            $entityManager->flush();

            return $this->redirectToRoute('video');
        }

        //return $this->redirectToRoute('video_creation');


        return $this->render('video/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     *
     * @Route("/video/view")
     */
    public function viewVideo(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Video::class);
        $videos = $repository->findAll();

        return $this->render('video/view.html.twig', array(
            'videos' => $videos,
        ));
    }

}