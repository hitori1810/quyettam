<li class="noBullet" id="whole_subpanel_campaigns" style="display: list-item;"><div id="subpanel_title_campaigns" onmouseover="this.style.cursor = 'move';" style="cursor: move;"><table width="100%" cellpadding="0" cellspacing="0" border="0" class="formHeader h3Row">
            <tbody><tr>
                    <td nowrap=""><h3><span><a name="campaigns"> </a><span id="show_link_campaigns" style="display: none"><a href="#" class="utilsLink" onclick="current_child_field = 'campaigns';
                            showSubPanel('campaigns', null, null, 'Accounts');
                            document.getElementById('show_link_campaigns').style.display = 'none';
                            document.getElementById('hide_link_campaigns').style.display = '';
                            return false;"><img src="themes/RacerX/images/advanced_search.gif?v=lRi7JIBECiiwlZC7IEYGzw" border="0" align="absmiddle" alt="Show"></a></span><span id="hide_link_campaigns" style="display: inline"><a href="#" class="utilsLink" onclick="hideSubPanel('campaigns');
                                    document.getElementById('hide_link_campaigns').style.display = 'none';
                                    document.getElementById('show_link_campaigns').style.display = '';
                                    return false;"><img src="themes/default/images/basic_search.gif?v=lRi7JIBECiiwlZC7IEYGzw" border="0" align="absmiddle" alt="Hide"></a></span>&nbsp;Campaigns</span></h3></td><td width="100%"><img height="1" width="1" src="themes/default/images/blank.gif?v=lRi7JIBECiiwlZC7IEYGzw" alt=""></td></tr>
            </tbody></table></div><div cookie_name="campaigns_v" id="subpanel_campaigns" style="display:inline">
        <script>document.getElementById("subpanel_campaigns").cookie_name = "campaigns_v";</script><script>SUGAR.util.doWhen("typeof(markSubPanelLoaded) != 'undefined'", function () {
                markSubPanelLoaded('campaigns');
            });</script>    <div id="list_subpanel_campaigns"><script>
                function select_dialog() {
                    var $dialog = $('<div></div>')
                            .html('<a style=\'width: 150px\' name="thispage" class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' onmouseout=\'unhiliteItem(this);\' onclick=\'if (document.MassUpdate.select_entire_list.value==1){document.MassUpdate.select_entire_list.value=0;sListView.check_all(document.MassUpdate, "mass[]", true, 10)}else {sListView.check_all(document.MassUpdate, "mass[]", true)};\' href=\'javascript:void(0)\'>Select This Page&nbsp;&#x28;10&#x29;&#x200E;</a><a style=\'width: 150px\' name="selectall" class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' onmouseout=\'unhiliteItem(this);\' onclick=\'sListView.check_entire_list(document.MassUpdate, "mass[]",true,0);\' href=\'javascript:void(0)\'>Select All&nbsp;&#x28;0&#x29;&#x200E;</a><a style=\'width: 150px\' name="deselect" class=\'menuItem\' onmouseover=\'hiliteItem(this,"yes");\' onmouseout=\'unhiliteItem(this);\' onclick=\'sListView.clear_all(document.MassUpdate, "mass[]", false);\' href=\'javascript:void(0)\'>Deselect All</a>')
                            .dialog({
                                autoOpen: false,
                                width: 150
                            });
                    $dialog.dialog('open');

                }
            </script><input type="hidden" name="show_plus" value="">

            <table cellpadding="0" cellspacing="0" width="100%" border="0" class="list view">
                <tbody>
                    <tr class="pagination" role="presentation">
                        <td colspan="20" align="right">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td align="left"></td>
                                        <td nowrap="" align="right"><button type="button" name="listViewStartButton" title="Start" class="button" disabled=""><img src="themes/RacerX/images/start_off.png?v=lRi7JIBECiiwlZC7IEYGzw" aborder="0" align="absmiddle" alt="Start"></button>&nbsp;&nbsp;<button type="button" name="listViewPrevButton" title="Previous" class="button" disabled=""><img src="themes/RacerX/images/previous_off.png?v=lRi7JIBECiiwlZC7IEYGzw" border="0" align="absmiddle" alt="Previous"></button>&nbsp;&nbsp;<span class="pageNumbers">(0 - 0 of 0)</span>&nbsp;&nbsp;<button type="button" name="listViewNextButton" title="Next" class="button" disabled=""><img src="themes/RacerX/images/next_off.png?v=lRi7JIBECiiwlZC7IEYGzw" aborder="0" align="absmiddle" alt="Next"></button>&nbsp;&nbsp;<button type="button" name="listViewEndButton" title="End" class="button" disabled=""><img src="themes/RacerX/images/end_off.png?v=lRi7JIBECiiwlZC7IEYGzw" border="0" align="absmiddle" alt="End"></button></td></tr></tbody></table>
                        </td>
                    </tr>
                    <tr height="20">
                        <th scope="col" width="20%"><span sugar="slot34" style="white-space:normal;"><a class="listViewThLinkS1" href="javascript:showSubPanel('campaigns','/cloudpro/index.php?module=Accounts&offset=5&stamp=1423645265024580100&return_module=Accounts&action=DetailView&record=10517633-251b-1fa4-e4dd-52f3a7c28dfd&Accounts_campaigns_CELL_offset=&inline=true&to_pdf=true&action=SubPanelViewer&subpanel=campaigns&Accounts_campaigns_CELL_ORDER_BY=campaign_name1&layout_def_key=Accounts',true);">Campaign &nbsp;<img border="0" src="themes/default/images/arrow.gif?v=lRi7JIBECiiwlZC7IEYGzw" width="8" height="10" align="absmiddle" alt="Sort"></a></span></th>

                        <th scope="col" width="10%"><span sugar="slot35" style="white-space:normal;"><a class="listViewThLinkS1" href="javascript:showSubPanel('campaigns','/cloudpro/index.php?module=Accounts&offset=5&stamp=1423645265024580100&return_module=Accounts&action=DetailView&record=10517633-251b-1fa4-e4dd-52f3a7c28dfd&Accounts_campaigns_CELL_offset=&inline=true&to_pdf=true&action=SubPanelViewer&subpanel=campaigns&Accounts_campaigns_CELL_ORDER_BY=activity_type&layout_def_key=Accounts',true);">Activity Type &nbsp;<img border="0" src="themes/default/images/arrow.gif?v=lRi7JIBECiiwlZC7IEYGzw" width="8" height="10" align="absmiddle" alt="Sort"></a></span></th>

                        <th scope="col" width="10%"><span sugar="slot36" style="white-space:normal;"><a class="listViewThLinkS1" href="javascript:showSubPanel('campaigns','/cloudpro/index.php?module=Accounts&offset=5&stamp=1423645265024580100&return_module=Accounts&action=DetailView&record=10517633-251b-1fa4-e4dd-52f3a7c28dfd&Accounts_campaigns_CELL_offset=&inline=true&to_pdf=true&action=SubPanelViewer&subpanel=campaigns&Accounts_campaigns_CELL_ORDER_BY=activity_date&layout_def_key=Accounts',true);">Activity Date &nbsp;<img border="0" src="themes/default/images/arrow_down.gif?v=lRi7JIBECiiwlZC7IEYGzw" width="8" height="10" align="absmiddle" alt="Sorted Descending"></a></span></th>

                        <th scope="col" width="60%"><span sugar="slot37" style="white-space:normal;">Related</span></th>
                    </tr>

                    <tr height="20" class="oddListRowS1">
                        <td colspan="8">
                            <em>No Data</em>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div></li>