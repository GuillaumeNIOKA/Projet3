<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\RecipeRepository;

class RecipeController extends AbstractController
{
    #[Route('/recettes/', name: 'recipe.index')]
    public function index(Request $request, RecipeRepository $repository, EntityManagerInterface $em): Response
    {
        $recipes=$repository->findWithDurationLowerThan(20);
        $recipe = new Recipe();
        $recipe->setTitle('Barbe à papa')
        ->setSlug('barbe_papa')
            ->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eleifend nisl dolor, ac rutrum nisl condimentum ut. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec venenatis venenatis nibh, eget posuere non.')
            ->setDuration(2)
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());
        $em->persist($recipe);
        $em->flush();

    }

    #[Route('/recettes/{slug}-{id}', name: 'recipe.show', requirements: ['id'=>'\d+', 'slug'=>'[a-z0-9-]+'])]
    public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
    {
        $recipe = $repository->findWithDurationLowerThan(12);
        if ($recipe->getSlug() !== $slug){
            return $this->redirectToRoute('recipe.show', ['slug' => $recipe->getSlug(), 'id' => $recipe->getId()]);
        }
        return $this->render('recipe/show.html.twig', [
            'recipe' => $recipe
        ]);
    }


}