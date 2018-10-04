<?php

namespace Codger\Javascript;

class Npm
{
    /** @var stdClass $package */
    private $package;

    /** @var bool $yarn */
    private $yarn = true;

    /**
     * @param string|null $path Optional path to `package.json`. Defaults to
     *  current working directory.
     * @param bool $yarn Whether to prefer Yarn over NPM. Defaults to true.
     * @return void
     */
    public function __construct(string $path = null, bool $yarn = true)
    {
        $path = $path ?? getcwd();
        $this->package = json_decode(file_get_contents("$path/package.json"));
        $this->yarn = $yarn;
    }

    /**
     * Check if project has a dependency.
     *
     * @param string $name
     * @return bool
     */
    public function hasDependency(string $name) : bool
    {
        return (isset($this->package->dependencies) && array_key_exists($name, $this->package->dependencies))
            || (isset($this->package->devDependencies) && array_key_exists($name, $this->package->devDependencies));
    }

    /**
     * Adds a dependency if it not yet exists.
     *
     * @param string $name
     * @param bool $dev Whether to install as dev-dependency. Defaults to
     *  `false`.
     * @return void
     */
    public function addDependency(string $name, bool $dev = false) : void
    {
        if (!$this->hasDependency($name)) {
                $dev = $dev ? ' -D' : '';
            }
            if ($this->yarn) {
                exec("yarn add$dev $name");
            } else {
                exec("npm install$dev $name");
            }
        }
    }
}

