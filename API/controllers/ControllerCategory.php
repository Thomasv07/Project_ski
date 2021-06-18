<?php

class ControllerCategory
{ 
    public function selectcategory(){

        $manager = new CategoryManager();
        $category = $manager->select();

        require '../views/form.php';
        
    }
}