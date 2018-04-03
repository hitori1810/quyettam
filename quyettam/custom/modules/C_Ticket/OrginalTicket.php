<?php
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class OrginalTicket {
        function detectOrginalTicket($bean, $event, $args) {
            $bean->load_relationship('c_ticket_c_ticket_1');
            $orginalTicket = reset($bean->c_ticket_c_ticket_1->getBeans());
            if (isset($orginalTicket->id)){
                $bean->c_ticket_c_ticket_1_name='<a href="index.php?module=C_Ticket&return_module=C_Ticket&action=DetailView&record='.$orginalTicket->id.'">'.$orginalTicket->name.'</a>' ;
            }
            else $bean->c_ticket_c_ticket_1_name = "";
        }
}