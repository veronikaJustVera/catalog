<?php

class AuthorsController
{

    public function actionIndex()
    {
        $genres = Genre::getList();
        require_once(ROOT. '/views/authors/index.php');
        return true;
    }
    public function actionAlphabet($letter)
    {
        $genres = Genre::getList();
        $authorsList=Authors::authorsByLetter($letter);
        require_once(ROOT. '/views/authors/authors.php');
        return true;
    }
    public function actionList($authorId)
    {
        $genres = Genre::getList();
        $list=Authors::getBooksByAuthor($authorId);
        require_once(ROOT. '/views/authors/authorBooks.php');
        return true;
    }
}