<?php

class EMS extends Seeder {

    public function run() {
        //drop all recordsets
        DB::table('field_types')->delete();
        DB::table('fields')->delete();
        DB::table('field_values')->delete();

        //field_types
        $id = 1;
        DB::table('field_types')->insert(
                array(
                    //single value
                    array('id' => 1, 'name' => 'Text Field', 'display' => 'textfield','value_type' => 1),
                    array('id' => 2,'name' => 'Text Area', 'display' => 'textfield','value_type' => 1),
                    array('id' => 3,'name' => 'Image', 'display' => 'textfield','value_type' => 1),
                    array('id' => 4,'name' => 'Audio', 'display' => 'textfield','value_type' => 1),
                    array('id' => 5,'name' => 'Video', 'display' => 'textfield','value_type' => 1),
                    array('id' => 6,'name' => 'Attachment', 'display' => 'textfield','value_type' => 1),
                    array('id' => 7,'name' => 'RichText Area', 'display' => 'textfield','value_type' => 1),
                    array('id' => 8,'name' => 'RichText Area', 'display' => 'textfield','value_type' => 1),
                    //multi value - single selected
                    array('id' => 9,'name' => 'Dropdown', 'display' => 'dropdown','value_type' => 2),
                    array('id' => 10,'name' => 'RadioBox', 'display' => 'radio','value_type' => 2),
                    //multi value - single selected
                    array('id' => 11,'name' => 'ListBox', 'display' => 'list','value_type' => 3),
                    array('id' => 12,'name' => 'CheckBox', 'display' => 'checkbox','value_type' => 3),
                )
        );
        
//        //fields
//        DB::table('fields')->insert(
//                array(
//                    //student
//                    array('id' => 1, 'name' => 'Student Name', 'field_type_id' => '1','object_dependences' => '','field_dependences' => '','value_in_object' => '','value_in_field' => ''),
//                    array('id' => 2, 'name' => 'City', 'field_type_id' => '9','object_dependences' => '','field_dependences' => '','value_in_object' => '','value_in_field' => ''),
//                    array('id' => 3, 'name' => 'District', 'field_type_id' => '9','object_dependences' => '','field_dependences' => '2','value_in_object' => '','value_in_field' => ''),
//                    array('id' => 4, 'name' => 'Class', 'field_type_id' => '9','object_dependences' => '2','field_dependences' => '','value_in_object' => '','value_in_field' => ''),
//                    
//                    //class
//                    array('id' => 5, 'name' => 'Class Name', 'field_type_id' => '1','object_dependences' => '','field_dependences' => '','value_in_object' => '','value_in_field' => ''),
//                    array('id' => 6, 'name' => 'Head student', 'field_type_id' => '9','object_dependences' => '','field_dependences' => '','value_in_object' => '1','value_in_field' => ''),
//                    
//                    //subject
//                    array('id' => 7, 'name' => 'Subject Name', 'field_type_id' => '1','object_dependences' => '','field_dependences' => '','value_in_object' => '','value_in_field' => ''),
//                    
//                    //mark
//                    array('id' => 8, 'name' => 'Mark Name', 'field_type_id' => '1','object_dependences' => '','field_dependences' => '','value_in_object' => '','value_in_field' => ''),
//                    array('id' => 9, 'name' => 'Student Name', 'field_type_id' => '9','object_dependences' => '','field_dependences' => '','value_in_object' => '1','value_in_field' => ''),
//                    array('id' => 10, 'name' => 'Value', 'field_type_id' => '10','object_dependences' => '','field_dependences' => '','value_in_object' => '','value_in_field' => ''),
//                )
//        );
        
        DB::table('groups')->delete();
        DB::table('groups')->insert(
                array(                    
                    array('id' => 1, 'name' => 'Student','fields'=>''),
                    array('id' => 2, 'name' => 'Class','fields'=>''),
                    array('id' => 3, 'name' => 'Subject','fields'=>''),
                    array('id' => 4, 'name' => 'Mark','fields'=>''),                    
                )
        );

    }

}
