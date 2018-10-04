<?php

use Gentry\Gentry\Wrapper;

/** Test NPM wrapper */
return function () : Generator {
    $package = Wrapper::createObject(Codger\Javascript\Npm::class, __DIR__.'/files');

    /** Checking dependencies should return true or false, depending on installation status */
    yield function () use ($package) {
        assert($package->hasDependency('jquery') === true);
        assert($package->hasDependency('angular') === false);
    };
};

