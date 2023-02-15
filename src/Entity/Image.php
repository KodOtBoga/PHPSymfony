<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

#[ORM\Table('images')]
#[ORM\Entity]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $path = null;

    #[ORM\Column(type: 'datetime')]
    private $uploadedAt;

    #[ORM\Column]
    private ?string $originalImageName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

	public function __construct(string $path, string $originalImageName)
	{
		$this->$path = $path;
		$this->originalImageName = $originalImageName;
		$this->uploadedAt = new \DateTime();
	}

    

	/**
	 * @return string|null
	 */
	public function getPath(): ?string {
		return $this->path;
	}
	
	/**
	 * @param string|null $path 
	 * @return self
	 */
	public function setPath(?string $path): self {
		$this->path = $path;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUploadedAt() {
		return $this->uploadedAt;
	}
	
	/**
	 * @param mixed $uploadedAt 
	 * @return self
	 */
	public function setUploadedAt($uploadedAt): self {
		$this->uploadedAt = $uploadedAt;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getOriginalImageName(): ?string {
		return $this->originalImageName;
	}
	
	/**
	 * @param string|null $originalImageName 
	 * @return self
	 */
	public function setOriginalImageName(?string $originalImageName): self {
		$this->originalImageName = $originalImageName;
		return $this;
	}
}
