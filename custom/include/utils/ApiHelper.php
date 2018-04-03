<?php
require_once('custom/include/utils/RestfulApiHelper.php');

class ApiHelper extends RestfulApiHelper {          

    static function login($userName, $password, $stayLogin) {
        global $sugar_config, $current_user;

        global $sugar_config;
        $user = BeanFactory::getBean('Users');
        $success = false;
        $password = md5($password);
        $authController = AuthenticationController::getInstance();
        $success = $authController->login($userName, $password, array('passwordEncrypted' => true));

        if($success) {
            session_start();                 
            $sessionId = session_id();

            // Save session_id to oauth_session
            // Check if this session_id is existing
            $sql = "SELECT session_id FROM oauth_session WHERE session_id ='$sessionId' AND user_id='{$current_user->id}'";
            $sessionId = $GLOBALS['db']->getOne($sql);
            if(!empty($sessionId)){
                $sql = "UPDATE oauth_session SET auth_time = GETDATE() WHERE session_id ='$sessionId'";
                $GLOBALS['db']->query($sql);
            }
            else{
                session_regenerate_id();
                $sessionId = session_id();
                // if not exist, create new row
                $newSugarId = create_guid();
                $sql = "INSERT INTO [oauth_session] ([id], [session_id], [auth_time], [user_id]) VALUES ('$newSugarId', '$sessionId' , GETDATE(), '{$current_user->id}')";
                $GLOBALS['db']->query($sql);
            }

            $_SESSION['lifetime'] = time() + 1800;
            $_SESSION['current_user'] = $GLOBALS['current_user'];  

            // Returns token and user info
            $response = array(
                'token' => session_id(),
                'user_info' => $current_user->toArray()
            );

            self::setReturn(200, json_encode($response));
        }
        else {
            self::setReturn(401);
        }
    }

    function checkRequired($fields, $checkIn){
        if(!count($fields))
            return;
        foreach($fields as $key=>$f){
            if(!isset($checkIn[$f]) || empty($checkIn[$f]) || $checkIn[$f] == "")
                self::setReturn(422, json_encode(array(
                    "message" => "Field $f id required"
                )));
        }
    }     

    function checkDataArray($data){
        if(count($data) == 0) self::setReturn(422, json_encode(array(
            "message" => "Data is empty"
            )));
    }     

    function getCustomerList(){   
        $sql = "
        SELECT id   
        , IFNULL(code, '')  code
        , IFNULL(first_name, '') first_name
        , IFNULL(phone_mobile, '') phone_mobile
        , IFNULL(department, '') department
        , IFNULL(description, '') description
        FROM contacts
        WHERE deleted <> 1";

        $result = $GLOBALS['db']->query($sql);
        $returnList = array();
        while($row = $GLOBALS['db']->fetchByAssoc($result)){        
            $returnList[] = (object) $row;                                                    
        } 

        $response = array(
            'entry_list' => $returnList
        );

        self::setReturn(200, $response);
    }  

    function getCustomerInfo($id){   
        $sql = "
        SELECT id   
        , IFNULL(code, '')  code
        , IFNULL(first_name, '') first_name
        , IFNULL(phone_mobile, '') phone_mobile
        , IFNULL(department, '') department
        , IFNULL(description, '') description
        FROM contacts
        WHERE deleted <> 1
        AND id = '$id'";

        $result = $GLOBALS['db']->query($sql);
        $returnList = array();
        $returnList = $GLOBALS['db']->fetchByAssoc($result);

        $returnList = (object)$returnList;

        $response = array(
            'entry_list' => $returnList
        );

        self::setReturn(200, $response);
    }

    function getCustomerPaymentHistory($id){   
        $sql = "
        SELECT j_payment.id
        , j_payment.name
        , j_payment.payment_date
        , j_payment.payment_amount    
        FROM j_payment
        WHERE customer = '$id'
        AND deleted <> 1
        ORDER BY payment_date DESC";           
        $result = $GLOBALS['db']->query($sql);  
        $returnList = array();
        while($row = $GLOBALS['db']->fetchByAssoc($result)){        
            $returnList[] = (object) $row;                                                    
        } 

        $response = array(
            'entry_list' => $returnList
        );

        self::setReturn(200, $response);
    }

    function saveCustomer($data){                                   
        $customer = new Contact();
        if(!empty($data['id'])){
            $customer = $customer->retrieve_by_string_fields(array('id' => $data['id']));    
        };           

        $customer->first_name = $data['name'];
        $customer->phone_mobile = $data['phone_mobile'];
        $customer->department = $data['department'];
        $customer->description = $data['description'];
        $customer->save();                                  

        if(!empty($customer->id)){
            self::setReturn(200, array('id' => $customer->id));    
        }
        self::setReturn(500, array('msg'=>'Something error!'));
    }     

    function getPaymentList(){   
        $sql = "
        SELECT id   
        , IFNULL(name, '') name
        , IFNULL(customer, '') customer
        , IFNULL(payment_date, '') payment_date
        , IFNULL(payment_detail, '') payment_detail
        , IFNULL(payment_amount, '') payment_amount
        , IFNULL(description, '') description    
        FROM j_payment
        WHERE deleted <> 1";

        $result = $GLOBALS['db']->query($sql);
        $returnList = array();
        while($row = $GLOBALS['db']->fetchByAssoc($result)){        
            $returnList[] = (object) $row;                                                    
        } 

        $response = array(
            'entry_list' => $returnList
        );

        self::setReturn(200, $response);
    }       

    function getPaymentInfo($id){   
        $sql = "
        SELECT id                      
        , IFNULL(name, '') name
        , IFNULL(customer, '') customer
        , IFNULL(payment_date, '') payment_date
        , IFNULL(payment_amount, '') payment_amount
        , IFNULL(payment_detail, '') payment_detail
        , IFNULL(description, '') description 
        FROM j_payment
        WHERE deleted <> 1
        AND id = '$id'";

        $result = $GLOBALS['db']->query($sql);
        $GLOBALS['log']->fatal($sql);
        $returnList = array();
        $returnList = $GLOBALS['db']->fetchByAssoc($result);

        $returnList = (object)$returnList;

        $response = array(
            'entry_list' => $returnList
        );

        self::setReturn(200, $response);
    }

    function savePayment($data){                                   
        $payment = new J_Payment();
        if(!empty($data['id'])){
            $payment = $payment->retrieve_by_string_fields(array('id' => $data['id']));    
        };                                                            
        $payment->customer = $data['customer'];
        $payment->payment_date = $data['payment_date'];        
        $payment->payment_amount = $data['payment_amount'];   
        $payment->description = $data['description'];   
        $payment->save();                                  

        foreach($data['payment_detail'] as $key => $value){
            $payDetail = new J_PaymentDetail();      
            $payDetail->payment         = $payment->id;    
            $payDetail->product         = $value['product'];    
            $payDetail->quantity        = $value['quantity'];    
            $payDetail->unit            = $value['unit']; 
            $payDetail->unit_cost       = $value['unit_cost']; 
            $payDetail->payment_amount  = $value['payment_amount'];   
            $payDetail->save();    
        }  

        $paymentDetail = json_encode($data['payment_detail']);

        $GLOBALS['db']->query("
            UPDATE j_payment
            SET payment_detail = '$paymentDetail'
            WHERE id = '{$payment->id}'
            ");   

        if(!empty($record->id)){
            self::setReturn(200, array('id' => $record->id));    
        }
        self::setReturn(500, array('msg'=>'Something error!'));
    } 

    function getProductList(){   
        $sql = "
        SELECT id   
        , IFNULL(code, '')  code
        , IFNULL(name, '') name
        , IFNULL(unit, '') unit
        , IFNULL(unit_cost, '') unit_cost     
        FROM products
        WHERE deleted <> 1";

        $result = $GLOBALS['db']->query($sql);
        $returnList = array();
        $returnList[] = (object) array(
            'id' => '',
            'code' => '',
            'name' => '',
            'unit' => '',
            'unit_cost' => '',
        );
        
        while($row = $GLOBALS['db']->fetchByAssoc($result)){        
            $returnList[] = (object) $row;                                                    
        } 

        $response = array(
            'entry_list' => $returnList
        );

        self::setReturn(200, $response);
    }  

    function getProductInfo($id){   
        $sql = "
        SELECT id                          
        , IFNULL(code, '') code
        , IFNULL(name, '') name
        , IFNULL(unit, '') unit
        , IFNULL(unit_cost, '') unit_cost  
        FROM products
        WHERE deleted <> 1
        AND id = '$id'";

        $result = $GLOBALS['db']->query($sql);
        $returnList = array();
        $returnList = $GLOBALS['db']->fetchByAssoc($result);

        $returnList = (object)$returnList;

        $response = array(
            'entry_list' => $returnList
        );

        self::setReturn(200, $response);
    }

    function saveProduct($data){                                   
        $record = new Product();
        if(!empty($data['id'])){
            $record = $record->retrieve_by_string_fields(array('id' => $data['id']));    
        };           

        $record->name = $data['name'];
        $record->unit = $data['unit'];
        $record->unit_cost = $data['unit_cost'];   
        $record->save();                                  

        if(!empty($record->id)){
            self::setReturn(200, array('id' => $record->id));    
        }
        self::setReturn(500, array('msg'=>'Something error!'));
    } 

    function exportPayment($id){ 
        require_once("custom/include/PHPExcel/Classes/PHPExcel.php");
        require_once("custom/include/PHPExcel/Classes/PHPExcel/IOFactory.php"); 
        require_once("custom/include/_helper/convertMoneyString.php"); 

        ob_clean();    

        global $current_user, $timedate;
        $inputFileName = 'custom/include/TemplateExcel/export_payment.xlsx';

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } 
        catch(Exception $e) {
            self::setReturn(500, array('msg'=>'Error loading temaplte file!'));                           
        }  

        // Set document properties
        $objPHPExcel->getProperties()->setCreator($current_user->name)
        ->setLastModifiedBy($current_user->name)
        ->setTitle("QuyetTam")
        ->setSubject("QuyetTam")
        ->setDescription("QuyetTam")
        ->setKeywords("QuyetTam")
        ->setCategory("QuyetTam");    

        $sql = "
        SELECT p.id                      
        , IFNULL(name, '') name
        , IFNULL(p.customer, '') customer
        , IFNULL(c.first_name, '') customer_name
        , IFNULL(p.payment_date, '') payment_date
        , IFNULL(p.payment_amount, '') payment_amount
        , IFNULL(p.payment_detail, '') payment_detail
        , IFNULL(p.description, '') description 
        FROM j_payment p 
        INNER JOIN contacts c ON c.id = p.customer AND c.deleted <> 1
        WHERE p.deleted <> 1
        AND p.id = '$id'";

        $result = $GLOBALS['db']->query($sql);
        $returnList = array();
        $data = $GLOBALS['db']->fetchByAssoc($result);
        $payDetail = json_decode(html_entity_decode($data['payment_detail']), true);
        $productOptions = getProductForVardef();                                                                              
        $objPHPExcel->setActiveSheetIndex(0);    
        $objPHPExcel->getActiveSheet()->getCell('B10')->setValue("Tên khách hàng: ".$data['customer_name']);
        $currentRow = 13;
        foreach($payDetail as $key => $value){
            $objPHPExcel->getActiveSheet()->getCell('C'.$currentRow)->setValue($productOptions[$value['product']]);    
            $objPHPExcel->getActiveSheet()->getCell('E'.$currentRow)->setValue($value['quantity']);    
            $objPHPExcel->getActiveSheet()->getCell('F'.$currentRow)->setValue($value['unit_cost']);    
            $objPHPExcel->getActiveSheet()->getCell('G'.$currentRow)->setValue($value['payment_amount']);    
            $currentRow++;
        }

        $int = new Integer();
        $moneyStr = $int->toText(unformat_number($data['payment_amount']));
        $objPHPExcel->getActiveSheet()->getCell('B30')->setValue("Cộng thành tiền (viết bằng chữ): ".$moneyStr);

        $dateParts = explode("-", $GLOBALS['timedate']->nowDbDate());
        $dateStr = "Ngày ".$dateParts[2]." tháng ".$dateParts[1]." năm ".$dateParts[0];
        $objPHPExcel->getActiveSheet()->getCell('E32')->setValue($dateStr);

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $section = create_guid_section(6);  
        $filename = 'Payment_'.$section.'.xlsx'; 
        $file = 'custom/uploads/exportExcel/'.$filename; 
        $objWriter->save($file);



        $response = array(
            'file_name' => $filename,
            'file_ext'  => "xlsx",
            'file_path' => $file,        
        );

        self::setReturn(200, $response);
    } 

    function getAppListString(){   
        $app_list_string = return_app_list_strings_language('en_us');  

        $app_list_string['customer_options'] = getCustomerForVardef();
        $app_list_string['product_options'] = getProductForVardef();


        $response = array(
            'entry_list' => $app_list_string
        );

        self::setReturn(200, $response);
    }


    static function setReturn($code, $data){
        global $gInput;      

        parent::setReturn($code, $data);
    }
}
?>