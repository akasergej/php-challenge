<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

require_once "vendor/autoload.php";
require_once "src/Chat.php";

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

// database configuration parameters
$attrs = array(
    'dbname' => 'doctrine',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'mysqli'
);

// obtaining the entity manager
$entityManager = EntityManager::create($attrs, $config);

$conn = DriverManager::getConnection($attrs);
