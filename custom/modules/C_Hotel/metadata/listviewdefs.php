<?php
$module_name = 'C_Hotel';
$listViewDefs[$module_name] = 
array (
  'code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'link' => true,
    'default' => true,
  ),
  'name' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'address_street' => 
  array (
    'type' => 'text',
    'label' => 'LBL_ADDRESS_STREET',
    'sortable' => false,
    'width' => '20%',
    'default' => true,
  ),
  'star' => 
  array (
    'type' => 'int',
    'label' => 'LBL_STAR',
    'width' => '10%',
    'default' => true,
    'customCode' => '<div class="starrr" style="display: inline-flex;">
    <i class="icon icon-star-empty"></i>
    <i class="icon-star-empty icon"></i>
    <i class="icon-star-empty icon"></i>
    <i class="icon-star-empty icon"></i>
    <i class="icon-star-empty icon"></i></div>
    <input type="hidden" name="star" id="star" value="{$STAR}">',
  ),
  'contact_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'contact_phone' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_CONTACT_PHONE',
    'width' => '10%',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'studio' => 
    array (
      'portaleditview' => false,
    ),
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'team_name' => 
  array (
    'width' => '9%',
    'label' => 'LBL_TEAM',
    'default' => true,
  ),
);
