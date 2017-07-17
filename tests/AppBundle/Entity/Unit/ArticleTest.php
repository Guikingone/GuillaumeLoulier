<?php

/*
 * This file is part of the GuillaumeLoulier project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests\AppBundle\Entity\Unit;

// Entity
use AppBundle\Entity\Tags;
use AppBundle\Entity\Article;

// Core
use PHPUnit\Framework\TestCase;

/**
 * Class ArticleTest
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class ArticleTest extends TestCase
{
    /**
     * Test the instantiation of the Entity.
     */
    public function testInstance()
    {
        $article = new Article();
        $article->setTitle('Hello World !');
        $article->setLink('/article/hello-world');
        $article->setCreatedAt(new \DateTime('2017-04-23'));
        $article->setUpdatedAt(new \DateTime('2017-04-23'));
        $article->setContent('Hello World is the new way of testing apps !');

        static::assertNull($article->getId());
        static::assertEquals('Hello World !', $article->getTitle());
        static::assertEquals('/article/hello-world', $article->getLink());
        static::assertEquals(
            new \DateTime('2017-04-23'),
            $article->getCreatedAt()
        );
        static::assertEquals(
            new \DateTime('2017-04-23'),
            $article->getUpdatedAt()
        );
        static::assertEquals(
            'Hello World is the new way of testing apps !',
            $article->getContent()
        );
    }

    /**
     * Test the relation between Article and Tags.
     */
    public function testArticleTagsRelation()
    {
        $article = new Article();
        $article->setTitle('Hello World !');
        $article->setLink('/article/hello-world');
        $article->setCreatedAt(new \DateTime('2017-04-23'));
        $article->setUpdatedAt(new \DateTime('2017-04-23'));
        $article->setContent('Hello World is the new way of testing apps !');

        $tags = $this->createMock(Tags::class);

        $tags->method('getId')
             ->willReturn(0);

        $article->addTags($tags);

    }
}
