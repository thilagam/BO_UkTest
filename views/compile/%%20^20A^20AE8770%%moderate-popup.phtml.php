<?php /* Smarty version 2.6.19, created on 2013-09-25 17:12:30
         compiled from gebo/correction/moderate-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/correction/moderate-popup.phtml', 128, false),array('modifier', 'utf8_encode', 'gebo/correction/moderate-popup.phtml', 130, false),array('modifier', 'stripslashes', 'gebo/correction/moderate-popup.phtml', 130, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
    $(document).ready(function(){
        $("input:text").focus(function () {
        $(this).blur();
        });
        $(\'.service_tooltip\').qtip({
            position: {
                corner: {
                    target: \'top\',
                    tooltip: \'bottomLeft\'
                }
            },
            style: {
                name: \'cream\',
                padding: \'-70px -13px\',
                width: {
                    max: 200,
                    min: 0
                },
                tip: true
            }
        });
        var to = $("#actionmode").val();
        if(to == "accept")
        {
            $("#Moderator_comment").hide();
            $("#refusearea").hide();
        }

        else
        {
            $("#Moderator_crtwindow").hide();
            $("#Moderator_contribwindow").hide();
            $("#acceptarea").hide();
        }

        var editor = CKEDITOR.instances[\'Moderator_comment\'];
        if (editor) { editor.destroy(true); }
        var editor = CKEDITOR.replace( \'Moderator_comment\',
                {
                    language: \'de\', uiColor: \'#D9DDDC\', enterMode : CKEDITOR.ENTER_BR, removePlugins : \'resize\',
                    toolbar : [ [\'Undo\',\'Redo\'], [\'Find\',\'Replace\'],[\'Link\', \'Unlink\', \'Image\'], [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                        [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\'] ]
                }
        );
        var editor = CKEDITOR.instances[\'Moderator_crtwindow\'];
        if (editor) { editor.destroy(true); }
        var editor = CKEDITOR.replace( \'Moderator_crtwindow\',
                {
                    language: \'de\', uiColor: \'#D9DDDC\', enterMode : CKEDITOR.ENTER_BR, removePlugins : \'resize\',
                    toolbar : [ [\'Undo\',\'Redo\'], [\'Find\',\'Replace\'],[\'Link\', \'Unlink\', \'Image\'], [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                        [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\'] ]
                }
        );
        var editor = CKEDITOR.instances[\'Moderator_contribwindow\'];
        if (editor) { editor.destroy(true); }
        var editor = CKEDITOR.replace( \'Moderator_contribwindow\',
                {
                    language: \'de\', uiColor: \'#D9DDDC\', enterMode : CKEDITOR.ENTER_BR, removePlugins : \'resize\',
                    toolbar : [ [\'Undo\',\'Redo\'], [\'Find\',\'Replace\'],[\'Link\', \'Unlink\', \'Image\'], [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                        [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\'] ]
                }
        );
    });
    function confirmAction()
    {
        var r=confirm("Confirmez-votre choix!");
        if (r==true)
        {
           return true;
        }
        else
        {
            return false;
        }
    }
    function sendToFo()
    {
        var r=confirm("L\'article sera remis en ligne");
        if (r==true)
        {
            var r1=confirm("Announcement by email");
            if (r1==true)
            {
                $("#sendtofo").val(\'yes\');
                $("#anouncebyemail").val(\'yes\');
                return true;
            }

            $("#sendtofo").val(\'yes\');
            return true;
        }
        else
        {
            $("#sendtofo").val(\'no\');
            return true;
        }
    }
 </script>
'; ?>



		<div class="pophead" style="width:100%;">Moderation for Disapprovals</div>




    <table id="moderateversion" class="table table-bordered table-striped table_vam">
        <thead>
        <tr>
            <th>Version</th>
            <th>Nom du fichier</th>
            <th>Contributeur</th>
            <th>Date</th>
            <th>Article</th>


            <th>Comments</th>
        </tr>
        </thead>
        <tbody>
        <?php $_from = $this->_tpl_vars['versions_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['versions_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['versions_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['versions_key'] => $this->_tpl_vars['versions_item']):
        $this->_foreach['versions_loop']['iteration']++;
?>
        <tr>
            <td><?php echo $this->_tpl_vars['versions_item']['version']; ?>
</td>
            <td><?php echo $this->_tpl_vars['versions_item']['article_name']; ?>
</td>
            <td><?php if ($this->_tpl_vars['versions_item']['first_name'] == ''): ?><?php echo $this->_tpl_vars['versions_item']['email']; ?>
<?php else: ?><?php echo $this->_tpl_vars['versions_item']['first_name']; ?>
<?php endif; ?></td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['versions_item']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
            <td><a href="/proofread/downloadfile?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&path=<?php echo $this->_tpl_vars['versions_item']['id']; ?>
">Download</a></td>
            <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['versions_item']['article_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>

  <form action="/correction/moderation?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleid=<?php echo $this->_tpl_vars['artId']; ?>
" method="post" id="moderation" name="moderation" >
    <div>
       <div id="acceptarea">
          <table width="100%">
              <tr><td></td></tr>
              <tr><td><b>Comment of the corrector to the writer:</b></td></tr>
              <tr><td></td></tr>
              <tr >
                <td width="100%"><textarea id="Moderator_contribwindow" name="Moderator_contribwindow" cols="100" rows="5"><?php echo $this->_tpl_vars['Contribmailcontent']; ?>
  </textarea>
                    <input type="hidden" id="Contribmailobject" name="Contribmailobject" value="<?php echo $this->_tpl_vars['Contribmailobject']; ?>
"></td>
              </tr>
              <tr><td></td></tr>
               <tr >
                   <td width="100%"><textarea id="Moderator_crtwindow" name="Moderator_crtwindow" cols="100" rows="5"><?php echo $this->_tpl_vars['Correctormailcontent']; ?>
</textarea>
                       <input type="hidden" id="Correctormailobject" name="Correctormailobject" value="<?php echo $this->_tpl_vars['Correctormailobject']; ?>
"></td>
               </tr>
          </table>
          <?php if ($this->_tpl_vars['refusetype'] == 'disapproved_temp'): ?>
             <samp id="343"><input type="submit" class="buttonbg" value="<?php echo $this->_tpl_vars['nodes'][343]; ?>
" name="moderate_approve" onclick="return confirmAction();"></samp>
          <?php else: ?>
             <samp id="343"><input type="submit" class="buttonbg" value="<?php echo $this->_tpl_vars['nodes'][343]; ?>
" name="moderate_approve" onclick="return sendToFo();"></samp>
          <?php endif; ?>
             <div> En appuyant sur « VALIDER », vous confirmez le choix du correcteur. </div>
             <input type="hidden" id="sendtofo" name="sendtofo" value="">
             <input type="hidden" id="anouncebyemail" name="anouncebyemail" value="">
       </div>
       <div id="refusearea">
          <div style="width: 100%;height: 7px; background: #93B7DA;"></div>
          <table width="100%" id="magic">
            <tr><td></td></tr>
            <tr><td><b>Commentaire laiss&eacute; au correcteur par Edit-place :</b></td></tr>
            <tr><td></td></tr>
            <tr >
                <td width="100%"><textarea id="Moderator_comment" name="Moderator_comment" cols="100" rows="5"><?php echo $this->_tpl_vars['onlycorrectorcontent']; ?>
</textarea>
                    <input type="hidden" id="onlycorrectorobject" name="onlycorrectorobject" value="<?php echo $this->_tpl_vars['onlycorrectorobject']; ?>
">
                </td>
            </tr>
          </table>
          <samp id="344"><input type="submit" class="buttonbg" value="<?php echo $this->_tpl_vars['nodes'][344]; ?>
" id="moderate_disapprove" name="moderate_disapprove" onclick="return confirmAction();">
           <div> En appuyant sur « REFUSER », vous ne confirmez pas le choix du correcteur et lui demandez de corriger l’article tel que le rédacteur lui a envoyé. </div>
       </div>
       <div class="buttontwo" >
            <input type="hidden" id="latestmarks" name="latestmarks" value="<?php  echo $latestmarks;  ?>">
            <input type="hidden" id="correctorId" name="correctorId" value="<?php  echo $correctorId;  ?>">
            <input type="hidden" id="contributorId" name="contributorId" value="<?php  echo $contributorId;  ?>">
			<input type="hidden" id="artsentdate" name="artsentdate" value="<?php  echo $artsentdate;  ?>">
            <input type="hidden" id="actionmode" name="actionmode" value="<?php  echo $_GET['actionmode'];  ?>" />
            <input type="hidden" id="status" name="status" value="<?php  echo $_GET['status'];  ?>" />
       </div>
    </div>
  </form>


