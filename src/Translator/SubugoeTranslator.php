<?php

declare(strict_types=1);

namespace Subugoe\TextApiBundle\Translator;

use Subugoe\TextApiBundle\Model\ArticleInterface;
use Subugoe\TextApiBundle\Model\PageInterface;
use Subugoe\TextApiBundle\Model\Presentation\Image;

class SubugoeTranslator implements TranslatorInterface
{

  public function __construct()
  {
  }

  public function getSupportCssUrl(string $articleId): string
  {
    // TODO: Implement getSupportCss() method.
  }

  public function getImage(string $url): ?Image
  {
    // TODO: Implement getImage() method.
  }

  public function getPageById(string $id): ?PageInterface
  {
    // TODO: Implement getPageById() method.
  }

  public function getArticleById(string $id): ?ArticleInterface
  {
    // TODO: Implement getDocumentById() method.
  }

  public function getMetadata(string $id): ?array
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
