<?php namespace Samsui\Provider;

use Samsui\Generator\GeneratorInterface;

interface ProviderInterface
{
    /**
     * @return void
     */
    public function __construct(GeneratorInterface $generator);
}
