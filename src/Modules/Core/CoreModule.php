<?php

namespace atc\BhWP\Modules\Core;

use atc\BhWP\Core\Module as BaseModule;

// Post Types
use atc\BhWP\Modules\Core\PostTypes\Post;
use atc\BhWP\Modules\Core\PostTypes\Page;
use atc\BhWP\Modules\Core\PostTypes\Attachment;

final class CoreModule extends BaseModule
{
    public function boot(): void
    {
        $this->registerDefaultViewRoot();

        parent::boot();
    }

    /** @return array<string, class-string> */
    public function getPostTypeHandlerClasses(): array
    {
        return [
            'post'       => Post::class,
            'page'       => Page::class,
            'attachment' => Attachment::class,
        ];
    }
}
