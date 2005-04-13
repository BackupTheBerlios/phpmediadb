<div id="phpmediadb-body-details-print" class="phpmediadb-body-details">
{if $ITEMDATA.itempictureid gt '0'}<img src="http://schattenjaeger.ath.cx:20000/phpmediadb-cvs/_layout/images/phpmediadb.jpg" align="right"/>{/if}
<h1>{$ITEMDATA.itemtitle|default:$I18N.NOT_SET|default:"%NOT_SET%"} {if $ITEMDATA.itemreleasedate neq ''}[{$ITEMDATA.itemreleasedate}]{/if} </h1>
{if $ITEMDATA.itemoriginaltitle neq ''}<h2>{$ITEMDATA.itemoriginaltitle}</h2>{/if}
{counter assign=COUNTER_CATEGORY start=0 print=0}
{$I18N.MEDIA_PRINT_ITEM_CATEGORY|default:"%MEDIA_AUDIO_ITEM_CATEGORY%"}:<br />
{foreach from=$ITEMDATA.__special.categories item=currentDataItem}{if $COUNTER_CATEGORY gt '0'}; {/if}{$currentDataItem.categoryname}{counter print=0}{/foreach}{if $COUNTER_CATEGORY eq '0'}{$I18N.NOT_SET|default:"%NOT_SET%"}{/if}

<table>
	<tr>
		<th>{$I18N.MEDIA_PRINT_ITEM_MEDIANAME|default:"%MEDIA_AUDIO_ITEM_MEDIANAME%"}</th>
		<td>{$ITEMDATA.itemmedianame|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
	</tr>

	<tr>
		<th>{$I18N.MEDIA_PRINT_ITEM_IDENTIFICATION|default:"%MEDIA_AUDIO_ITEM_IDENTIFICATION%"}</th>
		<td>{$ITEMDATA.itemidentifier|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
	</tr>
	
	<tr>
		<th>{$I18N.MEDIA_PRINT_ITEM_MEDIASIZE|default:"%MEDIA_AUDIO_ITEM_MEDIASIZE%"}</th>
		<td>{$ITEMDATA.itemmediasize|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
	</tr>
	
	<tr>
		<th>{$I18N.MEDIA_PRINT_ITEM_FORMAT|default:"%MEDIA_AUDIO_ITEM_FORMAT%"}</th>
		<td>{$ITEMDATA.itemtitle|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
	</tr>
	
	<tr>
		<th>{$I18N.MEDIA_PRINT_ITEM_RELEASEYEAR|default:"%MEDIA_AUDIO_ITEM_RELEASEYEAR%"}</th>
		<td>{$ITEMDATA.mediaformatid|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
	</tr>
	
	<tr>
		<th>{$I18N.MEDIA_PRINT_ITEM_PUBLISHER|default:"%MEDIA_AUDIO_ITEM_PUBLISHER%"}</th>
		<td>{$ITEMDATA.itempublisher|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
	</tr>
	
	<tr>
		<th>{$I18N.MEDIA_PRINT_ITEM_AGERESTRICTION|default:"%MEDIA_AUDIO_ITEM_AGERESTRICTION%"}</th>
		<td>{$ITEMDATA.mediaagerestrictionid|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
	</tr>
	
	<tr>
		<th>{$I18N.MEDIA_PRINT_ITEM_CODEC|default:"%MEDIA_AUDIO_ITEM_CODEC%"}</th>
		<td>{$ITEMDATA.mediacodecid|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
	</tr>
	
	<tr>
		<th>{$I18N.MEDIA_PRINT_ITEM_QUANTITY|default:"%MEDIA_AUDIO_ITEM_QUANTITY%"}</th>
		<td>{$ITEMDATA.itemquantity|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
	</tr>
	
		<tr>
		<th>{$I18N.MEDIA_PRINT_ITEM_COMMENT|default:"%MEDIA_AUDIO_ITEM_COMMENT%"}</th>
		<td>{$ITEMDATA.itemcomment|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
	</tr>
	
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	
	<tr>
		<td colspan="2">
			{if $ITEMDATA.itemcreationdate gt '0'}{$I18N.MEDIA_CREATIONDATE|default:"%MEDIA_CREATIONDATE%"}: {$ITEMDATA.itemcreationdate|date_format:"%A, %B %e, %Y %H:%M:%S"|default:$I18N.NOT_SET|default:"%NOT_SET%"} <br />{/if}
			{if $ITEMDATA.itemmodificationdate gt '0'}{$I18N.MEDIA_MODIFICATIONDATE|default:"%MEDIA_MODIFICATIONDATE%"}: {$ITEMDATA.itemmodificationdate|date_format:"%A, %B %e, %Y %H:%M:%S"|default:$I18N.NOT_SET|default:"%NOT_SET%"}{/if}

		</td>
	</tr>
</table>


</div>