<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity
 */
class Video
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre_video", type="string", length=255, nullable=false)
     */
    private $titreVideo;

    /**
     * @var string
     *
     * @ORM\Column(name="url_video", type="string", length=255, nullable=false)
     */
    private $urlVideo;

    /**
     * @var string
     *
     * @ORM\Column(name="description_video", type="text", length=65535, nullable=false)
     */
    private $descriptionVideo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreation_video", type="datetime", nullable=false)
     */
    private $datecreationVideo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemodification_video", type="datetime", nullable=false)
     */
    private $datemodificationVideo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_video", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVideo;



    /**
     * Set titreVideo
     *
     * @param string $titreVideo
     *
     * @return Video
     */
    public function setTitreVideo($titreVideo)
    {
        $this->titreVideo = $titreVideo;

        return $this;
    }

    /**
     * Get titreVideo
     *
     * @return string
     */
    public function getTitreVideo()
    {
        return $this->titreVideo;
    }

    /**
     * Set urlVideo
     *
     * @param string $urlVideo
     *
     * @return Video
     */
    public function setUrlVideo($urlVideo)
    {
        $this->urlVideo = $urlVideo;

        return $this;
    }

    /**
     * Get urlVideo
     *
     * @return string
     */
    public function getUrlVideo()
    {
        return $this->urlVideo;
    }

    /**
     * Set descriptionVideo
     *
     * @param string $descriptionVideo
     *
     * @return Video
     */
    public function setDescriptionVideo($descriptionVideo)
    {
        $this->descriptionVideo = $descriptionVideo;

        return $this;
    }

    /**
     * Get descriptionVideo
     *
     * @return string
     */
    public function getDescriptionVideo()
    {
        return $this->descriptionVideo;
    }

    /**
     * Set datecreationVideo
     *
     * @param \DateTime $datecreationVideo
     *
     * @return Video
     */
    public function setDatecreationVideo($datecreationVideo)
    {
        $this->datecreationVideo = $datecreationVideo;

        return $this;
    }

    /**
     * Get datecreationVideo
     *
     * @return \DateTime
     */
    public function getDatecreationVideo()
    {
        return $this->datecreationVideo;
    }

    /**
     * Set datemodificationVideo
     *
     * @param \DateTime $datemodificationVideo
     *
     * @return Video
     */
    public function setDatemodificationVideo($datemodificationVideo)
    {
        $this->datemodificationVideo = $datemodificationVideo;

        return $this;
    }

    /**
     * Get datemodificationVideo
     *
     * @return \DateTime
     */
    public function getDatemodificationVideo()
    {
        return $this->datemodificationVideo;
    }

    /**
     * Get idVideo
     *
     * @return integer
     */
    public function getIdVideo()
    {
        return $this->idVideo;
    }
}
