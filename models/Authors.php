<?php
class Authors
{
    public static function authorsByLetter($letter)
    {
        switch($letter)
        {
            case "a": $letter1='А'; break;
            case "b": $letter1='Б'; break;
            case "v": $letter1='В'; break;
            case "g": $letter1='Г'; break;
            case "d": $letter1='Д'; break;
            case "je": $letter1='Е'; break;
            case "j": $letter1='Ж'; break;
            case "z": $letter1='З'; break;
            case "i": $letter1='И'; break;
            case "ji": $letter1='Й'; break;
            case "k": $letter1='К'; break;
            case "l": $letter1='Л'; break;
            case "m": $letter1='М'; break;
            case "n": $letter1='Н'; break;
            case "o": $letter1='О'; break;
            case "p": $letter1='П'; break;
            case "r": $letter1='Р'; break;
            case "s": $letter1='С'; break;
            case "t": $letter1='Т'; break;
            case "y": $letter1='У'; break;
            case "f": $letter1='Ф'; break;
            case "h": $letter1='Х'; break;
            case "c": $letter1='Ц'; break;
            case "ch": $letter1='Ч'; break;
            case "sh": $letter1='Ш'; break;
            case "sch": $letter1='Щ'; break;
            case "e": $letter1='Э'; break;
            case "ju": $letter1='Ю'; break;
            case "ja": $letter1='Я'; break;
        }
        $db=Db::getConnection();
        $sql="SELECT * FROM authors WHERE name LIKE'".$letter1."%'";
        $result = $db->prepare($sql);
                    $result->bindParam(':count', $count, PDO::PARAM_INT);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $result->execute();
                    $i = 0;
                    $authorsList=array();
                    while ($row = $result->fetch()) {
                        $authorsList[$i]['id'] = $row['id'];
                        $authorsList[$i]['name'] = $row['name'];
                        $i++;
    
                        }
              return $authorsList;   
        
    }

    public static function getBooksByAuthor($authorId)
    {
        $authorId = intval($authorId);
        $book=array();
        $sql='SELECT * FROM book WHERE author_id='.$authorId;
        if ($authorId) {                        
            $db = Db::getConnection();
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            $i=0;
            while ($row = $result->fetch()) {
                $book[$i]['id'] = $row['id'];
                $book[$i]['title'] = $row['title'];
                $book[$i]['author_id']=$row['author_id'];
                $book[$i]['year'] = $row['year'];
                $book[$i]['price'] = $row['price'];
                $book[$i]['info'] = $row['info'];
                $sql2=  "SELECT id, name FROM authors WHERE id=".$book[$i]['author_id'];
                $result1 = $db->prepare($sql2);
                $result1->bindParam(':count', $count, PDO::PARAM_INT);
                $result1->setFetchMode(PDO::FETCH_ASSOC);
                $result1->execute();
                $book[$i]['author'] = $result1->fetch()['name'];
                $i++;

                }
             
    }
    return $book;
}
}