<?php /* Smarty version 2.6.19, created on 2016-01-08 12:21:43
         compiled from gebo/deliveryongoing/view-article.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/deliveryongoing/view-article.phtml', 36, false),array('modifier', 'utf8_encode', 'gebo/deliveryongoing/view-article.phtml', 36, false),array('modifier', 'date_format', 'gebo/deliveryongoing/view-article.phtml', 58, false),array('modifier', 'zero_cut', 'gebo/deliveryongoing/view-article.phtml', 303, false),array('modifier', 'count', 'gebo/deliveryongoing/view-article.phtml', 591, false),array('modifier', 'time_ago', 'gebo/deliveryongoing/view-article.phtml', 607, false),)), $this); ?>
<?php echo '
	<style>
		.w-box-content.cnt_a
		{
			min-height:auto;
		}
	</style>	
'; ?>

<?php $_from = $this->_tpl_vars['articleDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['articleDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['articleDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['articleDetails']['iteration']++;
?> 
<div class="row-fluid">
	<div class="span6" id="leftheight">
		<div class="span4">
			<div class="progress" style="margin-bottom:10px">
				<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
" aria-valuemin="0" aria-valuemax="100"
				<?php if ($this->_tpl_vars['article']['progressbar_percent'] == 0): ?> style="width: 100%;  background:#E3E5F4;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 15): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ff7200;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 30): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ffa200;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 45): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ffd21d;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 65): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; background:#f2f43c;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 85): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; background:#cbf43c;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 100): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%;  background:#3fe805;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 12): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ff7200;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 25): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ffa200;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 37): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ffc600;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 50): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; background:#ffd21d;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 62): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; background:#f2f43c;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 85): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#f2f43c;"
				<?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 97): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%;  background:#cbf43c;"
				<?php endif; ?> >
				</div>
			</div>
		</div>
		&nbsp;<?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%
		<div class="clear"></div>
		<div class="row-fluid viewart">
			<h3 style="float:left"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</h3>
			<?php if ($this->_tpl_vars['article']['status'] == 'refused'): ?> <label class="label label-important">closed</label>
						<?php elseif ($this->_tpl_vars['article']['writer_bid_details'] | @ count > 0 || $this->_tpl_vars['article']['corrector_bid_details'] | @ count > 0): ?>
                            <?php if ($this->_tpl_vars['article']['writer_bid_details'] | @ count > 0): ?>
                            <?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out'): ?>

                                <?php if (( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' && $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out' )): ?>
                                    <label class="label label-important">Non envoy&eacute; par le r&eacute;dacteur</label>
                                <?php else: ?>
                                    <a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">
                                            <?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out'): ?>
                                            EN COURS DE REDACTION <?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>
                                            <?php else: ?>
                                            non1 envoy&eacute;
                                            <?php endif; ?>
                                        </label></a>
                            <?php endif; ?>
                            <?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'plag_exec' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage0'): ?>
                            <a href="/proofread/stage-articles?submenuId=ML3-SL11&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">EN PHASE PLAGIAT</label></a>
                            <?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage1'): ?>
                            <a href="/proofread/stage-deliveries?submenuId=ML3-SL2"><label class="label label-info">EN RELECTURE PHASE 1</label></a>
                            <br>
                            <!--<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writer_bid_details'][0]['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>
-->
                            <?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'client'): ?>
                            <label class="label label-info">EN RELECTURE Client</label>
                            <br>
                            <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writer_bid_details'][0]['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>

                            <?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage2' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] != 'stage2'): ?>
                            <a href="/proofread/stage-deliveries?submenuId=ML3-SL3"><label class="label label-info">EN RELECTURE PHASE 2</label></a>
                            <br>
                            <!--<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writer_bid_details'][0]['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>
-->

                            <?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'published' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] != 'published'): ?>
                            <label class="label label-warning">VALID&Eacute;</label>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['article']['corrector_bid_details'] | @ count > 0): ?>
                            <?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' )): ?>

                            <?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'time_out' )): ?>
                            <label class="label label-important">Non envoy&eacute; par le correcteur</label>
                            <?php else: ?>
                            <a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">
                                    <?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid'): ?>
                                    EN COURS DE CORRECTION <?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>
                                    <?php else: ?>
                                    non envoy&eacute;
                                    <?php endif; ?>
                                </label></a><br>
											                            <?php endif; ?>
                            <?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved_temp' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'closed_temp' )): ?>
                            <a href="/correction/moderation?submenuId=ML3-SL10"><label class="label label-info">EN COURS DE MODERATION</label></a>
                            <br>
                            <?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'under_study' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] == 'stage2' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage2' )): ?>
                            <a href="/proofread/stage-deliveries?submenuId=ML3-SL3"><label class="label label-info">EN RELECTURE PHASE 2</label></a>
                            <br>
                            <!--<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['corrector_bid_details'][0]['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>
-->

                            <?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'under_study' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] == 'mission_test' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'mission_test' )): ?>
                            <a href="/ao/markstat?submenuId=ML2-SL3"><label class="label label-info">Statistiques de missions test</label></a>
                            <br>
                            <!--<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['corrector_bid_details'][0]['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>
-->
                            <?php elseif ($this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'published' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'published'): ?>
                            <label class="label label-warning">VALID&Eacute;</label>
                            <?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'closed' || $this->_tpl_vars['article']['bo_closed_status'] == 'closed'): ?>
                            <label class="label label-warning">article ferm&eacute;</label>
                            <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>

                            <?php if ($this->_tpl_vars['article']['bo_closed_status'] == 'closed' && ! $this->_tpl_vars['article']['writerParticipation']): ?>
                            <label class="label label-warning">article ferm&eacute;</label>
                            <?php elseif ($this->_tpl_vars['article']['participation_expires'] > time() || $this->_tpl_vars['article']['correction_participationexpires'] > time()): ?>
                            <?php if ($this->_tpl_vars['article']['participation_expires'] > time() && ! $this->_tpl_vars['article']['writerParticipation'] && $this->_tpl_vars['article']['publishtime'] > time()): ?>
                            <a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info hint--left  hint" data-hint="R&eacute;dacteur">PROGRAMM&Eacute;</label></a><br>
								                            <?php elseif ($this->_tpl_vars['article']['participation_expires'] > time() && ! $this->_tpl_vars['article']['writerParticipation']): ?>
                            <a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info hint--left  hint" data-hint="R&eacute;dacteur">PARTICIPATIONS EN COURS</label></a><br>
									                            <?php elseif ($this->_tpl_vars['article']['correction_participationexpires'] > time() && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && ! $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] && ! $this->_tpl_vars['article']['correctorParticipation']): ?>
                            <a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info hint--left  hint" data-hint="Correcteur">PARTICIPATIONS EN COURS</label></a><br>
									<span id="time_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['correction_participationexpires']; ?>
" class="alert alert-danger">
										<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['correction_participationexpires']; ?>
"></span>
									</span>
                            <?php endif; ?>
                            <?php elseif ($this->_tpl_vars['article']['participation_expires'] < time() && $this->_tpl_vars['article']['totalParticipations'] > 0 && ! $this->_tpl_vars['article']['writerParticipation']): ?>
                            <a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="R&eacute;dacteur">EN S&Eacute;LECTION DE PROFIL</span></a>
                            <?php elseif ($this->_tpl_vars['article']['correction_participationexpires'] < time() && $this->_tpl_vars['article']['totalCorrectionParticipations'] > 0 && ! $this->_tpl_vars['article']['correctorParticipation']): ?>
                            <a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="Correcteur">EN S&Eacute;LECTION DE PROFIL</span></a>
                            <?php endif; ?>
		</div>
		
		<div class="span12" style="border-top:1px solid #eee;border-bottom:1px solid #eee;margin-left:0">
		<div class="pull-left" style="margin:10px 0">
		<div class="btn-group">
		<?php if ($this->_tpl_vars['article']['writerParticipation']): ?>
			<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] != 'published' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] != 'closed' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] != 'stage2'): ?>
			<a data-toggle="modal" class="btn btn-inverse" onclick="return getCloseComment('<?php echo $this->_tpl_vars['article']['id']; ?>
',0)">Close</a>
			<?php endif; ?>
		<?php elseif ($this->_tpl_vars['article']['participation_expires'] < time()): ?>
			<a data-toggle="modal" onclick="closeArtprofile('<?php echo $this->_tpl_vars['article_id']; ?>
', 'no');"><button type="button" class="btn btn-inverse">Close</button></a>
		<?php endif; ?>
		
		
		<?php if ($this->_tpl_vars['article']['totalParticipations'] == '0' && $this->_tpl_vars['article']['participation_expires'] < time() && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_stage'] != 'stage0' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_stage'] != 'stage1' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_stage'] != 'stage2' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_stage'] != 'corrector' && $this->_tpl_vars['article']['missiontest'] != 'yes' && $this->_tpl_vars['article']['status'] != 'refused'): ?>
			<?php $this->assign('writer_republish', true); ?>
		<?php elseif ($this->_tpl_vars['article']['totalParticipations'] > 0 && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] != 'published' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_stage'] != 'stage0' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_stage'] != 'stage1' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_stage'] != 'stage2' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_stage'] != 'corrector' && $this->_tpl_vars['article']['participation_expires'] < time() && $this->_tpl_vars['article']['missiontest'] != 'yes' && $this->_tpl_vars['article']['status'] != 'refused'): ?>
			<?php $this->assign('writer_republish', true); ?>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['article']['totalCorrectionParticipations'] == '0' && $this->_tpl_vars['article']['correction'] == 'yes' && $this->_tpl_vars['article']['correction_participationexpires'] < time() && $this->_tpl_vars['article']['correction_participationexpires'] != 0 && $this->_tpl_vars['article']['writerParticipation'] && $this->_tpl_vars['article']['missiontest'] != 'yes' && $this->_tpl_vars['article']['status'] != 'refused'): ?>
			<?php $this->assign('corrector_republish', true); ?>
		<?php elseif ($this->_tpl_vars['article']['totalCorrectionParticipations'] > 0 && $this->_tpl_vars['article']['correction'] == 'yes' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] != 'published' && $this->_tpl_vars['article']['correction_participationexpires'] < time() && $this->_tpl_vars['article']['correction_participationexpires'] != 0 && $this->_tpl_vars['article']['missiontest'] != 'yes' && $this->_tpl_vars['article']['status'] != 'refused'): ?>
			<?php $this->assign('corrector_republish', true); ?>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['writer_republish'] || $this->_tpl_vars['corrector_republish']): ?>
		<div class="btn-group">
			<a class="dropdown-toggle btn btn-danger" data-toggle="dropdown" href="#" oldtitle="Options" title="" aria-describedby="ui-tooltip-3">
			Republish
			<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
			<?php if ($this->_tpl_vars['writer_republish']): ?>
			<li>
				<a class="" name="closerepublish" href="/article-republish/republishpopup?artId=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-target="#republish" data-toggle="modal">Writer Republish</a>
			</li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['corrector_republish']): ?>
			<li>
				<a class="" name="closerepublish" href="/article-republish/republishcorrectorpopup?close=yes&amp;artId=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-target="#republish" data-toggle="modal">Corrector Republish</a>
			</li>	
			<?php endif; ?>
		</div>
		<?php endif; ?>
		
		
		<a class="btn btn-info editable editable-click" href="/deliveryongoing/edit-article?article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-toggle="modal" role="button" data-target="#edit_article_modal" id="edit_article">
			<span style="vertical-align: text-bottom;">Edit</span>
		</a>
		
		<?php if ($this->_tpl_vars['article']['writerParticipation']): ?>
			<?php if ($this->_tpl_vars['article']['bo_closed_status'] != 'closed' && $this->_tpl_vars['article']['writer_bid_details'][0]['status'] != 'bid'): ?>
				<?php $this->assign('writer_download', true); ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['article']['expiredWriterParticipation']): ?>
				<?php $this->assign('writer_moretime', true); ?>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['article']['correctorParticipation']): ?>
			<?php if ($this->_tpl_vars['article']['corrector_artproc_details'] != 'NO'): ?>
				<?php $this->assign('corrector_download', true); ?>
			<?php endif; ?>
		<?php endif; ?>
			<?php if ($this->_tpl_vars['writer_download'] || $this->_tpl_vars['corrector_download']): ?>
			<div class="btn-group">
				<a class="dropdown-toggle btn btn-success" data-toggle="dropdown" href="#" oldtitle="Options" title="" aria-describedby="ui-tooltip-3">
				Download Article
				<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
				<?php if ($this->_tpl_vars['writer_download']): ?>
				<li>
					<a class="" href="/BO/download_article_latestversion.php?article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
&type=writer" >
						R&eacute;dacteur 
					</a>
				</li>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['corrector_download']): ?>
				<li>
					<a class="" href="/BO/download_article_latestversion.php?article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
&type=corrector" >
						Correcteur 
					</a>
				</li>
				<?php endif; ?>
				</ul>
			</div>
			<?php endif; ?>
		
		<?php if ($this->_tpl_vars['article']['correctorParticipation']): ?>
			<?php if ($this->_tpl_vars['article']['expiredcorrectorParticipation']): ?>
			<?php $this->assign('corrector_moretime', true); ?>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['writer_moretime'] || $this->_tpl_vars['corrector_moretime']): ?>
		<div class="btn-group">
			<a class="dropdown-toggle btn" data-toggle="dropdown" href="#" oldtitle="Options" title="" aria-describedby="ui-tooltip-3">
			Give more time
			<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
			<?php if ($this->_tpl_vars['writer_moretime']): ?>
			<li>
				<a href="/deliveryongoing/extend-time?utype=writer&participation_id=<?php echo $this->_tpl_vars['article']['expiredWriterParticipation']; ?>
" role="button" data-toggle="modal" data-target="#extend_time" class="">Writer</a>
			</li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['corrector_moretime']): ?>
			<li>
				<a href="/deliveryongoing/extend-time?utype=corrector&participation_id=<?php echo $this->_tpl_vars['article']['expiredcorrectorParticipation']; ?>
" role="button" data-toggle="modal" data-target="#extend_time" class="">Corrector</a>
			</li>
			<?php endif; ?>
			</ul>
		</div>
		<?php endif; ?>
		
		<!------------------------ stop participations ------------------------->
		<?php if ($this->_tpl_vars['participation_ongoing']): ?>
			<div class="btn-group">

				<a class="dropdown-toggle btn btn-inverse" data-toggle="dropdown" href="#" oldtitle="Options" title="" aria-describedby="ui-tooltip-3">
					Stop
					<b class="caret"></b>
				</a>

				<ul class="dropdown-menu">
				
				<?php if ($this->_tpl_vars['writer_stopparticipation']): ?>
				<li>
					<a href="javascript:void(0);" onclick="return stopparticipation('<?php echo $this->_tpl_vars['article']['id']; ?>
', 'writing')">Writer participation</a>
				</li>
				<?php endif; ?>

				<?php if ($this->_tpl_vars['corrector_stopparticipation']): ?>
				<li>
					<a href="javascript:void(0);" onclick="return stopparticipation('<?php echo $this->_tpl_vars['article']['id']; ?>
', 'correction')">Corrector participation</a>
				</li>
				<?php endif; ?>

				</ul>

			</div>
		<?php endif; ?>
		</div>
		</div>
		</div>
		<div class="clear"></div>
		<div class="topset2">
			<?php if ($this->_tpl_vars['article']['writerParticipation']): ?>
			<div class="w-box span6">
				<div class="w-box-header">Writer</div>
				<div class="w-box-content  cnt_a">
					<div class="image">
						<img class="img-circle" style="float:left" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writerName'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/contrib/pictures/<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['user_id']; ?>
/<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['user_id']; ?>
_h.jpg" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writerName'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
">
						<span style="margin-left:5px"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writerName'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</strong></span><br>
						<span style="margin-left:5px">
						<?php if ($this->_tpl_vars['article']['writer_type'] == 'senior'): ?>
						SC
						<?php elseif ($this->_tpl_vars['article']['writer_type'] == 'junior'): ?>
						JC
						<?php else: ?>
						JCO
						<?php endif; ?>
						</span>
					</div>
					<div class="clear"></div>
					<?php if ($this->_tpl_vars['article']['writer_facturation_details'] | @ count > 0): ?>
					<table class="table viewarttable table-striped topset2" >
					<tr>
						<td>Prix r&eacute;dacteur s&eacute;lectionn&eacute;</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writer_facturation_details'][0]['price_user'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['article']['currency']; ?>
;</td>
					</tr>
					<tr>
						<td>Prix moyen participants</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writer_facturation_details'][0]['avg_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['article']['currency']; ?>
;</td>
					</tr>
					<tr>
						<td>Statut paiement</td>
						<td>
						<?php if ($this->_tpl_vars['article']['writer_facturation_details'][0]['status'] == 'Not paid'): ?>
								Facture cr&eacute;&eacute;e
						<?php elseif ($this->_tpl_vars['article']['writer_facturation_details'][0]['status'] == 'paid'): ?>
							Pay&eacute;e
						<?php elseif ($this->_tpl_vars['article']['writer_facturation_details'][0]['royalty']): ?>	
							En attente
						<?php else: ?>
							N/A
						<?php endif; ?>	
						</td>
					</tr>
					</table>
					<?php else: ?>
						N/A
					<?php endif; ?>	
				</div>	
			</div>	
			<?php endif; ?>
			<?php if ($this->_tpl_vars['article']['correctorParticipation']): ?>
			<div class="w-box span6">
				<div class="w-box-header">Corrector</div>
				<div class="w-box-content  cnt_a">
					<div class="image">
						<img class="img-circle" style="float:left" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['correctorName'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/contrib/pictures/<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_id']; ?>
/<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_id']; ?>
_h.jpg" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['correctorName'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
">
						<span style="margin-left:5px"><strong><?php echo $this->_tpl_vars['article']['correctorName']; ?>
</strong></span><br>
						<span style="margin-left:5px">
						<?php if ($this->_tpl_vars['article']['corrector_type'] == 'senior'): ?>
						SC
						<?php else: ?>
						JC
						<?php endif; ?>
						</span>
					</div>
					<div class="clear"></div>
					<?php if ($this->_tpl_vars['article']['corrector_facturation_details'] | @ count > 0): ?>
					<table class="table viewarttable table-striped topset2" >
					<tr>
						<td>Prix r&eacute;dacteur s&eacute;lectionn&eacute;</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['corrector_facturation_details'][0]['price_corrector'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['article']['currency']; ?>
;</td>
					</tr>
					<tr>
						<td>Prix moyen participants</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['corrector_facturation_details'][0]['avg_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['article']['currency']; ?>
;</td>
					</tr>
					<tr>
						<td>Statut paiement</td>
						<td>
						<?php if ($this->_tpl_vars['article']['corrector_facturation_details'][0]['status'] == 'Not paid'): ?>
								Facture cr&eacute;&eacute;e
						<?php elseif ($this->_tpl_vars['article']['corrector_facturation_details'][0]['status'] == 'paid'): ?>
							Pay&eacute;e
						<?php elseif ($this->_tpl_vars['article']['corrector_facturation_details'][0]['royalty']): ?>	
							En attente
						<?php else: ?>
							N/A
						<?php endif; ?>	
						</td>
					</tr>
					</table>
					<?php else: ?>
						N/A
					<?php endif; ?>	
				</div>	
			</div>	
			<?php endif; ?>
		</div>	
		<div class="clear"></div>
		
				
		<div class="w-box topset2">
		<div class="w-box-header">Comments</div>
		<div class="w-box-content  cnt_a">
			<?php echo '
				<style type="text/css">
				.media {
					background: none repeat scroll 0 0 #FFFFFF;
					border-color: #E4E4E4 #E4E4E4 #BBBBBB;
					border-image: none;
					border-radius: 4px;
					border-style: solid;
					border-width: 1px;
					box-shadow: 0 1px 1px rgba(0, 0, 0, 0.086);
					margin-bottom: 15px;
					overflow: hidden;
					padding: 12px;
				}
				.close
				{
				   padding: 3px;
				}
				</style>
				<script type="text/javascript">
				//Comments submission
				$(document).ready(function() {
						$("#comment_submit").click(function(){
								
							var $b = $(\'input[name=user_val]\');
							var countselected = $b.filter(\':checked\').length;
							var selected = \'\';
							if(countselected >= 1)
							{				
								$(\'input[name=user_val]:checked\').each(function() {
									if(selected)
										selected =   selected + \'|\' + ($(this).val());
									else			
										selected =   $(this).val();
								});
							}	
							//alert(selected);
							
							$.post("/ongoing/save-comments?send_notification="+selected, $("#comment_form").serialize(),
								function(data) {
									//alert(data);
									 var obj = $.parseJSON(data);
									$("#comments_list").html(obj.comments);
									$("#comment_count").text(obj.count);
									$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+obj.count);
									$("#article_comments").val(\'\'); 
									$("#comments_list img").addClass(\'img-circle\');
								}
							);
						});
						
						//refreshing comments
						
						var comment_type=$("#comment_type").val();
						var identifier=$("#identifier").val();
						 /* setInterval(function() {
							//$(\'#comments_list\').load(\'/ongoing/save-comments?comment_type=\'+comment_type+\'&identifier=\'+identifier);
							$.getJSON(\'/ongoing/save-comments?comment_type=\'+comment_type+\'&identifier=\'+identifier,
								{
									format: "json"
								},
								function(data) {
									$("#comments_list").html(data.comments);
									$("#comment_count").text(data.count);
									$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+data.count);
									$("#article_comments").val(\'\');
								});
						}, 60000); */ 
						
						//changing active status of a comment
						$("[id^=delete_comment_]").die(\'click\').live(\'click\', function() {
							
							var parentLi=$(this).parents("li:first").attr(\'id\');
							var deleteButton=$(this).attr(\'id\').split("_");
							var comment_id=deleteButton[2];
							var msg = "Etes-vous s&ucirc;r(e) de vouloir cacher ce  commentaire sur la plateforme ?";
							smoke.confirm(msg,function(e){
								if (e){
									deleteComments(comment_id,comment_type,identifier);
								}
								else{
									return false;
								}
							}); 			
								
						});
						
						//edit textarea toggle
						$("[id^=edit_comment_]").die(\'click\').live(\'click\', function(event) {
							
							event.preventDefault();
							
							var editButton=$(this).attr(\'id\').split("_");
							var comment_id=editButton[2];		
							var comment_box=$(\'#user_comment_\'+comment_id).toggle();
							var comment_new=$(\'#edit_user_comment_\'+comment_id).toggle();
								
						});
						
						//update comments
						$("[id^=update_submit_]").live(\'click\', function() {
							
							var updateButton=$(this).attr(\'id\').split("_");
							var comment_id=updateButton[2];		
							var comments=$("#article_comments_"+comment_id).val();				
							
							var target_page = \'/ongoing/save-comments?comment_action=update&article_comments=\'+comments+\'&comment_id=\'+comment_id+\'&comment_type=article&identifier=\'+identifier;			
							$.post(target_page, function(data){					
									//alert(data);
									var obj = $.parseJSON(data);
									$("#comments_list").html(obj.comments);
									$("#comment_count").text(obj.count);
									$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+obj.count);
									$("#article_comments").val(\'\');
									$("#comments_list img").addClass(\'img-circle\');
								}
							);
						});
						
						$("#asideheight").css("max-height",(parseInt($("#leftheight").height())-55)+\'px\');
						$("#asideheight").mCustomScrollbar({
														scrollButtons:{scrollType:"stepless"},
														keyboard:{scrollType:"stepless"},
														theme:"rounded-dark",
														mouseWheel:{ scrollAmount:100 },
														autoHideScrollbar:true
														});
						
					});	
				/** ajax function to delete/inactive comment data**/
				function deleteComments(comment_id,comment_type,identifier)
				{
						var target_page = \'/ongoing/save-comments?comment_action=delete&comment_id=\'+comment_id+\'&comment_type=\'+comment_type+\'&identifier=\'+identifier;
						
						$.post(target_page, function(data){									
								
								var obj = $.parseJSON(data);
								$("#comments_list").html(obj.comments);
								$("#comment_count").text(obj.count);
								$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+obj.count);
								$("#article_comments").val(\'\');	
								$("#comments_list img").addClass(\'img-circle\');								
							});
				}
					
				</script>
				'; ?>

				<div class="mod">	 
					 <ul class="media-list" id="comments_list">
					 <?php if ($this->_tpl_vars['commentDetails'] | @ count > 0): ?>
							<?php $_from = $this->_tpl_vars['commentDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['commentDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['commentDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['comment']):
        $this->_foreach['commentDetails']['iteration']++;
?>
								<li class="media" id="comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
">					
									<?php if ($this->_tpl_vars['comment']['edit'] == 'yes'): ?>
										<a  class="close hint--left" type="button" id="edit_comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
" data-hint="Edit Comment"><i class="icon-pencil"></i></a>
									<?php endif; ?>
									
									<a  class="close hint--left" data-hint="Hide Comment" type="button" id="delete_comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
">&times;</a>
									<?php if ($this->_tpl_vars['comment']['edit'] != 'yes'): ?>
									<label class="uni-checkbox pull-left">
											<input type="checkbox" name="user_val" id="user_val_<?php echo ($this->_foreach['commentDetails']['iteration']-1)+1; ?>
" class="uni_style " value="<?php echo $this->_tpl_vars['comment']['user_id']; ?>
">
									</label>
									<?php endif; ?>
									<a class="pull-left imgframe" href="#" role="button" data-toggle="modal" data-target="#viewProfile-ajax">
										<img alt="Topito" class="media-object img-circle" width="60px" src="<?php echo $this->_tpl_vars['comment']['profile_pic']; ?>
">
									</a>
									<div class="media-body">
										<h4 class="media-heading">
											
											<a  role="button" data-toggle="modal" data-target="#viewProfile-ajax"><?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['profile_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</a></h4>
											
										<span id="user_comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['comment']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</span>
										
										<span id="edit_user_comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
" style="display:none">
											<textarea class="span10" name="article_comments_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
" id="article_comments_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['comment']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
											<button type="button" id="update_submit_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
" name="update_submit_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
" class="btn">Mettre &agrave; jour</button>
										</span>								
										<p class="muted"><?php echo $this->_tpl_vars['comment']['time']; ?>
</p>
									</div>
								</li>		
							<?php endforeach; endif; unset($_from); ?>	
						
					<?php endif; ?>	
					</ul>
					<div class="row-fluid">
						<div class=" well">
							<form action="" method="POST" id="comment_form">
								<h4>Commenter / poser une question</h4>
								<fieldset>
									<textarea class="span12" placeholder="Ecrire un commentaire" name="article_comments" id="article_comments"></textarea>
									<button type="button" id="comment_submit" name="comment_submit" class="btn">Envoyer</button>
									<input type="hidden" name="comment_type" value="<?php echo $this->_tpl_vars['comment_type']; ?>
" id="comment_type">
									<input type="hidden" name="identifier" value="<?php echo $this->_tpl_vars['identifier']; ?>
" id="identifier">
								</fieldset>
							</form>
						</div>
					</div>
				</div>
		</div>
		</div>
		
			</div>
	<div class="span6" id="">
		<div class="w-box">
			<div class="w-box-header">Activities</div>
			<div class="w-box-content cnt_a" id="asideheight">
			<?php if (count($this->_tpl_vars['histories']) > 0): ?>
				<?php $_from = $this->_tpl_vars['histories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['history']):
?>
				<div class="media activity">
					<a class="pull-left imgframe">
						<?php if ($this->_tpl_vars['history']['type'] == 'superclient'): ?>
							<img class="media-object img-circle" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/superclients/logos/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/<?php echo $this->_tpl_vars['history']['user_id']; ?>
.png">
						<?php elseif ($this->_tpl_vars['history']['type'] == 'contributor'): ?>
							<img class="media-object img-circle" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/contrib/pictures/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/<?php echo $this->_tpl_vars['history']['user_id']; ?>
_h.jpg">
						<?php elseif ($this->_tpl_vars['history']['type'] == 'client'): ?>
							<img class="media-object img-circle" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/<?php echo $this->_tpl_vars['history']['user_id']; ?>
.png">
						<?php else: ?>
							<img class="media-object img-circle" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/logo.jpg">
						<?php endif; ?>
					</a>
					<div class="media-body">
						<?php if ($this->_tpl_vars['history']['first_name']): ?>
							<a><?php echo ((is_array($_tmp=$this->_tpl_vars['history']['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['history']['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</a> <?php echo ((is_array($_tmp=$this->_tpl_vars['history']['action_at'])) ? $this->_run_mod_handler('time_ago', true, $_tmp) : smarty_modifier_time_ago($_tmp)); ?>
<br>
						<?php endif; ?>
						
						<?php echo ((is_array($_tmp=$this->_tpl_vars['history']['action_sentence'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

					</div>
				</div>
				<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
			<div class="pull-center">
				<strong>No Actvities Found</strong>
			</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php endforeach; endif; unset($_from); ?>