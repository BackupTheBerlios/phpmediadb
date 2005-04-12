<form action="item-del.php" method="post">
<input type="hidden" name="itemid" value="{$ITEMID|default:"NULL"}" />
<input type="hidden" name="redirect" value="{$REDIECT}" />
<div class="phpmediadb-body-itemdelete">
	{$I18N.QUESTION_ITEMDELETE|default:"%QUESTION_ITEMDELETE%"}<br />
	<input type="submit" name="BUTTON_DELETE" value="{$I18N.BUTTON_ITEMDELETE|default:"%BUTTON_ITEMDELETE%"}" />
	<input type="submit" name="BUTTON_ABORT" value="{$I18N.BUTTON_ABORT|default:"%BUTTON_ABORT%"}" />
</div>
</form>