<?php


namespace data;

use DateTime;
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
private $content_id;

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

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}