<?php

class EMS extends Seeder {

    public function run() {
        //drop all recordsets
        DB::table('field_types')->delete();


        //field_types
        DB::table('field_types')->insert(
                array(
                    //single value
                    array('id' => 1, 'name' => 'Text Field', 'groupId' => 1, 'group' => 'Single Value', 'display' => 'textfield'),
                    array('id' => 2, 'name' => 'Text Area', 'groupId' => 1, 'group' => 'Single Value', 'display' => 'textarea'),
                    array('id' => 3, 'name' => 'Image', 'groupId' => 1, 'group' => 'Single Value', 'display' => 'textfield'),
                    array('id' => 4, 'name' => 'Audio', 'groupId' => 1, 'group' => 'Single Value', 'display' => 'textarea'),
                    array('id' => 5, 'name' => 'Video', 'groupId' => 1, 'group' => 'Single Value', 'display' => 'textfield'),
                    array('id' => 6, 'name' => 'File Attachment', 'groupId' => 1, 'group' => 'Single Value', 'display' => 'textarea'),
                    array('id' => 7, 'name' => 'Dropdown', 'groupId' => 2, 'group' => 'Multiple Value - Single Select', 'display' => 'dropdown'),
                    array('id' => 8, 'name' => 'Radiobox', 'groupId' => 2, 'group' => 'Multiple Value - Single Select', 'display' => 'radio'),
                    array('id' => 9, 'name' => 'Listbox', 'groupId' => 3, 'group' => 'Multiple Value - Multiple Select', 'display' => 'list'),
                    array('id' => 10, 'name' => 'Checkbox', 'groupId' => 3, 'group' => 'Multiple Value - Multiple Select', 'display' => 'checkbox'),
                )
        );


        DB::table('fields')->insert(
                array(
                    array('id' => 1, 'name' => 'Student name', 'field_type_id' => 1),
                    array('id' => 2, 'name' => 'Student bod', 'field_type_id' => 1),
                    array('id' => 3, 'name' => 'Class name', 'field_type_id' => 1),
                    array('id' => 4, 'name' => 'Class description', 'field_type_id' => 1),
                    array('id' => 5, 'name' => 'Subject name', 'field_type_id' => 1),
                    array('id' => 6, 'name' => 'Subject level', 'field_type_id' => 1),
                    array('id' => 7, 'name' => 'Mark name', 'field_type_id' => 1),
                    array('id' => 8, 'name' => 'Mark level', 'field_type_id' => 1),
                )
        );

        //groups
        DB::table('groups')->insert(
                array(
                    //single value
                    array('id' => 1, 'name' => 'Student', 'link' => 'student', 'icon' => 'icon-home'),
                    array('id' => 2, 'name' => 'Class', 'link' => 'class', 'icon' => 'icon-home'),
                    array('id' => 3, 'name' => 'Subject', 'link' => 'subject', 'icon' => 'icon-home'),
                    array('id' => 4, 'name' => 'Mark', 'link' => 'mark', 'icon' => 'icon-home'),
                )
        );

        DB::table('group-fields')->insert(
                array(
                    array('group_id' => 1, 'field_id' => 1),
                    array('group_id' => 2, 'field_id' => 3),
                    array('group_id' => 3, 'field_id' => 5),
                    array('group_id' => 4, 'field_id' => 7),
                )
        );
    }

}
