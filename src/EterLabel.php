<?php



use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterLabel
 * @package data
 * @ORM\Table(name="eter_label")
 * @ORM\Entity
 */
class EterLabel
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
    private $label_name;

//    /**
//     * @ORM\ManyToMany(targetEntity="EterUsers", mappedBy="user_label")
//     */
//    private ArrayCollection $users;

    public function __construct(array $data)
    {
//        $this->users = new ArrayCollection();
        Utils::assign($this, $data);
    }
}