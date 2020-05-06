<?php

require_once 'vendor/autoload.php';

use Javanile\Hamper\HamperDatabase;
use phpDocumentor\Reflection\DocBlockFactory;

$documentation = '';
$docBlockFactory = DocBlockFactory::createInstance();

foreach (get_class_methods(HamperDatabase::class) as $method) {
    try {
        $reflection = new ReflectionMethod(HamperDatabase::class, $method);
        $docBlock = $docBlockFactory ->create($reflection->getDocComment());
        $summary = trim($docBlock->getSummary(), '.');
        $description = $docBlock->getDescription();
        $documentation .=
            '### ' . $summary . "\n\n" .
            '`$hdb->' . $method . '(...)`' . "\n\n" .
            $description . "\n\n";
        foreach ($docBlock->getTags() as $tag) {
            var_dump($tag);
        }
    } catch (ReflectionException $exception) {
        echo $exception->getMessage()."\n";
        exit(1);
    }
}

$readme = file_get_contents('/app/README.md');

$updatedReadme = preg_replace(
    '/## Documentation.*## Changelog/s',
    '## Documentation'."\n\n".$documentation."\n\n".'## Changelog',
    $readme
);

file_put_contents('/app/README.md', $updatedReadme);
