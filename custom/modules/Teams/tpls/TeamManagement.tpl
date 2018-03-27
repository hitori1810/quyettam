<head>
    <script type="text/javascript" src="custom/include/javascripts/Ztree/jquery.ztree-all.min.js"></script>
    <script type="text/javascript" src="custom/include/javascripts/Bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="custom/include/javascripts/DataTables/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="custom/include/javascripts/BootstrapSelect/bootstrap-select.min.js"></script>
    <script type="text/javascript"> var treeNodes = {$NODES}; </script>
    <script type="text/javascript" src="custom/modules/Teams/js/listview.js"></script>
    
        <link rel="stylesheet" type="text/css" href="custom/modules/Teams/css/team_management.css">
    <link rel="stylesheet" type="text/css" href="custom/include/javascripts/Ztree/zTreeStyle.css">
    <link rel="stylesheet" type="text/css" href="custom/include/javascripts/DataTables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="custom/include/javascripts/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="custom/include/javascripts/BootstrapSelect/bootstrap-select.min.css">

</head>                                           
<body>
    <h4>{$MOD.LBL_TEAM_MANAGEMENT}</h4>
    <div id="Content">
        <div class="panel">
            <div class="action_buttons">
                <input class="button primary team_detail" type="button" value="{$APPS.LBL_EDIT_BUTTON}" id="edit_bt">
                <input style="margin-left:20px;" class="button" style="display:none;" type="button" name="{$APPS.LBL_DELETE_BUTTON}" value="Delete" id="delete_bt">
                <input class="button primary team_edit" style="display:none;" type="button" name="save_bt" value="{$APPS.LBL_SAVE_BUTTON_LABEL}" id="save_bt">
                <input style="margin-left:20px; display:none;" class="button team_edit" type="button" name="{$APPS.LBL_CANCEL_BUTTON_LABEL}" value="Cancel" id="cancel_bt">
                {$APPS.LBL_REMOVE_USER}
            </div>
            <form method="POST" name="TeamEdit" id="TeamEdit">
                <input type="hidden" id="team_id" name="team_id" value="{$team_id}">
                <input type="hidden" id="current_parent_id" value="">
                <input type="hidden" id="is_editing" value="0">
                <input type="hidden" id="is_adding" value="0">
                <input type="hidden" id="count_user" value={$count_user}>
                <table width="100%" border="0" style="display:inline-table;font-size:15px;" cellspacing="1" class="panelContainer" cellpadding="0">
                    <tbody>
                        <tr>
                            <td valign="top" id="name_label" align="left" width="12%" scope="col">
                                {$MOD.LBL_NAME}: <span class="required team_edit">*</span>
                            </td>
                            <td valign="top" width="70%">
                                <label class="team_detail" id="team_name_text">{$team_name}</label>
                                <input type="text" style="display:none;" class="team_edit" id="team_name" name="team_name" size="30" value="{$team_name}" tabindex="0">
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" id="prefix_label" align="left" width="12%" scope="col" style="padding-top:20px;">
                                {$MOD.LBL_PREFIX}: <span class="required team_edit">*</span>
                            </td>
                            <td valign="top" width="70%" style="padding-top:20px;">
                                <label class="team_detail" id="prefix_text">{$prefix}</label>
                                <input type="text" style="display:none;" class="team_edit" id="prefix" name="prefix" size="30" value="{$prefix}" tabindex="0">
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" id="amount_label" width="12%" align="left" scope="col" style="padding-top:20px;">
                                {$MOD.LBL_MEMBER_OF}: <span class="required team_edit">*</span> 
                            </td>
                            <td valign="top" width="70%" style="padding-top:20px">
                                <a class="team_detail" id="parent_name_text" target="_blank" style="text-decoration: none; font-weight: bold;" href="javascript:void(0)"><-none-></a>
                                <input class="team_edit" style="display:none;" type="text" id="parent_name" name="parent_name" value="{$parent_name}">                                      
                                <input class="team_edit" type="hidden" id="parent_id" name="parent_id" value="{$parent_id}">
                                <button style="display:none;" class="team_edit" type="button" id="bt_select_parent" tabindex="0" title="Select" class="button firstChild" value="Select"><img src="themes/default/images/id-ff-select.png"></button>
                                <button style="display:none;" class="team_edit" type="button" id="bt_clear_parent" tabindex="0" title="Clear" class="button firstChild" value="Clear"><img src="themes/default/images/id-ff-clear.png"></button>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" id="amount_label" align="left" width="12%" scope="col" style="padding-top:20px;">
                                {$MOD.LBL_DESCRIPTION}:  
                            </td>
                            <td valign="top" width="70%" style="padding-top:20px">
                                <label class="team_detail" id="description_text">{$description}</label>
                                <textarea id="description" name="description" style="display:none;" class="team_edit" rows="4" cols="50">{$description}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="panel" id="panel_user">
            <h4>Users</h4>
            <div id="table_user">
                {$html_user_list}
            </div>
        </div>
    </div>
    <!-- Left Treeview Here. -->
    <div id="Menu">
        <ul id="teamNodes" class="ztree"></ul><br><br>
        <button id="collapse_all">Collapse all</button>&nbsp;&nbsp;&nbsp;  
        <button id="expand_all">Expand all</button>  
    </div>



</body>