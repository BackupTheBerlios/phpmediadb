<form method="post">
<div>
<h1>{$I18N.MEDIA_DATA_PRINT|default:"%MEDIA_DATA_PRINT%"}</h1>
{if $INPUTERROR.general eq "1"}<span class="phpmediadb-body-inputerror">{$I18N.ERROR_OCCURRED|default:"%ERROR_OCCURRED%"} <a href="#errorlist">{$I18N.ERROR_LISTLINK|default:"%ERROR_LISTLINK%"}</a></span><br />{/if}
<table>
	<colgroup>
		<col/>
	</colgroup>
	<tr>
		<td>{$I18N.MEDIA_TITLE|default:"%MEDIA_TITLE%"}</td>
		<td>
			<input type="text" name="itemdata[ItemTitle]" maxlength="{$INPUTSIZE.ItemTitle|default:"255"}" value="{$ITEMDATA.ItemTitle}" />
			{if $INPUTERROR.flag.ItemTitle eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_ORIGINALTITLE|default:"%MEDIA_ORIGINALTITLE%"}</td>
		<td>
			<input type="text" name="itemdata[ItemOriginalTitle]" maxlength="{$INPUTSIZE.ItemOriginalTitle|default:"255"}" value="{$ITEMDATA.ItemOriginalTitle}" />
			{if $INPUTERROR.flag.ItemOriginalTitle eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_MEDIANAME|default:"%MEDIA_MEDIANAME%"}</td>
		<td>
			<input type="text" name="itemdata[ItemMediaName]" maxlength="{$INPUTSIZE.ItemMediaName|default:"255"}" value="{$ITEMDATA.ItemMediaName}" />
			{if $INPUTERROR.flag.ItemMediaName eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>
	
	<tr>
		<td>{$I18N.MEDIA_IDENTIFICATION|default:"%MEDIA_IDENTIFICATION%"}</td>
		<td>
			<input type="text" name="itemdata[ItemIdentification]" maxlength="{$INPUTSIZE.ItemIdentification|default:"255"}" value="{$ITEMDATA.ItemIdentification}" />
			{if $INPUTERROR.flag.ItemIdentification eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_RELEASEYEAR|default:"%MEDIA_RELEASEYEAR%"}</td>
		<td>
			<input type="text" name="itemdata[ItemRelease]" maxlength="{$INPUTSIZE.ItemRelease|default:"4"}" value="{$ITEMDATA.ItemRelease}" />
			{if $INPUTERROR.flag.ItemRelease eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>
	
	<tr>
		<td>{$I18N.MEDIA_CATEGORY|default:"%MEDIA_CATEGORY%"}</td>
		<td>
			<select name="itemdata[Categories][]" size="5" multiple="true">
{foreach from=$DATA.CATEGORIES item=currentDataItem}
{assign var="TEMP" value="0"}
	{foreach from=$ITEMDATA.Categories item=currentItemItem}
			{if $currentItemItem eq $currentDataItem.categoryid }
				{assign var="TEMP" value="1"}
				<option selected="true" value="{$currentDataItem.categoryid}">{$currentDataItem.categoryname}</option>
			{/if}
	{/foreach}
			{if $TEMP eq "0" }
				<option value="{$currentDataItem.categoryid}">{$currentDataItem.categoryname}</option>
			{/if}
{/foreach}
			</select>
			{if $INPUTERROR.flag.Categories eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>
	
	<tr>
		<td>{$I18N.MEDIA_MEDIASIZE|default:"%MEDIA_MEDIASIZE%"}</td>
		<td>
			<input type="text" name="itemdata[ItemMediaSize]" maxlength="{$INPUTSIZE.ItemMediaSize|default:"255"}" value="{$ITEMDATA.ItemMediaSize}" />
			{if $INPUTERROR.flag.ItemMediaSize eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>
	
	<tr>
		<td>{$I18N.MEDIA_FORMAT|default:"%MEDIA_FORMAT%"}</td>
		<td>
			<select name="itemdata[MediaFormatID]">
{foreach from=$DATA.MEDIAFORMATS item=currentDataItem key=currentDataKey}
	{if $currentDataItem.mediaformatid eq $ITEMDATA.MediaFormatID }
				<option selected="true" value="{$currentDataItem.mediaformatid}">{$currentDataItem.mediaformatname}</option>
	{else}
				<option value="{$currentDataItem.mediaformatid}">{$currentDataItem.mediaformatname}</option>
	{/if}
{/foreach}
			</select>
			{if $INPUTERROR.flag.MediaFormatID eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_IMAGE|default:"%MEDIA_IMAGE%"}</td>
		<td>
			<img src="getbinary.php?itemid={$ITEMDATA.ID}" /><br />
			<input type="file" name="itemdata[BinaryData]" />
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_PUBLISHER|default:"%MEDIA_PUBLISHER%"}</td>
		<td>
			<input type="text" name="itemdata[PublisherName]" maxlength="{$INPUTSIZE.PublisherName|default:"255"}" value="{$ITEMDATA.PublisherName}" />
			{if $INPUTERROR.flag.PublisherName eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AGERESTRICTION|default:"%MEDIA_AGERESTRICTION%"}</td>
		<td>
			<select name="itemdata[MediaAgeRestrictionID]">
{foreach from=$DATA.AGERESTRICTIONS item=currentDataItem}
	{if $currentDataItem.mediaagerestrictionid eq $ITEMDATA.MediaAgeRestrictionID }
				<option selected="true" value="{$currentDataItem.mediaagerestrictionid}">{$currentDataItem.mediaagerestriction}</option>
	{else}
				<option value="{$currentDataItem.mediaagerestrictionid}">{$currentDataItem.mediaagerestriction}</option>
	{/if}
{/foreach}
			</select>
			{if $INPUTERROR.flag.MediaAgeRestrictionID eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_CODEC|default:"%MEDIA_CODEC%"}</td>
		<td>
			<select name="itemdata[MediaCodecID]">
{foreach from=$DATA.CODECS item=currentDataItem}
	{if $currentDataItem.mediacodecid eq $ITEMDATA.MediaCodecID }
				<option selected="true" value="{$currentDataItem.mediacodecid}">{$currentDataItem.mediacodecname}</option>
	{else}
				<option value="{$currentDataItem.mediacodecid}">{$currentDataItem.mediacodecname}</option>
	{/if}
{/foreach}
			</select>
			{if $INPUTERROR.flag.MediaCodecID eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_QUANTITY|default:"%MEDIA_QUANTITY%"}</td>
		<td>
			<input type="text" name="itemdata[ItemQuantity]" maxlength="{$INPUTSIZE.ItemQuantity|default:"255"}" value="{$ITEMDATA.ItemQuantity}" />
			{if $INPUTERROR.flag.ItemQuantity eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>
	
	<tr>
		<td></td>
		<td><input type="reset" value="{$I18N.FORM_RESET|default:"%FORM_RESET%"}" /> <input type="submit" name="buttonsave" value="{$I18N.FORM_SUBMIT|default:"%FORM_SUBMIT%"}"/></td>
	</tr>
	
	<tr>
		<td></td>
	</tr>
	
	<tr>
		<td></td>
		<td>
			{$I18N.MEDIA_CREATIONDATE|default:"%MEDIA_CREATIONDATE%"}: {$ITEMDATA.ItemCreationDate|date_format:"%A, %B %e, %Y %H:%M:%S"|default:$I18N.NOT_SET|default:"%NOT_SET%"} <br />
			{$I18N.MEDIA_CREATIONDATE|default:"%MEDIA_MODIFICATIONDATE%"}: {$ITEMDATA.ItemModificationDate|date_format:"%A, %B %e, %Y %H:%M:%S"|default:$I18N.NOT_SET|default:"%NOT_SET%"}
		</td>
	</tr>
	
{if $INPUTERROR.general eq "1"}
	<tr>
		<td colspan="2">
		<a name="errorlist"><h2 class="phpmediadb-body-inputerror">{$I18N.ERROR_TITLE|default:"%ERROR_TITLE%"}</h2></a>
		 <ul>
 	{foreach from=$INPUTERROR.message item=curr_id key=curr_key}
		{if $curr_id.size  eq "1"}<li class="phpmediadb-body-inputerror">{$I18N.INPUT_FIELD} {$curr_key}: {$I18N.ERROR_INPUTSIZE|default:"%ERROR_INPUTSIZE%"}</li>{/if}
		{if $curr_id.regex eq "1"}<li class="phpmediadb-body-inputerror">{$I18N.INPUT_FIELD} {$curr_key}: {$I18N.ERROR_INPUTREGEX|default:"%ERROR_INPUTREGEX%"}</li>{/if}
{/foreach}
		 </ul>
		</td>
	</tr>
{/if}

</table>
</div>
</form>