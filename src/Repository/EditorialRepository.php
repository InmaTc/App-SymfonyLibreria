<?php

namespace App\Repository;


use App\Entity\Editorial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EditorialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Editorial::class);
    }

    public function findEditorialMenos5()
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT e FROM App\\Entity\\Editorial e  WHERE SIZE(e.libros) < 5 ORDER BY e.nombre ASC")
            ->getResult();
    }

    public function findEditorialLibros()
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT e as editorial, SIZE(e.libros) as total FROM App\\Entity\\Editorial e ORDER BY total DESC")
            ->getResult();
    }
}