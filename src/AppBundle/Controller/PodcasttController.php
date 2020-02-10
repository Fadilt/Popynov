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
use Symfony\Component\HttpFoundation\File\File;

class PodcasttController extends Controller
{
    /**
     *
     * @Route("/podcast/create")
     */
    public function createPodcast(Request $request)
    {

        $podcast = new Podcast();

        $form = $this->createFormBuilder($podcast)
            ->add('titrePodcast', TextType::class, array(
                    'label' => 'Ajouter un titre',
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

            return $this->redirectToRoute('podcast_view');
        }

        return $this->render('podcast/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     *
     * @Route("/podcasts/view")
     */
    public function viewPodcast()
    {
        $repository = $this->getDoctrine()->getRepository(Podcast::class);
        $podcasts = $repository->findAll();

        return $this->render('podcast/view.html.twig', array(
            'podcasts' => $podcasts,
        ));
    }

    /**
     *
     * @Route("/podcast/view/{id}")
     */
    public function viewIdPodcast($id)
    {
        $repository = $this->getDoctrine()->getRepository(Podcast::class);
        $podcast = $repository->find($id);

        return $this->render('podcast/viewId.html.twig', array(
            'podcast' => $podcast,
        ));
    }

    /**
     *
     * @Route("/podcast/update/{id}")
     */
    public function updatePodcast(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository(Podcast::class)->find($id);
        $viewPodcast = $post;
        if(!$post) {
            throw $this->createNotFoundException('Impossible de trouver ce podcast');
        }
        $imagePodcastOriginal = $post->getImagePodcast();
        $urlPodcastOriginal = $post->getUrlPodcast();
        $fileImage = new File($this->getParameter('image_directory') . '/' . $post->getImagePodcast());
        $fileUrl = new File($this->getParameter('podcast_directory') . '/' . $post->getUrlPodcast());

        $post->setTitrePodcast($post->getTitrePodcast());
        $post->setDescriptionPodcast($post->getDescriptionPodcast());
        $post->setImagePodcast($fileImage);
        $post->setUrlPodcast($fileUrl);

        $form = $this->createFormBuilder($post)
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
                    'required' => false,
                )
            )
            ->add('urlPodcast', FileType::class, array(
                    'label' => 'Uploader le podcast ',
                    'required' => false,
                )
            )
            ->add('save', SubmitType::class, array(
                    'label' => 'Enregistrer les modifications',
                )
            )
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $post = $em->getRepository(Podcast::class)->find($id);
            $titrePodcast = $form['titrePodcast']->getData();
            $descriptionPodcast = $form['descriptionPodcast']->getData();
            if($form['imagePodcast']->getData() && $form['imagePodcast']->getData() != null && $form['imagePodcast']->getData() != ""){
                $imagePodcast = $form['imagePodcast']->getData();
                $file = $imagePodcast;
                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('image_directory'), $fileName
                );
                $post->setImagePodcast($fileName);
            }

            if($form['urlPodcast']->getData() && $form['urlPodcast']->getData() != null){
                $urlPodcast = $form['urlPodcast']->getData();
                if($urlPodcast != "" && $urlPodcast != null && $urlPodcast){
                    $podcastFile = $urlPodcast;
                    $podcastName = md5(uniqid()).'.'.$podcastFile->guessExtension();

                    $podcastFile->move(
                        $this->getParameter('podcast_directory'), $podcastName
                    );
                    $post->setUrlPodcast($podcastName);
                }
            }

            $post->setTitrePodcast($titrePodcast);
            $post->setDescriptionPodcast($descriptionPodcast);
            $post->setDatemodifPodcast(new \DateTime(date('d-m-Y h:i:s'))); // ajoute la date de modif

            $em->flush();

            return $this->redirectToRoute('podcast_viewId', array('id' => $id));
        }

        return $this->render('podcast/update.html.twig', array(
            'form' => $form->createView(),
            'fileImage' => $imagePodcastOriginal,
            'urlPodcast' => $urlPodcastOriginal,
            'podcast' => $viewPodcast,
        ));

    }

    /**
     *
     * @Route("/podcast/delete/{id}")
     */
    public function deletePodcast($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository(Podcast::class)->findOneBy(array('idPodcast' => $id));
        $flashbag = $this->get('session')->getFlashBag();

        if(!$entity){
            //throw $this->createNotFoundException('Unable to find podcast entity.');
            $type = "error";
            $msg = 'Impossible de supprimer le fichier, le podcast ' . $id . ' n\'a pas été trouvé';
        }else {
            $em->remove($entity);
            $em->flush();
            $type = "success";
            $msg = 'Le podcast ' . $id . ' a été supprimé avec succès';
        }

        $flashbag->add($type, $msg);
        return $this->redirectToRoute('podcast_view');
    }

}