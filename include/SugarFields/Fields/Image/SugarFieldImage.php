<?php


    require_once('include/SugarFields/Fields/Base/SugarFieldBase.php');

    class SugarFieldImage extends SugarFieldBase {

        function getEditViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
            $displayParams['bean_id']='id';
            $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
            return $this->fetch($this->findTemplate('EditView'));
        }

        function getDetailViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
            $displayParams['bean_id']='id';
            $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
            return $this->fetch($this->findTemplate('DetailView'));
        }

        function getUserEditView($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
            $displayParams['bean_id']='id';
            $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex, false);
            return $this->fetch($this->findTemplate('UserEditView'));
        }

        function getUserDetailView($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
            $displayParams['bean_id']='id';
            $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex, false);
            return $this->fetch($this->findTemplate('UserDetailView'));
        }

        public function save(&$bean, $params, $field, $properties, $prefix = ''){
            require_once('include/upload_file.php');            
            require_once('include/SugarFields/Fields/Image/Image.php');
            $upload_file = new UploadFile($field);

            //remove file
            if (isset($_REQUEST['remove_imagefile_' . $field]) && $_REQUEST['remove_imagefile_' . $field] == 1)
            {
                $upload_file->unlink_file($bean->$field);
                $bean->$field="";
            }

            //uploadfile
            if (isset($_FILES[$field]))
            {
                //confirm only image file type can be uploaded
                if (verify_image_file($_FILES[$field]['tmp_name']))
                {
                    if ($upload_file->confirm_upload())
                    {
                        // Capture the old value in case of error
                        $oldvalue = $bean->$field;

                        // Create the new field value
                        $bean->$field = create_guid();

                        // Add checking for actual file move for reporting to consumers
                        if (!$upload_file->final_move($bean->$field)) {
                            // If this was a fail, reset the bean field to original
                            $bean->$field = $oldvalue;
                            $this->error = $upload_file->getErrorMessage();
                        }else{
                         $source = 'upload/'.$bean->$field;
                         $dir_resize='custom/images/'.$bean->$field;
                         
                         $image = new Image($source); 
                         $image->resize(0,64);
                         $image->save($dir_resize);  
                        }
                    }
                    else
                    {
                        // Added error reporting
                        $this->error = $upload_file->getErrorMessage();
                    }
                }
            }

            //Check if we have the duplicate value set and use it if $bean->$field is empty
            if(empty($bean->$field) && !empty($_REQUEST[$field . '_duplicate'])) {
                $bean->$field = $_REQUEST[$field . '_duplicate'];
            }
        }


    }
?>
