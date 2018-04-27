<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;
use Sami\Version\GitVersionCollection;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in($dir = 'app')
;

$versions = GitVersionCollection::create($dir)->add('master', 'default branch');

return new Sami($iterator, [
    'versions'             => $versions,
    'title'                => 'Laravel Application API',
    'build_dir'            => __DIR__.'/build/%version%',
    'cache_dir'            => __DIR__.'/_cache/%version%',
    'default_opened_level' => 2,
]);
