<?php
  if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
  class CodeHighlighter {
      function highlightCode($bean, $event, $args) {
          if(!empty($bean->code)) {
                $tmp_code=$bean->code;
                $bean->code="<span class='highlight_blue'>".$tmp_code."</span>" ;
          }
      }
  }