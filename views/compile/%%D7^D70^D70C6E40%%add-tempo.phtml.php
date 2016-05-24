<?php /* Smarty version 2.6.19, created on 2016-04-12 14:26:29
         compiled from gebo/followup/add-tempo.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/followup/add-tempo.phtml', 66, false),)), $this); ?>
<?php echo '
<style>		
    #addshot .showshot{	display:block !important;margin-top:10px;}	
	.errortempo
	{
		border: 1px solid #d90501 !important;
		box-shadow: none !important;
	}
</style>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
'; ?>

<form action="/followup/save-tempo/" class="form-horizontal" method="post" id="tempo">	
    <section>		
        <div class="row-fluid topset2">			
            <div class="control-group">				
                <label class="control-label">Dur&eacute;e la mission</label>				
                <div class="controls">					
                    <div class="span2">						
                        <input id="mission_length_1" class="validate[required,custom[number]] span12" type="text" name="mission_length" value="<?php echo $this->_tpl_vars['mission_details']['mission_length']; ?>
">					
                    </div>					
                    <div class="span2">						
                        <select name="mission_length_option" class="span12 cselect" id="">												
                            <option value="days">Jours</option>													
                        </select>					
                    </div>				
                </div>			
            </div>			
            <div class="control-group">				
                <label class="control-label">Staffing set up</label>				
                <div class="controls">					
                    <div class="span2">						
                        <input id="" class="validate[required,custom[number]] span12" type="text" name="staff_time" value="<?php echo $this->_tpl_vars['mission_details']['staff_time']; ?>
">					
                    </div>					
                    <div class="span2">									
                        Jours										
                    </div>				
                </div>			
            </div>			
            <div class="control-group">				
                <label class="control-label">Volume</label>				
                <div class="controls" style="margin-top:7px">				
                    <span><?php echo $this->_tpl_vars['mission_details']['volume']; ?>
</span>				
                </div>			
            </div>			
            <div class="control-group">				
                <div class="row-fluid">						
                    <label class="control-label">One shot<span class="f_req">*</span> </label>					
                    <div class="controls">						
                        <input type="radio" class="oneshot radio-inline validate[required]" name="oneshot" id="" <?php if ($this->_tpl_vars['mission_details']['oneshot'] == 'yes'): ?> checked <?php endif; ?>  value="yes">Oui&nbsp;						
                               <input type="radio" class="oneshot radio-inline validate[required]" name="oneshot" id="" <?php if ($this->_tpl_vars['mission_details']['oneshot'] == 'no'): ?> checked <?php endif; ?>  value="no">Non					
                    </div>																
                </div>			
            </div>			
            <div class="control-group" id="oneshot_details"  <?php if ($this->_tpl_vars['mission_details']['oneshot'] == 'no' || ! $this->_tpl_vars['mission_details']['oneshot']): ?> style="display:none" <?php endif; ?>>				
                <label class="control-label"></label>					
                <div class="controls">						
                    <div class="span12">							
                        <div id="addshot">								
                            <div class="showshot">									
                                Deliver 									
                                <input type="text" style="width:10%" id="" name="articles[]" class="validate[required,custom[integer]]" value="" /> articles after
                                <input type="text" id="" name="oneshot_length[]" style="width:10%" class="validate[required,custom[integer]]" value="" /> 									
                                <select name="oneshot_option[]" id="" class="span2">										
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array']), $this);?>
									
                                </select>								
                            </div>							
                        </div>							
                        <div class="span7">								
                            <a class="btn btn-small topset2 cloneshot pull-right"><i class="icon-plus"></i> Ajouter</a>							
                        </div>						
                    </div>					
                </div>			
            </div>			
            <div class="control-group" id="recurring_details"<?php if ($this->_tpl_vars['mission_details']['oneshot'] == 'yes' || ! $this->_tpl_vars['mission_details']['oneshot']): ?> style="display:none" <?php endif; ?>>					
                <div class="row-fluid">						
                    <label class="control-label">&nbsp;</label>					
                    <div class="controls">					
                        <div class="span8">						
                            <div class="span2">																			
                                <input name="volume_max" id="" class="validate[required,custom[number]] span12" type="text" placeholder="Volume" value="">						</div>						
                            <div class="span2">							
                                <select name="tempo" id="" class="span12 cselect">								
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_array']), $this);?>
							
                                </select>						
                            </div>						
                            <div class="span2">							
                                <select name="delivery_volume_option" id="" class="span12 cselect">								
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['volume_option_array']), $this);?>
																					
                                </select>						
                            </div>						
                            <div class="span2">							
                                <input type="text" id="" name="tempo_length" class="validate[required] span12" value="" />						
                            </div>						
                            <div class="span3">							
                                <select name="tempo_length_option" id="" class="span12 cselect">								
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array']), $this);?>
							
                                </select>						
                            </div>					
                        </div>					
                    </div>				
                </div>			
            </div>			
            <input type="hidden" name="mid" value="<?php echo $this->_tpl_vars['mission_details']['identifier']; ?>
" />			
            <input type="hidden" name="cmid" value="<?php echo $this->_tpl_vars['cmid']; ?>
" />			
            <input type="hidden" name="cid" value="<?php echo $this->_tpl_vars['cid']; ?>
" />			
            <div class="row-fluid topset2" style="text-align:center">				
                <button type="submit" name="save" class="btn btn-primary">Submit</button>			
            </div>		
        </div>	
    </section>
</form>
<div id="cloneshots" class="showshot" style="display:none">	
    Deliver 	
    <input type="text" style="width:10%" id="" name="articles[]" class="validate[required,custom[integer]]" value="<?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
" /> 	articles after	<input type="text" id="" name="oneshot_length[]" style="width:10%" class="validate[required,custom[integer]]" value="<?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
" /> 	
    <select name="oneshot_option[]" id="" class="span2">		
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array'],'selected' => $this->_tpl_vars['mission']['tempo_length_option']), $this);?>
	
    </select>	<a class="btn btn-mini closeshot">		
        <i class="icon-remove"></i>	
    </a>
</div>
<?php echo '
<script>	
var prodsubmit= true;
    $(document).ready(function(){		
        $(".cselect").chosen({ allow_single_deselect:false,disable_search: true });
        $(".cloneshot").click(function(){
            $("#cloneshots").clone().appendTo("#addshot");
            $("#addshot").find("#cloneshots").removeAttr("id");
        });				
        $(document).on("click",".closeshot",function(){	
            $(this).closest("div").remove();	
        });					
        $(\'.oneshot\').iCheck({		
            checkboxClass: \'icheckbox_square-blue\',
            radioClass: \'iradio_square-blue\'				
        });					
        $(\'.oneshot\').live(\'ifChecked\', function (event) {
            var checked_val = $(".oneshot:checked").val();
            if(checked_val=="yes")			
            {				
                $("#recurring_details").hide();	
                $("#oneshot_details").show();	
            }			
            else		
            {				
                $("#recurring_details").show();	
                $("#oneshot_details").hide();	
            }		
        });		
        $("#tempo").validationEngine({prettySelect : true,useSuffix: "_chzn",onValidationComplete: function(form, status){
			if(status == true)
			{
				if($("[name=oneshot]:checked").val()=="yes")
				{
					checkMax();
					
					if(prodsubmit)
						return true; 
				}
				else
					return true;
			}
		}});	
	});
	
	function checkMax(){
			var current_value = prev_value = "";
			$("#addshot [name=articles\\\\[\\\\]]").each(function(index,value){
				current_value = parseInt($(this).val());
				if(prev_value !="" && current_value < prev_value)
				{
					$(this).addClass("errortempo");
					//$(this).css("border","1px solid #d90501");
					prodsubmit = false;
					$(\'html, body\').animate({ scrollTop: $(\'#addshot\').offset().top }, \'slow\');
					return false;
				}
				else
				{
					//$(this).css("border","none");
					$(this).removeClass("errortempo");
					prodsubmit = true;
				}
					
				prev_value = current_value;
			});
			if(prodsubmit == false)
				return false;
			current_value = prev_value = "";
			$("#addshot [name=oneshot_length\\\\[\\\\]]").each(function(index,value){
				current_value = parseInt($(this).val());
				if(prev_value !="" && current_value < prev_value)
				{
					$(this).addClass("errortempo");
					//$(this).css("border","1px solid #d90501");
					prodsubmit = false;
					$(\'html, body\').animate({ scrollTop: $(\'#addshot\').offset().top }, \'slow\');
					return false;
				}
				else
				{
					//$(this).css("border","none");
					$(this).removeClass("errortempo");
					prodsubmit = true;
				}
					
				prev_value = current_value;
			});
			
			return prodsubmit;
		}
</script>
'; ?>
