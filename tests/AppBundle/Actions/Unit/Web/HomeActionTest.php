<?php

/*
 * This file is part of the GuillaumeLoulier project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests\AppBundle\Actions\Unit\Web;

// Action
use AppBundle\Action\HomeAction;

// Core
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class HomeActionTest
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class HomeActionTest extends KernelTestCase
{
    /** {@inheritdoc} */
    public function setUp()
    {
        static::bootKernel();
    }

    /**
     * Test if the Container return the right class.
     */
    public function testContainerReturn()
    {
        $action = static::$kernel->getContainer()
                                 ->get(HomeAction::class);

        static::assertInstanceOf(HomeAction::class, $action);
    }

    /**
     * Test if the class has the right attributes.
     */
    public function testObjectHasAttributes()
    {
        $action = static::$kernel->getContainer()
                                 ->get(HomeAction::class);

        static::assertObjectHasAttribute('renderEngine', $action);
    }
}
