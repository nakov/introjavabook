<?php
	session_start();
	require("utils.php");
	ConnectToDB();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-control" content="no-cache">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<meta http-equiv="Content-Language" content="bg">
	<title>Книга "Въведение в програмирането с Java" - изпращане на грешка</title>
</head>

<body>
<?php
	if (count($_POST) != 0) {
		$sender_name = trim(ltrim(ereg_replace('[^А-Яа-яA-Za-z -]','',$_POST['name'])));
		$sender_name = substr($sender_name, 0, 50);
		$sender_email = ereg_replace('[^-_@.A-Za-z0-9]','',$_POST['email']);
		$page_number = ereg_replace('[^0-9,-]','',$_POST['page']);
		$page_number = ereg_replace('[,]',', ',$page_number);
		if ($page_number == '') {
			$page_number = '-';
		}
		$row_number = ereg_replace('[^0-9,-]','',$_POST['row']);
		$row_number = ereg_replace('[,]',', ',$row_number);
		if ($row_number == '') {
			$row_number = '-';
		}
		$bug_description = trim(ltrim($_POST['description']));
		$sender_agreed_to_be_listed = 0;
		if ($_POST['agreed_to_be_listed'] != '') {
			$sender_agreed_to_be_listed = 1;
		}
		$captcha = ereg_replace('[^0-9]','',$_POST['captcha']);
		
		$message = "Грешката е приета. Благодарим ви!";
		if ($sender_name == '' || $page_number == '' || $row_number == '' || $bug_description == '' || $captcha == '') {
			$message = "Невалидни данни.<br>\n".
				"Моля попълнете всички полета от формата според указанията!";
		} else {
			if ($captcha != $_SESSION['captcha']) {
				$message = "Забранено за ботове!<br>\n".
					"Ако не сте бот, попълнете полето за защита от ботове според указанията.";
			} else if (! AppendBugToDB($sender_name, $sender_email, $page_number, $row_number,
				$bug_description, $sender_agreed_to_be_listed)) {
				$message = "Възникна проблем с базата данни. Моля опитайте по-късно.";
			} else {
				$bug_id = mysql_insert_id();
				if (! SendEmailNotificationsForBug($bug_id, $sender_name, $sender_email,
					$page_number, $row_number, $bug_description, $sender_agreed_to_be_listed)) {
					$message = "Възникна проблем при изпращането на грешката до авторите ".
						"на книгата. Моля опитайте по-късно.";
				}
			}
		}
?>
	<p style="{font-size:150%; text-align:center;}">
		<?= $message ?>
	</p>

	<p style="{text-align:center; font-size:85%;}">
		<a href="submit-bug.php">Връщане към страницата за изпращане на грешки в книгата "Въведение в програмирането с Java"</a>
	</p>
<?php
	} else {
?>
	<p style="{font-size:180%; text-align:center;}">
		Книга "Въведение в програмирането с Java"
	</p>
	
	<p style="{font-size:150%; text-align:center;}">
		Изпращане на грешки
	</p>

	<table align="center" width="90%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				Моля преди да изпратите своята грешка, първо се убедете, че тя
				не е вече изпратена от друг преди Вас. Проверете списъка
				на изпратените до момента грешки:
			</td>
		</tr>
	</table>

	<p>	
<?php
	include("show-bugs-table.php");
	
	$randnum1 = rand(1,20);
	$randnum2 = rand(1,10);
	$sum = $randnum1 + $randnum2;
	$_SESSION['captcha'] = $sum;
	$randnum1word = GetNumberAsWord($randnum1);
	$randnum2word = GetNumberAsWord($randnum2);
?>
	</p>
	
	<table align="center" width="90%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				След като сте се убедили, че грешката, която искате да изпратите, не е била
				изпратена от никой друг до момента, можете да попълните следната форма
				<font style="{color:#F00000; font-weight=bold;}">
				(за предпочитане е да използвате кирилица)
				</font>
				:
			</td>
		</tr>
	</table>
	
	<form method="post" name="dataform" action="submit-bug.php">
		<table align="center" width="90%" border="1" cellpadding="10" cellspacing="0" style="{background:#FFFFE1; border-color:blue}">
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					Вашите име и фамилия:<br>
					<input type="text" name="name" maxLength="200" style="width:100%">
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					Вашият e-mail адрес
					<font style="{font-size:80%; font-style=italic;}">
						(няма да бъде публикуван никъде и ще се използва само за връзка с вас
						относно откритата грешка)
					</font>
					:<br>
					<input type="text" name="email" maxLength="100" style="width:100%">
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					Номер на страница
					<font style="{font-size:80%; font-style=italic;}">
						(Използвайте само цифри, "," и "-", а ако грешката не се отнася за
						конкретна страница, оставете това поле празно. Например "283",
						"270, 275" или "171-172" или "")
					</font>
					:<br>
					<input type="text" name="page" maxLength="100" style="width:100%">
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					Номер на ред
					<font style="{font-size:80%; font-style=italic;}">
						(Използвайте само цифри, "," и "-", а ако не можете да определите реда или
						грешката не се отнася за конкретен ред, оставете това поле празно.
						Например "12" или "17, 19" или "16-23" или "")
					</font>
					<input type="text" name="row" maxLength="100" style="width:100%">
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					Описание на грешка, неточност или друг проблем. Моля опишете старателно и
					обосновано проблема, след което предложете корекция:<br>
					<textarea name="description" rows="16" style="width:100%"></textarea>
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					<input type="checkbox" name="agreed_to_be_listed" checked="true">
					&nbsp;
					Желая името ми да бъде публикувано в следващото издание на книгата
					в секцията "благодарности за открити грешки".
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					Защита от ботове и спамери: моля въведете сумата на числата
					<?= $randnum1word ?> и <?= $randnum2word ?> (като число).
					<input type="text" name="captcha" maxLength="5" style="width:100%">
				</td>
			</tr>
			<tr>
				<td align="center" style="{border-left:0px; border-right:0px; border-top:0px; border-bottom:0px;}">
					<p style="{margin-top:10px; margin-bottom:10px;}">
						<input type="submit" value="Изпращане">
					</p>
				</td>
			</tr>
		</table>
	</form>
<?php
	}
?>
	<p style="{text-align:center; font-size:85%;}">
		<a href="http://www.introprogramming.info/">Връщане към сайта на книгата "Въведение в програмирането с Java"</a>
	</p>
</body>
</html>
