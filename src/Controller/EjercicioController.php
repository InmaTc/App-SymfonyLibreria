<?php

namespace App\Controller;

use App\Entity\Editorial;
use App\Entity\Libro;
use App\Repository\AutorRepository;
use App\Repository\EditorialRepository;
use App\Repository\LibroRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EjercicioController extends AbstractController
{
    /**
     * @Route("/libros/listar", name="libro_listar")
     */
    public function librosListado(LibroRepository $libroRepository):Response
    {
        $libros = $libroRepository->findLibrosOrdenados();
        return  $this->render('Consultas/Ap1.html.twig',[
                'libros' => $libros
            ]);
    }

    /**
     * @Route("/libros/listar2", name="libro_listar2")
     */
    public function librosListadoAnio(LibroRepository $libroRepository):Response
    {
        $libros = $libroRepository->findLibrosOrdenadosAnio();
        return  $this->render('Consultas/Ap1.html.twig',[
            'libros' => $libros
        ]);
    }

    /**
     * @Route("/libros/listar/{titulo}", name="libro_listar3")
     */
    public function librosListadoTitulo(LibroRepository $libroRepository, string $titulo):Response
    {
        $libros = $libroRepository->findLibrosTitulo($titulo);
        return  $this->render('Consultas/Ap1.html.twig',[
            'libros' => $libros
        ]);
    }

    /**
     * @Route("/libros/listar4", name="libro_listar")
     */
    public function librosListado4(LibroRepository $libroRepository):Response
    {
        $libros = $libroRepository->findLibrosListadoA();
        return  $this->render('Consultas/Ap1.html.twig',[
            'libros' => $libros
        ]);
    }

    /**
     * @Route("/libros/unAutor", name="libro_autor")
     */
    public function librosUnAutor(LibroRepository $libroRepository):Response
    {
        $libros = $libroRepository->findLibrosunAutor();
        return  $this->render('Consultas/Ap1.html.twig',[
            'libros' => $libros
        ]);
    }

    /**
     * @Route("/libros/autores", name="libro_autores")
     */
    public function librosAutores(LibroRepository $libroRepository):Response
    {
        $libros = $libroRepository->findLibrosOrdenados();
        return  $this->render('Consultas/Ap7.html.twig',[
            'libros' => $libros
        ]);
    }

    /**
     * @Route("/libros/ampliado", name="libro_ampliado")
     */
    public function librosAmpliado(LibroRepository $libroRepository):Response
    {
        $libros = $libroRepository->findLibrosOrdenados();
        return  $this->render('Consultas/Ap8.html.twig',[
            'libros' => $libros
        ]);
    }

    /**
     * @Route("/libros/ampliado/{id}", name="libro_idAutor")
     */
    public function autoresLibro(Libro $libro):Response
    {
        $autores = $libro->getAutores();
        return  $this->render('Consultas/ApAutores.html.twig',[
            'autores' => $autores
        ]);
    }

    /**
     * @Route("/editorial/librosMenor", name="editorial_menor5")
     */
    public function editorialMenor5(EditorialRepository $editorialRepository):Response
    {
        $editoriales = $editorialRepository->findEditorialMenos5();
        return  $this->render('Consultas/ApEditorial.html.twig',[
            'editoriales' => $editoriales
        ]);
    }

    /**
     * @Route("/editorial/libros", name="editorial_libros")
     */
    public function editorialLibros(EditorialRepository $editorialRepository):Response
    {
        $elementos = $editorialRepository->findEditorialLibros();
        return  $this->render('Consultas/ApEditorial.html.twig',[
            'elementos' => $elementos
        ]);
    }

    /**
     * @Route("/editorial/libros/{id}", name="libros_editorial")
     */
    public function librosEditorial(Editorial $editorial):Response
    {
        $libros = $editorial->getLibros();
        return  $this->render('Consultas/ApLibros.html.twig',[
            'libros' => $libros
        ]);
    }
}