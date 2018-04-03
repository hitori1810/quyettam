<tr>
        <td>      
            <select name="product[]" class="product" onchange="changeProduct($(this).closest('tr'));">
                {foreach from=$PRODUCT_OPTIONS key=key item=item}
                    
                    <option value="{$item.id}" unit_cost="{$item.unit_cost}" unit="{$item.unit}"
                    {if $item.id == $SELECTED_PRODUCT} selected {/if}
                    >
                        {$item.name}
                    </option>      
                    
                {/foreach} 
            </select>                                                          
        </td>
        <td>
            <input type="text" name="quantity[]" width="100%" class="quantity number" value="{$QUANTITY}" onchange="calculatePayDetailAmount($(this).closest('tr'));"/>
        </td>
        <td>
            <input type="text" name="unit_cost[]" width="100%" class="unit_cost number" value="{$UNIT_COST}"  onchange="calculatePayDetailAmount($(this).closest('tr'));"/>
        </td>
        <td class="number">
            <label class="lbl_unit">{$UNIT}</label>                                                
            <input type="hidden" name="unit[]" width="100%" class="unit" value="{$UNIT}"/>
        </td>
        <td class="number">
            <label class="lbl_pay_detail_amount">{$PAY_DETAIL_AMOUNT}</label> 
            <input type="hidden" name="pay_detail_amount[]" width="100%" class="pay_detail_amount" value="{$PAY_DETAIL_AMOUNT}"/>
        </td>
        <td>
            <input type="button" class="btnDelRow" value="{$APP.BTN_REMOVE_TITLE}"></input>
        </td>
</tr>