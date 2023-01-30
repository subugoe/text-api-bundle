<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\Translator;

use Subugoe\TextApiBundle\Model\DocumentInterface;
use Subugoe\TextApiBundle\Model\Presentation\Image;

interface TranslatorInterface
{
  public function getContentsById(string $id): array;

  public function getDocumentById(string $id): DocumentInterface|null;

  public function getMetadata(DocumentInterface $document): ?array;

  public function getEntity(string $entityGnd): ?array;

  public function getItemAnnotationsStartIndex(string $id, int $pageNumber): int;

  public function getManifestTotalNumberOfAnnotations(string $id): int;

  public function getManifestUrlByPageId(string $pageId): string;

  public function getSupportCssUrl(string $documentId): string;

  public function getImage(DocumentInterface $document): ?Image;
}
