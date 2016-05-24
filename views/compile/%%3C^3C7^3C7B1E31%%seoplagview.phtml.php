<?php /* Smarty version 2.6.19, created on 2015-04-14 16:12:09
         compiled from skeleton/seoplagview.phtml */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title><?php echo $this->_tpl_vars['meta_title']; ?>
</title>
        <meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
"/>
        <meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
"/>
        <meta name="rating" content="general"/>
        <meta name="language" content="<?php echo $this->_tpl_vars['lang']; ?>
" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="image/favicon/favicon.ico" rel="shortcut icon" />

        <?php $_from = $this->_tpl_vars['cssList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['css']):
?>
            <link href="/BO/css/<?php echo $this->_tpl_vars['css']; ?>
" type="text/css" rel="stylesheet" />
        <?php endforeach; endif; unset($_from); ?>
        
        <?php echo '<style>mmm {background-color:#FFFF00;font-weight:bold;}</style>'; ?>
  

    </head>

    <body style="background:none;">
        <div style="float:left;border:1px solid #000;width:90%;padding:10px;color:#666;">
            <div><b>Url</b> : <?php echo $this->_tpl_vars['pUrl']; ?>
</div><?php echo $this->_tpl_vars['pActualContent']; ?>

            <div><b>Content</b> : <?php echo $this->_tpl_vars['pContent']; ?>
</div>
            <div><b>Plagiarism percentage</b> : <?php echo $this->_tpl_vars['pPercentage']; ?>
</div>
        </div>
        <div style="float:left;"><?php echo $this->_tpl_vars['plagText']; ?>
</div>        
    </body>
</html>