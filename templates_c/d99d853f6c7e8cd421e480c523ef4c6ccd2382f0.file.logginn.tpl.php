<?php /* Smarty version Smarty-3.0.6, created on 2012-04-26 20:10:30
         compiled from ".\templates\logginn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:229374f99abb6c18068-32284126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd99d853f6c7e8cd421e480c523ef4c6ccd2382f0' => 
    array (
      0 => '.\\templates\\logginn.tpl',
      1 => 1335404561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '229374f99abb6c18068-32284126',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div class="redTekst">
<p><?php echo (($tmp = @$_smarty_tpl->getVariable('respons')->value)===null||$tmp==='' ? 'Du må logge inn for å lage nye innlegg' : $tmp);?>
</p>
</div>

<div id="logginn">
	<form method="post">
		<table>
			<tr>
				<td>Brukernavn:</td>
				<td><input type="text" name="<?php echo post::username;?>
" id="brukernavn" /></td>
				
			</tr>
			<tr>
				<td>Passord:</td>
				<td><input type="password" name="<?php echo post::password;?>
" id="passord" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" id="loggInnKnapp" /></td>
		</table>
	</form>
</div>
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>