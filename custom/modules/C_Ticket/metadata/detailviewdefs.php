<?php
$module_name = 'C_Ticket';
$viewdefs[$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 
          array (
            'customCode' => '<a title="{$MOD.LBL_EDIT}" class="quickEdit" href="index.php?module=\'C_Ticket\'&return_module=\'C_Ticket\'&retun_action=\'DetailView\'&record={$fields.id.value}&return_id={$fields.id.value}"  data-record="{$fields.id.value}" data-list = "true" data-module="C_Ticket"  class="quickEdit" value="Edit">
                            <input type="submit" class="button primary" value="Edit" >
                            </a>',
          ),
          1 => 
          array (
            'customCode' => '<input title="{$MOD.LBL_DELETE}" class="button" onclick="this.form.return_module.value=\'C_Ticket\'; this.form.return_action.value=\'ListView\'; this.form.action.value=\'Delete\'; if(confirm(\'Are you sure you want to delete this record?\')) SUGAR.ajaxUI.submitForm(_form);" type="button" name="delete" id="delete" value="{$MOD.LBL_DELETE}">',
          ),
        ),
      ),
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_REFUND_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_OTHER' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/C_Ticket/js/detailview.js',
        ),
      ),
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
            'label' => 'LBL_TICKET_NUMBER',
          ),
          1 => 
          array (
            'name' => 'category',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'document_id',
            'label' => 'LBL_DOCUMENT_ID',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'pax_name',
            'label' => 'LBL_PAX_NAME',
          ),
          1 => 
          array (
            'name' => 'supplier',
            'studio' => 'visible',
            'label' => 'LBL_SUPPLIER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'booking_code',
            'label' => 'LBL_BOOKING_CODE',
          ),
          1 => 
          array (
            'name' => 'routing',
            'label' => 'LBL_ROUTING',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'tour',
            'label' => 'LBL_TOUR',
          ),
          1 => 
          array (
            'name' => 'gateway',
            'label' => 'LBL_GATEWAY',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'airline',
            'label' => 'LBL_AIRLINE',
          ),
          1 => 
          array (
            'name' => 'card_type',
            'studio' => 'visible',
            'label' => 'LBL_CARD_TYPE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'membership_number',
            'label' => 'LBL_MEMBERSHIP_NUMBER',
          ),
          1 => 
          array (
            'name' => 'class',
            'studio' => 'visible',
            'label' => 'LBL_COMPARTMENT',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'c_bookingticket_c_ticket_1_name',
          ),
          1 => 
          array (
            'name' => 'refunded',
            'label' => 'LBL_REFUNDED',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'currency',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'ex_rate',
            'label' => 'LBL_EX_RATE',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'public_fare',
            'label' => 'LBL_PUBLIC_FARE',
          ),
          1 => 
          array (
            'name' => 'market_fare',
            'label' => 'LBL_MARKET_FARE',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'commission_percent',
            'label' => 'LBL_COMMISSION_PERCENT',
          ),
          1 => 
          array (
            'name' => 'discount_percent',
            'label' => 'LBL_DISCOUNT_PERCENT',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'commission',
            'label' => 'LBL_COMMISSION',
          ),
          1 => 
          array (
            'name' => 'discount',
            'label' => 'LBL_DISCOUNT',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'airport_tax',
            'label' => 'LBL_AIRPORT_TAX',
          ),
          1 => 
          array (
            'name' => 'vat_percent',
            'label' => 'LBL_VAT_PERCENT',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'net_fare',
            'label' => 'LBL_NET_FARE',
          ),
          1 => 
          array (
            'name' => 'vat_amount',
            'label' => 'LBL_VAT_AMOUNT',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'service_charge',
            'label' => 'LBL_SERVICE_CHARGE',
          ),
          1 => 
          array (
            'name' => 'fare_basic',
            'label' => 'LBL_FARE_BASIC',
          ),
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'payable',
            'label' => 'LBL_PAID_AIRLINE',
          ),
          1 => 
          array (
            'name' => 'receivable',
            'label' => 'LBL_RECEIVED_CLIENT',
          ),
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'dateline',
            'label' => 'LBL_DATELINE',
          ),
          1 => 
          array (
            'name' => 'earn',
            'label' => 'LBL_EARN',
          ),
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'accounts_c_ticket_1_name',
          ),
        ),
        18 => 
        array (
          0 => 
          array (
            'name' => 'invoice_date',
            'label' => 'LBL_INVOICE_DATE',
          ),
          1 => 
          array (
            'name' => 'booking_date',
            'label' => 'LBL_BOOKING_DATE',
          ),
        ),
        19 => 
        array (
          0 => 
          array (
            'name' => 'io_code',
            'studio' => 'visible',
            'label' => 'LBL_IO_CODE',
          ),
          1 => 
          array (
            'name' => 'full_payment_date',
            'label' => 'LBL_FULL_PAYMENT_DATE',
          ),
        ),
        20 => 
        array (
          0 => 
          array (
            'name' => 'leads_c_ticket_1_name',
          ),
        ),
      ),
      'lbl_refund_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'refund_code',
            'label' => 'LBL_REFUND_CODE',
          ),
          1 => 
          array (
            'name' => 'refund_date',
            'label' => 'LBL_REFUND_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'refund_fee_airline',
            'label' => 'LBL_REFUND_FEE_AIRLINE',
          ),
          1 => 
          array (
            'name' => 'refund_fee',
            'label' => 'LBL_REFUND_FEE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'airline_repay',
            'label' => 'LBL_AIRLINE_REPAY',
          ),
          1 => 
          array (
            'name' => 'repay_client',
            'label' => 'LBL_REPAY_CLIENT',
          ),
        ),
      ),
      'lbl_other' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'label' => 'LBL_STATUS',
            'name' => 'status',
            'studio' => 'visible',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
        array (
          0 => 'team_name',
          1 => 
          array (
            'name' => 'user_sale',
            'label' => 'LBL_USER_SALE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_modified',
            'label' => 'LBL_DATE_MODIFIED',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
          ),
          1 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
        ),
      ),
    ),
  ),
);
