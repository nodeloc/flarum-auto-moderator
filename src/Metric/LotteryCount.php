<?php

/*
 * This file is part of nodeloc/flarum-auto-moderator
 *
 *  Copyright (c) 2021 Alexander Skvortsov.
 *
 *  For detailed copyright and license information, please view the
 *  LICENSE file that was distributed with this source code.
 */

namespace Askvortsov\AutoModerator\Metric;

use Flarum\Discussion\Discussion;
use Flarum\User\User;
use FoF\BestAnswer\Events\BestAnswerSet;

class LotteryCount implements MetricDriverInterface
{
    public function translationKey(): string
    {
        return 'nodeloc-auto-moderator.admin.metric_drivers.lottery_count';
    }

    public function extensionDependencies(): array
    {
        return [];
    }

    public function eventTriggers(): array
    {
        return [
            Posted::class => function (Posted $event) {
                return $event->post->user;
            }
        ];
    }

    public function getValue(User $user): int
    {
        return intval($user->lottery_count);
    }
}
