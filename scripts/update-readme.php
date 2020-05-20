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
    $toc .= '* ['.$title.'](#'.strtr($title, ' ', '-').')'."\n";
    $documentation .= '### '.$title."\n";
    foreach (get_class_methods($class) as $method) {
        if ($method == '__construct') {
            continue;
        }
        try {
            echo "> {$class}::{$method}\n";
            $reflection = new ReflectionMethod($class, $method);
            $docBlock = $docBlockFactory ->create($reflection->getDocComment());
            $summary = trim($docBlock->getSummary(), '.');
            $description = $docBlock->getDescription();
            $toc .= '    * ['.$summary.'](#'.strtr($summary, ' ', '-').')'."\n";
            $documentation .= '#### ' . $summary . "\n\n";
            $documentation .= $description . "\n\n";
            $documentation .= "##### Usage \n\n```\n" . $docBlock->getTagsByName('usage')[0]->getDescription() . "\n```\n\n";
            $documentation .= "##### Examples\n\n";
            foreach ($docBlock->getTagsByName('example') as $tag) {
                $documentation .= "```php\n<?php\n" . $tag->getDescription() . "\n```\n\n";
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
