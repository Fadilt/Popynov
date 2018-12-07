<?php
/**
 * Created by PhpStorm.
 * User: yiming
 * Date: 05/10/2018
 * Time: 15:05
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Podcast;
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

class PodcastController extends Controller
{
    /**
     *
     * @Route("/podcast/create")
     */
    public function createPodcast(Request $request)
    {

        $podcast = new Podcast();
        $podcast->setUrlPodcast('Add pod');

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
            $podcast = $form->getData();

            $file = $podcast->getImagePodcast();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('image_directory'), $fileName
            );

            $podcastFile = $podcast->getUrlPodcast();
            $podcastName = md5(uniqid()).'.'.$podcastFile->guessExtension();

            $podcastFile->move(
                $this->getParameter('podcast_directory'), $podcastName
            );

            // Move the file to the directory where brochures are stored

            setlocale(LC_TIME, "fr_FR");

            $podcast->setDatecreationPodcast(new \DateTime(date('d-m-Y h:i:s'))); //ajoute la date de création
            $podcast->setDatemodifPodcast(new \DateTime(date('d-m-Y h:i:s'))); // ajoute la date de modif

            $podcast->setImagePodcast($fileName); // ajoute l'image du podcast
            $podcast->setUrlPodcast($podcastName); // ajoute le podcast

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($podcast);
            $entityManager->flush();

            return $this->redirectToRoute('podcast_creation');
        }

        //return $this->redirectToRoute('podcast_creation');


        return $this->render('podcast/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     *
     * @Route("/podcast/view")
     */
    public function viewPodcast(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Podcast::class);
        $podcasts = $repository->findAll();

        return $this->render('podcast/view.html.twig', array(
            'podcasts' => $podcasts,
        ));
    }

}