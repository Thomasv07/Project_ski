<?php

class ControllerCategory
{ 
    public function selectcategory(){

        $manager = new CategoryManager();
        $category = $manager->listCategoryJson();

        echo $category;

        
    }
}