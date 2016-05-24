<?php /* Smarty version 2.6.19, created on 2013-06-17 08:55:43
         compiled from partial/headerAdminBO.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'partial/headerAdminBO.phtml', 114, false),array('modifier', 'stripslashes', 'partial/headerAdminBO.phtml', 129, false),)), $this); ?>
<?php echo '
 <link href="/BO/css/menu_assets/headermenu.css" rel="stylesheet" type="text/css">
 <script type="text/javascript" charset="utf-8" src="/BO/script/jquery.cookie.js"></script>
 <script type="text/javascript" charset="utf-8" src="/BO/script/inlineedit.js"></script>
 <script type="text/javascript" >
      $(document).ready(function() {
        if($.cookie("makeeditable") == \'yes\')
        {
            $(":button").attr("onclick","disabled");
            $(":submit").attr("onclick","disabled");

        }
        });
    function madeEditable()
    {
       $.cookie("makeeditable","yes", { path: \'/\' });
        //location.reload();
        window.location=document.location.href;
    }
    function undoEditable()
    {
       $.cookie("makeeditable",null, { path: \'/\' });
         //location.reload();
        window.location=document.location.href;
    }
      ////////////////////////////////////////
    preid = 0;

    $(function()
    {
       $(\'samp\').click(function(){
            var preid = $("button").closest("samp").attr("id");
            if(preid != this.id)
            {
                var prevalue = $(\'samp#\'+preid).children(\'input\').attr(\'value\');
                $(\'samp#\'+preid).text(prevalue);
            }
           if($.cookie("makeeditable")== \'yes\')
           {
               var buttonval = $(this).children(\'input\').attr(\'value\');
               var  buttonid = $(this).children(\'input\').attr(\'id\');
               var buttontype = $(this).children(\'input\').attr(\'type\');

               $(this).parent(\'a\').removeAttr("href");
               $(this).parent(\'a\').attr(\'onclick\', \'\');

              if(buttonval) ///when u wanted change button
              {
                  if(buttontype==\'submit\' || buttontype==\'button\')
                  {
                       gbuttonval = $(this).children(\'input\').attr(\'value\');
                       gbuttonid = $(this).children(\'input\').attr(\'id\');
                       gbuttontype = $(this).children(\'input\').attr(\'type\');
                       gbuttonclass = $(this).children(\'input\').attr(\'class\');
                     var divid=this.id;
                     $(\'#\'+divid).html(buttonval);
                     $(\'#\'+divid).trigger(\'click\');
                     isbutton = \'yes\';
                  }
              }else{
                  isbutton = \'no\';
                  var divid=this.id;
                  $(\'samp#\'+divid).inlineEdit({
                    buttonText: \'Add\',
                    save: function(e, data) {
                        if($(\'samp#\'+divid).children(\'input\').attr(\'value\') == \'\')
                        {
                            alert("Please enter the text");
                             var prevalue = $(\'samp#\'+preid).children(\'input\').attr(\'value\');
                            $(\'samp#\'+preid).text(prevalue);
                            return false;
                        }
                       // confirm(\'Change name to \'+ data.value +\'?\');
                        currentvalue = data.value;
                        var target_page = "/index/dynamictext?divid="+divid+"&dyntext="+data.value;
                        $.post(target_page, function(data){   //alert(data);
                           if(isbutton == \'yes\')
                            $(\'samp#\'+divid).html(\'<input id="\'+gbuttonid+\'" class="\'+gbuttonclass+\'" type="\'+gbuttontype+\'" value="\'+currentvalue+\'" >\');
                        });
                    }
                  });
              }
           }
        });

    });

 </script>
'; ?>

<div id="header">
   <div class="header-area">
   <div onclick="location.href='/index';" class="headerleft">
   </div> 
	<img src="/image/beta.png" class="testmode" />
   <div style="float:right; padding:5px 5px 0px 0px">
	   <?php if ($this->_tpl_vars['language'] == 'fr'): ?>
		  <img title="Langue Française" height="16px" style="cursor: pointer" src="/image/picto/frenchflag.png" >
	   <?php elseif ($this->_tpl_vars['language'] == 'eng'): ?>
		  <img title="UK English Language" height="16px" style="cursor: pointer" src="/image/picto/ukflag.png" >
	   <?php endif; ?>
   </div>
   <div class="headerright">

 <div class="headertext">

<?php if ($this->_tpl_vars['loginName'] != ''): ?>
  <?php if ($this->_tpl_vars['loginName'] == 'farid'): ?>
       <?php if ($_COOKIE['makeeditable'] == 'yes'): ?>
           <img width="18" height="18" border="0" style="cursor: pointer" src="/image/picto/greenround.png" onclick="undoEditable();">
       <?php else: ?>
           <img width="18" height="18" border="0" style="cursor: pointer" src="/image/picto/redround.png" onclick="madeEditable();">
       <?php endif; ?>
  <?php endif; ?>
  <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 |
   <a title="panier"  <?php if (! $this->_tpl_vars['LockedId']): ?>id="disHyper" <?php endif; ?>><samp id="0"><?php echo $this->_tpl_vars['nodes'][0]; ?>
</samp> : <?php echo $this->_tpl_vars['loginName']; ?>
</a> |
   <a <?php if (! $this->_tpl_vars['LockedId']): ?>href="https://admin-ep-test.edit-place.com/index/logout"<?php endif; ?> class="green"><samp id="1"><?php echo $this->_tpl_vars['nodes'][1]; ?>
</samp> </a>
   <?php endif; ?>
   </div>
   </div>
   </div>
   </div>
   <?php if ($this->_tpl_vars['loginName'] != ''): ?>

 <div class="cssmenu">
<ul>
     <?php $_from = $this->_tpl_vars['MainMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MainMenu_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MainMenu_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['MainMenukey'] => $this->_tpl_vars['i']):
        $this->_foreach['MainMenu_loop']['iteration']++;
?>
       <?php if ($this->_tpl_vars['MainMenukey'] != 'ML1'): ?><!--///to hide dash board from list//-->
       <?php if ($_GET['menuId'] == $this->_tpl_vars['MainMenukey'] || substr ( $_GET['submenuId'] , 0 , 3 ) == $this->_tpl_vars['MainMenukey']): ?>
         <li class='active'> <a  href="/index/test?menuId=<?php echo $this->_tpl_vars['MainMenukey']; ?>
" ><?php echo ((is_array($_tmp=$this->_tpl_vars['i'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a>
       <?php else: ?>
	 <li> <a  href="/index/test?menuId=<?php echo $this->_tpl_vars['MainMenukey']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['i'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a>
       <?php endif; ?>
          <ul>
	    <?php $_from = $this->_tpl_vars['SubMenus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['count'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['count']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['submenukey'] => $this->_tpl_vars['i']):
        $this->_foreach['count']['iteration']++;
?>
	    <?php $_from = $this->_tpl_vars['i']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ids'] => $this->_tpl_vars['ii']):
?>
            <?php if ($this->_tpl_vars['EP_BO_MenuUrls'][$this->_tpl_vars['ids']] != null): ?>
	    <?php if (substr ( $this->_tpl_vars['ids'] , 0 , 3 ) == $this->_tpl_vars['MainMenukey']): ?>
          <?php if (substr ( $_GET['submenuId'] , 0 , 7 ) == $this->_tpl_vars['ids']): ?>
	         <li class='subactive'><a href="/<?php echo $this->_tpl_vars['EP_BO_MenuUrls'][$this->_tpl_vars['ids']]; ?>
?submenuId=<?php echo $this->_tpl_vars['ids']; ?>
"><?php echo $this->_tpl_vars['ii']; ?>
</a></li>
          <?php else: ?>
             <li ><a href="/<?php echo $this->_tpl_vars['EP_BO_MenuUrls'][$this->_tpl_vars['ids']]; ?>
?submenuId=<?php echo $this->_tpl_vars['ids']; ?>
"><?php echo $this->_tpl_vars['ii']; ?>
 </a></li>
          <?php endif; ?>
	    <?php endif; ?>
	    <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
      </li>
      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>

</ul>
</div>

<?php endif; ?>
