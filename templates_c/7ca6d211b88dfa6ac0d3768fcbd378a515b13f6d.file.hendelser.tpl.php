<?php /* Smarty version Smarty-3.0.6, created on 2012-04-25 18:57:04
         compiled from ".\templates\hendelser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188914f9849003a0291-98590534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ca6d211b88dfa6ac0d3768fcbd378a515b13f6d' => 
    array (
      0 => '.\\templates\\hendelser.tpl',
      1 => 1335380216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188914f9849003a0291-98590534',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_counter')) include 'C:\Users\kjartan\git\gruppe15blog3\libs\plugins\function.counter.php';
?><div id="innleggListe">
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
		<div class="kommentarer">
			<?php  $_smarty_tpl->tpl_vars['kommentar'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inn')->value->hentKommentarer(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['kommentar']->key => $_smarty_tpl->tpl_vars['kommentar']->value){
?>
			<div id="<?php echo smarty_function_counter(array(),$_smarty_tpl);?>
">
				<div class="kommentar_Brukernavn">
					<?php echo $_smarty_tpl->tpl_vars['kommentar']->value['brukernavn'];?>

				</div>
				<div class="kommeentar_teks">
					<?php echo $_smarty_tpl->tpl_vars['kommentar']->value['tekst'];?>

				</div>
				<div class="kommentar_dato>
					<?php echo $_smarty_tpl->tpl_vars['kommentar']->value['dato'];?>

				</div>
				<div class="kommentar_id">
					<?php echo $_smarty_tpl->tpl_vars['kommentar']->value['id'];?>

				</div>
			</div>			
			<?php }} ?>
		</div>
	</div>
	<?php }} ?>
</div>