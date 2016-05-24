<?php /* Smarty version 2.6.19, created on 2015-06-26 15:57:16
         compiled from gebo/recruitment/recruitment-prod2.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/recruitment/recruitment-prod2.phtml', 23, false),)), $this); ?>
<?php echo '
<link href=\'/BO/theme/gebo/lib/fullcalendar/fullcalendar-delivery.css\' rel=\'stylesheet\' />
<link href=\'/BO/theme/gebo/lib/fullcalendar/fullcalendar.delivery.print.css\' rel=\'stylesheet\' media=\'print\' />
<script src=\'/BO/theme/gebo/lib/fullcalendar/moment.min.js\'></script>
<script src=\'/BO/theme/gebo/lib/fullcalendar/fullcalendar.delivery.min.js\'></script>
<script src=\'/BO/theme/gebo/lib/fullcalendar/lang-all.js\'></script>
<script src=\'/BO/theme/gebo/lib/fullcalendar/gcal.js\'></script>


<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>

<script>

	$(document).ready(function() {
		$(\'#publish_time\').datetimepicker({
			format:\'Y-m-d H:i\'
		});	
		
		$(\'input[name="publish_now"]\').click(function () {
			if($(\'input[name="publish_now"]\').is(\':checked\'))
			{
				var now=\''; ?>
<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M")); ?>
<?php echo '\';
				$("#publish_time").val(now);
				$("#publish_time").prop(\'disabled\', true);
				
			}	
			else
				$("#publish_time").prop(\'disabled\', false);
		});
		
		//update calendar
		$("#update_calendar").click(function(){
		
			updateCalendar();		
		});
		//CHECK WRITERS /CORRECTORS SELECTED/NOT
		$( "#shareCalendar" ).click(function( event ) {
			event.preventDefault();
			var href=$(this).attr(\'href\');
			var target_page=\'/recruitment/check-article-writers-correctors\';
			$.get(target_page,function(result){	
				result=$.trim(result);
				if(result==\'success\')
				{
					$("#prod2_error").hide();
					$("#prod2_error").html(\'\');
					window.location=href;
				}
				else
				{
					$("#prod2_error").show();
					$("#prod2_error").html(result);
				}
			});
		});
		
		displayArticleEventCalendar();	
	});

//function update calendar function when create button clicked on top
function updateCalendar()
{
	var publish_now=$(\'input[name="publish_now"]\').is(\':checked\');
	if(publish_now)
		now=\'yes\';
	else
		now=\'no\';
	var publish_time=$("#publish_time").val();

	var target_page="/recruitment/ajax-update-calendar?publish_now="+now+"&publish_time="+publish_time;
	//alert(target_page);
	$.post(target_page,function(result){				
		//destroy and regenerate calendar
		destroyCalendar();
		displayArticleEventCalendar();
	});


}	
	
//function to display calendar
function displayArticleEventCalendar()
{
	
	$(\'#calendar\').fullCalendar({
			header: {
				left: \'prev,next today\',
				center: \'title\',
				right: \'month,agendaWeek,agendaDay\'
			},
			firstDay: '; ?>
<?php echo $this->_tpl_vars['day_week']; ?>
<?php echo ',
			//\'weekends\': false,
			// \'defaultView\': \'agendaWeek\',			
			lang: \'en\',
			timezone: \''; ?>
<?php echo $this->_tpl_vars['timezone']; ?>
<?php echo '\',
			editable: false,				
			droppable: true, // this allows things to be dropped onto the calendar
			drop: function(date) {
					$(this).remove();
					var div_text=$.trim($("#drag-events").html());					
					if(!div_text)
						$("#drag-events").html(\'<div class="no-items">No items to schedule</div>\');
			},
			//eventLimit: true,
			events: \'/recruitment/calendar-article-events/\',
			eventAfterRender:function( event, element, view ) { //function to render the id
				$(element).attr("id","delivery_"+event._id);
			},
			 /* eventDrop: function(event, delta, revertFunc) {

				alert(event.title + " was dropped on " + event.start.format());
			},
			eventResize: function(event) {

				alert(event.title + " was resized to " + event.end.format());
			}, */
			eventClick: function(event) { //to open create article modal	
				var date = new Date(event.start);			
				var start=date.toISOString().slice(0, 16);				
				if (event.url) {
					var eve_url=event.url+\'&writing_start=\'+start;
					
					$("#create_article").modal({remote:eve_url});
					return false;
				}
			},			
		});
		var publish_time=\''; ?>
<?php echo $this->_tpl_vars['prod_step1']['count_down_start']; ?>
<?php echo '\';
		$(\'#calendar\').fullCalendar( \'gotoDate\',publish_time);
		
		
}	

function destroyCalendar()
{
	$(\'#calendar\').fullCalendar(\'destroy\');
}
	
</script>
<style>	
		
	#external-events {
		background: none repeat scroll 0 0 #e0dce8;
		border: 1px solid #eeeeee;
		float: left;
		margin: 5px;		
	}
		
	.event-title {
		background: none repeat scroll 0 0 #8976B9;
		color: #fff;
		cursor: pointer;
		font-size: 16px;
		font-weight: 700;
		padding: 12px;
		text-align:left
	}
	
		
	#external-events .fc-event {
		cursor: pointer;
		margin: 5px;
		padding: 5px;
		background:#999999;
		color:#00000C
		
	}
	#external-events .drag {
		border: 1px solid #89878D;
		border-radius: 5px;
		display: block;
		font-size: 14px;
		font-weight: bold;
		line-height: 1.3;
		position: relative;	
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}
	
	.no-items{
		margin: 15px;
	}
	
	.proofread-event{
		background-color: #D08B5B;
		color:#fff;
	}
	
	.contract-event{
		background-color: #EB5D4F;
		color:#fff;
	}
	#drag-schedule-text
	{
		color:#fff;
	}	
	#create_article .modal-body {min-height: 480px}
	.modal.fade.in {
		top: 0%;
	}

</style>
'; ?>

	<div class="row-fluid">
		 <div class="span12">
			<h3 class="heading">
				<span><i class="splashy-calendar_month" style="margin-top:3px"></i> Schedule | <?php echo $this->_tpl_vars['prod_step1']['title']; ?>
</span>
				<!--<span class="pull-right">
						<img src="/BO/theme/gebo/img/path-2.png" width="120" height="35" border="0" usemap="#Map" />
						<map name="Map" id="Map">
							<area href="/recruitment/recruitment-prod1?contract_missionid=<?php echo $_GET['contract_missionid']; ?>
" coords="18,18,17" shape="circle">
						</map>
				</span>--> 
			</h3>
		</div>
	</div>	
	
<!--<form action="/recruitment/recruitment-prod3?contract_missionid=<?php echo $_GET['contract_missionid']; ?>
" method="POST">-->
		<div class="row-fluid">
		<div id='calendar' class="span12"></div>
		<div style='clear:both'></div>
	</div>
	<div class="row-fluid">
		<div class="alert alert-error" id="prod2_error" style="display:none"></div>
	</div>
	<div class="row-fluid">
		<div class="control-group topset2">
			<div class="pull-center">
				<a class="btn btn-default" href="/recruitment/recruitment-test-article?contract_missionid=<?php echo $_GET['contract_missionid']; ?>
"><i class="icon-chevron-left"></i> Retour</a>
				<a class="btn btn-primary" id="shareCalendar" href="/recruitment/recruitment-prod3?contract_missionid=<?php echo $_GET['contract_missionid']; ?>
">Share</a>
			</div>
		</div>
	</div>	
<!--</form>-->
	

	
	
<!--article creation modal-->
<div class="modal hide fade" id="create_article" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Edit Article</h3>
    </div>
    <div class="modal-body">
		
    </div>
    <div class="modal-footer">
    </div>
</div>	