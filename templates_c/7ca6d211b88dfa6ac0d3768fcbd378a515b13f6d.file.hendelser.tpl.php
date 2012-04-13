<?php /* Smarty version Smarty-3.0.6, created on 2012-03-08 00:15:53
         compiled from ".\templates\hendelser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197064f57fa3917e651-00906760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ca6d211b88dfa6ac0d3768fcbd378a515b13f6d' => 
    array (
      0 => '.\\templates\\hendelser.tpl',
      1 => 1331165750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197064f57fa3917e651-00906760',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="innleggListe">
	<?php  $_smarty_tpl->tpl_vars['inn'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('innlegg')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['inn']->key => $_smarty_tpl->tpl_vars['inn']->value){
?>
	<div class="innlegg">	
		<h4><?php echo $_smarty_tpl->getVariable('inn')->value->hentTittel();?>
</h4>
		<p><?php echo $_smarty_tpl->getVariable('inn')->value->hentTekst();?>
<br /><span><?php echo $_smarty_tpl->getVariable('inn')->value->hentDato();?>
</span></p>
		<ul>
		<?php  $_smarty_tpl->tpl_vars['tagg'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inn')->value->hentTagger(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tagg']->key => $_smarty_tpl->tpl_vars['tagg']->value){
?>
			<li><?php echo $_smarty_tpl->tpl_vars['tagg']->value;?>
</li>
		<?php }} ?>
		</ul>
	</div>
	<?php }} ?>
</div>