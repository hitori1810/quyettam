<?php
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

require_once('include/Expressions/Expression/AbstractExpression.php');
/**
 * Generic expression
 * @api
 */
abstract class GenericExpression extends AbstractExpression
{
	/**
	 * Parameters May be anything
	 */
    static function getParameterTypes() {
		return array(AbstractExpression::$ENUM_TYPE, AbstractExpression::$STRING_TYPE, AbstractExpression::$BOOLEAN_TYPE,
					 AbstractExpression::$DATE_TYPE, AbstractExpression::$NUMERIC_TYPE,  AbstractExpression::$GENERIC_TYPE);
	}

	/**
	 * Returns the JS Equivalent of the evaluate function.
	 */
	static function getJSEvaluate() {
		return <<<EOQ
			var params = this.getParameters();
			return params;
EOQ;
	}
}

?>