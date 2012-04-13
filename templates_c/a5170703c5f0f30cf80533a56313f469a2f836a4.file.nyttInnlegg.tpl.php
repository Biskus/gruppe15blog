<?php /* Smarty version Smarty-3.0.6, created on 2012-03-08 00:25:54
         compiled from ".\templates\nyttInnlegg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88754f57fc92587b20-96410327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5170703c5f0f30cf80533a56313f469a2f836a4' => 
    array (
      0 => '.\\templates\\nyttInnlegg.tpl',
      1 => 1331166238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88754f57fc92587b20-96410327',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<form>
	Tittel: <br />
	<input type="tekst" id="ny_tittel" /><br />
	Tagger: <br />
	<input type="text" id="ny_tagger"> Tagger Separeres med ,<br />
	Hovedtekst: <br />
	<textarea id="ny_tekst">
	</textarea><br />
	<input type="submit" id="ny_innlegg" " /> <span id="feedback"></span>
</form>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>