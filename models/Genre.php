<?php
class Genre
{
    public static function getList()
    {
        $db = Db::getConnection();
        $list = array();
        $result = $db->query('SELECT id, title FROM genre;');
        $i=0;
        while($row=$result->fetch())
        {
            $list[$i]['id']=$row['id'];
            $list[$i]['title']=$row['title'];
            $i++;
        }
        return $list; 
    }

    public static function getListCategories()
    {
        $catList=self::getList();
        $categoriesList=array();
        $i=0;
        foreach($catList as $item){
            $categoriesList[$i]['id']=$item['id'];
            $categoriesList[$i]['title']=$item['title'];
            $i++;
        }
       
        return $categoriesList;
    }
}
