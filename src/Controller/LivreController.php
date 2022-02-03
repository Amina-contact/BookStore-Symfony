<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\LivreType;
use App\Repository\LivreRepository;
use App\Repository\GenreRepository;
use App\Repository\AuteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class LivreController extends AbstractController
{
    #[Route('/', name: 'livre_index', methods: ['GET'])]
    public function index(LivreRepository $livreRepository, GenreRepository $genreRepository, AuteurRepository $auteurRepository): Response
    {
        return $this->render('livre/index.html.twig', [
            'livres' => $livreRepository->findAll(),
            'genres' => $genreRepository->findAll(),
            'auteurs' => $auteurRepository->findAll(),
            'dates' => $livreRepository->findDates(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     */
    #[Route('/livre/new', name: 'livre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();
            $this->addFlash(
                'info',
                'Livre a été bien ajouté !'
            );

            return $this->redirectToRoute('livre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('livre/new.html.twig', [
            'livre' => $livre,
            'form' => $form,
        ]);
    }

    #[Route('/livre/{id}', name: 'livre_show', methods: ['GET'])]
    public function show(Livre $livre,GenreRepository $genreRepository, AuteurRepository $auteurRepository): Response
    {
        return $this->render('livre/show.html.twig', [
            'livre' => $livre,
           $auteurs = $auteurRepository->findByLivre($livre),
           'auteurs' => $auteurs,
           $genres = $genreRepository->findByLivre($livre),
           'genres' => $genres,
        ]);
    }

    #[Route('/livre/{id}/edit', name: 'livre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Livre $livre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash(
                'info',
                'Livre a été bien modifié !'
            );

            return $this->redirectToRoute('livre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('livre/edit.html.twig', [
            'livre' => $livre,
            'form' => $form,
        ]);
    }

    #[Route('/livre/{id}', name: 'livre_delete', methods: ['POST'])]
    public function delete(Request $request, Livre $livre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$livre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($livre);
            $entityManager->flush();
            $this->addFlash(
                'info',
                'Livre a été bien supprimé !'
            );

        }

        return $this->redirectToRoute('livre_index', [], Response::HTTP_SEE_OTHER);
    }

        /**
     * @Route("/livre/filterByTitre/{motCle}", name="livre_chercher", methods={"GET"})
     */
    public function filterByTitre(String $motCle, LivreRepository $livreRepository): Response
    {
        $livres = $livreRepository->findByTitre($motCle);

        return $this->render('livre/filter.html.twig', [
            'livres' => $livres,
        ]);
    }


    /**
     * @Route("/livre/filterBetweenTwoDates/{dateMin}/{dateMax}")
     */
    public function filterBetweenTwoDates($dateMin, $dateMax, LivreRepository $livreRepository): Response
    {
        $livres = $livreRepository->findBetweenTwoDates(strval($dateMin), strval($dateMax));
        return $this->render('livre/filter.html.twig', [
            'livres' => $livres,
        ]);
    }

    /**
     * @Route("/livre/filterByNote/{note}", name="livre_list_by_note", methods={"GET"})
     */
    public function filterByNote(LivreRepository $livreRepository, $note): Response
    {
        $livres = $livreRepository->findByNote($note);
        return $this->render('livre/filter.html.twig', [
            'livres' => $livres,
        ]);
    }

    /**
     * @Route("/livre/filterByDate/{date}/", name="livre_list_by_date", methods={"GET"})
     */
    public function filterByDate(LivreRepository $livreRepository, $date): Response
    {
        $livres = $livreRepository->findByDate($date);
        return $this->render('livre/filter.html.twig', [
            'livres' => $livres,
        ]);
    }


    /**
     * @Route("/livre/filterByAuteur/{auteur}/", name="livre_list_by_auteur", methods={"GET"})
     */
    public function filterByAuteur(LivreRepository $livreRepository, $auteur): Response
    {
        $livres = $livreRepository->findByAuteur($auteur);
        return $this->render('livre/filter.html.twig', [
            'livres' => $livres,
        ]);
    }

    /**
     * @Route("/livre/filterByGenre/{genre}/", name="livre_list_by_genre", methods={"GET"})
     */
    public function filterByGenre(LivreRepository $livreRepository, $genre): Response
    {
        $livres =  $livreRepository->findByGenre($genre);
        return $this->render('livre/filter.html.twig', [
            'livres' => $livres,
        ]);
    }




    

    #[Route('/livre/advancedSearch/', name: 'livre_search', methods: ['GET'])]
    public function advancedSearch(LivreRepository $livreRepository, GenreRepository $genreRepository, AuteurRepository $auteurRepository): Response
    {
        return $this->render('livre/advancedSearch.html.twig', [
            'livres' => $livreRepository->findAll(),
            'genres' => $genreRepository->findAll(),
            'auteurs' => $auteurRepository->findAll(),
            'dates' => $livreRepository->findDates(),
        ]);
    }


}
