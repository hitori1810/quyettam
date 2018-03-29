<?php 
 //WARNING: The contents of this file are auto-generated


/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
// created: 2014-10-08 08:28:57
$dictionary["Contact"]["fields"]["bc_survey_contacts"] = array (
  'name' => 'bc_survey_contacts',
  'type' => 'link',
  'relationship' => 'bc_survey_contacts',
  'source' => 'non-db',
  'module' => 'bc_survey',
  'bean_name' => false,
  'vname' => 'LBL_BC_SURVEY_CONTACTS_FROM_BC_SURVEY_TITLE',
);


/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
// created: 2014-10-08 08:28:57
$dictionary["Contact"]["fields"]["bc_survey_submission_contacts"] = array (
  'name' => 'bc_survey_submission_contacts',
  'type' => 'link',
  'relationship' => 'bc_survey_submission_contacts',
  'source' => 'non-db',
  'module' => 'bc_survey_submission',
  'bean_name' => false,
  'side' => 'right',
  'vname' => 'LBL_BC_SURVEY_SUBMISSION_CONTACTS_FROM_BC_SURVEY_SUBMISSION_TITLE',
);


/**
 *
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */
$dictionary['Contact']['fields']['email1']['required'] = true;



// created: 2014-04-12 00:26:05
$dictionary["Contact"]["fields"]["contacts_c_invoices_1"] = array (
  'name' => 'contacts_c_invoices_1',
  'type' => 'link',
  'relationship' => 'contacts_c_invoices_1',
  'source' => 'non-db',
  'module' => 'C_Invoices',
  'bean_name' => 'C_Invoices',
  'vname' => 'LBL_CONTACTS_C_INVOICES_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_c_invoices_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2014-04-12 00:27:35
$dictionary["Contact"]["fields"]["contacts_c_payments_1"] = array (
  'name' => 'contacts_c_payments_1',
  'type' => 'link',
  'relationship' => 'contacts_c_payments_1',
  'source' => 'non-db',
  'module' => 'C_Payments',
  'bean_name' => 'C_Payments',
  'vname' => 'LBL_CONTACTS_C_PAYMENTS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_c_payments_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-06-18 09:48:49
$dictionary["Contact"]["fields"]["contacts_c_payments_2"] = array (
  'name' => 'contacts_c_payments_2',
  'type' => 'link',
  'relationship' => 'contacts_c_payments_2',
  'source' => 'non-db',
  'module' => 'C_Payments',
  'bean_name' => 'C_Payments',
  'vname' => 'LBL_CONTACTS_C_PAYMENTS_2_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_c_payments_2contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2014-04-18 09:33:01
$dictionary["Contact"]["fields"]["contacts_c_refunds_1"] = array (
  'name' => 'contacts_c_refunds_1',
  'type' => 'link',
  'relationship' => 'contacts_c_refunds_1',
  'source' => 'non-db',
  'module' => 'C_Refunds',
  'bean_name' => 'C_Refunds',
  'vname' => 'LBL_CONTACTS_C_REFUNDS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_c_refunds_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-07-16 08:57:21
$dictionary["Contact"]["fields"]["contacts_j_feedback_1"] = array (
  'name' => 'contacts_j_feedback_1',
  'type' => 'link',
  'relationship' => 'contacts_j_feedback_1',
  'source' => 'non-db',
  'module' => 'J_Feedback',
  'bean_name' => 'J_Feedback',
  'vname' => 'LBL_CONTACTS_J_FEEDBACK_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_j_feedback_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-09-07 09:33:54
$dictionary["Contact"]["fields"]["contacts_j_ptresult_1"] = array (
  'name' => 'contacts_j_ptresult_1',
  'type' => 'link',
  'relationship' => 'contacts_j_ptresult_1',
  'source' => 'non-db',
  'module' => 'J_PTResult',
  'bean_name' => 'J_PTResult',
  'vname' => 'LBL_CONTACTS_J_PTRESULT_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_j_ptresult_1contacts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2014-07-15 14:40:52
$dictionary["Contact"]["fields"]["c_classes_contacts_1"] = array (
  'name' => 'c_classes_contacts_1',
  'type' => 'link',
  'relationship' => 'c_classes_contacts_1',
  'source' => 'non-db',
  'module' => 'C_Classes',
  'bean_name' => 'C_Classes',
  'vname' => 'LBL_C_CLASSES_CONTACTS_1_FROM_C_CLASSES_TITLE',
  'id_name' => 'c_classes_contacts_1c_classes_ida',
);


// created: 2015-08-06 14:27:38
$dictionary["Contact"]["fields"]["c_contacts_contacts_1"] = array (
  'name' => 'c_contacts_contacts_1',
  'type' => 'link',
  'relationship' => 'c_contacts_contacts_1',
  'source' => 'non-db',
  'module' => 'C_Contacts',
  'bean_name' => 'C_Contacts',
  'side' => 'right',
  'vname' => 'LBL_C_CONTACTS_CONTACTS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'c_contacts_contacts_1c_contacts_ida',
  'link-type' => 'one',
);
$dictionary["Contact"]["fields"]["c_contacts_contacts_1_name"] = array (
  'name' => 'c_contacts_contacts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_CONTACTS_CONTACTS_1_FROM_C_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'c_contacts_contacts_1c_contacts_ida',
  'link' => 'c_contacts_contacts_1',
  'table' => 'c_contacts',
  'module' => 'C_Contacts',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["c_contacts_contacts_1c_contacts_ida"] = array (
  'name' => 'c_contacts_contacts_1c_contacts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_CONTACTS_CONTACTS_1_FROM_CONTACTS_TITLE_ID',
  'id_name' => 'c_contacts_contacts_1c_contacts_ida',
  'link' => 'c_contacts_contacts_1',
  'table' => 'c_contacts',
  'module' => 'C_Contacts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2014-09-16 16:12:19
$dictionary["Contact"]["fields"]["c_memberships_contacts_2"] = array (
  'name' => 'c_memberships_contacts_2',
  'type' => 'link',
  'relationship' => 'c_memberships_contacts_2',
  'source' => 'non-db',
  'module' => 'C_Memberships',
  'bean_name' => 'C_Memberships',
  'vname' => 'LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE',
  'id_name' => 'c_memberships_contacts_2c_memberships_ida',
);
$dictionary["Contact"]["fields"]["c_memberships_contacts_2_name"] = array (
  'name' => 'c_memberships_contacts_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE',
  'save' => true,
  'id_name' => 'c_memberships_contacts_2c_memberships_ida',
  'link' => 'c_memberships_contacts_2',
  'table' => 'c_memberships',
  'module' => 'C_Memberships',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["c_memberships_contacts_2c_memberships_ida"] = array (
  'name' => 'c_memberships_contacts_2c_memberships_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_MEMBERSHIPS_CONTACTS_2_FROM_C_MEMBERSHIPS_TITLE_ID',
  'id_name' => 'c_memberships_contacts_2c_memberships_ida',
  'link' => 'c_memberships_contacts_2',
  'table' => 'c_memberships',
  'module' => 'C_Memberships',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'left',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-08-14 09:21:53
$dictionary["Contact"]["fields"]["j_class_contacts_1"] = array (
  'name' => 'j_class_contacts_1',
  'type' => 'link',
  'relationship' => 'j_class_contacts_1',
  'source' => 'non-db',
  'module' => 'J_Class',
  'bean_name' => 'J_Class',
  'vname' => 'LBL_J_CLASS_CONTACTS_1_FROM_J_CLASS_TITLE',
  'id_name' => 'j_class_contacts_1j_class_ida',
);


// created: 2015-08-05 12:10:56
$dictionary["Contact"]["fields"]["j_school_contacts_1"] = array (
  'name' => 'j_school_contacts_1',
  'type' => 'link',
  'relationship' => 'j_school_contacts_1',
  'source' => 'non-db',
  'module' => 'J_School',
  'bean_name' => 'J_School',
  'side' => 'right',
  'vname' => 'LBL_J_SCHOOL_CONTACTS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'j_school_contacts_1j_school_ida',
  'link-type' => 'one',
);
$dictionary["Contact"]["fields"]["j_school_contacts_1_name"] = array (
  'name' => 'j_school_contacts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_J_SCHOOL_CONTACTS_1_FROM_J_SCHOOL_TITLE',
  'save' => true,
  'id_name' => 'j_school_contacts_1j_school_ida',
  'link' => 'j_school_contacts_1',
  'table' => 'j_school',
  'module' => 'J_School',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["j_school_contacts_1j_school_ida"] = array (
  'name' => 'j_school_contacts_1j_school_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_J_SCHOOL_CONTACTS_1_FROM_CONTACTS_TITLE_ID',
  'id_name' => 'j_school_contacts_1j_school_ida',
  'link' => 'j_school_contacts_1',
  'table' => 'j_school',
  'module' => 'J_School',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-09-23 15:23:34
$dictionary["Contact"]["fields"]["leads_contacts_1"] = array (
  'name' => 'leads_contacts_1',
  'type' => 'link',
  'relationship' => 'leads_contacts_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_LEADS_CONTACTS_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_contacts_1leads_ida',
);

          
$dictionary["Contact"]["fields"]["code"] = array (
    'name' => 'code',
    'vname' => 'LBL_CODE',
    'type' => 'varchar',
    'required' => false,
    'importable' => true,
    'unified_search' => true,
    'help' => 'Code',
    'len' => '50',
    'size' => '20',
);


?>