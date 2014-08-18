<?php

class EMS extends Seeder {

    public function run() {
        //drop all recordsets
        DB::table('field_types')->delete();
        

        //field_types
        DB::table('field_types')->insert(
                array(
                    //single value
                    array('id' => 1, 'name' => 'Text Field', 'groupId' => 1,'group' => 'Single Value', 'display' => 'textfield'),
                    array('id' => 2, 'name' => 'Text Area', 'groupId' => 1,'group' => 'Single Value', 'display' => 'textarea'),
                    array('id' => 3, 'name' => 'Image', 'groupId' => 1,'group' => 'Single Value', 'display' => 'textfield'),
                    array('id' => 4, 'name' => 'Audio', 'groupId' => 1,'group' => 'Single Value', 'display' => 'textarea'),
                    
                    array('id' => 5, 'name' => 'Video', 'groupId' => 1,'group' => 'Single Value', 'display' => 'textfield'),
                    array('id' => 6, 'name' => 'File Attachment', 'groupId' => 1,'group' => 'Single Value', 'display' => 'textarea'),
                    array('id' => 7, 'name' => 'Dropdown', 'groupId' => 2,'group' => 'Multiple Value - Single Select', 'display' => 'dropdown'),
                    array('id' => 8, 'name' => 'Radiobox', 'groupId' => 2,'group' => 'Multiple Value - Single Select', 'display' => 'radio'),
                    array('id' => 9, 'name' => 'Listbox', 'groupId' => 3,'group' => 'Multiple Value - Multiple Select', 'display' => 'list'),
                    array('id' => 10, 'name' => 'Checkbox', 'groupId' => 3,'group' => 'Multiple Value - Multiple Select', 'display' => 'checkbox'),
                )
        );
        
    }

}
