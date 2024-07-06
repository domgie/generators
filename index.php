<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Generator\GeneratorsCollection;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

// load services
$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__));
$loader->load('config/services.yaml');


// create collection of random generators
$generatorsCollection = new GeneratorsCollection();
for ($i = 0; $i < rand(1, 5); $i++) {
    $generatorsCollection->add(
        $container->get(array_rand($container->findTaggedServiceIds('app.generators')))
    );
}


// apply random converter to each generator
foreach ($generatorsCollection as $generator) {
    $converter = $container->get(array_rand($container->findTaggedServiceIds('app.converters')));
    echo "Generator: " . get_class($generator) . " Converter: " . get_class($converter) . PHP_EOL;
    foreach ((array) $generator->generate() as $string) {
        echo $string . ": " . $converter->convert($string) . PHP_EOL;
    };
}
