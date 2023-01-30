<?php

namespace Subugoe\TextApiBundle\Service;

use Subugoe\TextApiBundle\Model\Presentation\Item;
use Subugoe\TextApiBundle\Model\Presentation\Sequence;
use Subugoe\TextApiBundle\Model\Presentation\Support;
use Subugoe\TextApiBundle\Model\Presentation\Title;
use Subugoe\TextApiBundle\Model\DocumentInterface;
use Subugoe\TextApiBundle\Model\Presentation\Manifest;
use Subugoe\TextApiBundle\Translator\TranslatorInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Routing\RouterInterface;

class TextApiService
{
  private TranslatorInterface $translator;
  private RouterInterface $router;
  private string $mainDomain;

  public function __construct(RouterInterface $router, ParameterBagInterface $params)
  {
    $this->router = $router;
    $this->mainDomain = $params->get('main_domain');
  }

  public function setMainDomain(string $mainDomain): void
  {
    $this->mainDomain = $mainDomain;
  }

  public function setTranslator(TranslatorInterface $translator)
  {
    $this->translator = $translator;
  }

  public function getManifest(string $documentId): Manifest
  {
    $document = $this->translator->getDocumentById($documentId);
    $metadata = $this->translator->getMetadata($document);

    $manifest = new Manifest();
    $manifest->setId($this->mainDomain.$this->router->generate('subugoe_text_api_manifest', ['id' => $documentId]));
    $manifest->setLabel($document->getTitle());
    $manifest->setMetadata($metadata);
    $manifest->setSequence($this->getManifestSequence($documentId));
    $manifest->setSupport($this->getSupportCss($documentId));

    // TODO: Uncomment for generic purposes
    // $manifest->setLicense($this->getLicense($document));

    $manifest->setAnnotationCollection(
    $this->mainDomain.$this->router->generate(
    'subugoe_text_api_annotation_collection',
        ['id' => $documentId]
      )
    );

    return $manifest;
  }

  public function getItem(DocumentInterface $document): Item
  {
    $item = new Item();

    $image = $this->translator->getImage($document);

    if ($image) {
      $item->setImage($image);
    }

    if (!empty($document->getArticleTitle())) {
      $title = new Title();
      $title->setTitle($document->getArticleTitle());
      $title->setType('main');
      $item->setTitle($title);
    }

    if (!empty($document->getLanguage())) {
      $item->setLang($document->getLanguage());
    }

    $item->setType('page');
    $item->setN($document->getPageNumber() . ' : ' . $document->getPageFoliant());
    $item->setContent($this->getContents($document->getId()));

    $item->setAnnotationCollection($this->mainDomain.$this->router->generate('subugoe_tido_page_annotation_collection', ['id' => 'Z_1822-06-21_k', 'page' => $document->getId()]));

    return $item;
  }


  private function getManifestSequence(string $documentId): array
  {
    $sequences = [];
    $contents = $this->translator->getContentsById($documentId);

    foreach ($contents as $content) {
      $sequence = new Sequence();
      $sequences[] = $sequence->setId(
        $this->mainDomain.$this->router->generate(
          'subugoe_text_api_item_page',
          ['manifest' => $documentId, 'item' => $content->getFields()['id']]
        )
      );
    }

    return $sequences;
  }

  private function getSupportCss(string $documentId): array
  {
    $supports = [];
    $support = new Support();
    $supports[] = $support->setUrl($this->translator->getSupportCssUrl($documentId));

    return $supports;
  }
}
