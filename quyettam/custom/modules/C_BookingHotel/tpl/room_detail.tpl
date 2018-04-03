<table width="100%" border="0" colspan="5" id="room_list" name="room_list">
    <tbody>
        <th></th>    
        <th>{$MOD.LBL_ROOM_TYPE}: </th>    
        <th>{$MOD.LBL_CATEGORY}: </th>    
        <th>{$MOD.LBL_ADULT}: </th>    
        <th>{$MOD.LBL_CHILDREN}: </th>
        <tr id="tr_room1">
            <td style="width: 12.3%;">{$MOD.LBL_ROOM} 1: </td>
            <input type = "hidden" name = "room1_id" id = "room1_id" value="{$room_id1}">
            <input type = "hidden" name = "room1_deleted" id = "room1_deleted" value="0">
            <td style="width: 30%; padding-left: 5%!important;">{html_options name="room1_room_type" id="room1_room_type" options="$room_type_room_options" selected="$room_type1"  }
                <input type="text" name="room1_other_type" id="room1_other_type" size="20" maxlength="100" value="{$other_type1}" title="{$MOD.LBL_OTHER_TYPE} 1" tabindex="0" db-data=""></td>
            <td style="width: 30%; padding-left: 5%!important;">{html_options name="room1_category" id="room1_category" options="$category_room_options" selected="$category1"}
                <input type="text" name="room1_other_category" id="room1_other_category" size="20" maxlength="100" value="{$other_category1}" title="{$MOD.LBL_OTHER_CATEGORY} 1" tabindex="0" db-data=""></td>
            <td style="width: 15%;" align="center">{html_options name="room1_adult" id="room1_adult" options="$adult_room_options" selected="$adult1"}</td>
            <td style="width: 15%;" align="center">{html_options name="room1_children" id="room1_children" options="$children_room_options" selected="$children1"}</td>
        </tr>
        <tr id="tr_room2">
            <td style="width: 12.3%;">{$MOD.LBL_ROOM} 2: </td>
            <input type = "hidden" name = "room2_id" id = "room2_id" value="{$room_id2}">
            <input type = "hidden" name = "room2_deleted" id = "room2_deleted" value="1">
            <td style="width: 30%; padding-left: 5%!important;">{html_options name="room2_room_type" id="room2_room_type" options="$room_type_room_options" selected="$room_type2"  }
                <input type="text" name="room2_other_type" id="room2_other_type" size="20" maxlength="100" value="{$other_type2}" title="{$MOD.LBL_OTHER_TYPE} 2" tabindex="0" db-data=""></td>
            <td style="width: 30%; padding-left: 5%!important;">{html_options name="room2_category" id="room2_category" options="$category_room_options" selected="$category2"}
                <input type="text" name="room2_other_category" id="room2_other_category" size="20" maxlength="100" value="{$other_category2}" title="{$MOD.LBL_OTHER_CATEGORY} 2" tabindex="0" db-data=""></td>
            <td style="width: 15%;" align="center">{html_options name="room2_adult" id="room2_adult" options="$adult_room_options" selected="$adult2"}</td>
            <td style="width: 15%;" align="center">{html_options name="room2_children" id="room2_children" options="$children_room_options" selected="$children2"}</td>
        </tr>
        <tr id="tr_room3">
            <td style="width: 12.3%;">{$MOD.LBL_ROOM} 3: </td>
            <input type = "hidden" name = "room3_id" id = "room3_id" value="{$room_id3}">
            <input type = "hidden" name = "room3_deleted" id = "room3_deleted" value="1">
            <td style="width: 30%; padding-left: 5%!important;">{html_options name="room3_room_type" id="room3_room_type" options="$room_type_room_options" selected="$room_type3"  }
                <input type="text" name="room3_other_type" id="room3_other_type" size="20" maxlength="100" value="{$other_type3}" title="{$MOD.LBL_OTHER_TYPE} 3" tabindex="0" db-data=""></td>
            <td style="width: 30%; padding-left: 5%!important;">{html_options name="room3_category" id="room3_category" options="$category_room_options" selected="$category3"}
                <input type="text" name="room3_other_category" id="room3_other_category" size="20" maxlength="100" value="{$other_category3}" title="{$MOD.LBL_OTHER_CATEGORY} 3" tabindex="0" db-data=""></td>
            <td style="width: 15%;" align="center">{html_options name="room3_adult" id="room3_adult" options="$adult_room_options" selected="$adult3"}</td>
            <td style="width: 15%;" align="center">{html_options name="room3_children" id="room3_children" options="$children_room_options" selected="$children3"}</td>
        </tr>
        <tr id="tr_room4">
            <td style="width: 12.3%;">{$MOD.LBL_ROOM} 4: </td>
            <input type = "hidden" name = "room4_id" id = "room4_id" value="{$room_id4}">
            <input type = "hidden" name = "room4_deleted" id = "room4_deleted" value="1">
            <td style="width: 30%; padding-left: 5%!important;">{html_options name="room4_room_type" id="room4_room_type" options="$room_type_room_options" selected="$room_type4"  }
                <input type="text" name="room4_other_type" id="room4_other_type" size="20" maxlength="100" value="{$other_type4}" title="{$MOD.LBL_OTHER_TYPE} 4" tabindex="0" db-data=""></td>
            <td style="width: 30%; padding-left: 5%!important;">{html_options name="room4_category" id="room4_category" options="$category_room_options" selected="$category4"}
                <input type="text" name="room4_other_category" id="room4_other_category" size="20" maxlength="100" value="{$other_category4}" title="{$MOD.LBL_OTHER_CATEGORY} 4" tabindex="0" db-data=""></td>
            <td style="width: 15%;" align="center">{html_options name="room4_adult" id="room4_adult" options="$adult_room_options" selected="$adult4"}</td>
            <td style="width: 15%;" align="center">{html_options name="room4_children" id="room4_children" options="$children_room_options" selected="$children4"}</td>
        </tr>
    </tbody>
    </table>