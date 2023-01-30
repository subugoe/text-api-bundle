<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\Translator;

use Subugoe\TextApiBundle\Model\DocumentInterface;
use Subugoe\TextApiBundle\Model\Presentation\Image;

class SubugoeTranslator implements TranslatorInterface
{

  public function __construct()
  {
  }

  public function getSupportCssUrl(string $documentId): string
  {
    // TODO: Implement getSupportCss() method.
  }

  public function getImage(DocumentInterface $document): ?Image
  {
    // TODO: Implement getImage() method.
  }

  public function getContentsById(string $id): array
  {
    // TODO: Implement getContentsById() method.
  }

  public function getDocumentById(string $id): DocumentInterface|null
  {
    // TODO: Implement getDocumentById() method.
  }

  public function getMetadata(DocumentInterface $document): ?array
  {
    // TODO: Implement getMetadata() method.
  }

  public function getEntity(string $entityGnd): ?array
  {
    // TODO: Implement getEntity() method.
  }

  public function getItemAnnotationsStartIndex(string $id, int $pageNumber): int
  {
    // TODO: Implement getItemAnnotationsStartIndex() method.
  }

  public function getManifestTotalNumberOfAnnotations(string $id): int
  {
    // TODO: Implement getManifestTotalNumberOfAnnotations() method.
  }

  public function getManifestUrlByPageId(string $pageId): string
  {
    // TODO: Implement getManifestUrlByPageId() method.
  }
}
