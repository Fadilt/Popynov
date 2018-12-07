<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity
 */
class Article
{
    /**
     * @var string
     *
     * @ORM\Column(name="img_article", type="string", length=255, nullable=false)
     */
    private $imgArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_article", type="string", length=255, nullable=false)
     */
    private $nomArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_article", type="text", length=65535, nullable=false)
     */
    private $contenuArticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreation_article", type="datetime", nullable=false)
     */
    private $datecreationArticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemodif_article", type="datetime", nullable=false)
     */
    private $datemodifArticle;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_article", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;



    /**
     * Set imgArticle
     *
     * @param string $imgArticle
     *
     * @return Article
     */
    public function setImgArticle($imgArticle)
    {
        $this->imgArticle = $imgArticle;

        return $this;
    }

    /**
     * Get imgArticle
     *
     * @return string
     */
    public function getImgArticle()
    {
        return $this->imgArticle;
    }

    /**
     * Set nomArticle
     *
     * @param string $nomArticle
     *
     * @return Article
     */
    public function setNomArticle($nomArticle)
    {
        $this->nomArticle = $nomArticle;

        return $this;
    }

    /**
     * Get nomArticle
     *
     * @return string
     */
    public function getNomArticle()
    {
        return $this->nomArticle;
    }

    /**
     * Set contenuArticle
     *
     * @param string $contenuArticle
     *
     * @return Article
     */
    public function setContenuArticle($contenuArticle)
    {
        $this->contenuArticle = $contenuArticle;

        return $this;
    }

    /**
     * Get contenuArticle
     *
     * @return string
     */
    public function getContenuArticle()
    {
        return $this->contenuArticle;
    }

    /**
     * Set datecreationArticle
     *
     * @param \DateTime $datecreationArticle
     *
     * @return Article
     */
    public function setDatecreationArticle($datecreationArticle)
    {
        $this->datecreationArticle = $datecreationArticle;

        return $this;
    }

    /**
     * Get datecreationArticle
     *
     * @return \DateTime
     */
    public function getDatecreationArticle()
    {
        return $this->datecreationArticle;
    }

    /**
     * Set datemodifArticle
     *
     * @param \DateTime $datemodifArticle
     *
     * @return Article
     */
    public function setDatemodifArticle($datemodifArticle)
    {
        $this->datemodifArticle = $datemodifArticle;

        return $this;
    }

    /**
     * Get datemodifArticle
     *
     * @return \DateTime
     */
    public function getDatemodifArticle()
    {
        return $this->datemodifArticle;
    }

    /**
     * Get idArticle
     *
     * @return integer
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }
}
