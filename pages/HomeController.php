<?php

use Blog\Controller;

Class HomeController extends Controller
{

    public function getIndex()
    {
        $data = array();

        $data['user'] = $this->isLogged();

        $articles = $this->app['sql']->query('SELECT * FROM  articles');
        $data['articles'] = $articles->fetchAll();

        return $this->app['twig']->render('home.twig', $data);
    }

}
