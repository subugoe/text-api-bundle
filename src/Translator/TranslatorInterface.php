<?php
namespace Subugoe\TextApiBundle\Translator;

use Subugoe\TextApiBundle\Model\ArticleInterface;
use Subugoe\TextApiBundle\Model\PageInterface;

interface TranslatorInterface
{
  public function getPageById(string $id): ?PageInterface;

  public function getArticleById(string $id): ?ArticleInterface;

  public function getMetadata(string $id): ?array;

  public function getEntity(string $entityGnd): ?array;

  public function getItemAnnotationsStartIndex(string $id, int $pageNumber): int;

  public function getTotalNumberOfAnnotationsFromArticle(string $id): int;

  public function getManifestUrlByPageId(string $pageId): string;

  public function getSupportCssUrl(string $articleId): ?string;
}
