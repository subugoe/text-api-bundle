<?php

namespace Subugoe\TextApiBundle\Service;

use Subugoe\EMOBundle\Model\Annotation\AnnotationCollection;
use Subugoe\EMOBundle\Model\Annotation\AnnotationPage;
use Subugoe\EMOBundle\Model\DocumentInterface;
use Subugoe\EMOBundle\Model\Presentation\Content;
use Subugoe\TextApiBundle\Model\Presentation\Image;
use Subugoe\TextApiBundle\Model\Presentation\Item;
use Subugoe\TextApiBundle\Model\Presentation\License;
use Subugoe\TextApiBundle\Model\Presentation\Manifest;
use Subugoe\TextApiBundle\Model\Presentation\SequenceItem;
use Subugoe\TextApiBundle\Model\Presentation\Support;
use Subugoe\TextApiBundle\Model\Presentation\Title;
use Subugoe\TextApiBundle\Model\Presentation\Collection;
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

    public function getCollection(string $collectionId): Collection
    {
        return new Collection();
    }

    public function getManifest(string $collectionId, string $articleId): Manifest
    {
        $document = $this->translator->getArticleById($collectionId, $articleId);
        $metadata = $this->translator->getMetadata($collectionId, $articleId);

        $manifest = new Manifest();
        $manifest->setId($this->createManifestId($document->getId()));
        $manifest->setLabel($document->getTitle());
        $manifest->setMetadata($metadata);
        $manifest->setSequence($this->getManifestSequence($articleId, $document->getPageIds()));
        $manifest->setSupport($this->getSupportCss($articleId));

        // TODO: Uncomment for generic purposes
        // $manifest->setLicense($this->getLicense($document));

        $manifest->setAnnotationCollection(
            $this->mainDomain . $this->router->generate(
                'subugoe_text_api_annotation_collection',
                ['id' => $articleId]
            )
        );

        return $manifest;
    }

    public function getItem(string $id): Item
    {
        $page = $this->translator->getPageById($id);

        $item = new Item();

        $imageUrl = $page->getImageUrl();

        if ($imageUrl) {
            $image = new Image();
            $image->setId($imageUrl);
            $image->setManifest($this->createManifestId($page->getArticleId()));
            $license = new License();
            $license->setId($page->getImageLicense() . ' (' . $page->getImageLicenseUrl() . ')');
            $image->setLicense($license);
            $item->setImage($image);
        }

        if (!empty($page->getArticleTitle())) {
            $title = new Title();
            $title->setTitle($page->getTitle());
            $title->setType('main');
            $item->setTitle($title);
        }

        if (!empty($page->getLanguages())) {
            $item->setLang($page->getLanguages());
        }

        $item->setType('page');
        $item->setN($page->getEnumeration());

        $types = $page->getContentTypes();
        $item->setContent($this->getContentsSequence($page->getId(), $page->getContentTypes()));

//    $item->setAnnotationCollection($this->mainDomain.$this->router->generate('subugoe_tido_page_annotation_collection', ['id' => 'Z_1822-06-21_k', 'page' => $article->getId()]));

        return $item;
    }

    public function getContent(string $type, string $id): ?string
    {
        $page = $this->translator->getPageById($id);

        if (!$page) return null;
        return $page->getContentByType($type);
    }


    private function getManifestSequence(string $articleId, array $pageIds): array
    {
        $sequence = [];

        foreach ($pageIds as $pageId) {
            $sequence[] = new SequenceItem($this->mainDomain . $this->router->generate(
                    'subugoe_text_api_item_page',
                    ['manifest' => $articleId, 'item' => $pageId]
                ));
        }

        return $sequence;
    }

    private function getSupportCss(string $articleId): array
    {
        $supports = [];
        $support = new Support();
        $supports[] = $support->setUrl($this->translator->getSupportCssUrl($articleId));

        return $supports;
    }

    private function createManifestId($articleId): string
    {
        return $this->mainDomain . $this->router->generate('subugoe_text_api_manifest', ['manifest' => $articleId]);
    }

    private function getContentsSequence(string $id, array $types): array
    {
        $contents = [];

        foreach ($types as $type) {
            $content = new Content();
            $content->setUrl($this->mainDomain . $this->router->generate(
                    'subugoe_text_api_content',
                    ['id' => $id, 'type' => $type]
                )
            );
            $content->setType('text/html;type=' . $type);
            $contents[] = $content;
        }

        return $contents;
    }

//    public function getAnnotationCollection(DocumentInterface $document, string $type): AnnotationCollection
//    {
//        $annotationCollection = new AnnotationCollection();
//
//        if ('manifest' === $type) {
//            $pages = $this->emoTranslator->getContentsById($document->getId());
//            $firstPage = $pages[0]['id'];
//            $lastPage = $pages[count($pages) - 1]['id'];
//            $id = $document->getId();
//            $title = $document->getTitle();
//            $annotationCollection->setId($this->mainDomain . $this->router->generate('subugoe_tido_annotation_collection', ['id' => $document->getId()]));
//        } else {
//            $id = $document->getArticleId();
//            $firstPage = $document->getId();
//            $title = $document->getArticleTitle();
//            $annotationCollection->setId($this->mainDomain . $this->router->generate('subugoe_tido_page_annotation_collection', ['id' => $id, 'page' => $firstPage]));
//        }
//
//        $annotationCollection->setLabel($title);
//        $annotationCollection->setTotal($this->emoTranslator->getManifestTotalNumberOfAnnotations($id));
//        $annotationCollection->setFirst($this->mainDomain . $this->router->generate('subugoe_tido_annotation_page', ['id' => $id, 'page' => $firstPage]));
//
//        if ('manifest' === $type) {
//            $annotationCollection->setLast($this->mainDomain . $this->router->generate('subugoe_tido_annotation_page', ['id' => $document->getId(), 'page' => $lastPage]));
//        }
//
//        return ['annotationCollection' => $annotationCollection];
//    }

    public function getAnnotationCollectionForCollection(): AnnotationCollection
    {

    }

    public function getAnnotationCollectionForManifest(string $id): AnnotationCollection
    {
        $article = $this->translator->getArticleById($id);

        return $this->getAnnotationCollection(
            $id,
            $article->getTitle(),
        0,
        $article->getPageIds()[0] ?? null,
            'manifest',
        );
    }

    public function getAnnotationCollectionForitem(): AnnotationCollection
    {

    }


    public function getAnnotationCollection(
        string $id,
        string $title,
        int $total,
        ?string $firstPageId,
        string $for = 'collection' | 'manifest' | 'item',
    ): AnnotationCollection
    {
        $annotationCollection = new AnnotationCollection();

        $routeName = '';

        if ($for === 'collection') $routeName = 'subugoe_text_api_annotation_collection_for_collection';
        else if ($for === 'manifest') $routeName = 'subugoe_text_api_annotation_collection_for_manifest';
        else if ($for === 'item') $routeName = 'subugoe_text_api_annotation_collection_for_item';

        $annotationCollection->setId(
            $this->mainDomain . $this->router->generate($routeName,
                ['id' => $id, 'page' => $first]
            )
        );

        $annotationCollection->setLabel($title);
        $annotationCollection->setTotal($total);
        $annotationCollection->setFirst(
            $this->mainDomain . $this->router->generate('subugoe_tido_annotation_page',
                ['id' => $id, 'page' => $firstPage]
            )
        );

        return $annotationCollection;
    }


    public function getAnnotationPage(DocumentInterface $document, DocumentInterface $page): array
    {
        $annotationPage = new AnnotationPage();
        $annotationPage->setId($this->mainDomain . $this->router->generate('subugoe_tido_annotation_page', ['id' => $document->getId(), 'page' => $page->getId()]));
        $annotationPage->setPartOf($this->getPartOf($document));

        $nextPageNumber = $page->getPageNumber() + 1;

        if ($nextPageNumber <= (int)$document->getPageNumber()) {
            $pattern = 'page' . $page->getPageNumber();
            $replace = 'page' . $nextPageNumber;
            $nextPageId = str_replace($pattern, $replace, $page->getId());
            $next = $this->mainDomain . $this->router->generate('subugoe_tido_annotation_page', ['id' => $document->getId(), 'page' => $nextPageId]);
        }

        $annotationPage->setNext($next ?? null);

        if ($page->getPageNumber() >= 2) {
            $prevPageNumber = $page->getPageNumber() - 1;
            $pattern = 'page' . $page->getPageNumber();
            $replace = 'page' . $prevPageNumber;
            $prevPageId = str_replace($pattern, $replace, $page->getId());
            $prev = $this->mainDomain . $this->router->generate('subugoe_tido_annotation_page', ['id' => $document->getId(), 'page' => $prevPageId]);
        }

        $annotationPage->setPrev($prev ?? null);

        if (1 === (int)$page->getPageNumber()) {
            $startIndex = 0;
        } else {
            $startIndex = $this->emoTranslator->getItemAnnotationsStartIndex($document->getId(), (int)$page->getPageNumber());
        }

        $annotationPage->setStartIndex($startIndex);
        $annotationPage->setItems($this->getItems($page));

        return ['annotationPage' => $annotationPage];
    }

}
