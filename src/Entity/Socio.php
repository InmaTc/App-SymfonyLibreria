<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="socio")
 */
class Socio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     * @var string|null
     */
    private $dni;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $estudiante;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $docente;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string|null
     */
    private $telefono;

    /**
     * @ORM\OneToMany(targetEntity="Libro", mappedBy="socio")
     * @var Libro[]|Collection
     */
    private $libros;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNombre() . ' ' . $this->getApellidos();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Socio
     */
    public function setNombre(string $nombre): Socio
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     * @return Socio
     */
    public function setApellidos(string $apellidos): Socio
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDni(): ?string
    {
        return $this->dni;
    }

    /**
     * @param string|null $dni
     * @return Socio
     */
    public function setDni(?string $dni): Socio
    {
        $this->dni = $dni;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEstudiante(): bool
    {
        return $this->estudiante;
    }

    /**
     * @param bool $estudiante
     * @return Socio
     */
    public function setEstudiante(bool $estudiante): Socio
    {
        $this->estudiante = $estudiante;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDocente(): bool
    {
        return $this->docente;
    }

    /**
     * @param bool $docente
     * @return Socio
     */
    public function setDocente(bool $docente): Socio
    {
        $this->docente = $docente;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    /**
     * @param string|null $telefono
     * @return Socio
     */
    public function setTelefono(?string $telefono): Socio
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * @return Collection|Libro[]
     */
    public function getLibros()
    {
        return $this->libros;
    }

    /**
     * @param Collection|Libro[] $libros
     * @return Socio
     */
    public function setLibros($libros)
    {
        $this->libros = $libros;
        return $this;
    }

}
