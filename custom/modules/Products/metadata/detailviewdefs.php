<?php
$viewdefs['Products'] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'AUDIT',
        ),
      ),
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'serial_number',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'category_id',
            'comment' => 'Product category',
            'label' => 'LBL_CATEGORY',
          ),
          1 => 
          array (
            'name' => 'type_id',
            'comment' => 'Product type (ex: hardware, software)',
            'label' => 'LBL_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'cost_price',
            'label' => '{$MOD.LBL_COST_PRICE|strip_semicolon} ({$CURRENCY})',
          ),
          1 => 
          array (
            'name' => 'list_price',
            'label' => '{$MOD.LBL_LIST_PRICE|strip_semicolon} ({$CURRENCY})',
          ),
        ),
        3 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'team_name',
            'studio' => 
            array (
              'portallistview' => false,
              'portaldetailview' => false,
              'portaleditview' => false,
            ),
            'label' => 'LBL_TEAMS',
          ),
        ),
      ),
    ),
  ),
);
