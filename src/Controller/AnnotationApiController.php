<?php

namespace Subugoe\TextApiBundle\Controller;

use FOS\RestBundle\View\View;
use Subugoe\TextApiBundle\Service\TextApiService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

class AnnotationApiController extends AbstractSubugoeController
{
    private TextApiService $textApiService;
    private RouterInterface $router;

    public function __construct(TextApiService $textApiService, RouterInterface $router)
    {
        $this->textApiService = $textApiService;
        $this->router = $router;
    }

    public function collectionForCollection(string $id)
    {
        
    }

    public function collectionForManifest(string $manifest): View
    {
        $document = $this->textApiService->getAnnotationCollection($id);
        $annotationCollection = $this->presentationService->getAnnotationCollection($document, 'manifest');

        return $this->view($annotationCollection, Response::HTTP_OK);
    }

    public function page(string $id, string $page): View
    {
        $document = $this->translator->getDocumentById($id);
        $pageDocument = $this->translator->getDocumentById($page);
        $annotationPage = $this->presentationService->getAnnotationPage($document, $pageDocument);

        return $this->view($annotationPage, Response::HTTP_OK);
    }

    public function pageAnnotationCollection(string $id, string $page): View
    {
        $document = $this->translator->getDocumentById($page);
        $annotationCollection = $this->presentationService->getAnnotationCollection($document, 'item');

        return $this->view($annotationCollection, Response::HTTP_OK);
    }
}
