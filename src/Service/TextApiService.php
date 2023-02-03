<?php

namespace Subugoe\TextApiBundle\Service;

use Subugoe\EMOBundle\Model\Presentation\Content;
use Subugoe\TextApiBundle\Model\PageInterface;
use Subugoe\TextApiBundle\Model\Presentation\Image;
use Subugoe\TextApiBundle\Model\Presentation\Item;
use Subugoe\TextApiBundle\Model\Presentation\License;
use Subugoe\TextApiBundle\Model\Presentation\SequenceItem;
use Subugoe\TextApiBundle\Model\Presentation\Support;
use Subugoe\TextApiBundle\Model\Presentation\Title;
use Subugoe\TextApiBundle\Model\ArticleInterface;
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

    public function getManifest(string $articleId): Manifest
    {
        $document = $this->translator->getArticleById($articleId);
        $metadata = $this->translator->getMetadata($articleId);

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
        return $this->mainDomain . $this->router->generate('subugoe_text_api_manifest', ['id' => $articleId]);
    }

    private function getContentsSequence(string $id, array $types): array
    {
        $contents = [];

        foreach ($types as $type) {
            $content = new Content();
            $content->setUrl($this->mainDomain.$this->router->generate(
                'subugoe_text_api_content',
                    ['id' => $id, 'type' => $type]
                )
            );
            $content->setType('text/html;type=' . $type);
            $contents[] = $content;
        }

        return $contents;
    }
}
