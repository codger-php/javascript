<?php

/** Test NPM wrapper */
return function () : Generator {
    $package = new Codger\Javascript\Npm(__DIR__.'/files');

    /** Checking dependencies should return true or false, depending on installation status */
    yield function () use ($package) {
        assert($package->hasDependency('jquery') === true);
        assert($package->hasDependency('angular') === false);
    };
};

