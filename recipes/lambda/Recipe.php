<?php

namespace Codger\Javascript;

use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * An example recipe for a javascript lambda.
 */
return function () : Func {
    $function = new Func;
    $twig = new Twig_Environment(new Twig_Loader_Filesystem(dirname(__DIR__, 2).'/templates'));
    $function->output('php://stdout')
        ->addArgument(new Argument($twig, 'foo'))
        ->addArgument(new Argument($twig, 'bar'))
        ->setBody('return false;');
    return $function;
};

