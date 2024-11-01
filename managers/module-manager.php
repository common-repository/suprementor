<?php

namespace Suprementor\Managers;

class Module_Manager {

    protected $modules = [];

    public function __construct() {

        $modules = [
            'Author_Info',
            'Post_Archive',
            'Post_Archive_Nav',
            'Post_Box',
            'Post_Category_Box',
            'Post_Category_List',
            'Post_Slideshow',
            'Post_List',
            'Post_Comments',
            'Product_category_Box',
        ];

        foreach ( $modules as $module ) {
            $class_name = 'Suprementor' . '\\Modules\\' . $module . '\Module';
            $this->modules[ $module ] = $class_name::instance();
        }
        
    }
}
