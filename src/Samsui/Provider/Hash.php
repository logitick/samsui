<?php namespace Samsui\Provider;

class Hash extends BaseProvider
{
    public function hash($algorithm = 'sha256')
    {
        $base = $this->generator->math->between() . $this->generator->string->alphanumeric('20') . time();
        return hash($algorithm, $base);
    }

    public function __call($name, array $args)
    {
        return $this->hash($name);
    }
}
