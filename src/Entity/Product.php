<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
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
    #[Regex('/[a-zA-Z]{3,180}/')]
    private ?string $title = null;

    #[ORM\Column(type: 'string', nullable: true)] 
    #[Regex('/^[[:ascii:]]+$/')]
    private ?string $description = null;

    #[ORM\Column(unique: true)]
    #[Regex('/^[-|\d]+$/')]
    private ?int $code;

    #[ORM\Column(unique: true)]
    #[Regex('/^[a-zA-Z\d\/]+$/')]
    private ?int $slug;
	
}