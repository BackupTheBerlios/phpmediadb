<form method="post">
<div>
<h1>{$I18N.MEDIA_DATA|default:"%MEDIA_DATA%"}</h1>
{if $INPUTERROR.general eq "1"}<span class="phpmediadb-body-inputerror">{$I18N.ERROR_OCCURRED|default:"%ERROR_OCCURRED%"} <a href="#errorlist">{$I18N.ERROR_LISTLINK|default:"%ERROR_LISTLINK%"}</a></span><br />{/if}
<table>
	<colgroup>
		<col/>
	</colgroup>
	<tr>
		<td>{$I18N.MEDIA_TITLE|default:"%MEDIA_TITLE%"}</td>
		<td>
			<input type="text" name="itemdata[title]" maxlength="{$INPUTSIZE.title|default:"255"}" value="{$ITEMDATA.title}" />
			{if $INPUTERROR.flag.title eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_ORIGINALTITLE|default:"%MEDIA_ORIGINALTITLE%"}</td>
		<td>
			<input type="text" name="itemdata[originaltitle]" maxlength="{$INPUTSIZE.originaltitle|default:"255"}" value="{$ITEMDATA.originaltitle}" />
			{if $INPUTERROR.flag.originaltitle eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_MEDIANAME|default:"%MEDIA_MEDIANAME%"}</td>
		<td>
			<input type="text" name="itemdata[medianame]" maxlength="{$INPUTSIZE.medianame|default:"255"}" value="{$ITEMDATA.medianame}" />
			{if $INPUTERROR.flag.medianame eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>
	
	<tr>
		<td>{$I18N.MEDIA_IDENTIFICATION|default:"%MEDIA_IDENTIFICATION%"}</td>
		<td>
			<input type="text" name="itemdata[identification]" maxlength="{$INPUTSIZE.identification|default:"255"}" value="{$ITEMDATA.identification}" />
			{if $INPUTERROR.flag.identification eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_RELEASEYEAR|default:"%MEDIA_RELEASEYEAR%"}</td>
		<td>
			<input type="text" name="itemdata[releaseyear]" maxlength="{$INPUTSIZE.releaseyear|default:"4"}" value="{$ITEMDATA.releaseyear}" />
			{if $INPUTERROR.flag.releaseyear eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>
	
	<tr>
		<td>{$I18N.MEDIA_CATEGORY|default:"%MEDIA_CATEGORY%"}</td>
		<td>
			<select name="itemdata[category]" size="5" multiple="true">
{foreach from=$DATA.CATEGORIES item=currentDataItem key=currentDataKey}
{assign var="TEMP" value="0"}
	{foreach from=$ITEMDATA.CATEGORIES item=currentItemItem key=currentItemKey}
			{if $currentItemItem eq $currentDataKey }
				{assign var="TEMP" value="1"}
				<option selected="true" value="{$currentDataKey}">{$currentDataItem} {$foo}</option>
			{/if}
	{/foreach}
	{$TEMP}
			{if $TEMP eq "0" }
				<option value="{$currentDataKey}">{$currentDataItem} {$foo}</option>
			{/if}
{/foreach}
			</select>
		</td>
	</tr>
	
	<tr>
		<td>{$I18N.MEDIA_MEDIASIZE|default:"%MEDIA_MEDIASIZE%"}</td>
		<td>
			<input type="text" name="itemdata[mediasize_value]" maxlength="{$INPUTSIZE.mediasize_value|default:"255"}" value="{$ITEMDATA.mediasize_value}" />
			{if $INPUTERROR.flag.mediasize_value eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
			<select name="itemdata[mediasize_type]">
				<option selected="true" value=""></option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td>{$I18N.MEDIA_MEDIATYPE|default:"%MEDIA_MEDIATYPE%"}</td>
		<td>
			<select name="itemdata[mediatype]">
				<option selected="true" value=""></option>
			</select>
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_IMAGE|default:"%MEDIA_IMAGE%"}</td>
		<td>
			<img src="getbinary.php?itemid={$ITEMDATA.ID}" /><br />
			<input type="file" name="itemdata[image]" />
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_PUBLISHER|default:"%MEDIA_PUBLISHER%"}</td>
		<td>
			<input type="text" name="itemdata[publisher]" maxlength="{$INPUTSIZE.publisher|default:"255"}" value="{$ITEMDATA.PUBLISHER}" />
			{if $INPUTERROR.flag.publisher eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_AGERESTRICTION|default:"%MEDIA_AGERESTRICTION%"}</td>
		<td>
			<select name="itemdata[agerestriction]">
{foreach from=$DATA.AGERESTRICTIONS item=currentDataItem key=currentDataKey}
	{if $currentDataKey eq $ITEMDATA.AGERESTRICTION }
				<option selected="true" value="{$currentDataKey}">{$currentDataItem}</option>
	{else}
				<option value="{$currentDataKey}">{$currentDataItem}</option>
	{/if}
{/foreach}
			</select>
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_CODEC|default:"%MEDIA_CODEC%"}</td>
		<td>
			<select name="itemdata[codec]">
{foreach from=$DATA.CODECS item=currentDataItem key=currentDataKey}
	{if $currentDataKey eq $ITEMDATA.CODEC }
				<option selected="true" value="{$currentDataKey}">{$currentDataItem}</option>
	{else}
				<option value="{$currentDataKey}">{$currentDataItem}</option>
	{/if}
{/foreach}
			</select>
		</td>
	</tr>

	<tr>
		<td>{$I18N.MEDIA_QUANTITY|default:"%MEDIA_QUANTITY%"}</td>
		<td>
			<input type="text" name="itemdata[quantity]" maxlength="{$INPUTSIZE.quantity|default:"255"}" value="{$ITEMDATA.QUANTITY}" />
			{if $INPUTERROR.flag.quantity eq "1" }<span class="phpmediadb-body-inputerror">{$I18N.ERROR_FLAG|default:"*"}</span>{/if}
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
			{$I18N.MEDIA_CREATIONDATE|default:"%MEDIA_CREATIONDATE%"}: {$ITEMDATA.CREATIONDATE|date_format:"%A, %B %e, %Y %H:%M:%S"|default:$I18N.NOT_SET|default:"%NOT_SET%"} <br />
			{$I18N.MEDIA_CREATIONDATE|default:"%MEDIA_MODIFICATIONDATE%"}: {$ITEMDATA.MODIFICATIONDATE|date_format:"%A, %B %e, %Y %H:%M:%S"|default:$I18N.NOT_SET|default:"%NOT_SET%"}
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