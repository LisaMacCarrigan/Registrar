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

// COURSES

    $app->get("/courses", function() use($app) {
        return $app['twig']->render('courses.html.twig', array('courses' => Course::getAll()));        
    });
    
    $app->get("/courses/{course_id}", function($course_id) use($app) {
        return $app['twig']->render('course.html.twig', array('single_course' => Course::find($course_id)));        
    });


    $app->get("courses/{course_to_edit_id}/edit", function($course_to_edit_id) use($app) {
        $current_course = Course::find($course_to_edit_id);
        return $app['twig']->render('edit-course.html.twig', array('editing_course' => $current_course));        
    });

    $app->patch("/courses/{course_id}", function($course_id) use($app) {
        // $test_course->update($new_name);
        $current_course = Course::find($course_id);
        $current_course->update($_POST['new_name']);
        return $app['twig']->render('course.html.twig', array('single_course' => $current_course));        
    });



// STUDENTS

    $app->get("/students", function() use($app) {
        return $app['twig']->render('students.html.twig', array('students' => Student::getAll()));        
    });    
    $app->get("/students/{student_id}", function($student_id) use($app) {
        return $app['twig']->render('student.html.twig', array('single_student' => Student::find($student_id)));        
    });



    return $app;
 ?>
