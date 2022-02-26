<?php

namespace App\Repository;


use App\Entity\Libro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LibroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Libro::class);
    }

    public function create() : Libro
    {
        $libro = new Libro();
        $this->getEntityManager()->persist($libro);

        return $libro;
    }

    public function save() : void
    {
        $this->getEntityManager()->flush();
    }

    public function delete(Libro $libro) : void
    {
        $this->getEntityManager()->remove($libro);
        $this->save();
    }

    public function findLibrosOrdenados()
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT l FROM App\\Entity\\Libro l ORDER BY l.titulo")
            ->getResult();
    }

    public function findLibrosOrdenadosAnio()
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT l FROM App\\Entity\\Libro l ORDER BY l.anioPublicacion DESC")
            ->getResult();
    }

    public function findLibrosTitulo(string $titulo)
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT l FROM App\\Entity\\Libro l WHERE l.titulo LIKE :titulo ORDER BY l.titulo ASC")
            ->setParameter('titulo', '%' . $titulo . '%')
            ->getResult();
    }

    public function findLibrosListadoA()
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT l,e FROM App\\Entity\\Libro l JOIN l.editorial e WHERE e.nombre LIKE :letra ORDER BY l.titulo ASC")
            ->setParameter('letra', '%a%')
            ->getResult();
    }

    public function findLibrosunAutor()
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT l FROM App\\Entity\\Libro l  WHERE SIZE(l.autores) = 1 ORDER BY l.titulo ASC")
            ->getResult();
    }
}