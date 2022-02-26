<?php

namespace App\Controller;

use App\Entity\Libro;
use App\Form\LibroType;
use App\Repository\LibroRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibroController extends AbstractController
{
    /**
     * @Route("/libro/listar", name="libro_listar")
     */
    public function listar(LibroRepository $librosRepository): Response
    {
        $libros = $librosRepository->findBy([],['titulo' => 'ASC']);

        return $this->render('libro/listar.html.twig', [
            'libros' => $libros
        ]);
    }

    /**
     * @Route("/libro/nuevo", name="libro_nuevo")
     */
    public function nuevo(Request $request, LibroRepository $libroRepository): Response
    {
        $libro = $libroRepository->create();

        return $this->modificar($request, $libroRepository, $libro);
    }

    /**
     * @Route("/libro/modificar/{id}", name="libro_modificar")
     */
    public function modificar(Request $request, LibroRepository $libroRepository, Libro $libro): Response
    {
        $form = $this->createForm(LibroType::class, $libro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $libroRepository->save();
                $this->addFlash('exito', 'Cambios guardados con éxito');
                return $this->redirectToRoute('libro_listar');
            } catch (\Exception $exception) {
                $this->addFlash('error', 'Error al guardar los cambios');
            }
        }
        return $this->render('libro/modificar.html.twig', [
            'libro' => $libro,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/libro/eliminar/{id}", name="libro_eliminar")
     */
    public function eliminar(Request $request, LibroRepository $libroRepository, Libro $libro): Response
    {
        if ($request->get('confirmar', false)) {
            try {
                $libroRepository->delete($libro);
                $this->addFlash('exito', 'Libro eliminado con éxito');
                return $this->redirectToRoute('libro_listar');
            } catch (\Exception $exception) {
                $this->addFlash('error', 'No se pudo eliminar el libro');
            }
        }
        return $this->render('libro/eliminar.html.twig', [
            'libro' => $libro
        ]);
    }
}