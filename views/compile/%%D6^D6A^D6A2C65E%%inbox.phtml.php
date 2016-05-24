<?php /* Smarty version 2.6.19, created on 2013-10-08 16:17:41
         compiled from gebo/master-mails/inbox.phtml */ ?>
<?php echo '
<style type="text/css">
#contentwrapper
{
	text-transform:none;
}
</style>
'; ?>

<div class="row-fluid">
	<div class="span12">
		<div class="mbox">									
			<div class="tab-pane active" id="mbox_inbox">
				<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
					<thead>
						<tr>
							<th class="table_checkbox"><input type="checkbox" data-tableid="dt_inbox" class="select_msgs" name="select_msgs"></th>
							<th><i class="splashy-star_empty"></i></th>
							<th><i class="splashy-mail_light"></i></th>
							<th>Subject</th>
							<th>Sender</th>
							<th>Date</th>
							<th>Size</th>
							<th><i class="icon-adt_atach"></i></th>
						</tr>
					</thead>
					<tbody>
						<tr class="unread">
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet c…</a></td>
							<td><span>email_7@example.com</span></td>
							<td>28/06/2012</td>
							<td>14 KB</td>
							<td></td>
						</tr>
						<tr class="unread">
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet con…</a></td>
							<td><span>email_27@example.com</span></td>
							<td>28/06/2012</td>
							<td>24 KB</td>
							<td></td>
						</tr>
						<tr class="unread">
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
							<td><span>email_11@example.com</span></td>
							<td>29/06/2012</td>
							<td>47 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
							<td><span>email_17@example.com</span></td>
							<td>21/03/2012</td>
							<td>501 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet …</a></td>
							<td><span>email_23@example.com</span></td>
							<td>24/06/2012</td>
							<td>213 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_full mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
							<td><span>email_30@example.com</span></td>
							<td>26/03/2012</td>
							<td>500 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet consect…</a></td>
							<td><span>email_9@example.com</span></td>
							<td>18/05/2012</td>
							<td>995 KB</td>
							<td><i class="icon-adt_atach"></i></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet consect…</a></td>
							<td><span>email_10@example.com</span></td>
							<td>22/04/2012</td>
							<td>411 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_full mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet con…</a></td>
							<td><span>email_24@example.com</span></td>
							<td>8/06/2012</td>
							<td>1152 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet …</a></td>
							<td><span>email_14@example.com</span></td>
							<td>8/03/2012</td>
							<td>1024 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
							<td><span>email_7@example.com</span></td>
							<td>11/04/2012</td>
							<td>184 KB</td>
							<td><i class="icon-adt_atach"></i></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet con…</a></td>
							<td><span>email_2@example.com</span></td>
							<td>1/04/2012</td>
							<td>273 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet c…</a></td>
							<td><span>email_11@example.com</span></td>
							<td>11/06/2012</td>
							<td>130 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
							<td><span>email_26@example.com</span></td>
							<td>9/06/2012</td>
							<td>398 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
							<td><span>email_12@example.com</span></td>
							<td>26/06/2012</td>
							<td>428 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
							<td><span>email_2@example.com</span></td>
							<td>18/03/2012</td>
							<td>184 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet c…</a></td>
							<td><span>email_17@example.com</span></td>
							<td>8/06/2012</td>
							<td>159 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet c…</a></td>
							<td><span>email_8@example.com</span></td>
							<td>3/04/2012</td>
							<td>1114 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet …</a></td>
							<td><span>email_20@example.com</span></td>
							<td>2/05/2012</td>
							<td>1001 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
							<td><span>email_18@example.com</span></td>
							<td>13/04/2012</td>
							<td>752 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
							<td><span>email_29@example.com</span></td>
							<td>22/05/2012</td>
							<td>1190 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
							<td><span>email_12@example.com</span></td>
							<td>22/05/2012</td>
							<td>648 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet consect…</a></td>
							<td><span>email_3@example.com</span></td>
							<td>25/03/2012</td>
							<td>1281 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet consecte…</a></td>
							<td><span>email_14@example.com</span></td>
							<td>3/03/2012</td>
							<td>1247 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet consec…</a></td>
							<td><span>email_8@example.com</span></td>
							<td>13/06/2012</td>
							<td>1239 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet…</a></td>
							<td><span>email_29@example.com</span></td>
							<td>11/05/2012</td>
							<td>589 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet consect…</a></td>
							<td><span>email_9@example.com</span></td>
							<td>8/05/2012</td>
							<td>1441 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
							<td><span>email_23@example.com</span></td>
							<td>9/06/2012</td>
							<td>796 KB</td>
							<td></td>
						</tr>
						<tr>
							<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
							<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
							<td><i class="splashy-mail_light_stuffed"></i></td>
							<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
							<td><span>email_23@example.com</span></td>
							<td>15/05/2012</td>
							<td>1329 KB</td>
							<td></td>
						</tr>
					</tbody>
				</table>    
			</div>					
		</div>
	</div>		
	</div>


<!-- hide elements -->
<div class="hide">
	<!-- actions for inbox -->
	<div class="dt_inbox_actions">
		<div class="btn-group">
			<a href="javascript:void(0)" class="btn" title="Answer"><i class="icon-pencil"></i></a>
			<a href="javascript:void(0)" class="btn" title="Forward"><i class="icon-share-alt"></i></a>
			<a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_inbox"><i class="icon-trash"></i></a>
		</div>
	</div>
	<!-- actions for outbox -->
	<div class="dt_outbox_actions">
		<div class="btn-group">
			<a href="javascript:void(0)" class="btn" title="Resend"><i class="icon-share-alt"></i></a>
			<a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_outbox"><i class="icon-trash"></i></a>
		</div>
	</div>
	<!-- actions for trash -->
	<div class="dt_trash_actions">
		<div class="btn-group">
			<a href="#" class="delete_msg btn" title="Delete permamently" data-tableid="dt_trash"><i class="icon-trash"></i></a>
		</div>
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
			
	