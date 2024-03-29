<?php

require_once __DIR__.'/../vendor/autoload.php';

use Javanile\Hamper\HamperDatabase;
use Javanile\Hamper\HamperDatabaseTables;
use phpDocumentor\Reflection\DocBlockFactory;

$toc = '';
$documentation = "<hr/>"."\n\n";
$docBlockFactory = DocBlockFactory::createInstance();

$sections = [
    HamperDatabase::class,
    HamperDatabaseTables::class,
];

try {
    foreach ($sections as $class) {
        $reflection = new ReflectionClass($class);
        $docBlock = $docBlockFactory->create($reflection->getDocComment());
        $description = trim($docBlock->getDescription(), '.');
        $toc .= "\n\n".'#### '.$description."\n\n";
        foreach (get_class_methods($class) as $method) {
            if ($method == '__construct') {
                continue;
            }
            echo "> {$class}::{$method}\n";
            $reflection = new ReflectionMethod($class, $method);
            $docBlock = $docBlockFactory->create($reflection->getDocComment());
            $summary = trim($docBlock->getSummary(), '.');
            $description = $docBlock->getDescription();
            $usage = $docBlock->getTagsByName('usage')[0];
            $toc .= ' * ['.$summary.'](#-'.strtolower(strtr($summary, ' ', '-')).') - `$hdb->'.$method.'(...)`'."\n";
            $documentation .= '## `¶` ' . $summary . "\n\n";
            $documentation .= $description . "\n\n";
            $documentation .= "#### Usage \n\n```\n" . $usage->getDescription() . "\n```\n\n";
            $documentation .= "#### Examples\n\nThis method is useful to handle this situations\n\n";
            foreach ($docBlock->getTagsByName('example') as $tag) {
                $documentation .= "```php\n" . $tag->getDescription() . "\n```\n\n";
            }
            $documentation .= "#### 😿 Legacy\n\nPlease, replace this kind of legacy code with the `\$hdb->{$method}(...)` function\n\n";
            foreach ($docBlock->getTagsByName('legacy') as $tag) {
                $documentation .= "```php\n" . $tag->getDescription() . "\n```\n\n";
            }
            $documentation .= '[[back to top ☝]](#documentation)'."\n\n";
            $documentation .= "<hr/>"."\n\n";
        }
    }
} catch (ReflectionException $exception) {
    echo $exception->getMessage()."\n";
    exit(1);
}

$readme = file_get_contents('/app/README.md');

$updatedReadme = preg_replace(
    '/### All Functions.*## Changelog/s',
    '### All Functions'."\n\n".$toc."\n\n".$documentation."\n\n".'## Changelog',
    $readme
);

file_put_contents('/app/README.md', $updatedReadme);
file_put_contents('/app/docs/README.md', $updatedReadme);
