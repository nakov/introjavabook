<?php
	session_start();
	require("utils.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-control" content="no-cache">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<meta http-equiv="Content-Language" content="bg">
	<title>Книга "Въведение в програмирането с Java" - показване на грешка</title>
</head>

<body>
<?php
	$bug_id = ereg_replace('[^0-9]','',$_GET['id']);
	if ($bug_id != '') {
		ConnectToDB();
		$row = GetBugById($bug_id);
	} else {
		$row = false;
	}
	if ($row) {
		$bug_id = $row['bug_id'];
		$bug_sent_by = $row['sent_by'];
		$bug_date = $row['date'];
		$bug_page_number = $row['page_number'];
		$bug_row_number = $row['row_number'];
		$bug_description = $row['description'];
?>
	<p style="{font-size:180%; text-align:center;}">
		Книга "Въведение в програмирането с Java"
	</p>
	
	<p style="{font-size:150%; text-align:center;}">
		Описание на грешка # <?=htmlspecialchars($bug_id)?>
	</p>
	
	<table align="center" width="90%" border="1" cellpadding="5" cellspacing="0" style="{background:#FFFFE1; border-color:blue; font-size:85%}">
		<tr style="{background:#E0E0FF;}">
			<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
				Пореден номер
			</td>
			<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
				Изпратена от
			</td>
			<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
				Дата
			</td>
			<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
				Страница
			</td>
			<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px; border-right:0px;}">
				Ред
			</td>
		</tr>
		<tr>
			<td style="{border-left:0px; border-top:0px;}">
				<?=htmlspecialchars($bug_id)?>
			</td>
			<td style="{border-left:0px; border-top:0px;}">
				<?=htmlspecialchars($bug_sent_by)?>
			</td>
			<td style="{border-left:0px; border-top:0px;}">
				<?=htmlspecialchars($bug_date)?>
			</td>
			<td style="{border-left:0px; border-top:0px;}">
				<?=htmlspecialchars($bug_page_number)?>
			</td>
			<td style="{border-left:0px; border-top:0px; border-right:0px;}">
				<?=htmlspecialchars($bug_row_number)?>
			</td>
		</tr>
		<tr>
			<td colspan="5" style="{background: #E0E0FF;font-weight:bold; text-align:center; border-left:0px; border-top:0px; border-right:0px;}">
				Описание
			</td>
		</tr>
		<tr>
			<td colspan="5" style="{border-left:0px; border-top:0px; border-bottom:0px; border-right:0px; font-family:'Courier New',Courier, monospace;}">
				<?=HtmlEscapeFormattedText($bug_description)?>
			</td>
		</tr>
	</table>

<?php
	include("show-comments-table.php");
	$randnum1 = rand(1,20);
	$randnum2 = rand(1,10);
	$sum = $randnum1 + $randnum2;
	$_SESSION['captcha'] = $sum;
	$randnum1word = GetNumberAsWord($randnum1);
	$randnum2word = GetNumberAsWord($randnum2);
?>

	<p style="{font-size:150%; text-align:center;}">
		Добавяне на коментар
	</p>

	<table align="center" width="90%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				Ако желаете да добавите коментар по грешката, използвайте следната форма
				<font style="{color:#F00000; font-weight=bold;}">
				(за предпочитане е да използвате кирилица)
				</font>
				:
			</td>
		</tr>
	</table>

	<form method="post" name="dataform" action="submit-comment.php">
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
						относно вашия коментар по тази грешка)
					</font>
					:<br>
					<input type="text" name="email" maxLength="100" style="width:100%">
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					Коментар. Моля формулирайте старателно и обосновано вашия коментар
					относно докладваната грешка:<br>
					<textarea name="comment" rows="16" style="width:100%"></textarea>
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
		<input type="hidden" name="bug_id" value="<?=htmlspecialchars($bug_id)?>">
	</form>
<?php
	} else {
?>
	<p style="{margin-top:5px; margin-bottom:5px; color:red; font-size:120%; font-weight:bold; text-align:center}">
		Възникна проблем при показването на избраната грешка.
	</p>
<?php
	}
?>
</body>
