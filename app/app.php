<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Places.php";
    date_default_timezone_set('America/Los_Angeles');

    session_start();

    if(empty($_SESSION['list_of_cities'])) {
        $_SESSION['list_of_cities'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {

        return $app['twig']->render('places.html.twig', array('cities' => Places::getAll()));

    });

    $app->post("/cities", function() use ($app) {
      $new_city = new Places($_POST['input_city'], $_POST['input_image']);
      $new_city->save();
      return $app['twig']->render('new_city.html.twig',
      array('cities' => $new_city));
    });

    $app->post("/delete_cities", function() use ($app) {
        Places::deleteAll();
        return $app['twig']->render('delete_cities.html.twig');
    });
    return $app;
?>
