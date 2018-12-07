<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TagVideo
 *
 * @ORM\Table(name="tag_video", indexes={@ORM\Index(name="id_video", columns={"id_video"}), @ORM\Index(name="id_tag", columns={"id_tag"})})
 * @ORM\Entity
 */
class TagVideo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tv", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTv;

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
     * @var \AppBundle\Entity\Video
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_video", referencedColumnName="id_video")
     * })
     */
    private $idVideo;



    /**
     * Get idTv
     *
     * @return integer
     */
    public function getIdTv()
    {
        return $this->idTv;
    }

    /**
     * Set idTag
     *
     * @param \AppBundle\Entity\Tag $idTag
     *
     * @return TagVideo
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
     * Set idVideo
     *
     * @param \AppBundle\Entity\Video $idVideo
     *
     * @return TagVideo
     */
    public function setIdVideo(\AppBundle\Entity\Video $idVideo = null)
    {
        $this->idVideo = $idVideo;

        return $this;
    }

    /**
     * Get idVideo
     *
     * @return \AppBundle\Entity\Video
     */
    public function getIdVideo()
    {
        return $this->idVideo;
    }
}
