<?php /* Smarty version 2.6.19, created on 2016-02-25 11:21:14
         compiled from gebo/quotecontractmission/contract-email-template.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut_t', 'gebo/quotecontractmission/contract-email-template.phtml', 74, false),array('modifier', 'truncate', 'gebo/quotecontractmission/contract-email-template.phtml', 78, false),array('modifier', 'count', 'gebo/quotecontractmission/contract-email-template.phtml', 157, false),)), $this); ?>
<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"></head>
	<body>
		<div style="min-height:100%;margin:0;padding:0;width:100%;background-color:#f5f5f5">
			<center>
				<table style="border-collapse:collapse;height:100%;margin:0;padding:0;width:100%;background-color:#f5f5f5" align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
					<tbody>
					<tr>
						<td style="height:100%;margin:0;padding:10px;width:100%;border-top:0" align="center" valign="top">	
							<table style="border-collapse:collapse;border:0;max-width:600px!important" border="0" cellpadding="0" cellspacing="0" width="100%">
								<tbody>
									<tr>
										<td style="background-color:#f5f5f5;border-top:0;border-bottom:0;padding-top:9px;padding-bottom:9px" valign="top">
											<table style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
													<tr>
														<td style="padding:9px 0px" valign="top">
															<table style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tbody>
																	<tr>
																		<td style="padding:0" valign="top">
																			<table style="border-collapse:collapse" align="left" border="0" cellpadding="0" cellspacing="0">
																				<tbody>
																					<tr>
																						<td valign="top">
																							<img src="http://admin-ep.edit-place.co.uk/BO/theme/gebo/css/images/workplace.png">
																						</td>
																					</tr>
																				</tbody>
																			</table>
																			<table style="border-collapse:collapse" align="right" border="0" cellpadding="0" cellspacing="0" width="396">
																				<tbody>
																					<tr>
																						<td style="font-size:20px;word-break:break-word;color:#454545;font-family:Helvetica;line-height:150%;text-align:right" valign="top">
																							Contract Release Form
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td style="background-color:#ffffff;border-top:0;border-bottom:0;padding-top:9px;padding-bottom:0" valign="top">
											<table style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
													<tr>
														<td style="padding:9px" valign="top">
															<table style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tbody>
																	<tr>
																		<td style="padding:0 9px" valign="top">
																			<table style="border-collapse:collapse" align="right" border="0" cellpadding="0" cellspacing="0">
																				<tbody>
																					<tr>
																						<td valign="top">
																							<img alt="" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['message']['client_id']; ?>
/<?php echo $this->_tpl_vars['message']['client_id']; ?>
_global.png?12345" style="max-width:75px;border:0;min-height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="CToWUd" width="75">
																						</td>
																					</tr>
																				</tbody>
																			</table>
																			<table style="border-collapse:collapse" align="left" border="0" cellpadding="0" cellspacing="0" width="400">
																				<tbody>
																					<tr>
																						<td style="word-break:break-word;color:#454545;font-family:Helvetica;font-size:24px;line-height:150%;text-align:left" valign="middle">
																							<span style="font-size:24px"><?php echo ((is_array($_tmp=$this->_tpl_vars['message']['contract_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['message']['currency']; ?>
;</span><br>
																						</td>
																						<td style="word-break:break-word;color:#454545;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left" valign="top">
																							<span style="font-size:14px"><?php echo $this->_tpl_vars['message']['company_name']; ?>
</span><br>
																							<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['message']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "") : smarty_modifier_truncate($_tmp, 20, "")); ?>
</strong>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table style="min-width:100%;border-collapse:collapse;table-layout:fixed!important" border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
													<tr>
														<td style="min-width:100%;padding:0px 18px 10px">
															<table style="min-width:100%;border-top-width:1px;border-top-style:solid;border-top-color:#eaeaea;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tbody>
																	<tr>
																		<td>
																			<span></span>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td valign="top">
											<table style="border-collapse:collapse;background-color:#ffffff;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
													<tr>
														<td valign="top">
															<table style="border-collapse:collapse;background-color:#ffffff;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0" align="right" border="0" cellpadding="0" cellspacing="0" width="400">
																<tbody>
																	<tr>
																		<td>
																			<table style="min-width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">
																				<tbody>
																					<tr>
																						<td valign="top">
																							<table style="min-width:100%;border-collapse:collapse" align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
																								<tbody>
																									<tr>
																										<td style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#454545;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left" valign="top">
																											<p style="margin:10px 0;padding:0;color:#454545;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left"><span style="font-size:14px"><span style="color:#000000"><span style="font-size:18px">Overview</span></span><br>
																											<?php echo $this->_tpl_vars['message']['comment']; ?>

																											</p>
																										</td>
																									</tr>
																								</tbody>
																							</table>																						
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
															<table style="border-collapse:collapse;background-color:#ffffff;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0" align="left" border="0" cellpadding="0" cellspacing="0" width="200">
																<tbody>
																	<tr>
																		<td valign="top">
																			<table style="min-width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">
																				<tbody>
																					<tr>
																						<td valign="top">																						
																							<table style="min-width:100%;border-collapse:collapse" align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
																								<tbody>
																									<tr>																								
																										<td style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#656565;font-family:Helvetica;font-size:12px;line-height:150%;text-align:left" valign="top">
																											<p style="line-height:20.8px;margin:10px 0;padding:0;color:#656565;font-family:Helvetica;font-size:12px;text-align:left"><span style="font-size:14px">Customer contact details</span><br>
																											<br>
																											<?php if (count($this->_tpl_vars['message']['contact_details']) > 0): ?>
																												<?php $_from = $this->_tpl_vars['message']['contact_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contact'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contact']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contact']):
        $this->_foreach['contact']['iteration']++;
?>	
																													<strong><span style="font-size:14px"><?php echo $this->_tpl_vars['contact']['first_name']; ?>
</span></strong><br>
																													<span style="line-height:20.8px"><?php echo $this->_tpl_vars['contact']['job_title']; ?>
&nbsp;</span></p>
																													<p style="line-height:20.8px;margin:10px 0;padding:0;color:#656565;font-family:Helvetica;font-size:12px;text-align:left"><span><a href="tel:<?php echo $this->_tpl_vars['contact']['office_phone']; ?>
" style="color:#00a2ff;font-weight:normal;text-decoration:underline" ><?php echo $this->_tpl_vars['contact']['office_phone']; ?>
</a></span></p>
																													<p style="line-height:20.8px;margin:10px 0;padding:0;color:#656565;font-family:Helvetica;font-size:12px;text-align:left"><span><a href="mailto:<?php echo $this->_tpl_vars['contact']['email']; ?>
" style="color:#00a2ff;font-weight:normal;text-decoration:underline" target="_blank"><?php echo $this->_tpl_vars['contact']['email']; ?>
</a></span></p>
																												<?php endforeach; endif; unset($_from); ?>		
																											<?php endif; ?>		
																										</td>
																									</tr>
																								</tbody>
																							</table>																						
																						</td>
																					</tr>
																				</tbody>
																			</table>
																			<table style="min-width:100%;border-collapse:collapse;table-layout:fixed!important" border="0" cellpadding="0" cellspacing="0" width="100%">
																				<tbody>
																					<tr>
																						<td style="min-width:100%;padding:5px 18px 10px">
																							<table style="min-width:100%;border-top-width:1px;border-top-style:solid;border-top-color:#eaeaea;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">
																								<tbody>
																									<tr>
																										<td>
																											<span></span>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																			<table style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">
																				<tbody>
																					<tr>
																						<td style="padding-top:9px;padding-right:18px;padding-bottom:9px;padding-left:18px" valign="top">
																							<table style="border-collapse:collapse" align="right" border="0" cellpadding="0" cellspacing="0" width="100%">
																								<tbody>
																									<tr>
																										<td style="padding-top:0px;padding-right:0px;padding-bottom:0;padding-left:0px" align="center" valign="top">
																											<a href="<?php echo $this->_tpl_vars['message']['download_po']; ?>
" target="_blank"> <img alt="" src="http://admin-ep.edit-place.co.uk/BO/theme/gebo/css/images/download-po.png" style="max-width:38px;border:0;min-height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="CToWUd" width="38"></a>
																										</td>
																									</tr>
																									<tr>
																										<td style="padding:9px 18px;color:#454545;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%" valign="top" width="146">
																											<a href="<?php echo $this->_tpl_vars['message']['download_po']; ?>
" style="color:#00a2ff;font-weight:normal;text-decoration:underline" target="_blank"><span style="color:#00a2ff">Download the PO</span></a>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>												
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td style="background-color:#fafafa;border-top:2px solid #eaeaea;border-bottom:0;padding-top:9px;padding-bottom:9px" valign="top">
											<table style="min-width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">    
												<tbody>
													<tr>
														<td valign="top">
															<table style="min-width:100%;border-collapse:collapse" align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tbody>
																	<tr>																
																		<td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px">
																			<table style="min-width:100%!important;border:3px solid #eeeeee;background-color:#ffffff;border-collapse:collapse" border="0" cellpadding="18" cellspacing="0" width="100%">
																				<tbody>
																					<tr>
																						<td style="color:#454545;font-family:Helvetica;font-size:14px;font-weight:normal;line-height:150%;text-align:left;word-break:break-word" valign="top">
																							<span style="color:#000000"><span style="font-size:20px">Mission list</span></span><br>
																							<br>
																							<?php if (count($this->_tpl_vars['message']['techMissiondetails']) > 0): ?>
																								<span style="color:#a9a9a9;line-height:20.8px">TECHNICAL <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['message']['tech_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp) : smarty_modifier_zero_cut_t($_tmp)); ?>
 &<?php echo $this->_tpl_vars['message']['currency']; ?>
;</strong></span><br style="line-height:20.8px">
																								<?php $_from = $this->_tpl_vars['message']['techMissiondetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tech_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tech_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tech_mission']):
        $this->_foreach['tech_mission']['iteration']++;
?>	
																									<span style="font-size:14px;line-height:20.8px"><strong><?php echo $this->_tpl_vars['tech_mission']['title']; ?>
</strong></span><br style="line-height:20.8px">
																								<?php endforeach; endif; unset($_from); ?>	
																							<?php endif; ?>
																							<br style="line-height:20.8px">
																							<?php if (count($this->_tpl_vars['message']['seoMissionDetails']) > 0): ?>
																								<span style="color:#a9a9a9;line-height:20.8px">CONTENT STRATEGIST <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['message']['seo_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp) : smarty_modifier_zero_cut_t($_tmp)); ?>
 &<?php echo $this->_tpl_vars['message']['currency']; ?>
;</strong></span><br style="line-height:20.8px">
																								<?php $_from = $this->_tpl_vars['message']['seoMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['seo_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['seo_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['seo_mission']):
        $this->_foreach['seo_mission']['iteration']++;
?>	
																									<span style="font-size:14px;line-height:20.8px"><strong><?php echo $this->_tpl_vars['seo_mission']['product_name']; ?>
 <?php echo $this->_tpl_vars['seo_mission']['language_source_name']; ?>
 website</strong></span><br>
																								<?php endforeach; endif; unset($_from); ?>	
																								<br>
																							<?php endif; ?>																							
																							<?php if (count($this->_tpl_vars['message']['missiondetails']) > 0): ?>
																								<span style="color:#a9a9a9">EDITORIAL <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['message']['editorial_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp) : smarty_modifier_zero_cut_t($_tmp)); ?>
 &<?php echo $this->_tpl_vars['message']['currency']; ?>
; </strong></span><br>
																								<?php $_from = $this->_tpl_vars['message']['missiondetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prod_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prod_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['prod_mission']):
        $this->_foreach['prod_mission']['iteration']++;
?>																							
																									<?php if ($this->_tpl_vars['prod_mission']['product'] == 'redaction'): ?>
																										<span style="font-size:14px"><strong> <?php echo $this->_tpl_vars['prod_mission']['product_type_converted']; ?>
 <?php echo $this->_tpl_vars['prod_mission']['product_type_name']; ?>
 in <?php echo $this->_tpl_vars['prod_mission']['language_source_converted']; ?>
 <?php echo $this->_tpl_vars['prod_mission']['product_type_other']; ?>
 - <?php echo $this->_tpl_vars['prod_mission']['volume']; ?>
 art. </strong></span><br>
																									<?php elseif ($this->_tpl_vars['prod_mission']['product'] == 'translation'): ?>
																										<span style="font-size:14px;line-height:20.8px"><strong><?php echo $this->_tpl_vars['prod_mission']['product_type_converted']; ?>
 <?php echo $this->_tpl_vars['prod_mission']['product_type_name']; ?>
 <?php echo $this->_tpl_vars['prod_mission']['language_source_converted']; ?>
 to <?php echo $this->_tpl_vars['prod_mission']['language_dest_converted']; ?>
 <?php echo $this->_tpl_vars['prod_mission']['product_type_other']; ?>
 - <?php echo $this->_tpl_vars['prod_mission']['volume']; ?>
 art.</strong></span><br style="line-height:20.8px">
																									<?php endif; ?>			
																									<span style="line-height:1.6em">
																									<?php if ($this->_tpl_vars['prod_mission']['oneshot'] == 'yes'): ?>
																										Oneshot - <?php echo $this->_tpl_vars['prod_mission']['mission_length']; ?>
 Jours
																									<?php elseif ($this->_tpl_vars['prod_mission']['oneshot'] == 'no'): ?>
																										<?php echo $this->_tpl_vars['prod_mission']['volume_max']; ?>
 (<?php echo $this->_tpl_vars['tempo_array'][$this->_tpl_vars['prod_mission']['tempo']]; ?>
) articles <?php echo $this->_tpl_vars['volume_option_array'][$this->_tpl_vars['prod_mission']['delivery_volume_option']]; ?>
  <?php echo $this->_tpl_vars['prod_mission']['tempo_length']; ?>
  <?php echo $this->_tpl_vars['tempo_duration_array'][$this->_tpl_vars['prod_mission']['tempo_length_option']]; ?>

																									<?php endif; ?>	
																									</span><br>
																									<br>
																								<?php endforeach; endif; unset($_from); ?>
																							<?php endif; ?>	
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table style="min-width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
													<tr>
														<td style="padding-top:0;padding-right:18px;padding-bottom:18px;padding-left:18px" align="center" valign="top">
															<table style="border-collapse:separate!important;border-radius:3px;background-color:#2baadf" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tbody>
																	<tr>
																		<td style="font-family:Arial;font-size:16px;padding:15px" align="center" valign="middle">
																			<a title="View contract" href="<?php echo $this->_tpl_vars['message']['link']; ?>
" style="font-weight:bold;letter-spacing:normal;line-height:100%;text-align:center;text-decoration:none;color:#ffffff;display:block" target="_blank">View contract</a>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
					</tbody>
				</table>
				<br><br><img alt="" src="http://admin-ep.edit-place.co.uk/BO/theme/gebo/css/images/edit-place.png" style="max-width:146px;border:0;min-height:auto;outline:none;text-decoration:none;vertical-align:bottom" class="CToWUd" width="132"><br><br><br>
			</center>
			<div class="yj6qo"></div><div class="adL"></div>
		</div>
	</body>
</html>