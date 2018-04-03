<?php
   if (isset($_POST[contact_id]) && isset($_POST[type])) {
       $id = $_POST[contact_id];
       $type = $_POST[type];
       $sql = "UPDATE contacts SET relationship_type='".$type."' WHERE id='".$id."'";
       $result = $GLOBALS['db']->query($sql);
       echo json_encode(array("success" => "1")); 
   }
   else echo json_encode(array("success" => "0")); 
    

          
