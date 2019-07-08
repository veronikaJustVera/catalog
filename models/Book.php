<?php

class Book
{
    const NUMBER=6;
/*
    -----------------------------------------------------------------------
    -----------------------------Index page--------------------------------
    -----------------------------------------------------------------------
*/
    public static function getBooks($page=1, $count=self::NUMBER)
    {
            $page = intval($page);            
            $offset = ($page - 1) * $count;
        
            $db = Db::getConnection();
            $sql1=  "SELECT id, title, author_id,  year, price FROM book "
                    . " ORDER BY id "
                    . "LIMIT ".$count 
                    ." OFFSET ".$offset;
 
                $result = $db->prepare($sql1);
                $result->bindParam(':count', $count, PDO::PARAM_INT);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                
                $result->execute();
                $i = 0;
                $booksList = array();
                while ($row = $result->fetch()) {
                    $booksList[$i]['id'] = $row['id'];
                    $booksList[$i]['title'] = $row['title'];
                    $booksList[$i]['author_id']=$row['author_id'];
                    $booksList[$i]['year'] = $row['year'];
                    $booksList[$i]['price'] = $row['price'];
                    $sql2=  "SELECT id, name FROM authors WHERE id=".$booksList[$i]['author_id'];
                    $result1 = $db->prepare($sql2);
                    $result1->bindParam(':count', $count, PDO::PARAM_INT);
                    $result1->setFetchMode(PDO::FETCH_ASSOC);
                    $result1->execute();
                    $booksList[$i]['author'] = $result1->fetch()['name'];
                    $i++;

                    }
               
          return $booksList;        
        }
     
/*
    ----------------------------------------------------------------------------------------
    -----------------------------Get books by its genres------------------------------------
    ----------------------------------------------------------------------------------------
*/

    public static function genreDef($page=1, $count=self::NUMBER)
    {  
        $id=self::genreIdentifyId();
        $id=(int)$id;
            $page = intval($page);            
            $offset = ($page - 1) * $count;
            $db = Db::getConnection();
            $sql=  "SELECT id, title, author_id, year, price FROM book"
                        . " WHERE genre_id=".$id
                        . " LIMIT ".$count
                        . " OFFSET ".$offset;
            $result = $db->prepare($sql);
                    $result->bindParam(':count', $count, PDO::PARAM_INT);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    
                    $result->execute();
                    $i = 0;
                    $booksList = array();
                    while ($row = $result->fetch()) {
                        $booksList[$i]['id'] = $row['id'];
                        $booksList[$i]['title'] = $row['title'];
                        $booksList[$i]['author_id']=$row['author_id'];
                        $booksList[$i]['year'] = $row['year'];
                        $booksList[$i]['price'] = $row['price'];
                        $sql2=  "SELECT id, name FROM authors WHERE id=".$booksList[$i]['author_id'];
                        $result1 = $db->prepare($sql2);
                        $result1->bindParam(':count', $count, PDO::PARAM_INT);
                        $result1->setFetchMode(PDO::FETCH_ASSOC);
                        $result1->execute();
                        $booksList[$i]['author'] = $result1->fetch()['name'];
                        $i++;
    
                        }
              return $booksList;
        
    }
    public static function genreIdentify()
    {
        if(strpos($_SERVER['REQUEST_URI'],'modern'))
        {
            $str='modern';
        }
        elseif(strpos($_SERVER['REQUEST_URI'],'classic'))
        {
            $str='classic';
        }
        elseif(strpos($_SERVER['REQUEST_URI'],'fantasy'))
        {
            $str='fantasy';
        }
        elseif(strpos($_SERVER['REQUEST_URI'],'detective'))
        {
            $str='detective';
        }
        elseif(strpos($_SERVER['REQUEST_URI'],'mystic'))
        {
            $str='mystic';
        }
        elseif(strpos($_SERVER['REQUEST_URI'],'culinary'))
        {
            $str='culinary';
        }
        elseif(strpos($_SERVER['REQUEST_URI'],'health'))
        {
            $str='health';
        }
        elseif(strpos($_SERVER['REQUEST_URI'],'business'))
        {
            $str='business';
        }
        elseif(strpos($_SERVER['REQUEST_URI'],'history'))
        {
            $str='history';
        }
        return $str;
    }
    public static function genreIdentifyId()
    {
        $str=self::genreIdentify();
        $db = Db::getConnection();
        $sql = 'SELECT id FROM genre WHERE title="'.$str.'";';
        $result = $db->prepare($sql);
        $result->bindParam('id', $id, PDO::PARAM_INT);
        $result->execute();
        $id=$result->fetch();
        return $id['id'];
    }
    public static function getTotalBooksGenre()
    {
        $str=self::genreIdentifyId();
        $str=intval($str);
        $db = Db::getConnection();
        $sql = "SELECT count(id) AS count FROM book WHERE genre_id=".$str;
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }
/*
    ---------------------------------------------------------------------
    --------------------------Sorting books------------------------------
    ---------------------------------------------------------------------
*/
    public static function sort($page=1, $count=self::NUMBER)
    {
        $offset = ($page - 1) * $count;
        $db = Db::getConnection(); 
        $str=self::sortIdentify();
        switch($str) {
            case 1:
                    $sql =  "SELECT id, title, author_id, year, price FROM book "
                    . " ORDER BY id DESC "
                    . "LIMIT ".$count
                    . " OFFSET ".$offset;
                break;
            case 2:
                $sql = 'SELECT id, title, author_id, year, price FROM book '
                    . " ORDER BY price  "
                    . "LIMIT ".$count
                    . " OFFSET ".$offset;
                break;
            case 3:
                $sql =  'SELECT id, title, author_id, year, price FROM book '
                    . " ORDER BY price DESC"
                    . " LIMIT ".$count
                    . " OFFSET ".$offset;
                break;
                
                case 4:
              $sql = 'SELECT id, title, author_id, year, price FROM book '
                    . " ORDER BY availability DESC "
                    . "LIMIT ".$count
                    . " OFFSET ".$offset;
                break;
            }
                $result = $db->prepare($sql);
                $result->bindParam(':count', $count, PDO::PARAM_INT);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                
                $result->execute();
                $i = 0;
                $booksList = array();
                while ($row = $result->fetch()) {
                    $booksList[$i]['id'] = $row['id'];
                    $booksList[$i]['title'] = $row['title'];
                    $booksList[$i]['author_id']=$row['author_id'];
                    $booksList[$i]['year'] = $row['year'];
                    $booksList[$i]['price'] = $row['price'];
                    $sql2=  "SELECT id, name FROM authors WHERE id=".$booksList[$i]['author_id'];
                    $result1 = $db->prepare($sql2);
                    $result1->bindParam(':count', $count, PDO::PARAM_INT);
                    $result1->setFetchMode(PDO::FETCH_ASSOC);
                    $result1->execute();
                    $booksList[$i]['author'] = $result1->fetch()['name'];
                    $i++;

                    }
        return $booksList;          
        }
    
    
        public static function sortIdentify()
        {
            if(strpos($_SERVER['REQUEST_URI'],'new'))
            {
                $str=1;
            }
            elseif(strpos($_SERVER['REQUEST_URI'],'priceup'))
            {
                $str=2;
            }
            elseif(strpos($_SERVER['REQUEST_URI'],'pricedown'))
            {
                $str=3;
            }
            elseif(strpos($_SERVER['REQUEST_URI'],'availability'))
            {
                $str=4;
            }
           
            return $str;
        }



    public static function getTotalBooks()
    {
        $db = Db::getConnection();
        $sql = 'SELECT count(id) AS count FROM book;';
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }

    public static function headline()
    {
        $str=self::sortIdentify();
        switch($str) {
            case 1:
                    $str='По новизне';
                break;
            case 2:
                    $str='По возрастанию цены';
                break;
            case 3:
                    $str='По убыванию цены';
                break;
                
                case 4:
                    $str='По наличию';
                break;
            }
            return $str;
    }

/*
    ------------------------------------------------------------------------
    ---------------------View one book by its id----------------------------
    ------------------------------------------------------------------------
*/


   public static function getBookById($id)
   {    
        $id = intval($id);
        $book=array();
        $sql='SELECT * FROM book WHERE id=' . $id;
        if ($id) {                        
            $db = Db::getConnection();
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            while ($row = $result->fetch()) {
                $book['id'] = $row['id'];
                $book['title'] = $row['title'];
                $book['author_id']=$row['author_id'];
                $book['year'] = $row['year'];
                $book['price'] = $row['price'];
                $book['info'] = $row['info'];
                $sql2=  "SELECT id, name FROM authors WHERE id=".$book['author_id'];
                $result1 = $db->prepare($sql2);
                $result1->bindParam(':count', $count, PDO::PARAM_INT);
                $result1->setFetchMode(PDO::FETCH_ASSOC);
                $result1->execute();
                $book['author'] = $result1->fetch()['name'];
                

                }
             return $book;
    }
   }

/*
    -------------------------------------------------------------------------------------
    ----------------------------------------------Search---------------------------------
    -------------------------------------------------------------------------------------
*/
  
   public static function search($request)
   {
       $count=self::NUMBER;
       $books=array();
        $db = Db::getConnection();
        $sql1=  "SELECT * FROM book "
                    . " WHERE title=".$request
                    . " LIMIT ".$count;
        $result1 = $db->prepare($sql);
                $result1->bindParam(':count', $count, PDO::PARAM_INT);
                $result1->setFetchMode(PDO::FETCH_ASSOC);
                
                $result1->execute();
                $i = 0;
                $titleList = array();
                while ($row = $result1->fetch()) {
                    $titleList[$i]['id'] = $row['id'];
                    $titleList[$i]['title'] = $row['title'];
                    $titleList[$i]['author_id']=$row['author_id'];
                    $titleList[$i]['year'] = $row['year'];
                    $titleList[$i]['price'] = $row['price'];
                    $sql=  "SELECT id, name FROM authors WHERE id=".$titleList[$i]['author_id'];
                    $result = $db->prepare($sql);
                    $result->bindParam(':count', $count, PDO::PARAM_INT);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $result->execute();
                    $titleList[$i]['author'] = $result->fetch()['name'];
                    $i++;
                    }
                    $sql2=  "SELECT * FROM authors "
                                . " WHERE name=".$request
                                . " LIMIT ".$count; 
                    $result2 = $db->prepare($sql2);
                    $result2->bindParam(':count', $count, PDO::PARAM_INT);
                    $result2->setFetchMode(PDO::FETCH_ASSOC);
                    
                    $result2->execute();
                    $i = 0;
                    $authorBooks = array();
                    while ($row = $result2->fetch()) {
                        $authorBooks[$i]['id'] = $row['id'];
                        $authorBooks[$i]['author'] = $row['name'];
                        $sql=  "SELECT * FROM books WHERE author_id=".$authorBooks[$i]['id'];
                        $result = $db->prepare($sql);
                        $result->bindParam(':count', $count, PDO::PARAM_INT);
                        $result->setFetchMode(PDO::FETCH_ASSOC);
                        $result->execute();
                        $authorBooks[$i]['title'] = $result->fetch()['title'];
                        $authorBooks[$i]['year'] = $result->fetch()['year'];
                        $authorBooks[$i]['price'] = $result->fetch()['price'];
                        $i++;
                        } 
            if(!empty($titleList)) $books=$titleList;
            if(!empty($authorBooks)) $books=$authorBooks;
            return $books;

   }

   
   
}