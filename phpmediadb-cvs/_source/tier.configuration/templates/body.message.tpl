<div class="phpmediadb-body-message">
{if $MESSAGE.TITLE neq ""}<h1>{$MESSAGE.TITLE}</h1>{/if}
	{$MESSAGE.BODY}
{if $MESSAGE.HYPERLINK_BACK neq ""}<br /><br /><a href="{$MESSAGE.HYPERLINK_BACK|default:"index.php"}">{$I18N.HYPERLINK_BACK|default:"%HYPERLINK_BACK%"}</a>{/if}
</div>