<?php

namespace atc\BhWP\Core\Contracts;

interface ModuleInterface
{
    public function getName(): string;
    public function getPostTypeHandlerClasses(): array;
}
