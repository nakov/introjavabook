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
	<title>Книга "Въведение в програмирането с Java" - изпращане на коментар по грешка</title>
</head>

<body>
<?php
	$bug_id = ereg_replace('[^0-9]','',$_POST['bug_id']);
	$sender_name = trim(ltrim(ereg_replace('[^А-Яа-яA-Za-z -]','',$_POST['name'])));
	$sender_name = substr($sender_name, 0, 50);
	$sender_email = ereg_replace('[^-_@.A-Za-z0-9]','',$_POST['email']);
	$comment = trim(ltrim($_POST['comment']));
	$captcha = ereg_replace('[^0-9]','',$_POST['captcha']);
	
	$message = "Коментарът ви е приет. Благодарим ви!";
	if ($bug_id == '' || $sender_name == '' || $comment == '') {
		$message = "Невалидни данни.<br>\n".
			"Моля попълнете всички полета от формата според указанията!";
	} else {
		if ($captcha != $_SESSION['captcha']) {
			$message = "Забранено за ботове!<br>\n".
				"Ако не сте бот, попълнете полето за защита от ботове според указанията.";
			} else if (! AppendCommentToDB($bug_id, $sender_name, $sender_email, $comment)) {
			$message = "Възникна проблем с базата данни. Моля опитайте по-късно.";
		} else {
			if (! SendEmailNotificationsForComment($bug_id, $sender_name, $sender_email, $comment)) {
				$message = "Възникна проблем при изпращането на коментара ви до авторите ".
					"на книгата. Моля опитайте по-късно.";
			}
		}
	}
?>
	<p style="{font-size:150%; text-align:center;}">
		<?= $message ?>
	</p>

	<p style="{text-align:center; font-size:85%;}">
		<a href="show-bug.php?id=<?=$bug_id?>">Връщане обратно към грешка #<?=htmlspecialchars($bug_id)?></a>
	</p>
</body>
