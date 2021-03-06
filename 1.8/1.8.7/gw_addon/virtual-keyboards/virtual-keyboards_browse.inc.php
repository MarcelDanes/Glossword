<?php
/**
 * Glossword - glossary compiler (http://glossword.info/)
 * � 2002-2008 Dmitry N. Shilnikov <dev at glossword dot info>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * (see `http://creativecommons.org/licenses/GPL/2.0/' for details)
 */
if (!defined('IN_GW'))
{
	die('<!-- $Id$ -->');
}
/* Included from $oAddonAdm->alpha(); */

/* */
$this->str .= $this->_get_nav();

/* */
$this->str .= '<table id="tbl-vkbd" class="tbl-browse" cellspacing="1" cellpadding="0" border="0" width="100%">';
$this->str .= '<thead><tr>';
$this->str .= '<th style="width:1%">N</th>';
$this->str .= '<th style="width:15%">' . $this->oL->m('1289') . '</th>';
$this->str .= '<th>' . $this->oL->m('1306') . '</th>';
$this->str .= '<th style="width:25%">' . $this->oL->m('action') . '</th>';
$this->str .= '</tr></thead>';

/* The list of keyboards */
$cnt_row = 1;
while (list($k, $arV) = each($this->ar_profiles))
{
	$arV['vkbd_letters'] = str_replace(',', ', ', $arV['vkbd_letters']);
	$bgcolor = $cnt_row % 2 ? $this->ar_theme['color_1'] : $this->ar_theme['color_2'];
	$this->str .= '<tr style="color:'.$this->ar_theme['color_5'].';background:'.$bgcolor.'">';
	$this->str .= '<td class="xt n" style="text-align:'.$this->sys['css_align_right'].'">' .  $cnt_row . '</td>';
	$this->str .= '<td class="xu gray">'. $this->oHtml->a( $this->sys['page_admin'] . '?'.GW_ACTION.'='.GW_A_EDIT.'&'.GW_TARGET.'='.$this->component.'&tid='.$arV['id_profile'], $arV['vkbd_name'] ) . '</td>';
	$this->str .= '<td class="xu gray">'. $this->oHtml->a( $this->sys['page_admin'] . '?'.GW_ACTION.'='.GW_A_EDIT.'&'.GW_TARGET.'='.$this->component.'&tid='.$arV['id_profile'], $arV['vkbd_letters'] ) . '</td>';
	$this->str .= '<td class="xt" style="text-align:center">[';
	$this->str .= $this->oHtml->a( $this->sys['page_admin'] . '?'.GW_ACTION.'='.GW_A_EDIT.'&'.GW_TARGET.'='.$this->component.'&tid='.$arV['id_profile'], $this->oL->m('3_edit') );
	$this->str .= '] [';
	$this->str .= $this->oHtml->a( $this->sys['page_admin'] . '?'.GW_ACTION.'='.GW_A_EDIT.'&'.GW_TARGET.'='.$this->component.'&remove=1&tid='.$arV['id_profile'], $this->oL->m('3_remove') );
	$this->str .= ']</td>';
	$this->str .= '</tr>';
	$cnt_row++;
}
$this->str .= '</tbody></table>';
$this->str .= '<br />';

?>