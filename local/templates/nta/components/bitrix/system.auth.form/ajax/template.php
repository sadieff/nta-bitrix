<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CJSCore::Init(); ?>

<?
/* json ответ для ajax, если ошибка авторизации */	
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']) {
	$output = [];
    $output["status"] = "error";
    if($arResult['ERROR_MESSAGE']['TYPE'] == "OK") $output["title"] = "Выполнено";
    else $output["title"] = "Ошибка!";
/*    $output["text"] = $arResult['ERROR_MESSAGE']['MESSAGE'];*/
    $output["text"] = 'Неверный логин или пароль.';
    $output["data"] = $arResult['ERROR_MESSAGE'];
    echo json_encode($output);
	exit;
}
?>

<?if($arResult["FORM_TYPE"] == "login"):?>

<form name="system_auth_form<?=$arResult["RND"]?> auth_form" method="post" target="_top" data-action="/local/ajax/auth.php?login=yes" action="<?=$arResult["AUTH_URL"]?>">
<?if($arResult["BACKURL"] <> ''):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
<?foreach ($arResult["POST"] as $key => $value):?>
	<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
<?endforeach?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />
	<? /* запомнить авторизацию */ ?>
	<input type="hidden" checked="checked" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" />

    <div class="form-group">
    	<? /* ввод логина */ ?>
        <div class="form-group">
            <label for="inputName">Название компании на латинице</label>
            <input type="text" class="form-control" id="inputName" name="USER_LOGIN" data-rules="required">
            <script>
				BX.ready(function() {
					var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
					if (loginCookie)
					{
						var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
						var loginInput = form.elements["USER_LOGIN"];
						loginInput.value = loginCookie;
					}
				});
			</script>
        </div>

		<? /* ввод пароля */ ?>
        <div class="form-group">
            <div class="form-group">
                <label for="inputPassword">Ваш пароль</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" name="USER_PASSWORD" class="form-control" id="inputPassword" data-rules="required">
                    <div class="input-group-addon">
                        <a href=""><i class="show_password-icon" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
		
		<? /* ввод капчи, стандартный функционал. Оставляем на всякий случай. */ ?>
        <?if ($arResult["CAPTCHA_CODE"]):?>
        <div class="form-group">
            <div class="form-group">					
				<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				<input type="text" name="captcha_word" maxlength="50" value="" />
			</div>
		</div>
		<?endif?>

		<div class="forgot-link">
			<a data-toggle="tab" href="#forgotpasswd" role="tab" aria-controls="forgotpasswd" aria-selected="true">
				Забыли пароль ?
			</a>
		</div>
        <button type="submit" name="Login" class="btn btn-primary button-auth">Войти</button>
    </div>

</form>


<?
elseif($arResult["FORM_TYPE"] == "otp"):
?>

<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?if($arResult["BACKURL"] <> ''):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="OTP" />
	<table width="95%">
		<tr>
			<td colspan="2">
			<?echo GetMessage("auth_form_comp_otp")?><br />
			<input type="text" name="USER_OTP" maxlength="50" value="" size="17" autocomplete="off" /></td>
		</tr>
<?if ($arResult["CAPTCHA_CODE"]):?>
		<tr>
			<td colspan="2">
			<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:<br />
			<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
			<input type="text" name="captcha_word" maxlength="50" value="" /></td>
		</tr>
<?endif?>
<?if ($arResult["REMEMBER_OTP"] == "Y"):?>
		<tr>
			<td valign="top"><input type="checkbox" id="OTP_REMEMBER_frm" name="OTP_REMEMBER" value="Y" /></td>
			<td width="100%"><label for="OTP_REMEMBER_frm" title="<?echo GetMessage("auth_form_comp_otp_remember_title")?>"><?echo GetMessage("auth_form_comp_otp_remember")?></label></td>
		</tr>
<?endif?>
		<tr>
			<td colspan="2"><input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" /></td>
		</tr>
		<tr>
			<td colspan="2"><noindex><a href="<?=$arResult["AUTH_LOGIN_URL"]?>" rel="nofollow"><?echo GetMessage("auth_form_comp_auth")?></a></noindex><br /></td>
		</tr>
	</table>
</form>

<?
else:

/* json ответ для ajax, если мы авторизованы */	
$output = [];
$output["status"] = "success";
$output["redirect"] = "/";
echo json_encode($output);

endif?>