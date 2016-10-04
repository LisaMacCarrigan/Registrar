<?php
    /**
    *@backupGlobals disabled
    *@backupStaticAttributes disabled
    */

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Student.php";
    require_once __DIR__."/../src/Course.php";

    date_default_timezone_set('America/New_York');

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=registrar';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array ('twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();


    $app->get("/", function() use($app) {
        return $app['twig']->render('index.html.twig');        
    });
    $app->get("/courses", function() use($app) {
        return $app['twig']->render('courses.html.twig', array('courses' => Course::getAll()));        
    });
    $app->get("/students", function() use($app) {
        return $app['twig']->render('students.html.twig');        
    });



    return $app;
 ?>
