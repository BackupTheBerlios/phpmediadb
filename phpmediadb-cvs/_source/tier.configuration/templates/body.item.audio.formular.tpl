<form method="post">
<div>
<h1>{$I18N.MEDIA_DATA_AUDIO|default:"%MEDIA_DATA_AUDIO%"}</h1>
{if $INPUTERROR.general eq "1"}<span class="phpmediadb-body-inputerror">{$I18N.ERROR_OCCURRED|default:"%ERROR_OCCURRED%"} <a href="#errorlist">{$I18N.ERROR_LISTLINK|default:"%ERROR_LISTLINK%"}</a></span><br />{/if}
<table>
	<colgroup>
		<col/>
	</colgroup>
	<tr>
		<td>{$I18N.MEDIA_AUDIO_TITLE|default:"%MEDIA_AUDIO_TITLE%"}</td>
		<td>
			<input type="text" name="itemdata[itemtitle]" maxlength="{$INPUTSIZE.itemtitle|default:"255"}" value="{$ITEMDATA.itemtitle}" />
			{if $INPUTERROR.flag.itemtitle eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_ORIGINALTITLE|default:"%MEDIA_AUDIO_ORIGINALTITLE%"}</td>
		<td>
			<input type="text" name="itemdata[itemoriginaltitle]" maxlength="{$INPUTSIZE.itemoriginaltitle|default:"255"}" value="{$ITEMDATA.itemoriginaltitle}" />
			{if $INPUTERROR.flag.itemoriginaltitle eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_MEDIANAME|default:"%MEDIA_AUDIO_MEDIANAME%"}</td>
		<td>
			<input type="text" name="itemdata[itemmedianame]" maxlength="{$INPUTSIZE.itemmedianame|default:"255"}" value="{$ITEMDATA.itemmedianame}" />
			{if $INPUTERROR.flag.itemmedianame eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_IDENTIFICATION|default:"%MEDIA_AUDIO_IDENTIFICATION%"}</td>
		<td>
			<input type="text" name="itemdata[itemidentifier]" maxlength="{$INPUTSIZE.itemidentifier|default:"255"}" value="{$ITEMDATA.itemidentifier}" />
			{if $INPUTERROR.flag.itemidentifier eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_RELEASEYEAR|default:"%MEDIA_AUDIO_RELEASEYEAR%"}</td>
		<td>
			<input type="text" name="itemdata[itemreleasedate]" maxlength="{$INPUTSIZE.itemreleasedate|default:"4"}" value="{$ITEMDATA.itemreleasedate}" />
			{if $INPUTERROR.flag.itemreleasedate eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_CATEGORY|default:"%MEDIA_AUDIO_CATEGORY%"}</td>
		<td>
			<select name="itemdata[categories][]" size="5" multiple="true">
{foreach from=$DATA.CATEGORIES item=currentDataItem}
{assign var="TEMP" value="0"}
	{foreach from=$ITEMDATA.categories item=currentItemItem}
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
			{if $INPUTERROR.flag.categories eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_MEDIASIZE|default:"%MEDIA_AUDIO_MEDIASIZE%"}</td>
		<td>
			<input type="text" name="itemdata[itemmediasize]" maxlength="{$INPUTSIZE.itemmediasize|default:"255"}" value="{$ITEMDATA.itemmediasize}" />
			{if $INPUTERROR.flag.itemmediasize eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_FORMAT|default:"%MEDIA_AUDIO_FORMAT%"}</td>
		<td>
			<select name="itemdata[mediaformatid]">
				<option value="0">{$I18N.OPTION_EMPTY|default:"%OPTION_EMPTY%"}</option>
{foreach from=$DATA.MEDIAFORMATS item=currentDataItem key=currentDataKey}
	{if $currentDataItem.mediaformatid eq $ITEMDATA.mediaformatid }
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
		<td>{$I18N.MEDIA_AUDIO_IMAGE|default:"%MEDIA_AUDIO_IMAGE%"}</td>
		<td>
			<img src="getbinary.php?itemid={$ITEMDATA.ID}" /><br />
			<input type="file" name="itemdata[binarydata]" />
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_PUBLISHER|default:"%MEDIA_AUDIO_PUBLISHER%"}</td>
		<td>
			<input type="text" name="itemdata[itempublisher]" maxlength="{$INPUTSIZE.itempublisher|default:"255"}" value="{$ITEMDATA.itempublisher}" />
			{if $INPUTERROR.flag.itempublisher eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_AGERESTRICTION|default:"%MEDIA_AUDIO_AGERESTRICTION%"}</td>
		<td>
			<select name="itemdata[mediaagerestrictionid]">
				<option value="0">{$I18N.OPTION_EMPTY|default:"%OPTION_EMPTY%"}</option>
{foreach from=$DATA.AGERESTRICTIONS item=currentDataItem}
	{if $currentDataItem.mediaagerestrictionid eq $ITEMDATA.mediaagerestrictionid }
				<option selected="true" value="{$currentDataItem.mediaagerestrictionid}">{$currentDataItem.mediaagerestriction}</option>
	{else}
				<option value="{$currentDataItem.mediaagerestrictionid}">{$currentDataItem.mediaagerestriction}</option>
	{/if}
{/foreach}
			</select>
			{if $INPUTERROR.flag.mediaagerestrictionid eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_CODEC|default:"%MEDIA_AUDIO_CODEC%"}</td>
		<td>
			<select name="itemdata[mediacodecid]">
				<option value="0">{$I18N.OPTION_EMPTY|default:"%OPTION_EMPTY%"}</option>
{foreach from=$DATA.CODECS item=currentDataItem}
	{if $currentDataItem.mediacodecid eq $ITEMDATA.mediacodecid }
				<option selected="true" value="{$currentDataItem.mediacodecid}">{$currentDataItem.mediacodecname}</option>
	{else}
				<option value="{$currentDataItem.mediacodecid}">{$currentDataItem.mediacodecname}</option>
	{/if}
{/foreach}
			</select>
			{if $INPUTERROR.flag.mediacodecid eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_QUANTITY|default:"%MEDIA_AUDIO_QUANTITY%"}</td>
		<td>
			<input type="text" name="itemdata[itemquantity]" maxlength="{$INPUTSIZE.itemquantity|default:"255"}" value="{$ITEMDATA.itemquantity}" />
			{if $INPUTERROR.flag.itemquantity eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AUDIO_COMMENT|default:"%MEDIA_AUDIO_COMMENT%"}</td>
		<td>
			<textarea name="itemdata[itemcomment]" cols="40" rows="10">{$ITEMDATA.itemcomment}</textarea>
			{if $INPUTERROR.flag.itemcomment eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
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
			{$I18N.MEDIA_MODIFICATIONDATE|default:"%MEDIA_MODIFICATIONDATE%"}: {$ITEMDATA.ItemModificationDate|date_format:"%A, %B %e, %Y %H:%M:%S"|default:$I18N.NOT_SET|default:"%NOT_SET%"}
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