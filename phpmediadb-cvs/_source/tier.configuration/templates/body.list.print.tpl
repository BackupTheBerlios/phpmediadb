<div id="phpmediadb-body-list-print" class="phpmediadb-body-list">
	<table width="100%" border="0">
		<tr>
			<th>{$I18N.LIST_COLUMN_PRINT_MEDIATITLE|default:"%LIST_COLUMN_PRINT_MEDIATITLE%"}</th>
			<th>{$I18N.LIST_COLUMN_PRINT_RELEASEDATE|default:"%LIST_COLUMN_PRINT_RELEASEDATE%"}</th>
			<th></th>
		</tr>
{foreach from=$ITEMDATA item=currentDataItem}
		<tr>
			<td><a href="item-details.php?itemid={$currentDataItem.itemid}">{$currentDataItem.itemtitle}</a></td>
			<td>{$currentDataItem.itemreleasedate|default:$I18N.NOT_SET|default:"%NOT_SET%"}</td>
			<td>
				<a href="admin/item-mod.php?itemid={$currentDataItem.itemid}"><img src="{$CONFIGURATION.ROOTPATH}_layout/images/icons/action-modify.png" alt="{$I18N.ACTION_MODIFY|default:"%ACTION_MODIFY%"}" /></a>
				<a href="admin/item-del.php?itemid={$currentDataItem.itemid}"><img src="{$CONFIGURATION.ROOTPATH}_layout/images/icons/action-remove.png" alt="{$I18N.ACTION_DELETE|default:"%ACTION_DELETE%"}" /></a>
			</td>
		</tr>
{/foreach}
	</table>
</div>
