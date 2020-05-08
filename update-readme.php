<?php

require_once 'vendor/autoload.php';

use Javanile\Hamper\HamperDatabase;
use Javanile\Hamper\HamperDatabaseTables;
use phpDocumentor\Reflection\DocBlockFactory;

$toc = '';
$documentation = '';
$docBlockFactory = DocBlockFactory::createInstance();

$sections = [
    HamperDatabase::class => 'Data manipulation',
    HamperDatabaseTables::class => 'Tables manipulation',
];

foreach ($sections as $class => $title) {
    $toc .= '1. ['.$title.'](#'.$title.')'."\n";
    $documentation .= '### '.$title."\n";
    foreach (get_class_methods($class) as $method) {
        if ($method == '__construct') {
            continue;
        }
        try {
            $reflection = new ReflectionMethod($class, $method);
            $docBlock = $docBlockFactory ->create($reflection->getDocComment());
            $summary = trim($docBlock->getSummary(), '.');
            $description = $docBlock->getDescription();
            $toc .= '    1. ['.$summary.'](#'.$summary.')'."\n";
            $documentation .=
                '#### ' . $summary . "\n\n" .
                '`$hdb->' . $method . '(...)`' . "\n\n" .
                $description . "\n\n";
            foreach ($docBlock->getTags() as $tag) {
                //var_dump($tag);
            }
        } catch (ReflectionException $exception) {
            echo $exception->getMessage()."\n";
            exit(1);
        }
    }
}

$readme = file_get_contents('/app/README.md');

$updatedReadme = preg_replace(
    '/## Documentation.*## Changelog/s',
    '## Documentation'."\n\n".$toc."\n\n".$documentation."\n\n".'## Changelog',
    $readme
);

file_put_contents('/app/README.md', $updatedReadme);
