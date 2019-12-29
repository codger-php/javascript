<?php

namespace Codger\Javascript;

use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * An example recipe for a javascript lambda.
 */
class Lambda extends Func
{
    public function __invoke() : void
    {
        $this->setTwigEnvironment(new Environment(new FilesystemLoader(dirname(__DIR__).'/templates'));
        ->addArgument(new Argument($twig, 'foo'))
        ->addArgument(new Argument($twig, 'bar'))
        ->setBody('return false;')
        ->output('foo.js');
    }
}

