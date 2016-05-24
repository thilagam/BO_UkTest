<?php /* Smarty version 2.6.19, created on 2013-09-26 14:56:42
         compiled from skeleton/seotool_blkws_view.phtml */ ?>
<!DOCTYPE html>
<html lang="fr">
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
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <link href="image/favicon/favicon.ico" rel="shortcut icon" />

        <?php $_from = $this->_tpl_vars['cssList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['css']):
?>
            <link href="/BO/<?php echo $this->_tpl_vars['css']; ?>
" type="text/css" rel="stylesheet" />
        <?php endforeach; endif; unset($_from); ?>
        <?php echo '
            <style type="text/css">
            *
            {
                text-transform:none;
            }
            .main_content {
                margin-left:0px;
            }
            </style>
        '; ?>

 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
        <?php $_from = $this->_tpl_vars['javascriptList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['javascript']):
?>
        <script language="JavaScript" type="text/javascript" src="/BO/<?php echo $this->_tpl_vars['javascript']; ?>
"></script>
        <?php endforeach; endif; unset($_from); ?>

    </head>

    <body style="background: none;">
    
        <header>
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="brand"><i class="icon-eye-open icon-white"></i> Result View</a>
                    </div>
                </div>                           
            </div>
        </header>
        <div id="seoviewresultspage" class="main_content">      
                <div class="control-group">
					<div class="row-fluid">        
						<?php echo $this->_tpl_vars['table']; ?>

					</div>
				</div>
        </div>
    
    </body>
<?php echo '

        <script type="text/javascript">
        $(document).ready(function() {
'; ?>
<?php $_from = $this->_tpl_vars['sheet_count']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sheet']):
?><?php echo '
	    if($(\'#smpl_tbl'; ?>
<?php echo $this->_tpl_vars['sheet']; ?>
<?php echo '\').length) {
                $(\'#smpl_tbl'; ?>
<?php echo $this->_tpl_vars['sheet']; ?>
<?php echo '\').dataTable({
                    "sPaginationType": "bootstrap",
					"iDisplayLength" : 100,
                    "sDom": "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                    "oTableTools": {
                        "aButtons": [
                            "copy",
                            "print",
                            {
                                "sExtends":    "collection",
                                "sButtonText": \'Save <span class="caret" />\',
                                "aButtons":    [ "csv", "xls", "pdf" ]
                            }
                        ],
                        "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                    },
		    "aaSorting": [[1, \'natural-asc\']]
                });
            }
'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
        });
    </script>
'; ?>

</html>