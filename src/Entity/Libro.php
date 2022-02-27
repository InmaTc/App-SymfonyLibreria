<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\LibroRepository;

/**
 * @ORM\Entity(repositoryClass=LibroRepository::class)
 * @ORM\Table(name="libro")
 */
class Libro
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Editorial", inversedBy="libros")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull()
     * @var Editorial
     */
    private $editorial;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Debe introducir el título")
     * @Assert\Length(min=3, minMessage="Mínimo tres letras")
     * @var string
     */
    private $titulo;

    /**
     * @ORM\ManyToMany(targetEntity="Autor", inversedBy="libros")
     * @Assert\NotNull()
     * @var Autor[]|Collection
     */
    private $autores;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Debe indicar el año de publicación")
     * @Assert\Range(min=1500, max=2022, notInRangeMessage="El año debe estar entre 1500 y la actualidad")
     * @var int
     */
    private $anioPublicacion;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\NotBlank(message="Debe introducir el ISBN")
     * @Assert\Isbn(type="isbn10", message="ISBN no válido")
     * @var string
     */
    private $isbn;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank(message="Introduzca el número de páginas del libro")
     * @Assert\Positive(message="Debe ser un número positivo")
     * @var int
     */
    private $paginas;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Debe rellenar este campo")
     * @Assert\Length(min="3", max="240", minMessage="Mínimo tres caracteres", maxMessage="Máximo 240 caracteres")
     * @var string
     */
    private $sinopsis;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Introduzca el precio sin decimales")
     * @Assert\PositiveOrZero(message="Debe ser un número mayor o igual a 0")
     * @var int
     */
    private $precioCompra;

    /**
     * @ORM\ManyToOne(targetEntity="Socio", inversedBy="libros")
     * @var Socio|null
     */
    private $socio;

    public function __construct()
    {
        $this->autores = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitulo();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Editorial
     */
    public function getEditorial(): ?Editorial
    {
        return $this->editorial;
    }

    /**
     * @param Editorial $editorial
     * @return Libro
     */
    public function setEditorial(Editorial $editorial): Libro
    {
        $this->editorial = $editorial;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     * @return Libro
     */
    public function setTitulo(string $titulo): Libro
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * @return Autor[]|Collection
     */
    public function getAutores()
    {
        return $this->autores;
    }

    /**
     * @param Autor[]|Collection $autores
     * @return Libro
     */
    public function setAutores($autores)
    {
        $this->autores = $autores;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnioPublicacion(): ?int
    {
        return $this->anioPublicacion;
    }

    /**
     * @param int $anioPublicacion
     * @return Libro
     */
    public function setAnioPublicacion(int $anioPublicacion): Libro
    {
        $this->anioPublicacion = $anioPublicacion;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     * @return Libro
     */
    public function setIsbn(string $isbn): Libro
    {
        $this->isbn = $isbn;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaginas(): ?int
    {
        return $this->paginas;
    }

    /**
     * @param int|null $paginas
     * @return Libro
     */
    public function setPaginas(?int $paginas): Libro
    {
        $this->paginas = $paginas;
        return $this;
    }

    /**
     * @return string
     */
    public function getSinopsis(): ?string
    {
        return $this->sinopsis;
    }

    /**
     * @param string $sinopsis
     * @return Libro
     */
    public function setSinopsis(string $sinopsis): Libro
    {
        $this->sinopsis = $sinopsis;
        return $this;
    }
    /**
     * @return int
     */
    public function getPrecioCompra(): ?int
    {
        return $this->precioCompra;
    }

    /**
     * @param int $precioCompra
     * @return Libro
     */
    public function setPrecioCompra(int $precioCompra): Libro
    {
        $this->precioCompra = $precioCompra;
        return $this;
    }

    /**
     * @return Socio|null
     */
    public function getSocio(): ?Socio
    {
        return $this->socio;
    }

    /**
     * @param Socio|null $socio
     * @return Libro
     */
    public function setSocio(?Socio $socio): Libro
    {
        $this->socio = $socio;
        return $this;
    }

}
