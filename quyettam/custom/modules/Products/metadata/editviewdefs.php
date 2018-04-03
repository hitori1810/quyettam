<?php
$viewdefs['Products'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
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
      'javascript' => '{sugar_getscript file="cache/include/javascript/sugar_grp_jsolait.js"}
{sugar_getscript file="modules/Products/EditView.js"}',
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'displayParams' => 
            array (
              'required' => true,
            ),
            'customCode' => '<input name="name" id="name" type="text" value="{$fields.name.value}"><input name="product_template_id" id="product_template_id" type="hidden" value="{$fields.product_template_id.value}">&nbsp;<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" type="button" class="button" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick=\'return get_popup_product("{$form_name}");\'>&nbsp;<input tabindex="1" title="{$LBL_CLEAR_BUTTON_TITLE}" class="button" onclick="this.form.product_template_id.value = \'\'; this.form.name.value = \'\';" type="button" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">',
          ),
          1 => 'serial_number',
        ),
        1 => 
        array (
          0 => 'category_id',
          1 => 'type_id',
        ),
        2 => 
        array (
          0 => 'cost_price',
          1 => 'list_price',
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
