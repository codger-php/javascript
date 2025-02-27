<?php

namespace Codger\Javascript;

use Twig_Environment;

/**
 * Wrap an argument. This is not extremely useful here, but the ES6 module will
 * extend it and _will_ do something useful with it :)
 */
class Argument extends Recipe
{
    /** @var string */
    protected $template = 'argument.html.twig';

    /**
     * @param Twig_Environment $twig
     */
    public function __construct(Twig_Environment $twig, ?string $name = null)
    {
        parent::__construct($twig);
        $this->variables = (object)compact('name');
    }

    /**
     * Get the name of the parameter (if set, else null).
     *
     * @return string|null
     */
    public function getName() :? string
    {
        return $this->get('name');
    }
}

