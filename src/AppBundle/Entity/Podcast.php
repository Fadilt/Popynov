<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Podcast
 *
 * @ORM\Table(name="podcast")
 * @ORM\Entity
 */
class Podcast
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre_podcast", type="string", length=255, nullable=false)
     */
    private $titrePodcast;

    /**
     * @var string
     *
     * @ORM\Column(name="description_podcast", type="text", length=65535, nullable=false)
     */
    private $descriptionPodcast;

    /**
     * @var string
     *
     * @ORM\Column(name="image_podcast", type="string", length=255, nullable=false)
     */
    private $imagePodcast;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreation_podcast", type="datetime", nullable=false)
     */
    private $datecreationPodcast;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemodif_podcast", type="datetime", nullable=false)
     */
    private $datemodifPodcast;

    /**
     * @var string
     *
     * @ORM\Column(name="url_podcast", type="string", length=255, nullable=false)
     */
    private $urlPodcast;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_podcast", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPodcast;



    /**
     * Set titrePodcast
     *
     * @param string $titrePodcast
     *
     * @return Podcast
     */
    public function setTitrePodcast($titrePodcast)
    {
        $this->titrePodcast = $titrePodcast;

        return $this;
    }

    /**
     * Get titrePodcast
     *
     * @return string
     */
    public function getTitrePodcast()
    {
        return $this->titrePodcast;
    }

    /**
     * Set descriptionPodcast
     *
     * @param string $descriptionPodcast
     *
     * @return Podcast
     */
    public function setDescriptionPodcast($descriptionPodcast)
    {
        $this->descriptionPodcast = $descriptionPodcast;

        return $this;
    }

    /**
     * Get descriptionPodcast
     *
     * @return string
     */
    public function getDescriptionPodcast()
    {
        return $this->descriptionPodcast;
    }

    /**
     * Set imagePodcast
     *
     * @param string $imagePodcast
     *
     * @return Podcast
     */
    public function setImagePodcast($imagePodcast)
    {
        $this->imagePodcast = $imagePodcast;

        return $this;
    }

    /**
     * Get imagePodcast
     *
     * @return string
     */
    public function getImagePodcast()
    {
        return $this->imagePodcast;
    }

    /**
     * Set datecreationPodcast
     *
     * @param \DateTime $datecreationPodcast
     *
     * @return Podcast
     */
    public function setDatecreationPodcast(\DateTime $datecreationPodcast)
    {
        $this->datecreationPodcast = $datecreationPodcast;

        return $this;
    }

    /**
     * Get datecreationPodcast
     *
     * @return \DateTime
     */
    public function getDatecreationPodcast()
    {
        return $this->datecreationPodcast;
    }

    /**
     * Set datemodifPodcast
     *
     * @param \DateTime $datemodifPodcast
     *
     * @return Podcast
     */
    public function setDatemodifPodcast(\DateTime $datemodifPodcast)
    {
        $this->datemodifPodcast = $datemodifPodcast;

        return $this;
    }

    /**
     * Get datemodifPodcast
     *
     * @return \DateTime
     */
    public function getDatemodifPodcast()
    {
        return $this->datemodifPodcast;
    }

    /**
     * Set urlPodcast
     *
     * @param string $urlPodcast
     *
     * @return Podcast
     */
    public function setUrlPodcast($urlPodcast)
    {
        $this->urlPodcast = $urlPodcast;

        return $this;
    }

    /**
     * Get urlPodcast
     *
     * @return string
     */
    public function getUrlPodcast()
    {
        return $this->urlPodcast;
    }

    /**
     * Get idPodcast
     *
     * @return integer
     */
    public function getIdPodcast()
    {
        return $this->idPodcast;
    }
}
