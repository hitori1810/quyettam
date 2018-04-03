<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class C_HotelViewDetail extends ViewDetail
{
    function display(){
        if (!empty($this->bean->contacts_c_hotel_1contacts_ida)){
            $contact = BeanFactory::getBean('Contacts', $this->bean->contacts_c_hotel_1contacts_ida);
            $this->ss->assign('CONTACT_MOBILE',$contact->phone_mobile);
            $this->ss->assign('CONTACT_EMAIL',$contact->email1);
        }

        $star_html = '<div class="starrr" style="display: inline-flex;">';
        for ($x = 1; $x <= 5; $x++) {
            $star_class = $x > $this->bean->star? 'icon icon-star-empty' : 'icon icon-star';
            $star_html .= '<i class="'.$star_class.'"></i>';
        } 
        $star_html .= '</div><input type="hidden" name="star" id="star" value="{$fields.star.value}">';
        $this->ss->assign('STAR',$star_html);
        
        parent::display();
    }
}