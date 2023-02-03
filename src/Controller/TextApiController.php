<?php

namespace Subugoe\TextApiBundle\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Subugoe\TextApiBundle\Service\TestService;
use Subugoe\TextApiBundle\Service\TextApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class TextApiController extends AbstractController
{
    private TextApiService $textApiService;
    private RouterInterface $router;

    public function __construct(TextApiService $textApiService, RouterInterface $router)
    {
        $this->textApiService = $textApiService;
        $this->router = $router;
    }

    public function annotationCollection(string $id): View
    {
        $document = $this->translator->getDocumentById($id);
        $annotationCollection = $this->presentationService->getAnnotationCollection($document, 'manifest');

        return $this->view($annotationCollection, Response::HTTP_OK);
    }

    public function annotationPage(string $id, string $page): View
    {
        $document = $this->translator->getDocumentById($id);
        $pageDocument = $this->translator->getDocumentById($page);
        $annotationPage = $this->presentationService->getAnnotationPage($document, $pageDocument);

        return $this->view($annotationPage, Response::HTTP_OK);
    }

    public function content(string $type, string $id, Request $request): Response
    {
        $content = $this->textApiService->getContent($type, $id);

        $response = new Response($content);
        $response->headers->set('Content-Type', 'text/html');

        return $response;
    }

    public function full(string $id): View
    {
        $document = $this->translator->getDocumentById($id);

        return $this->view($this->presentationService->getFull($document), Response::HTTP_OK);
    }

    public function item(string $manifest, string $item): Response
    {
        $item = $this->textApiService->getItem($item);

        $response = new Response(json_encode($item));
        return $this->json($item, 200, ['Content-Type' => 'application/json'], ['json_encode_options' => JSON_UNESCAPED_SLASHES]);
    }

    public function manifest(string $id): Response
    {
        $manifest = $this->textApiService->getManifest($id);

        return $this->json($manifest);
    }

    public function pageAnnotationCollection(string $id, string $page): View
    {
        $document = $this->translator->getDocumentById($page);
        $annotationCollection = $this->presentationService->getAnnotationCollection($document, 'item');

        return $this->view($annotationCollection, Response::HTTP_OK);
    }
}
