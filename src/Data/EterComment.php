<?php
namespace EterelzApi\Data;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterComment
 * @package data
 * @ORM\Table(name="eter_comment")
 * @ORM\Entity
 */
class EterComment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $com_content;

    /**
     * @ORM\ManyToOne(targetEntity="EterComment", inversedBy="com_children")
     * @ORM\JoinColumn(name="com_id", referencedColumnName="id")
     */
    private $com_parent;

    /**
     * @ORM\OneToMany(targetEntity="EterComment", mappedBy="com_parent")
     */
    private $com_children;

    /**
     * @ORM\ManyToOne(targetEntity="EterUsers", inversedBy="comment")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="EterContent", inversedBy="comment")
     * @ORM\JoinColumn(name="content_id", referencedColumnName="id")
     */
    private $content;

    public function __construct(array $data)
    {
        $this->com_children = new ArrayCollection();
        Utils::assign($this, $data);
    }
}