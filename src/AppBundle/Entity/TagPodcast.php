<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TagPodcast
 *
 * @ORM\Table(name="tag_podcast", uniqueConstraints={@ORM\UniqueConstraint(name="id_podcast", columns={"id_podcast"}), @ORM\UniqueConstraint(name="id_tag", columns={"id_tag"})})
 * @ORM\Entity
 */
class TagPodcast
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tp", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTp;

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
     * @var \AppBundle\Entity\Podcast
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Podcast")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_podcast", referencedColumnName="id_podcast")
     * })
     */
    private $idPodcast;



    /**
     * Get idTp
     *
     * @return integer
     */
    public function getIdTp()
    {
        return $this->idTp;
    }

    /**
     * Set idTag
     *
     * @param \AppBundle\Entity\Tag $idTag
     *
     * @return TagPodcast
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

    /**
     * Set idPodcast
     *
     * @param \AppBundle\Entity\Podcast $idPodcast
     *
     * @return TagPodcast
     */
    public function setIdPodcast(\AppBundle\Entity\Podcast $idPodcast = null)
    {
        $this->idPodcast = $idPodcast;

        return $this;
    }

    /**
     * Get idPodcast
     *
     * @return \AppBundle\Entity\Podcast
     */
    public function getIdPodcast()
    {
        return $this->idPodcast;
    }
}
