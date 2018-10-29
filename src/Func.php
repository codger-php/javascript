<?php

namespace Codger\Javascript;

class Func extends Recipe
{
    /** @var string */
    protected $template = 'function.html.twig';

    /** @var array */
    protected $arguments = [];

    /**
     * Add an argument to the method.
     *
     * @param Codger\Javascript\Argument $argument
     * @return Codger\Javascript\Func Itself
     */
    public function addArgument(Argument $argument) : Func
    {
        $this->arguments[$argument->getName()] = $argument;
        return $this;
    }

    public function setBody(string $body, int $indent = 4) : Func
    {
        $body = trim($body);
        $lines = explode("\n", $body);
        foreach ($lines as &$line) {
            $line = str_repeat(' ', $indent).$line;
        }
        $this->variables->body = implode("\n", $lines);
        return $this;
    }
    
    public function render() : string
    {
        $arguments = [];
        foreach ($this->arguments as $argument) {
            $arguments[] = trim($argument->render());
        }
        $this->variables->arguments = implode(', ', $arguments);
        return parent::render();
    }
}

