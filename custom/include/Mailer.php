<?php
    require_once('include/SugarPHPMailer.php');
    class Mailer{
       /**
        * Function use send one email for receiver
        *
        * @param mixed $mailRecipient
        * @param mixed $mailBody
        * @param mixed $recipient
        * @param mixed $mailSubj   mail subject
        * @bool mixed $log  log sent mail
        */
        function sendMail($receiver_mail, $receiver_name, $template_id, $replace_array,$log = false){
            $mail = new SugarPHPMailer();
            $admin = new Administration();
            $admin->retrieveSettings();
            $mail->setMailerForSystem();
            $mail->ClearAllRecipients();
            if ($admin->settings['mail_sendtype'] == "SMTP") {
                $mail->Host = $admin->settings['mail_smtpserver'];
                $mail->Port = $admin->settings['mail_smtpport'];
                if ($admin->settings['mail_smtpauth_req']) {
                    $mail->SMTPAuth = TRUE;
                    $mail->Username = $admin->settings['mail_smtpuser'];
                    $mail->Password = $admin->settings['mail_smtppass'];
                }
                $mail->Mailer   = "smtp";
                $mail->SMTPKeepAlive = true;
            }
            else {
                $mail->mailer = 'sendmail';
            }
            $mail->Sender   = $admin->settings['notify_fromaddress'];
            $mail->From     = $admin->settings['notify_fromaddress'];
            $mail->FromName = $admin->settings['notify_fromname'];
            $mail->ContentType = "text/html"; //"text/html"


            $emailtemplate= new EmailTemplate();

            $emailtemplate->retrieve($template_id);
            $mail->Subject = $emailtemplate->subject;

            //escape email template contents.
            $mailBody->body_html=from_html($emailtemplate->body_html);

            // Replace content
            foreach ($replace_array as $key => $value) {
                $mailBody->body_html = str_replace($key, $value, $mailBody->body_html);
            }

            $mail->Body = wordwrap($mailBody->body_html);
            if($receiver_mail != ''){
                $validation = new EmailMan();
                if(!$validation->valid_email_address($receiver_mail)){
                    return;
                }
                else{
                    $mail->AddAddress($receiver_mail, $receiver_name);
                }
            }
            $mail->prepForOutbound();
            $result = $mail->Send();
            if($log) { 
                         
            }
            return $result;
        }

        /**
        * ham send email, cho phep send and cc nhieu nguoi
        *
        * @param mixed $arrAdd : danh sach nguoi nhan
        * @param mixed $arrCC : danh sach nguoi dc CC
        * @param mixed $template_id : email template
        * @param mixed $replace_array : relace
        * @return bool
        */
        function sentMail2($arrAdd,$arrCC,$template_id, $replace_array){
            $mail = new SugarPHPMailer();
            $admin = new Administration();
            $admin->retrieveSettings();
            $mail->setMailerForSystem();
            $mail->ClearAllRecipients();
            if ($admin->settings['mail_sendtype'] == "SMTP") {
                $mail->Host = $admin->settings['mail_smtpserver'];
                $mail->Port = $admin->settings['mail_smtpport'];
                if ($admin->settings['mail_smtpauth_req']) {
                    $mail->SMTPAuth = TRUE;
                    $mail->Username = $admin->settings['mail_smtpuser'];
                    $mail->Password = $admin->settings['mail_smtppass'];
                }
                $mail->Mailer   = "smtp";
                $mail->SMTPKeepAlive = true;
            }
            else {
                $mail->mailer = 'sendmail';
            }
            $mail->Sender   = $admin->settings['notify_fromaddress'];
            $mail->From     = $admin->settings['notify_fromaddress'];
            $mail->FromName = $admin->settings['notify_fromname'];
            $mail->ContentType = "text/html"; //"text/html"


            $emailtemplate= new EmailTemplate();

            $emailtemplate->retrieve($template_id);
            $mail->Subject = $emailtemplate->subject;

            //escape email template contents.
            $mailBody->body_html=from_html($emailtemplate->body_html);

            // Replace content
            foreach ($replace_array as $key => $value) {
                $mailBody->body_html = str_replace($key, $value, $mailBody->body_html);
            }

            $mail->Body = wordwrap($mailBody->body_html);

            foreach($arrAdd as $address){
                if($address['email'] != ''){
                    $validation = new EmailMan();
                    if(!$validation->valid_email_address($address['email'])){
                        continue;
                    }
                    else{
                        $mail->AddAddress($address['email'], $address['name']);
                    }
                }
            }

            foreach($arrCC as $address){
                if($address['email'] != ''){
                    $validation = new EmailMan();
                    if(!$validation->valid_email_address($address['email'])){
                        continue;
                    }
                    else{
                        $mail->AddCC($address['email'], $address['name']);
                    }
                }
            }

            $mail->prepForOutbound();
            return $mail->Send();
        }

        /***
        * @param $parameters (mailReceiver => 'long@gmail.com',
        *                     receiverName => 'anh Long dep trai',
        *                     template_id => 'id template dang su dung');
        * @param $replaceArray ($bien => 'gia tri thay the')
        * @param array $attachFile (array(path => '', name => ''))
        * @return bool
        * @throws Exception
        * @throws phpmailerException
        */

        function sendMailWithTemplateAndAttachMultiFile($parameters, $replaceArray, $attachFile = array(),$log = false,$receiver_log = array())
        {

            $mail = new SugarPHPMailer();
            $admin = new Administration();
            $admin->retrieveSettings();
            $mail->setMailerForSystem();
            $mail->ClearAllRecipients();
            if ($admin->settings['mail_sendtype'] == "SMTP") {
                $mail->Host = $admin->settings['mail_smtpserver'];
                $mail->Port = $admin->settings['mail_smtpport'];
                if ($admin->settings['mail_smtpauth_req']) {
                    $mail->SMTPAuth = TRUE;
                    $mail->Username = $admin->settings['mail_smtpuser'];
                    $mail->Password = $admin->settings['mail_smtppass'];
                }
                $mail->Mailer = "smtp";
                $mail->SMTPKeepAlive = true;
            } else {
                $mail->mailer = 'sendmail';
            }
            $mail->Sender = $admin->settings['notify_fromaddress'];
            $mail->From = $admin->settings['notify_fromaddress'];
            $mail->FromName = $admin->settings['notify_fromname'];
            $mail->ContentType = "text/html"; //"text/html"


            $emailtemplate = new EmailTemplate();

            $emailtemplate->retrieve($parameters['template_id']);


            //escape email template contents.
            $mailBody = from_html($emailtemplate->body_html);
            $subject = $emailtemplate->subject;
            // Replace content
            foreach ($replaceArray as $key => $value) {
                $subject = str_replace($key, $value, $subject);
                $mailBody = str_replace($key, $value, $mailBody);
            }
            $mail->Subject = $subject;
            $mail->Body = wordwrap($mailBody);
            /***
            * Attach file
            */
            for ($i = 0; $i < count($attachFile); $i++) {
                $mail->AddAttachment($attachFile[$i]['path'], $attachFile[$i]['name']);
            }

            if ($parameters['mailReceiver'] != '') {
                $validation = new EmailMan();
                if (!$validation->valid_email_address($parameters['mailReceiver'])) {
                    return;
                } else {
                    $mail->AddAddress($parameters['mailReceiver'], $parameters['receiverName']);
                }
            }
            $mail->prepForOutbound();
            // return $mail->Send();
            $result = $mail->Send();
            if($log) {
                $tracker = new C_NotifyEmailTracker();
                $tracker->email = $parameters['mailReceiver'];
                $tracker->name = $parameters['receiverName'];
                $tracker->assigned_user_id = $receiver_log['id'];
                $tracker->notify_type = $receiver_log['type'];
                $tracker->email_template_id = $parameters['template_id'];
                if($result)
                    $tracker->is_success = "Success";
                else
                    $tracker->is_success = "Failed";
                $tracker->save();
            }
            return $result;
        }

        /**
        * Create by MTN - 04/02/2015
        * Function to Sent Mail with multi attachfile and Multi Email
        * $parameters = array(
        *           emailReceiver => 'ngan.mai@sugarcrm.com.vn',
        *           nameReceiver => 'TrongNgan Mtn',
        *           templateID  => $GLOBALS['sugar_config']['id_email_template_report_timecard_to_manager'],
        *);
        * $arrCC = array(
        *           0 => array('email' => 'thuan.nguyen@sugarcrm.com.vn', 'name' => 'Thuan Nguyen');
        *           1 => array('email' => 'trung.nguyen@sugarcrm.com.vn', 'name' => 'Trung Nguyen');
        * );
        *
        * $arrFile = array(
        *           0 => array('path' => 'custom/uploads/aaaa.pdf', 'name' => 'Hợp đồng tháng 1');
        *           1 => array('path' => 'custom/uploads/ccccc.xlsx', 'name' => 'Hóa đơn thu chi');
        * );
        *
        * $arrReplace = array(
        *           '{field_replace_1}'    => 'Value Replace 1',
        *           '{field_replace_2}'    => 'Value Replace 2',
        *           '{field_replace_3}'    => 'Value Replace 3',
        * );
        */
        function sendMailAttachFileAndCC($parameters, $arrCC = null, $arrFile = null, $arrReplace = null){
            $mail = new SugarPHPMailer();
            $admin = new Administration();
            $admin->retrieveSettings();
            $mail->setMailerForSystem();
            $mail->ClearAllRecipients();
            if ($admin->settings['mail_sendtype'] == "SMTP") {
                $mail->Host = $admin->settings['mail_smtpserver'];
                $mail->Port = $admin->settings['mail_smtpport'];
                if ($admin->settings['mail_smtpauth_req']) {
                    $mail->SMTPAuth = TRUE;
                    $mail->Username = $admin->settings['mail_smtpuser'];
                    $mail->Password = $admin->settings['mail_smtppass'];
                }
                $mail->Mailer = "smtp";
                $mail->SMTPKeepAlive = true;
            } else {
                $mail->mailer = 'sendmail';
            }
            $mail->Sender = $admin->settings['notify_fromaddress'];
            $mail->From = $admin->settings['notify_fromaddress'];
            $mail->FromName = $admin->settings['notify_fromname'];
            $mail->ContentType = "text/html"; //"text/html"


            $emailtemplate = new EmailTemplate();

            $emailtemplate->retrieve($parameters['templateID']);


            //escape email template contents.
            $mailBody = from_html($emailtemplate->body_html);
            $subject = $emailtemplate->subject;
            // Replace content
            if($arrReplace){
                foreach ($arrReplace as $key => $value) {
                    $subject = str_replace($key, $value, $subject);
                    $mailBody = str_replace($key, $value, $mailBody);
                }
            }
            $mail->Subject = $subject;
            $mail->Body = wordwrap($mailBody);

            //Attach file
            if($arrFile){
                for ($i = 0; $i < count($arrFile); $i++) {
                    $mail->AddAttachment($arrFile[$i]['path'], $arrFile[$i]['name']);
                }
            }

            //CC Email
            if($arrCC){
                for ($i = 0; $i < count($arrCC); $i++) {
                    $mail->AddCC($arrCC[$i]['email'], $arrCC[$i]['name']);
                }
            }

            if ($parameters['emailReceiver'] != '') {
                $validation = new EmailMan();
                if (!$validation->valid_email_address($parameters['emailReceiver'])) {
                    return;
                } else {
                    $mail->AddAddress($parameters['emailReceiver'], $parameters['nameReceiver']);
                }
            }
            $mail->prepForOutbound();

            $result = $mail->Send();
        }
    }
?>
