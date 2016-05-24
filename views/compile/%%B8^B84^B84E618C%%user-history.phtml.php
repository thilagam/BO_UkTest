<?php /* Smarty version 2.6.19, created on 2015-09-14 17:00:28
         compiled from gebo/user/user-history.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/user/user-history.phtml', 5, false),)), $this); ?>

   <table class="table table-striped table-bordered table-condensed">
       <tr>
           <td> <span class="pull-right"> Name </span> </span> </td>
           <td> <span class="pull-left"> <?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 </span> </td>
       </tr>
      <!-- <tr>
           <td>  <span class="pull-right">Profession  </span> </td>
           <td> <span class="pull-left"><?php echo ((is_array($_tmp=$this->_tpl_vars['profession'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
  </span> </td>
       </tr>
       <tr>
           <td>  <span class="pull-right"> Education </span> </td>
           <td> <span class="pull-left"> <?php echo $this->_tpl_vars['education']; ?>
 </span> </td>
       </tr>
       <tr>
           <td> <span class="pull-right"> Language </span> </td>
           <td> <span class="pull-left"> <?php echo ((is_array($_tmp=$this->_tpl_vars['language'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 </span> </td>
       </tr>
       <tr>
           <td>  <span class="pull-right">Favourite Categories  </span> </td>
           <td> <span class="pull-left"><?php echo $this->_tpl_vars['favourite_category']; ?>
  </span> </td>
       </tr>-->
       <tr>
           <td>  <span class="pull-right"> Total Participations  </span> </td>
           <td> <span class="pull-left"><?php echo $this->_tpl_vars['parti_detail'][0]['no_participations']; ?>
  </span> </td>
       </tr>
       <tr>
           <td> <span class="pull-right">  Total Articles Published </span> </td>
           <td> <span class="pull-left"> <?php echo $this->_tpl_vars['parti_detail'][1]['no_approved']; ?>
 </span> </td>
       </tr>
       <tr>
           <td>  <span class="pull-right">  Total Articles Refused  </span> </td>
           <td> <span class="pull-left"> <?php echo $this->_tpl_vars['parti_detail'][2]['no_disapproved']; ?>
 </span> </td>
       </tr>

   </table>

			