<?php


namespace data;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterLabel
 * @package data
 * @ORM\Table(name="eter_label")
 */
class EterLabel
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $label_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $label_name;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}