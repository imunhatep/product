<?php
require_once '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('../src/Resources/view');
$twig = new Twig_Environment( $loader, [ 'cache' => '../var/cache', ]);

$template = $twig->load('base.html.twig');

echo $template->render();
