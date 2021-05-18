<?php

/*
 * This file is part of askvortsov/flarum-trust-levels
 *
 *  Copyright (c) 2021 Alexander Skvortsov.
 *
 *  For detailed copyright and license information, please view the
 *  LICENSE file that was distributed with this source code.
 */

namespace Askvortsov\TrustLevels\Api\Controller;

use Askvortsov\TrustLevels\Api\Serializer\TrustLevelSerializer;
use Askvortsov\TrustLevels\TrustLevel;
use Flarum\Api\Controller\AbstractListController;
use Flarum\Http\RequestUtil;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class ListTrustLevelsController extends AbstractListController
{
    /**
     * {@inheritdoc}
     */
    public $serializer = TrustLevelSerializer::class;

    /**
     * {@inheritdoc}
     */
    public $include = [
        'group',
    ];

    /**
     * {@inheritdoc}
     */
    public $optionalInclude = [
        'users',
    ];

    /**
     * {@inheritdoc}
     */
    protected function data(ServerRequestInterface $request, Document $document)
    {
        $actor = RequestUtil::getActor($request);
        $include = $this->extractInclude($request);

        $actor->assertCan('administrate');

        $trustLevels = TrustLevel::query()->whereVisibleTo($actor)->get();

        return $trustLevels->load($include);
    }
}
