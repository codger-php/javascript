<?php

namespace Codger\Javascript;

/**
 * An example recipe for a javascript function.
 */
class Fuktion extends Func
{
    public function __invoke() : void
    {
        $this->set('name', 'foo')
            ->output('foo.js');
    }
}

