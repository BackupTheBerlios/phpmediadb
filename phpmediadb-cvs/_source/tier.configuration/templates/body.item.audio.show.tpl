<div id="phpmediadb-body-details-audio" class="phpmediadb-body-details">
<span id="phpmediadb-body-details-modify"><a href="admin/item-mod.php?itemid={$ITEMDATA.itemid}"><img src="{$CONFIGURATION.ROOTPATH}_layout/images/icons/action-modify.png" alt="{$I18N.ACTION_MODIFY|default:"%ACTION_MODIFY%"}" /> {$I18N.ACTION_MODIFY|default:"%ACTION_MODIFY%"}</a></span>
<span id="phpmediadb-body-details-delete"><a href="admin/item-del.php?itemid={$ITEMDATA.itemid}"><img src="{$CONFIGURATION.ROOTPATH}_layout/images/icons/action-remove.png" alt="{$I18N.ACTION_DELETE|default:"%ACTION_DELETE%"}" /> {$I18N.ACTION_DELETE|default:"%ACTION_DELETE%"}</a></span>
<br />
{if $ITEMDATA.itempictureurl neq ''}<img src="{$ITEMDATA.itempictureurl}" align="right" alt="{$ITEMDATA.itemtitle}" />{/if}

<h1>{$ITEMDATA.itemtitle|default:$I18N.NOT_SET|default:"%NOT_SET%"} {if $ITEMDATA.itemreleasedate neq ''}[{$ITEMDATA.itemreleasedate}]{/if} </h1>
{if $ITEMDATA.itemoriginaltitle neq ''}<h2>{$ITEMDATA.itemoriginaltitle}</h2>{/if}
{counter assign=COUNTER_CATEGORY start=0 print=0}
{$I18N.MEDIA_AUDIO_ITEM_CATEGORY|default:"%MEDIA_AUDIO_ITEM_CATEGORY%"}:
{foreach from=$ITEMDATA.__special.categories item=currentDataItem}{if $COUNTER_CATEGORY gt '0'}; {/if}{$currentDataItem.categoryname}{counter print=0}{/foreach}{if $COUNTER_CATEGORY eq '0'}{$I18N.NOT_SET|default:"%NOT_SET%"}{/if}

<table>
{if $ITEMDATA.itemmedianame neq ''}
	<tr>
		<th>{$I18N.MEDIA_AUDIO_ITEM_MEDIANAME|default:"%MEDIA_AUDIO_ITEM_MEDIANAME%"}</th>
		<td>{$ITEMDATA.itemmedianame}</td>
	</tr>
{/if}

{if $ITEMDATA.itemidentifier neq ''}
	<tr>
		<th>{$I18N.MEDIA_AUDIO_ITEM_IDENTIFICATION|default:"%MEDIA_AUDIO_ITEM_IDENTIFICATION%"}</th>
		<td>{$ITEMDATA.itemidentifier}</td>
	</tr>
{/if}

{if $ITEMDATA.itemmediasize neq ''}
	<tr>
		<th>{$I18N.MEDIA_AUDIO_ITEM_MEDIASIZE|default:"%MEDIA_AUDIO_ITEM_MEDIASIZE%"}</th>
		<td>{$ITEMDATA.itemmediasize}</td>
	</tr>
{/if}

{if $ITEMDATA.mediaformatid neq ''}
	<tr>
		<th>{$I18N.MEDIA_AUDIO_ITEM_FORMAT|default:"%MEDIA_AUDIO_ITEM_FORMAT%"}</th>
		<td>{$ITEMDATA.mediaformatid}</td>
	</tr>
{/if}

{if $ITEMDATA.itempublisher neq ''}
	<tr>
		<th>{$I18N.MEDIA_AUDIO_ITEM_PUBLISHER|default:"%MEDIA_AUDIO_ITEM_PUBLISHER%"}</th>
		<td>{$ITEMDATA.itempublisher}</td>
	</tr>
{/if}


{if $ITEMDATA.mediaagerestrictionid neq ''}
	<tr>
		<th>{$I18N.MEDIA_AUDIO_ITEM_AGERESTRICTION|default:"%MEDIA_AUDIO_ITEM_AGERESTRICTION%"}</th>
		<td>{$ITEMDATA.mediaagerestrictionid}</td>
	</tr>
{/if}


{if $ITEMDATA.mediacodecid neq ''}
	<tr>
		<th>{$I18N.MEDIA_AUDIO_ITEM_CODEC|default:"%MEDIA_AUDIO_ITEM_CODEC%"}</th>
		<td>{$ITEMDATA.mediacodecid}</td>
	</tr>
{/if}


{if $ITEMDATA.itemquantity neq ''}
	<tr>
		<th>{$I18N.MEDIA_AUDIO_ITEM_QUANTITY|default:"%MEDIA_AUDIO_ITEM_QUANTITY%"}</th>
		<td>{$ITEMDATA.itemquantity}</td>
	</tr>
{/if}


{if $ITEMDATA.itemcomment neq ''}
	<tr>
		<th>{$I18N.MEDIA_AUDIO_ITEM_COMMENT|default:"%MEDIA_AUDIO_ITEM_COMMENT%"}</th>
		<td>{$ITEMDATA.itemcomment|nl2br}</td>
	</tr>
{/if}


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