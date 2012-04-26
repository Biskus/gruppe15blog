<?php /* Smarty version Smarty-3.0.6, created on 2012-04-26 20:09:04
         compiled from ".\templates\nyttInnlegg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:294084f99ab60239b26-69153950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5170703c5f0f30cf80533a56313f469a2f836a4' => 
    array (
      0 => '.\\templates\\nyttInnlegg.tpl',
      1 => 1335470921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '294084f99ab60239b26-69153950',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_counter')) include 'C:\Users\kjartan\git\gruppe15blog3\libs\plugins\function.counter.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<form>
	Tittel: <br />
	<input type="tekst" id="ny_tittel" /><br />
	Tagger: <br />
	<div id="tagger">
	<?php  $_smarty_tpl->tpl_vars['tagg'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tagger')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tagg']->key => $_smarty_tpl->tpl_vars['tagg']->value){
?>
		<span>
		<input type="checkbox" id="tagger<?php echo smarty_function_counter(array(),$_smarty_tpl);?>
" class="tagger" value="<?php echo $_smarty_tpl->tpl_vars['tagg']->value;?>
" /><?php echo $_smarty_tpl->tpl_vars['tagg']->value;?>

		</span>
	<?php }} ?>
	</div>
	<input type="tekst" id="ny_tagg" /> <div id="leggTilTagg">Legg til tagg</div>
	Hovedtekst: <br />
	<textarea id="ny_tekst">
	</textarea><br />
	<input type="submit" id="ny_innlegg" " /> <span id="feedback"></span>
</form>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>