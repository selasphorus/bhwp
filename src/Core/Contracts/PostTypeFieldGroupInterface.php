<?php

namespace atc\BhWP\Core\Contracts;

interface PostTypeFieldGroupInterface
{
    /** Base post type, e.g. 'group' */
    public function getPostType(): string;
}
