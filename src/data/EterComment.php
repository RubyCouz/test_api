<?php


namespace data;

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
    private $com_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $com_content;

    /**
     * @ORM\ManyToOne(targetEntity="EterComment", inversedBy="com_children")
     * @ORM\JoinColumn(name="com_id", referencedColumnName="com_id")
     */
    private $com_parent;

    /**
     * @ORM\OneToMany(targetEntity="EterComment", mappedBy="com_parent")
     */
    private ArrayCollection $com_children;
    public function __construct(array $data)
    {
        $this->com_children = new ArrayCollection();
        Utils::assign($this, $data);
    }
}