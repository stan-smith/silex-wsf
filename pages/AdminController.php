<?php

use Blog\Controller;

Class AdminController extends Controller
{

    /**
     * get Article action :
     * Affiche la page /admin
     *
     * @return string  html rendu par twig
     */
    public function getArticle()
    {
        $data = array();

        if ($this->isLogged() === false) {
            return $this->app->redirect(
                $this->app['url_generator']->generate('home')
            );
        }

        return $this->app['twig']->render('admin.twig', $data);
    }


    /**
     * [postArticle description]
     * @return [type] [description]
     */
    public function postArticle()
    {

        $title = $this->app['request']->get('title');
        $article = $this->app['request']->get('article');

        if (!empty($title) && !empty($article)) {
            $sql = "INSERT INTO articles (
                id ,
                title ,
                body
            )
            VALUES (
                NULL ,
                :title,
                :body
            )";

            $arguments = array(
                ':title' => $title,
                ':body' => $article,
            );

            $this->app['sql']->prepareExec($sql, $arguments);
        }

        return $this->getArticle();
    }

}
