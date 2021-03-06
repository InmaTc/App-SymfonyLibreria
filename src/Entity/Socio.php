<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="socio")
 */
class Socio implements UserInterface
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
     * @ORM\Column(type="string", unique=true)
     * @var string
     */
    private $usuario;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $clave;

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
     * @return string
     */
    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     * @return Socio
     */
    public function setUsuario(string $usuario): Socio
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @return string
     */
    public function getClave(): ?string
    {
        return $this->clave;
    }

    /**
     * @param string $clave
     * @return Socio
     */
    public function setClave(string $clave): Socio
    {
        $this->clave = $clave;
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

    public function getRoles()
    {
        $roles = [
            'ROLE_USER'
        ];

        if ($this->isDocente()) {
            $roles[] = 'ROLE_DOCENTE';
        }

        return $roles;
    }

    public function getPassword()
    {
        return $this->getClave();
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->getUsuario();
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
