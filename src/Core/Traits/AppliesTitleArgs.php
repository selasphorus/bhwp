<?php

namespace atc\BhWP\Core\Traits;

use atc\BhWP\Utils\TitleFilter;

trait AppliesTitleArgs
{
    protected function applyTitleArgs( string $postType, array $args ): void
    {
        //TitleFilter::setGlobalArgsForPostType( $postType, $args );
    }
}
