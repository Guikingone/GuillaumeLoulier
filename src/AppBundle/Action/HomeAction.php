<?php

/*
 * This file is part of the GuillaumeLoulier project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Action;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class HomeAction
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
final class HomeAction
{
    /** @var EngineInterface */
    private $renderEngine;

    /**
     * HomeAction constructor.
     *
     * @param EngineInterface $renderEngine
     */
    public function __construct(
        EngineInterface $renderEngine
    ) {
        $this->renderEngine = $renderEngine;
    }

    /**
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     *
     * @return Response
     */
    public function __invoke() : Response
    {
        return new Response(
            $this->renderEngine->render('default/index.html.twig')
        );
    }
}
