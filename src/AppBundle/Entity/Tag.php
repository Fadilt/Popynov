<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_tag", type="string", length=255, nullable=false)
     */
    private $nomTag;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tag", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTag;



    /**
     * Set nomTag
     *
     * @param string $nomTag
     *
     * @return Tag
     */
    public function setNomTag($nomTag)
    {
        $this->nomTag = $nomTag;

        return $this;
    }

    /**
     * Get nomTag
     *
     * @return string
     */
    public function getNomTag()
    {
        return $this->nomTag;
    }

    /**
     * Get idTag
     *
     * @return integer
     */
    public function getIdTag()
    {
        return $this->idTag;
    }
}
