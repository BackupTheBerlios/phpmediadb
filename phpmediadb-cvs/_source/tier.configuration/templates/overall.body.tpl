<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>phpMedaDB :: {$DOCUMENT.TITLE|default:$I18N.PROJECT_SUBTITLE|default:"%PROJECT_SUBTITLE%"}</title>
	<link rel="StyleSheet"  href="{$CONFIGURATION.ROOTPATH}_layout/stylesheet/default.css" type="text/css" />
	<link rel="icon" href="{$CONFIGURATION.ROOTPATH}_layout/images/icons/favicon.png" />
	{$DOCUMENT.HTML.HEADER}
</head>

<body>
<!-- PHPMEDIADB-HEADER BEGIN -->
	<div id="phpmediadb-header">{include file="overall.header.tpl"}</div>
<!-- PHPMEDIADB-HEADER END -->

<!-- PHPMEDIADB-MENU BEGIN -->
	<div id="phpmediadb-menu">{include file="overall.menu.tpl"}</div>
<!-- PHPMEDIADB-MENU END -->

<!-- PHPMEDIADB-BODY BEGIN -->
	<div id="phpmediadb-body">{$DOCUMENT.BODY}</div>
<!-- PHPMEDIADB-BODY END -->

<!-- PHPMEDIADB-FOOTER BEGIN -->
	<div id="phpmediadb-footer">{include file="overall.footer.tpl"}</div>
<!-- PHPMEDIADB-FOOTER END -->

</body>

</html> 
