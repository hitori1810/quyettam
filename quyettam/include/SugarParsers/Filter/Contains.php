<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/


require_once("include/SugarParsers/Filter/AbstractFilter.php");

/**
 * This is for when a string will contain part of this string.
 *
 * Ex: %<string>%
 *
 * @api
 */
class SugarParsers_Filter_Contains extends SugarParsers_Filter_AbstractFilter
{
    /**
     * Which Variables trigger this class
     *
     * @var array
     */
    protected $variables = array('$contains');

    /**
     * Text Operator
     *
     * @var string
     */
    protected $operator_text = 'contains';

    /**
     * Not Text Operator
     *
     * @var string
     */
    protected $operator_not_text = 'does_not_contain';
}