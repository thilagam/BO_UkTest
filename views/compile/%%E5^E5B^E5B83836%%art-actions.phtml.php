<?php /* Smarty version 2.6.19, created on 2016-01-08 12:20:25
         compiled from gebo/deliveryongoing/art-actions.phtml */ ?>
		<div class="btn-group">
		<?php if ($this->_tpl_vars['close']): ?>
			<?php if (! $this->_tpl_vars['bulk']): ?>
				<?php if ($this->_tpl_vars['totalParticipations'] > 0): ?>
					<a data-toggle="modal" class="btn btn-inverse"  onclick="return getCloseComment('<?php echo $this->_tpl_vars['article_id']; ?>
', '<?php echo $this->_tpl_vars['totalParticipations']; ?>
')">Close</a>
				<?php else: ?>
					<a data-toggle="modal" onclick="closeArtprofile('<?php echo $this->_tpl_vars['article_id']; ?>
', 'no');"><button type="button" class="btn btn-inverse">Close</button></a>
				<?php endif; ?>
			<?php endif; ?>
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
			<?php if ($this->_tpl_vars['bulk']): ?>
				<a class="bulk_art_republish" id="" name="closerepublish" href="/article-republish/bulkrepublishpopup?nopart=no&close=no&aoId=<?php echo $this->_tpl_vars['ao_id']; ?>
&artlist=<?php echo $this->_tpl_vars['artids']; ?>
" data-target="#bulkrepublish" data-toggle="modal">Writer Republish</a>
			<?php else: ?>
				<a class="single_art_republish" id="" name="closerepublish" href="/article-republish/republishpopup?artId=<?php echo $this->_tpl_vars['article_id']; ?>
" data-target="#republish" data-toggle="modal">Writer Republish</a>
			<?php endif; ?>
			</li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['corrector_republish']): ?>
			<li>
			<?php if ($this->_tpl_vars['bulk']): ?>
				<a class="" name="closerepublish" href="/article-republish/bulkrepublishcorrectorpopup?nopart=no&close=no&aoId=<?php echo $this->_tpl_vars['ao_id']; ?>
&artlist=<?php echo $this->_tpl_vars['artids']; ?>
" data-target="#bulkrepublish" data-toggle="modal">Corrector Republish</a>
			<?php else: ?>
				<a class="" name="closerepublish" href="/article-republish/republishcorrectorpopup?close=yes&amp;artId=<?php echo $this->_tpl_vars['article_id']; ?>
" data-target="#republish" data-toggle="modal">Corrector Republish</a>
			<?php endif; ?>
			</li>	
			<?php endif; ?>
		</div>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['edit']): ?>
		<a class="btn btn-info editable editable-click" href="/deliveryongoing/edit-article?article_id=<?php echo $this->_tpl_vars['article_id']; ?>
" data-toggle="modal" role="button" data-target="#edit_article_modal" id="edit_article">
			<span style="vertical-align: text-bottom;">Edit</span>
		</a>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['download_art'] || $this->_tpl_vars['download_corrector_art']): ?>
		<div class="btn-group">
			<a class="dropdown-toggle btn btn-success" data-toggle="dropdown" href="#" oldtitle="Options" title="" aria-describedby="ui-tooltip-3">
			Download Article
			<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
			<?php if ($this->_tpl_vars['download_art']): ?>
			<li>
				<a class="" href="/BO/download_article_latestversion.php?article_id=<?php echo $this->_tpl_vars['article_id']; ?>
&type=writer" >
					R&eacute;dacteur 
				</a>
			<li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['download_corrector_art']): ?>
			<li>
				<a class="" href="/BO/download_article_latestversion.php?article_id=<?php echo $this->_tpl_vars['article_id']; ?>
&type=corrector" >
					Correcteur 
				</a>
			</li>
			<?php endif; ?>
			</ul>
		</div>
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
				<a href="/deliveryongoing/extend-time?utype=writer&participation_id=<?php echo $this->_tpl_vars['expiredWriterParticipation']; ?>
" role="button" data-toggle="modal" data-target="#extend_time" class="">Writer</a>
			</li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['corrector_moretime']): ?>
			<li>
				<a href="/deliveryongoing/extend-time?utype=corrector&participation_id=<?php echo $this->_tpl_vars['expiredcorrectorParticipation']; ?>
" role="button" data-toggle="modal" data-target="#extend_time" class="">Corrector</a>
			</li>
			<?php endif; ?>
			</ul>
		</div>
		<?php endif; ?>
		
		<!---------------------------------------------------- stop participation ---------------------------------------------->
		<?php if ($this->_tpl_vars['participation_ongoing']): ?>
			<div class="btn-group">

				<a class="dropdown-toggle btn btn-inverse" data-toggle="dropdown" href="#" oldtitle="Options" title="" aria-describedby="ui-tooltip-3">
					Stop
					<b class="caret"></b>
				</a>

				<ul class="dropdown-menu">
				
				<?php if ($this->_tpl_vars['writer_stopparticipation']): ?>
				<li>
					<?php if ($this->_tpl_vars['bulk']): ?>
						<a href="javascript:void(0);" onclick="return stopparticipation('<?php echo $this->_tpl_vars['artids']; ?>
', 'writing')">Writer participation</a>
					<?php else: ?>
						<a href="javascript:void(0);" onclick="return stopparticipation('<?php echo $this->_tpl_vars['article_id']; ?>
', 'writing')">Writer participation</a>
					<?php endif; ?>
				</li>
				<?php endif; ?>

				<?php if ($this->_tpl_vars['corrector_stopparticipation']): ?>
				<li>
					<?php if ($this->_tpl_vars['bulk']): ?>
						<a href="javascript:void(0);" onclick="return stopparticipation('<?php echo $this->_tpl_vars['artids']; ?>
', 'correction')">Corrector participation</a>
					<?php else: ?>
						<a href="javascript:void(0);" onclick="return stopparticipation('<?php echo $this->_tpl_vars['article_id']; ?>
', 'correction')">Corrector participation</a>
					<?php endif; ?>
				</li>
				<?php endif; ?>

				</ul>

			</div>
		<?php endif; ?>
		
		</div>