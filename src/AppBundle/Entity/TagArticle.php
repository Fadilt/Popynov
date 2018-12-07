<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TagArticle
 *
 * @ORM\Table(name="tag_article", indexes={@ORM\Index(name="id_article", columns={"id_article"}), @ORM\Index(name="cont_tag_tag1", columns={"id_tag"})})
 * @ORM\Entity
 */
class TagArticle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ta", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTa;

    /**
     * @var \AppBundle\Entity\Article
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article", referencedColumnName="id_article")
     * })
     */
    private $idArticle;

    /**
     * @var \AppBundle\Entity\Tag
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tag")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tag", referencedColumnName="id_tag")
     * })
     */
    private $idTag;



    /**
     * Get idTa
     *
     * @return integer
     */
    public function getIdTa()
    {
        return $this->idTa;
    }

    /**
     * Set idArticle
     *
     * @param \AppBundle\Entity\Article $idArticle
     *
     * @return TagArticle
     */
    public function setIdArticle(\AppBundle\Entity\Article $idArticle = null)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return \AppBundle\Entity\Article
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * Set idTag
     *
     * @param \AppBundle\Entity\Tag $idTag
     *
     * @return TagArticle
     */
    public function setIdTag(\AppBundle\Entity\Tag $idTag = null)
    {
        $this->idTag = $idTag;

        return $this;
    }

    /**
     * Get idTag
     *
     * @return \AppBundle\Entity\Tag
     */
    public function getIdTag()
    {
        return $this->idTag;
    }
}
