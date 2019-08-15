<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Media;
use App\Form\MediaType;
use App\Form\PictureArticleType;
use App\Repository\MediaRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/media")
 */
class MediaController extends AbstractController
{
    /**
     * @Route("/", name="media_index", methods={"GET"})
     */
    public function index(MediaRepository $mediaRepository): Response
    {
        return $this->render('media/index.html.twig', [
            'media' => $mediaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="media_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $medium = new Media();
        $form = $this->createForm(MediaType::class, $medium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($medium);
            $entityManager->flush();

            return $this->redirectToRoute('media_index');
        }

        return $this->render('media/new.html.twig', [
            'medium' => $medium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="media_show", methods={"GET"})
     */
    public function show(Media $medium): Response
    {
        return $this->render('media/show.html.twig', [
            'medium' => $medium,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="media_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Media $medium): Response
    {
        $form = $this->createForm(MediaType::class, $medium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('media_index');
        }

        return $this->render('media/edit.html.twig', [
            'medium' => $medium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="media_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Media $medium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($medium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('media_index');
    }

    /**
     * @Route("/{id}/image", name="article_image")
     */
    public function pictureArticle(Request $request, EntityManagerInterface $em, Media $pictureArticle,Filesystem $filesystem, FileUploader $fileUploader, $id)
    {
        $form = $this->createForm(PictureArticleType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $file = $form->get('url')->getData();

            if($pictureArticle->getUrl() !== 'templateArticle.png'){
                $filesystem->remove($this->getParameter('images_directory') . '/' . $pictureArticle->getUrl());
            }

            $fileName = $fileUploader->upload($file);

            $pictureArticle->setUrl($fileName);

            $em->flush();

            $this->addFlash('success', 'Image de l\'article modifiée');

            return $this->redirectToRoute('article_show', [
                'id' => $pictureArticle->getArticle()->getId(),
            ]);
        }

        return $this->render('media/picture_article.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
