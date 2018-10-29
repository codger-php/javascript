<?php

namespace Codger\Javascript;

/**
 * An example recipe for a javascript function.
 */
return function () : Func {
    $function = new Func;
    $function->set('name', 'foo')
        ->output('php://stdout');
    return $function;
};

