<?php

namespace App\File;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;
use RuntimeException;

class File
{
    public static function filesIn(string $path): \Generator
    {
        if (! is_dir($path)) {
            throw new RuntimeException("{$path} is not a directory ");
        }

        $it = new RecursiveDirectoryIterator($path);
        yield from new RecursiveIteratorIterator($it);
    }
}
