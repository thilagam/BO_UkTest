<?php /* Smarty version 2.6.19, created on 2013-09-19 10:38:18
         compiled from gebo/seo/contentserrorcheck.phtml */ ?>
<?php echo $this->_tpl_vars['lang1']; ?>
<?php echo '

<script type="text/javascript">

    jQuery(function() {
'; ?>

        <?php if ($this->_tpl_vars['lang1'] == 'fr'): ?>
            AtD.rpc_css_lang = 'fr';
        <?php endif; ?>
<?php echo '
        AtD.rpc_css = \'http://www.polishmywriting.com/dev/atd-jquery/server/proxycss.php?data=\';
        $(\'textarea\').addProofreader();
    });
    
    function validate()
    {
        $(\'#AtD_button\').click() ;
        if( $(\'#validate\').val() != \'Edit\' ) {
            $(\'#validate\').val(\'Edit\') ;
        } else {
            $(\'#validate\').val(\'Validate\') ;
        }
        setTimeout(errSelect, 1500) ;
        setTimeout(fnErrCount, 1500) ;
    }

    function fnErrCount()
    {
        var err1, err2 ;
        
        err1 = parseInt($(\'.hiddenSpellError\').length) ;
        err2 = parseInt($(\'.hiddenGrammarError\').length) ;
        $(\'#errCount\').html(\'<red>Spelling mistakes</red> : <b>\'+err1+\'</b>, <green>Grammer mistakes</green> : <b>\'+err2+\'</b>\') ;
        $("#checkLink").show() ;
    }

    function errSelect()
    {
        var spell = document.getElementById(\'spelling\').checked ;
        var gramm = document.getElementById(\'grammer\').checked ;
        
        if(spell)
          $(\'.hiddenSpellError\').css(\'border-bottom\', \'2px solid red\') ;
        else
          $(\'.hiddenSpellError\').css(\'border-bottom\', \'none\') ;
        if(gramm)
          $(\'.hiddenGrammarError\').css(\'border-bottom\', \'2px solid green\') ;
        else
          $(\'.hiddenGrammarError\').css(\'border-bottom\', \'none\') ;
    }
    
 </script>
 
<style>
 #textInput
 {
    font-size: 100%;
    font-family: times;
    padding: 2px;
    margin: 2px;
 }
 #AtD_0{
     display:none;
 }
 red{color:red;}
 green{color:green;}
</style>
 
'; ?>


    <div class="span10">

        <h3 class="heading">Plagiarism Tool</h3>

        <div class="control-group formSep" id="seotool-notify" style="display: none;">
            <div class="row-fluid">
                <div class="span12 form-inline">
                    <div id="seo-message">
                        <?php echo $this->_tpl_vars['msg']; ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="control-group formSep">
            <div class="row-fluid">
                <div class="pre">
                    <div class="suggest"><br><br>
                        Enter Text : 
                        <textarea name="killer" id="textInput" class="input" style="vertical-align: top; border-radius: 6px 6px 6px 6px; border: 1px solid rgb(102, 102, 102); width: 451px; height: 128px;" cols="55" rows="10"></textarea>
                   
                        <div style="text-align:left; margin:10px auto; width:80%">
                        <b><u>Options :</u></b><br><br>
                        <!--language :<input type="radio" name="lang" id="lang1" value="en"> English <input type="radio" name="lang" id="lang2" value="fr"> French <br>-->
                        <input type="checkbox" id="grammer" value="1" onchange="errSelect()" checked>GRAMMAR<br>
                        <input type="checkbox" id="spelling" value="1" onchange="errSelect()" checked>SPELL<br><br><br>
                        <!--<a href="javascript:check()" id="checkLink"><input type="button" value="Validate"></a>-->
                        <input type="button" value="Validate" id="validate" onclick="validate();">
                        </div>
                        
                        <div id="errCount"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>