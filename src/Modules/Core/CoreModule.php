<?php

namespace WXC\Modules\Core;

use WXC\Module as BaseModule;

// Post Types
use WXC\Modules\Core\PostTypes\Post;
use WXC\Modules\Core\PostTypes\Page;
use WXC\Modules\Core\PostTypes\Attachment;

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
