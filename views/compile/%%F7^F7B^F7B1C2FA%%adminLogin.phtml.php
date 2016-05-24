<?php /* Smarty version 2.6.19, created on 2013-06-17 15:19:38
         compiled from adminlogin/adminLogin.phtml */ ?>
<form name="adminHP" method="post" id="adminHP" action="index">
<div id="logincontent">
<div id="leftarea">
<div class="left-box">
<div class="left-text">
Sign In to <font>Edit-Place.com</font></div>
<div class="common-text"><p>Enter your user name and password to log in </p></div>
</div>
</div>
<div id="midarea">
<div class="midimage"></div>
</div>

<div id="rightarea">
<div class="fieldbox">
<div class="rowone">Nom :</div>
<div class="rowtwo"><input type="text" name="log" id="log" class="loginfield"/></div>
<div class="rowone">Mot de passe :</div>
<div class="rowtwo"><input name="pass" id="pass" type="password" class="loginfield" value="" /></div>
<div class="rowone">Langue :</div>
<div class="rowtwo"><select name="lang" class="loginfield" >
				<option selected="" value="fr">FRANCE</option>
                <option value="eng">ENGLISH</option>
		</select></div>
<div align="center"><input type="submit" value="Connect" /></div>

</div>
</div>
</form>
<?php echo '
<script type="text/javascript">
	function formCallback(result, form)
	{
		window.status = "valiation callback for form \'" + form.id + "\': result = " + result;
	}
	var valid = new Validation(\'adminHP\', {immediate : true, onFormValidate : formCallback});

</script>
'; ?>
