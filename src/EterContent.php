<?php


use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * @ORM\Entity
 * @ORM\Table(name="eter_content")
 * Class EterContent
 * @package data
 */
class EterContent
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $content_text;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $content_date;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $content_pic;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $content_name;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $content_update;

    /**
     * @ORM\OneToMany(targetEntity="EterComment", mappedBy="content")
     */
    private ArrayCollection $comment;

    /**
     * @ORM\ManyToOne(targetEntity="EterUsers", inversedBy="content")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="EterCategorie", inversedBy="content")
     * @ORM\JoinColumn(name="cat_id", referencedColumnName="id")
     */
    private $cat;

    /**
     * @ORM\ManyToOne(targetEntity="EterStatut", inversedBy="")
     * @ORM\JoinColumn(name="statut_id", referencedColumnName="id")
     */
    private $statut;

    public function __construct(array $data)
    {
        $this->comment = new ArrayCollection();
        Utils::assign($this, $data);
    }
}