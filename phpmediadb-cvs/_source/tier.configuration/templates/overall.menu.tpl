<table>
	<tr><th class="phpmediadb-menu-title">{$I18N.MENU_TITLE|default:"%MENU_TITLE%"}</th></tr>
	<tr><td class="phpmediadb-menu-item" id="phpmediadb-menu-item-home">
		<a href="{$CONFIGURATION.ROOTPATH}index.php" onFocus="javascript:if(this.blur)this.blur()">
			<img src="{$CONFIGURATION.ROOTPATH}_layout/images/icons/nav-home.png" alt="{$I18N.MENU_HOME|default:"%MENU_HOME%"}" />
			{$I18N.MENU_HOME|default:"%MENU_HOME%"}
		</a>
	</td></tr>
	
	<tr><td class="phpmediadb-menu-item" id="phpmediadb-menu-item-list">
		<a href="{$CONFIGURATION.ROOTPATH}list.php" onFocus="javascript:if(this.blur)this.blur()">
			<img src="{$CONFIGURATION.ROOTPATH}_layout/images/icons/nav-list.png" alt="{$I18N.MENU_LIST|default:"%MENU_LIST%"}" />
			{$I18N.MENU_LIST|default:"%MENU_LIST%"}
		</a>
	</td></tr>
	
	<tr><td class="phpmediadb-menu-item" id="phpmediadb-menu-item-search">
		<a href="{$CONFIGURATION.ROOTPATH}search.php" onFocus="javascript:if(this.blur)this.blur()">
			<img src="{$CONFIGURATION.ROOTPATH}_layout/images/icons/nav-search.png" alt="{$I18N.MENU_SEARCH|default:"%MENU_SEARCH%"}" />
			{$I18N.MENU_SEARCH|default:"%MENU_SEARCH%"}
		</a>
	</td></tr>
	
	<tr><td class="phpmediadb-menu-item" id="phpmediadb-menu-item-about">
		<a href="{$CONFIGURATION.ROOTPATH}about.php" onFocus="javascript:if(this.blur)this.blur()">
			<img src="{$CONFIGURATION.ROOTPATH}_layout/images/icons/nav-about.png" alt="{$I18N.MENU_ABOUT|default:"%MENU_ABOUT%"}" />
			{$I18N.MENU_ABOUT|default:"%MENU_ABOUT%"}
		</a>
	</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><th class="phpmediadb-menu-title">{$I18N.MENU_ADMINISTRATION_TITLE|default:"%MENU_ADMINISTRATION_TITLE%"}</th></tr>
	<tr><td class="phpmediadb-menu-item" id="phpmediadb-menu-item-additem">
		<a href="{$CONFIGURATION.ROOTPATH}admin/item-add.php" onFocus="javascript:if(this.blur)this.blur()">
			<img src="{$CONFIGURATION.ROOTPATH}_layout/images/icons/nav-additem.png" alt="{$I18N.MENU_ADDITEM|default:"%MENU_ADDITEM%"}" />
			{$I18N.MENU_ADDITEM|default:"%MENU_ADDITEM%"}
		</a>
	</td></tr>
</table>