<?php

namespace Subugoe\TextApiBundle\Controller;

use Subugoe\TextApiBundle\Service\TestService;
use Subugoe\TextApiBundle\Service\TextApiService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

class TextApiController extends AbstractSubugoeController
{
    private TextApiService $textApiService;
    private RouterInterface $router;

    public function __construct(TextApiService $textApiService, RouterInterface $router)
    {
        $this->textApiService = $textApiService;
        $this->router = $router;
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

        return $this->customJson($item);
    }

    public function manifest(string $manifest): Response
    {
        $manifest = $this->textApiService->getManifest($manifest);

        return $this->customJson($manifest);
    }
}
