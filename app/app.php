<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/TitleCaseGenerator.php";

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // Root route directs to form.html.twig

    $app->get("/", function() use ($app) {
        return $app['twig']->render('form.html.twig');
    });

    // Render title_cased.html.twig
    // pass $title_cased_phrase as a variable called result

    $app->get("/view_title_case", function() use($app) {
        $my_TitleCaseGenerator = new TitleCaseGenerator;
        $title_cased_phrase = $my_TitleCaseGenerator->makeTitleCase($_GET['phrase']);
        return $app['twig']->render('title_cased.html.twig', array('result' => $title_cased_phrase));
    });

    return $app;
?>
