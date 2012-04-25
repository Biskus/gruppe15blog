<?php /* Smarty version Smarty-3.0.6, created on 2012-04-23 23:28:12
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:319294f57feee603549-88405124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1335222944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319294f57feee603549-88405124',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo '<?xml';?> version="1.0"<?php echo '?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 	<head>
    	<title> <?php echo $_smarty_tpl->getVariable('sideNavn')->value;?>
 </title>
    	<script type="text/javascript" src="js/EventHelpers.js">
		</script>
		<script type="text/javascript" src="js/cssQuery-p.js">
		</script>
		<script type="text/javascript" src="js/jcoglan.com/sylvester.js">
		</script>
		<script type="text/javascript" src="js/cssSandpaper.js">
		</script>
		<script src="http://www.google.com/jsapi"></script>	
		<script type="text/javascript">
		google.load("jquery", "1.4.2");
		</script>
		<script type="text/javascript" src="js/myFunctions.js">
		</script>
		<link rel="stylesheet" type="text/css" href="css/mystyle.css" />
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	</head>
	
	<body>
		
		<div id="overskrift">
			<h1>Kjartan's HjemmeBloggSide!</h1> <h6>0.1</h6>
		</div>
		<div id="hovedblokk">
			<?php $_template = new Smarty_Internal_Template('meny.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
			<div id="content">