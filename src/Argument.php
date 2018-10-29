<?php

namespace Codger\Javascript;

use Twig_Environment;
use ReflectionParameter;

class Argument extends Recipe
{
    use Doccomment;

    /** @var string */
    protected $template = 'argument.html.twig';

    /**
     * @param Twig_Environment $twig
     */
    public function __construct(Twig_Environment $twig)
    {
        parent::__construct($twig);
        $this->variables = (object)[
            'variadic' => false,
            'default' => false,
            'name' => false,
        ];
    }

    /**
     * Mark the argument as variadic (or not).
     *
     * @param bool $variadic Defaults to `true`
     * @return Codger\Javascript\Argument Itself
     */
    public function isVariadic(bool $variadic = true) : Argument
    {
        return $this->set('variadic', $variadic);
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

