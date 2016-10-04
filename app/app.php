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
        $current_course = Course::find($course_id);
        return $app['twig']->render('course.html.twig', array(
            'single_course' => $current_course,
            'all_students' => Student::getAll(),
            'students_in_this_course' => $current_course->getStudents()
        ));        
    });


    $app->get("/courses/{course_to_edit_id}/edit", function($course_to_edit_id) use($app) {
        $current_course = Course::find($course_to_edit_id);
        return $app['twig']->render('edit-course.html.twig', array('editing_course' => $current_course));        
    });

    $app->patch("/courses/{course_id}", function($course_id) use($app) {
        // $test_course->update($new_name);
        $current_course = Course::find($course_id);
        $current_course->update($_POST['new_name']);
        return $app['twig']->render('course.html.twig', array(
            'single_course' => $current_course,
            'all_students' => Student::getAll(),
            'students_in_this_course' => $current_course->getStudents()
        ));        
    });

    $app->delete("/courses/{course_id_to_delete}", function($course_id_to_delete) use($app) {
        // $test_course->delete();
        $course_to_delete = Course::find($course_id_to_delete);
        $course_to_delete->delete();
        return $app['twig']->render('courses.html.twig', array('courses' => Course::getAll()));
    });

    $app->post("/courses/delete", function() use($app) {
        Course::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    $app->post("/courses", function() use($app) {
        $name = $_POST['course_name'];
        $id = null;
        $number = $_POST['course_identifier'];
        $new_course = new Course($id, $name, $number);
        $new_course->save();
        return $app['twig']->render('courses.html.twig', array('courses' => Course::getAll()));        
    });

    $app->post("/courses/{course_id}", function($course_id) use($app){

        $student_to_add = Student::find($_POST['student_id']);
        $current_course = Course::find($course_id);
        $current_course->addStudent($student_to_add);
        return $app['twig']->render('course.html.twig', array(
            'all_students' => Student::getAll(),
            'single_course' => $current_course,
            'students_in_this_course' => $current_course->getStudents()
        ));    
    });


// STUDENTS

    $app->get("/students", function() use($app) {
        return $app['twig']->render('students.html.twig', array('students' => Student::getAll()));        
    });    
    $app->get("/students/{student_id}", function($student_id) use($app) {
        return $app['twig']->render('student.html.twig', array(
            'single_student' => Student::find($student_id),
            'all_courses' => Course::getAll(),
            'student_courses' => Student::find($student_id)->getCourses()
        ));        
    });

    $app->get("/students/{student_to_edit_id}/edit", function($student_to_edit_id) use($app) {
        $current_student = Student::find($student_to_edit_id);
        return $app['twig']->render('edit-student.html.twig', array('editing_student' => $current_student));        
    });

    $app->patch("/students/{student_id}", function($student_id) use($app) {
        // $test_student->update($new_name);
        $current_student = Student::find($student_id);
        $current_student->update($_POST['new_name']);
        return $app['twig']->render('student.html.twig', array(
            'single_student' => $current_student,
            'all_courses' => Course::getAll(),
            'student_courses' => Student::find($student_id)->getCourses()
        ));        
    });

    $app->delete("/students/{student_id_to_delete}", function($student_id_to_delete) use($app) {
        // $test_course->delete();
        $student_to_delete = Student::find($student_id_to_delete);
        $student_to_delete->delete();
        return $app['twig']->render('students.html.twig', array('students' => Student::getAll())); 
    });

    $app->post("/students/delete", function() use($app) {
        Student::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    $app->post("/students", function() use($app) {
        $name = $_POST['student_name'];
        $id = null;
        $enrollment = $_POST['enrollment'];
        $new_student = new Student($id, $name, $enrollment);
        $new_student->save();
        return $app['twig']->render('students.html.twig', array('students' => Student::getAll()));        
    });

    $app->post("/students/{student_id_add_course}", function($student_id_add_course) use($app){

        $current_student = Student::find($student_id_add_course);
        $course_to_add = Course::find($_POST['course_id']);
        $current_student->addCourse($course_to_add);
        return $app['twig']->render('student.html.twig', array(
            'single_student' => Student::find($student_id_add_course),
            'all_courses' => Course::getAll(),
            'student_courses' => $current_student->getCourses()
        ));    
    });

    return $app;
 ?>
