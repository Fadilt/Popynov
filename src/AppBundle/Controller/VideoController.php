<?php
/**
 * Created by PhpStorm.
 * User: yiming
 * Date: 08/12/2018
 * Time: 21:50
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Podcast;
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
        $video->setUrlPodcast('Add pod');

        $form = $this->createFormBuilder($podcast)
            ->add('titrePodcast', TextType::class, array(
                    'label' => 'Ajouter un titre ',
                    'required' => true,
                )
            )
            ->add('descriptionPodcast', TextareaType::class, array(
                    'label' => 'Description du podcast',
                    'required' => true,
                )
            )
            ->add('imagePodcast', FileType::class, array(
                    'label' => 'Ajouter une image ',
                    'required' => true,
                )
            )
            ->add('urlPodcast', FileType::class, array(
                    'data_class' => null,
                    'label' => 'Uploader le podcast ',
                    'required' => true,
                )
            )
            ->add('save', SubmitType::class, array(
                    'label' => 'Crée le podcast '
                )
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            // but, the original `$task` variable has also been updated
            $video = $form->getData();

            $file = $video->getImagePodcast();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('image_directory'), $fileName
            );

            $videoFile = $video->getUrlPodcast();
            $videoName = md5(uniqid()).'.'.$videoFile->guessExtension();

            $videoFile->move(
                $this->getParameter('podcast_directory'), $videoName
            );

            // Move the file to the directory where brochures are stored

            setlocale(LC_TIME, "fr_FR");

            $video->setDatecreationPodcast(new \DateTime(date('d-m-Y h:i:s'))); //ajoute la date de création
            $video->setDatemodifPodcast(new \DateTime(date('d-m-Y h:i:s'))); // ajoute la date de modif

            $video->setImagePodcast($fileName); // ajoute l'image du podcast
            $video->setUrlPodcast($videoName); // ajoute le podcast

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($podcast);
            $entityManager->flush();

            return $this->redirectToRoute('video_view');
        }

        return $this->render('video/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     *
     * @Route("/video/view/all")
     */
    public function viewVideo()
    {
        $repository = $this->getDoctrine()->getRepository(Podcast::class);
        $podcasts = $repository->findAll();

        return $this->render('podcast/view.html.twig', array(
            'podcasts' => $podcasts,
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
    public function updateVideo(Request $request    )
    {
        $video = new Video();
        $video->setUrlPodcast('Add pod');

        $form = $this->createFormBuilder($video)
            ->add('titrePodcast', TextType::class, array(
                    'label' => 'Ajouter un titre ',
                    'required' => true,
                )
            )
            ->add('descriptionPodcast', TextareaType::class, array(
                    'label' => 'Description du podcast',
                    'required' => true,
                )
            )
            ->add('imagePodcast', FileType::class, array(
                    'label' => 'Ajouter une image ',
                    'required' => true,
                )
            )
            ->add('urlPodcast', FileType::class, array(
                    'data_class' => null,
                    'label' => 'Uploader le podcast ',
                    'required' => true,
                )
            )
            ->add('save', SubmitType::class, array(
                    'label' => 'Crée le podcast '
                )
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            // but, the original `$task` variable has also been updated
            $video = $form->getData();

            $file = $video->getImagePodcast();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('image_directory'), $fileName
            );

            $videoFile = $video->getUrlPodcast();
            $videoName = md5(uniqid()).'.'.$videoFile->guessExtension();

            $videoFile->move(
                $this->getParameter('podcast_directory'), $videoName
            );

            // Move the file to the directory where brochures are stored

            setlocale(LC_TIME, "fr_FR");

            $video->setDatecreationPodcast(new \DateTime(date('d-m-Y h:i:s'))); //ajoute la date de création
            $video->setDatemodifPodcast(new \DateTime(date('d-m-Y h:i:s'))); // ajoute la date de modif

            $video->setImagePodcast($fileName); // ajoute l'image du podcast
            $video->setUrlPodcast($videoName); // ajoute le podcast

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