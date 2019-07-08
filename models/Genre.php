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
        /*switch($catList['title'])
        {
            case "modern":
            $categoriesList['title']='Современная лит-ра';
            $categoriesList['id']=1; break;
            case "classic":
            $categoriesList['title']='Классическая лит-ра';
            $categoriesList['id']=2; break;
            case "fantasy":
            $categoriesList['title']='Фантастика'; 
            $categoriesList['id']=3; break;
            case "detective":
            $categoriesList['title']='Детективы';
            $categoriesList['id']=4; break;
            case "mystic":
            $categoriesList['title']='Мистика';
            $categoriesList['id']=5; break;
            case "culinary":
            $categoriesList['title']='Кулинария';
            $categoriesList['id']=6; break;
            case "health":
            $categoriesList['title']='Здоровье';
            $categoriesList['id']=7; break;
            case "business":
            $categoriesList['title']='Бизнес';
            $categoriesList['id']=8; break;
            case "history":
            $categoriesList['title']='Историческая лит-ра';
            $categoriesList['id']=9; break;

        }*/
        return $categoriesList;
    }
}