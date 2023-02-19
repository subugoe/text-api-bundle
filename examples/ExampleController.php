<?php

namespace App\Controller;

use Subugoe\TextApiBundle\Controller\AbstractSubugoeController;
use Subugoe\TextApiBundle\Service\TextApiService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

#[Route('/textapi', name: 'subugoe_text_api_')]
class TextApiController extends AbstractSubugoeController
{
    private TextApiService $textApiService;
    private RouterInterface $router;

    public function __construct(TextApiService $textApiService, RouterInterface $router)
    {
        $this->textApiService = $textApiService;
        $this->router = $router;
    }

    #[Route('/{collection}/collection.json', name: 'collection')]
    public function collection(string $collection): Response
    {
        $collection = $this->textApiService->getCollection($collection);

        return $this->customJson($collection);
    }

    #[Route('/content/{type}/{id}.html', name: 'content')]
    public function content(string $type, string $id): Response
    {
        $content = $this->textApiService->getContent($type, $id);

        $response = new Response($content);
        $response->headers->set('Content-Type', 'text/html');

        return $response;
    }

    #[Route('/{manifest}/{item}/{revision}/item.json', name: 'item')]
    public function item(string $manifest, string $item, string $revision): Response
    {
        $item = $this->textApiService->getItem($item, $revision);

        return $this->customJson($item);
    }

    #[Route('/{manifest}/manifest.json', name: 'manifest')]
    public function manifest(string $manifest): Response
    {
        $manifest = $this->textApiService->getManifest(null, $manifest);

        return $this->customJson($manifest);
    }

    #[Route('/{manifest}/{item}/{revision}/annotationCollection.json', name: 'annotation_collection_for_item')]
    public function collectionForItem(string $manifest, string $item, string $revision): Response
    {
        $annotationCollection = $this->textApiService->getAnnotationCollectionForItem($item, $revision);

        return $this->customJson(['annotationCollection' => $annotationCollection]);
    }

    #[Route('/{manifest}/{item}/{revision}/annotationPage.json', name: 'annotation_page_for_item')]
    public function pageForItem(string $item, string $revision): Response
    {
        $annotationPage = $this->textApiService->getAnnotationPageForItem($item, $revision);

        return $this->customJson(['annotationPage' => $annotationPage]);
    }
}
