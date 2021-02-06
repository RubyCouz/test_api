<?php



use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * @ORM\Entity
 * @ORM\Table(name="eter_categorie")
 * Class EterCategorie
 * @package data
 */
class EterCategorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $cat_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $cat_name;

    /**
     * @ORM\ManyToOne(targetEntity="EterCategorie", inversedBy="cat_children")
     * @ORM\JoinColumn(name="cat_id", referencedColumnName="cat_id")
     */
    private $cat_parent;

    /**
     * @ORM\OneToMany(targetEntity="EterCategorie", mappedBy="cat_parent")
     */
    private ArrayCollection $cat_children;

    /**
     * @ORM\OneToMany(targetEntity="EterContent", mappedBy="cat")
     */
    private ArrayCollection $content;

    public function __construct(array $data)
    {
        $this->content = new ArrayCollection();
        $this->cat_children = new ArrayCollection();
        Utils::assign($this, $data);
    }
}