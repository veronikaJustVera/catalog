<?php

class SiteController
{
    /*
    ----------------------------------------------------------------------------------------
    ----------------------------------Index page--------------------------------------------
    ----------------------------------------------------------------------------------------
*/
    public function actionIndex($page=1)
    {
        $genres = Genre::getList();
        $latestBooks = Book::getBooks($page);
        $total=Book::getTotalBooks();
        $pagination=new Pagination($total, $page, Book::NUMBER, 'page-');
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
/*
    ----------------------------------------------------------------------------------------
    -----------------------------Get books by its genres------------------------------------
    ----------------------------------------------------------------------------------------
*/
    public function actionGenre($page=1)
    {
            $genres = Genre::getList();
            $genreList=Book::genreDef($page);
            $headline=Book::genreIdentify();
            $total=Book::getTotalBooksGenre();
            $pagination=new Pagination($total, $page, Book::NUMBER, 'page-');
            require_once(ROOT . '/views/site/categories.php');
            return true;
    }
/*
    ---------------------------------------------------------------------------------------
    ------------------------------------Sorting books--------------------------------------
    ---------------------------------------------------------------------------------------
*/
   public function actionSort($page=1)
   {
       $latestBooks=Book::sort($page);
       $genres = Genre::getList();
       $genresList=Genre::getListCategories();
       $headline=Book::headline();
       $total=Book::getTotalBooks();
       $pagination=new Pagination($total, $page, Book::NUMBER, 'page-');
       require_once(ROOT . '/views/site/indexsort.php');
       return true;
   }
  
}
