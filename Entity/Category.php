<?php

class Category {
    private int $id;
    private string $name;
    private string $color;
    
    // Constructeur
    public function __construct(array $data) {
        $this->hydrate($data);
    }

    // méthodes
    public function hydrate(array $data): void
    {
        foreach($data as $key => $value) {
            $method = "set".ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor($color): self
    {
        $this->color = $color;
        return $this;
    }
}