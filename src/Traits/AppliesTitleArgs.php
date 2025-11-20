<?php

namespace WXC\Traits;

use WXC\Utils\TitleFilter;

trait AppliesTitleArgs
{
    protected function applyTitleArgs( string $postType, array $args ): void
    {
        //TitleFilter::setGlobalArgsForPostType( $postType, $args );
    }
}
