<?php

return array(
    //genres
    'modern/page-([0-9]+)'=>'site/genre/$1',
    'classic/page-([0-9]+)'=>'site/genre/$1',
    'fantasy/page-([0-9]+)'=>'site/genre/$1',
    'detective/page-([0-9]+)'=>'site/genre/$1',
    'mystic/page-([0-9]+)'=>'site/genre/$1',
    'culinary/page-([0-9]+)'=>'site/genre/$1',
    'health/page-([0-9]+)'=>'site/genre/$1',
    'business/page-([0-9]+)'=>'site/genre/$1',
    'history/page-([0-9]+)'=>'site/genre/$1',
    'modern'=>'site/genre',
    'classic'=>'site/genre',
    'fantasy'=>'site/genre',
    'detective'=>'site/genre',
    'mystic'=>'site/genre',   
    'culinary'=>'site/genre',
    'health'=>'site/genre',
    'business'=>'site/genre',
    'history'=>'site/genre',
  
    //view book
    'book/([0-9]+)'=>'book/view/$1',  
    //authors
    'authors/([a-z]+)/([0-9]+)'=>'authors/list/$2',
    'authors/([a-z]+)'=>'authors/alphabet/$1',
    'authors'=>'authors/index',
    //sorting
    'new/page-([0-9]+)'=>'site/sort/$1',
    'priceup/page-([0-9]+)'=>'site/sort/$1',
    'pricedown/page-([0-9]+)'=>'site/sort/$1',
    'availability/page-([0-9]+)'=>'site/sort/$1',
    'new'=>'site/sort',
    'priceup'=>'site/sort',
    'pricedown'=>'site/sort',
    'availability'=>'site/sort',
    //search
    'search/(\w)'=>'site/search/$1',
     //main
    'page-([0-9]+)'=>'site/index/$1',
    '' => 'site/index',
);
