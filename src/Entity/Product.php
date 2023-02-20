<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Regex;

#[ORM\Entity]
#[ORM\Table('products')]
class Product
{

    #[ORM\Id()]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    #[ORM\Column(type: 'string')]
    #[Regex('/^.{3,180}$/')]
    private ?string $title = null;

    #[ORM\Column(type: 'string', nullable: true)] 
    private ?string $description = null;

    #[ORM\Column(unique: true)]
    #[Regex('/^[A-Za-z -]{3,180}$/')]
    private ?int $code;

    #[ORM\Column(unique: true)]
    private ?int $slug;
	
}