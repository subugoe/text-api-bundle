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

  public function content(string $id, Request $request): Response
  {
    $flag = $request->get('flag');
    $document = $this->translator->getDocumentById($id);

    $content = $flag ? $document->getTranscriptedText() : $document->getEditedText();

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
    $document = $this->translator->getDocumentById($item);

    return $this->json($this->textApiService->getItem($document), Response::HTTP_OK);
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
