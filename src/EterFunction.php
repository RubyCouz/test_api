<?php



use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterFunction
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_function")
 */
class EterFunction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column (type="eter_function")
     * @var int
     */
    private $function_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $function_name;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="EterParticipant", mappedBy="function")
     */
    private ArrayCollection $participant;

    public function __construct(array $data)
    {
        $this->participant = new ArrayCollection();
        Utils::assign($this, $data);
    }
}