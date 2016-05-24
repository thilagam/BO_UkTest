<?php /* Smarty version 2.6.19, created on 2014-12-08 13:34:26
         compiled from skeleton/mail_pages.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substr', 'skeleton/mail_pages.phtml', 16, false),)), $this); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
"/>
<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
"/>
<meta name="rating" content="general"/>
<meta name="language" content="<?php echo $this->_tpl_vars['lang']; ?>
" />
<link href="image/favicon/favicon.ico" rel="shortcut icon" />
<?php $this->assign('cssfiles', ''); ?>
<?php $_from = $this->_tpl_vars['cssList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['css']):
?>
<?php $this->assign('cssfiles', ($this->_tpl_vars['cssfiles']).($this->_tpl_vars['css']).","); ?>
<link href="/BO/<?php echo $this->_tpl_vars['css']; ?>
" type="text/css" rel="stylesheet" />
<?php endforeach; endif; unset($_from); ?>
<!--<link type="text/css" rel="stylesheet" href="/min/b=BO&f=<?php echo ((is_array($_tmp=$this->_tpl_vars['cssfiles'])) ? $this->_run_mod_handler('substr', true, $_tmp, -1) : smarty_modifier_substr($_tmp, -1)); ?>
"/>-->
<!--<link href="/BO/<?php echo $this->_tpl_vars['css']; ?>
" type="text/css" rel="stylesheet" />-->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans" />
<?php $_from = $this->_tpl_vars['javascriptList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['javascript']):
?>
<script language="JavaScript" type="text/javascript" src="/BO/<?php echo $this->_tpl_vars['javascript']; ?>
"></script>
<?php endforeach; endif; unset($_from); ?>
</head>
<body  class="menu_hover">
<div id="loading_layer" style="display:none"><img src="/BO/theme/gebo/img/ajax_loader.gif" alt="" /></div>		
<!-- header -->
<div id="maincontainer" class="clearfix">
	<header>
	<?php $_from = $this->_tpl_vars['headerList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endforeach; endif; unset($_from); ?>
	</header>

	<!-- sidebar -- left panel -->
	<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
	<div class="sidebar">
	<?php $_from = $this->_tpl_vars['mainList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endforeach; endif; unset($_from); ?>
	</div>

	<!-- main content -->
	<div id="contentwrapper">
		<div class="main_content">
			<?php $_from = $this->_tpl_vars['rightList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endforeach; endif; unset($_from); ?>
	   </div>
	</div>
	<?php echo '
	<script type="text/javascript">
	$(document).ready(function() {
		/* show all elements & remove preloader*/
		setTimeout(\'$("html").removeClass("js")\',1000);
		var flash_message="'; ?>
<?php echo $this->_tpl_vars['actionmessages'][0]; ?>
<?php echo '";
		var flash_type="'; ?>
<?php echo $this->_tpl_vars['actionmessages'][1]; ?>
<?php echo '";
		if(flash_message)
		{
			if(flash_type==\'error\')ftype=\'st-error\';else ftype=\'st-success\';
			$.sticky(flash_message, {autoclose : 5000, position: "top-center", type: ftype });
		}
	});	
	
	/* [ ---- Gebo Admin Panel - mailbox ---- ] */

    $(document).ready(function() {
		//* make row clickable
		//gebo_mailbox.msg_rowLink();
       	//* inbox
        gebo_mailbox.inbox();
		//* outbox
        gebo_mailbox.outbox();
		//* archieve
        gebo_mailbox.archieve();
        	
		//* defaults actions: selecting rows, stars
		gebo_mailbox.actions();
    });

    gebo_mailbox = {
        inbox: function() {
            $(\'#dt_inbox\').dataTable({
				"oLanguage": {
					"sLengthMenu": "_MENU_ messages",
					"sZeroRecords": "No messages to display"
				},
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "sPaginationType": "bootstrap",
                "iDisplayLength": 50,
				//"aaSorting": [[ 4, "desc" ]],
				"aoColumns": [
					{ "bSortable": false, \'sWidth\': \'13px\' },					
					{ "bSortable": false, \'sWidth\': \'16px\' },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "eu_date" },
					{ "sType": "string" }
				]
            });
			
			//* copy actions buttons to datatable
			$(\'#dt_inbox_wrapper .dt_actions\').html($(\'.dt_inbox_actions\').html());
			//* add tootlips for buttons
			$(\'#dt_inbox_wrapper .dt_actions a\').addClass(\'ttip_t\');
			//* reinitialize tooltips
			gebo_tips.init();
        },
        outbox: function() {
			$(\'#dt_outbox\').dataTable({
				"oLanguage": {
					"sLengthMenu": "_MENU_ messages",
					"sZeroRecords": "No messages to display"
				},
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"iDisplayLength": 50,
				//"aaSorting": [[ 5, "desc" ]],
				"aoColumns": [
					{ "bSortable": false, \'sWidth\': \'13px\' },					
					{ "bSortable": false, \'sWidth\': \'16px\' },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "eu_date" },
					//{ "sType": "string" }
				]
			});
			
			//* copy actions buttons to datatable
			$(\'#dt_outbox_wrapper .dt_actions\').html($(\'.dt_outbox_actions\').html());
			//* add tootlips for buttons
			$(\'#dt_outbox_wrapper .dt_actions a\').addClass(\'ttip_t\');
			//* reinitialize tooltips
			gebo_tips.init();
        },
        trash: function() {
			$(\'#dt_trash\').dataTable({
				"oLanguage": {
					"sLengthMenu": "_MENU_ messages",
					"sZeroRecords": "No messages to display"
				},
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"iDisplayLength": 25,
				"aaSorting": [[ 5, "desc" ]],
				"aoColumns": [
					{ "bSortable": false, \'sWidth\': \'13px\' },
					{ "bSortable": false, \'sWidth\': \'16px\' },
					{ "bSortable": false, \'sWidth\': \'16px\' },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "eu_date" },
                    { "sType": "formatted-num" },
					{ "bSortable": false, \'sWidth\': \'16px\' }
				]
			});
			
			//* copy actions buttons to datatable
			$(\'#dt_trash_wrapper .dt_actions\').html($(\'.dt_trash_actions\').html());
			//* add tootlips for buttons
			$(\'#dt_trash_wrapper .dt_actions a\').addClass(\'ttip_t\');
			//* reinitialize tooltips
			gebo_tips.init();
        },
		archieve: function() {
			$(\'#dt_archieve\').dataTable({
				"oLanguage": {
					"sLengthMenu": "_MENU_ messages",
					"sZeroRecords": "No messages to display"
				},
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"iDisplayLength": 25,
				//"aaSorting": [[ 5, "desc" ]],
				"aoColumns": [
					{ "sType": "number", \'sWidth\': \'13px\' },				
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "eu_date" }                    
				]
			});			
        },
		actions: function() {
			$(\'.table\').on(\'click\', \'.mbox_star\', function(){
				$(this).toggleClass(\'splashy-star_empty splashy-star_full\');
			});
			
			$(\'.table\').on(\'mouseenter\',\'.starSelect\', function(){
				if($(this).children(\'i.splashy-star_empty\').length) {
					$(this).children(\'i.mbox_star\').css(\'visibility\',\'visible\');
				}
			}).on(\'mouseleave\', \'.starSelect\', function(){
				if($(this).children(\'i.splashy-star_empty\').length) {
					$(this).children(\'i.mbox_star\').css(\'visibility\',\'\');
				}
			});
			
			$(\'.table\').on(\'click\', \'.select_msgs\', function () {
				var tableid = $(this).data(\'tableid\');
				$(\'#\'+tableid).find(\'input[name=msg_sel]\').attr(\'checked\', this.checked).closest(\'tr\').addClass(\'rowChecked\')
				if($(this).is(\':checked\')) {
					$(\'#\'+tableid).find(\'input[name=msg_sel]\').closest(\'tr\').addClass(\'rowChecked\')
				} else {
					$(\'#\'+tableid).find(\'input[name=msg_sel]\').closest(\'tr\').removeClass(\'rowChecked\')
				}
			});
			
			$(\'input[name=msg_sel]\').on(\'click\',function() {
				if($(this).is(\':checked\')) {
					$(this).closest(\'tr\').addClass(\'rowChecked\')
				} else {
					$(this).closest(\'tr\').removeClass(\'rowChecked\')
				}
			});
            
            $(".dt_actions").on(\'click\', \'.delete_msg\', function (e) {
				e.preventDefault();
				var tableid = $(this).data(\'tableid\'),
                    oTable = $(\'#\'+tableid).dataTable();
                if($(\'input[name=msg_sel]:checked\', \'#\'+tableid).length) {
                    $.colorbox({
                        initialHeight: \'0\',
                        initialWidth: \'0\',
                        href: "#confirm_dialog",
                        inline: true,
                        opacity: \'0.3\',
                        onComplete: function(){
                            $(\'.confirm_yes\').click(function(e){
                                e.preventDefault();
                                $(\'input[name=msg_sel]:checked\', oTable.fnGetNodes()).closest(\'tr\').fadeTo(300, 0, function () {
                                    $(this).remove();
									oTable.fnDeleteRow( this );
                                    $(\'.select_msgs\',\'#\'+tableid).attr(\'checked\',false);
                                });
                                $.colorbox.close();
                            });
                            $(\'.confirm_no\').click(function(e){
                                e.preventDefault();
                                $.colorbox.close(); 
                            });
                        }
                    });
                } else {
					$.sticky("Please select message(s) to delete.", {autoclose : 5000, position: "top-center", type: "st-info" });
				}
			});
		},
		msg_rowLink: function() {
			$(\'*[data-msg_rowlink]\').each(function () {
				var target = $(this).attr(\'data-msg_rowlink\');
				
				(this.nodeName == \'tr\' ? $(this) : $(this).find(\'tr:has(td)\')).each(function() {
					var link = $(this).find(target).first();
					if (!link.length) return;
					
					var href = link.attr(\'href\');
		
					$(this).find(\'td\').not(\'.nohref\').click(function() {
						//* coment $(link).tab(\'show\') and uncoment window.location = href to open message in new window
						window.location = href;
						//$(link).tab(\'show\');
						//$(\'.mbox .nav-tabs > .active\').removeClass(\'active\');
					});
		
					link.replaceWith(link.html());
				});
			});
		}
        
    };


	</script>
	
	'; ?>

</div>
</body>
</html>