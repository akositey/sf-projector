<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=18, scale=4)
     */
    private $budget;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $remarks;

    /**
     * @ORM\ManyToMany(targetEntity=Person::class, inversedBy="projects")
     */
    private $assigned_persons;

    public function __construct()
    {
        $this->assigned_persons = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return mixed
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBudget(): ?string
    {
        return $this->budget;
    }

    /**
     * @param string $budget
     * @return mixed
     */
    public function setBudget(string $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    /**
     * @param string $remarks
     * @return mixed
     */
    public function setRemarks(string $remarks): self
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return Collection|Person[]
     */
    public function getAssignedPersons(): Collection
    {
        return $this->assigned_persons;
    }

    public function addAssignedPerson(Person $assignedPerson): self
    {
        if (!$this->assigned_persons->contains($assignedPerson)) {
            $this->assigned_persons[] = $assignedPerson;
        }

        return $this;
    }

    public function removeAssignedPerson(Person $assignedPerson): self
    {
        $this->assigned_persons->removeElement($assignedPerson);

        return $this;
    }
}
