<?php

namespace Codger\Javascript;

use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * An example recipe for a javascript lambda.
 */
return function () : Func {
    $function = new Func;
    $twig = new Twig_Environment(new Twig_Loader_Filesystem(dirname(__DIR__).'/templates'));
    $function->output('php://stdout')
        ->addArgument(new Argument($twig, 'foo'))
        ->setBody('return false;');
    return $function;
};

