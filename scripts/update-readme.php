<?php

require_once __DIR__.'/../vendor/autoload.php';

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
    $toc .= '1. ['.$title.'](#'.strtr($title, ' ', '-').')'."\n";
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
            $toc .= '    1. ['.$summary.'](#'.strtr($summary, ' ', '-').')'."\n";
            $documentation .=
                '#### ' . $summary . "\n\n" .
                '`$hdb->' . $method . '(...)`' . "\n\n" .
                $description . "\n\n";
            foreach ($docBlock->getTagsByName('example') as $tag) {
                $documentation .= "```php\n" . $tag->getDescription() . "\n```\n\n";
            }
            $documentation .= '[[back to top]](#Documentation)'."\n\n";
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
