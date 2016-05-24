<?php /* Smarty version 2.6.19, created on 2015-02-05 11:11:14
         compiled from gebo/master-mails/sentbox.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/master-mails/sentbox.phtml', 162, false),array('modifier', 'count', 'gebo/master-mails/sentbox.phtml', 237, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function() {
	$("#ep_users").chosen({ allow_single_deselect: true,search_contains: true });
    $("#type").chosen({
        allow_single_deselect: true,
        search_contains : true
    });
    $("#language").chosen({
        allow_single_deselect: true,
        search_contains : true
    });
    $("#category").chosen({
        allow_single_deselect: false,
        search_contains : true
    });
    $("#wrtype").chosen();
    $("#crtype").chosen();
        /*jQuery("#wrtype").multiselect({noneSelectedText: "S&eacute;lectionner le statut du r&eacute;dacteur", height:100});
        jQuery("#wrtype").multiselectfilter();
        
        jQuery("#crtype").multiselect({noneSelectedText: "S&eacute;lectionner le statut du correcteur", height:70});
        jQuery("#crtype").multiselectfilter();*/
'; ?>

    <?php if ($this->_tpl_vars['categ'] != ''): ?>
<?php echo '
    $(\'#targetdiv\').show();
'; ?>

    <?php $_from = $this->_tpl_vars['categ']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catkey'] => $this->_tpl_vars['catitm']):
?>
<?php echo '
        $("#'; ?>
<?php echo $this->_tpl_vars['catkey']; ?>
<?php echo '").slider({
            range: "min",
            value: 100,
            min: 1,
            max: 100,
            slide: function( event, ui ) {
                $( "#percentage_'; ?>
<?php echo $this->_tpl_vars['catkey']; ?>
<?php echo '").val( ui.value );
            }
        });
        $( "#percentage_'; ?>
<?php echo $this->_tpl_vars['catkey']; ?>
<?php echo '").val($("#'; ?>
<?php echo $this->_tpl_vars['catkey']; ?>
<?php echo '").slider( "value" ) );
'; ?>

    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>   
<?php echo '
});	
//Archieve Message
	function archieveMsg(ticket_id){
	
		var msg = "Do you want to archive this message ?";
		smoke.confirm(msg,function(e){
			if (e){
					window.location.href = "/mastermails/masterclassifymail?&ticket="+ticket_id;           
				}
			else{
				return false;
			}
		});
	
	}
	function showSearch()
    {
       $("#searchblock").toggle();
    }
    function srchtype(val)
    {
        if(val == \'client\')
        {
            //$(\'#contribRow\').addClass(\'sepV_c clientRow\');
            $(".sepV_c.clientRow").css("display", "none");
        }
        else
        {
            //$(\'#contribRow\').removeClass(\'clientRow\');
            $(".sepV_c.clientRow").css("display", "block");
        }
    }
    //form clear
    function clearAll()
    {
        $("#type").val(\'\');$("#ep_users").val(\'\');$("#language").val(\'\');
        $("#category").val(\'\');$("#wrtype").val(\'\');$("#crtype").val(\'\');
        $("#type").val(\'0\').trigger("liszt:updated");
        $("#ep_users").val(\'0\').trigger("liszt:updated");
        $("#language").val(\'0\').trigger("liszt:updated");
        $("#category").val(\'0\').trigger("liszt:updated");
        $("#wrtype").val(\'0\').trigger("liszt:updated");
        $("#crtype").val(\'0\').trigger("liszt:updated");
        $(".sepV_c.clientRow").css("display", "none");
        $("#targetdiv").html(\'\');
        $("#targetdiv").css("display", "none");
    }
    
///////////adding percentages values for categories
var selectedarray = [];
//* sliders
function categoryList()
{        // alert(mycategs);
    var count = $("#category :selected").length;
    if(count > 0)
    {
        var opts=$("#category :selected").text();
        var optsvalues=$("#category :selected").val();
       //alert(selectedarray); alert(optsvalues);   alert($.inArray(optsvalues, selectedarray));
        
        if(optsvalues.trim() != \'\')
        {
            $(\'#targetdiv\').show();
            if(($.inArray(optsvalues, selectedarray) == -1 && $.inArray(opts, selectedarray) == -1))
            {
                var newdiv = \'<div id=div_\'+optsvalues+\' style="float:left;width:225px;padding-right:35px;"><div>\' + opts + \'</div><div class="ui_slider span9" ondblclick="getIds(this.id);" id=\'+optsvalues+\' ></div><input type="text" class="span3" style="position:relative;top:-15px;left:10px;" id=percentage_\'+optsvalues+\' name=categ[\'+optsvalues+\']></input>\' +
                        \'<button  class="close" type="button" id=skill_close_\'+optsvalues+\' value=\'+optsvalues+\'  >&times;</button></div>\'
                $(\'#targetdiv\').append(newdiv);
                $("#"+optsvalues).slider({
                    range: "min",
                    value: 1,
                    min: 1,
                    max: 100,
                    slide: function( event, ui ) {
                        $( "#percentage_"+optsvalues ).val( ui.value );
                    }
                });
                $( "#percentage_"+optsvalues ).val($( "#"+optsvalues ).slider( "value" ) );
    
            }
            selectedarray.push(opts);
            $(\'#targetdiv\').show();
        }
    }
}
/**closing the  categories with sliders**/
$("[id^=skill_close_]").live(\'click\', function(i) {
    var id = $(this).attr(\'value\');
    selectedarray.splice($.inArray(id, selectedarray), 1);
    $("#div_"+id).remove();
    if ($.trim( $(\'#targetdiv\').text() ).length === 0) {
        $(\'#targetdiv\').hide();
    }
});
</script>
<style type="text/css">
#contentwrapper
{
	text-transform:none;
}
'; ?>
<?php if ($this->_tpl_vars['type'] != 'contributor'): ?><?php echo '.clientRow{display:none;}'; ?>
<?php endif; ?><?php echo '
</style>
'; ?>

<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">
			Syst&egrave;me de Messages :: Liste des messages envoy&egrave;s
			<a href="#searchblock" onclick="showSearch();"  class="label label-inverse alignright">Search</a>
		</h3>
		
        <div class="well clearfix" id="searchblock">
          <form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="get" id="searchform" name="searchform">
             <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>
        <?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
             <span class="sepV_c">
                 <select name="ep_user_id" id="ep_users" data-placeholder="S&eacute;lectionner sender">
                    <option value=""> </option>
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['EP_contacts'],'selected' => $this->_tpl_vars['sender']), $this);?>
  
                 </select>
             </span>
        <?php else: ?>
            <input type="hidden" name="ep_user_id" value="<?php echo $this->_tpl_vars['admin_user_id']; ?>
">
        <?php endif; ?>
             <span class="sepV_c">
                 <select name="type" id="type" data-placeholder="S&eacute;lectionner type" onchange="srchtype(this.value)">
                    <option value=""> </option>
                    <option value="client" <?php if ($this->_tpl_vars['type'] == 'client'): ?>selected<?php endif; ?>>client</option>
                    <option value="contributor" <?php if ($this->_tpl_vars['type'] == 'contributor'): ?>selected<?php endif; ?>>contributor</option>
                 </select>
             </span>
             <span class="sepV_c clientRow" id="contribRow">
                 <select name="wrtype[]" id="wrtype" multiple="multiple" style="width:300px;" data-placeholder="S&eacute;lectionner le statut du r&eacute;dacteur">
                    <option value="senior" <?php echo $this->_tpl_vars['wrtype1']; ?>
>senior</option><option value="junior" <?php echo $this->_tpl_vars['wrtype2']; ?>
>junior</option><option value="sub-junior" <?php echo $this->_tpl_vars['wrtype3']; ?>
>sub-junior</option>
                 </select>
             </span>
             <span class="sepV_c clientRow" id="contribRow">
                 <select name="crtype[]" id="crtype" multiple="multiple" style="width:250px;" data-placeholder="S&eacute;lectionner le statut du correcteur">
                    <option value="senior" <?php echo $this->_tpl_vars['crtype1']; ?>
>senior</option><option value="junior" <?php echo $this->_tpl_vars['crtype2']; ?>
>junior</option>
                 </select>
             </span>
             <span class="sepV_c clientRow" id="contribRow">
                 <select name="language" id="language" class="chzn_a" data-placeholder="S&eacute;lectionner langue">
                    <?php $_from = $this->_tpl_vars['ep_language_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitm']):
?>
                        <option value=""> </option>
                        <option value="<?php echo $this->_tpl_vars['langkey']; ?>
" <?php if ($this->_tpl_vars['langkey'] == $this->_tpl_vars['language']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['langitm']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                 </select>
             </span>
             <span class="sepV_c clientRow" id="contribRow" style="height:60px;">&nbsp;</span>
             <span class="sepV_c clientRow" id="contribRow">
                 <select name="category" id="category" class="chzn_b" data-placeholder="S&eacute;lectionner categorie" onchange="categoryList();">
                    <option value=""> </option>
                    <?php $_from = $this->_tpl_vars['ep_categories_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catkey'] => $this->_tpl_vars['catitm']):
?>
                        <option value="<?php echo $this->_tpl_vars['catkey']; ?>
" <?php if ($this->_tpl_vars['catkey'] == $this->_tpl_vars['category']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['catitm']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                 </select>
             </span>
             <span class="sepV_c clientRow" id="contribRow" style="width:100%;">
                 <div class="alert alert-info span9 hide" id="targetdiv" style="width:100%;">
<?php if ($this->_tpl_vars['categ'] != ''): ?>
    <?php $_from = $this->_tpl_vars['categ']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catkey'] => $this->_tpl_vars['catitm']):
?>
        <div id=div_<?php echo $this->_tpl_vars['catkey']; ?>
 style="float:left;width:225px;padding-right:35px;">
            <div><?php echo $this->_tpl_vars['catitm']; ?>
</div>
            <div class="ui_slider span9" ondblclick="getIds(this.id);" id=<?php echo $this->_tpl_vars['catkey']; ?>
 ></div>
            <input type="text" class="span2" style="position:relative;top:-15px;left:10px;" id=percentage_<?php echo $this->_tpl_vars['catkey']; ?>
 name=categ[<?php echo $this->_tpl_vars['catkey']; ?>
]></input>
            <button  class="close" type="button" id=skill_close_<?php echo $this->_tpl_vars['catkey']; ?>
 value=<?php echo $this->_tpl_vars['catkey']; ?>
 >&times;</button></div>
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
                 </div>
             </span>
             <span class="sepV_c">
                <button value="search" type="submit" name="search" id="search" class="btn btn-danger pull-center">Search</button>
                <button onclick="clearAll();" value="clear" type="button" name="clear" id="clear" class="btn btn-info pull-center">Clear</button>   
             </span>
          </form>
        </div>
		
		<div class="mbox">									
			<div class="tab-pane active" id="mbox_outbox">
				<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_outbox">
					<thead>
						<tr>
							<th class="table_checkbox"><input type="checkbox" data-tableid="dt_outbox" class="select_msgs" name="select_msgs"></th>							
							<th><i class="splashy-mail_light"></i></th>
							<th>Subject</th>
							<th>Transmitter</th>							
							<th>receiver</th>
							<th>Date</th>
							<!--<th>Action</th>-->
						</tr>
					</thead>
					<tbody>
						<?php if (count($this->_tpl_vars['paginator']) > 0): ?>
							<?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MainMenu_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MainMenu_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['MainMenu_key'] => $this->_tpl_vars['message']):
        $this->_foreach['MainMenu_loop']['iteration']++;
?>
								
								<tr>								
									<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>									
									<td><?php if ($this->_tpl_vars['message']['status'] == 0): ?><i class="splashy-mail_light"></i><?php else: ?><i class="splashy-mail_light_stuffed"></i><?php endif; ?></td>
									<td><a href="/mastermails/view-mail/?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&mailaction=sentboxview&page=<?php echo $_REQUEST['page']; ?>
&message=<?php echo $this->_tpl_vars['message']['messageId']; ?>
&ticket=<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
&recipientid=<?php echo $this->_tpl_vars['message']['recipientid']; ?>
"><?php echo $this->_tpl_vars['message']['Subject']; ?>
</a></td>
									<td><span><?php echo $this->_tpl_vars['message']['sendername']; ?>
</span></td>
									<td><span><?php echo $this->_tpl_vars['message']['recipient']; ?>
</span></td>
									<td><?php echo $this->_tpl_vars['message']['receivedDate']; ?>
</td>
									<!--<td>
										<div class="btn-group">
											<a class="btn btn-info  hint--left  hint--info" data-hint="answer" href="/mastermails/reply-mail?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&mailaction=reply&reply_message=<?php echo $this->_tpl_vars['message']['messageId']; ?>
&ticket=<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
&recipientid=<?php echo $this->_tpl_vars['message']['recipientid']; ?>
"><i class="icon-pencil"></i></a>
										</div>	
									</td>-->
								</tr>
							
							<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
						
					</tbody>
				</table>    
			</div>					
		</div>
	</div>		
	</div>


<!-- hide elements -->
<div class="hide">	
	<!-- actions for outbox -->
	<div class="dt_outbox_actions">
		<!--<div class="btn-group">
			<a href="javascript:void(0)" class="btn" title="Resend"><i class="icon-share-alt"></i></a>
			<a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_outbox"><i class="icon-trash"></i></a>
		</div>-->
	</div>	
	<!-- confirmation box -->
	<div id="confirm_dialog">
		<div class="cbox_content">
			<div class="sepH_c tac"><strong>Are you sure you want to delete this message(s)?</strong></div>
			<div class="tac">
				<a href="#" class="btn btn-gebo confirm_yes">Yes</a>
				<a href="#" class="btn confirm_no">No</a>
			</div>
		</div>
	</div>
</div>
			
	