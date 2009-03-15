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
	<title>����� "��������� � �������������� � Java" - ��������� �� ������</title>
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
		����� "��������� � �������������� � Java"
	</p>
	
	<p style="{font-size:150%; text-align:center;}">
		�������� �� ������ # <?=htmlspecialchars($bug_id)?>
	</p>
	
	<table align="center" width="90%" border="1" cellpadding="5" cellspacing="0" style="{background:#FFFFE1; border-color:blue; font-size:85%}">
		<tr style="{background:#E0E0FF;}">
			<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
				������� �����
			</td>
			<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
				��������� ��
			</td>
			<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
				����
			</td>
			<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
				��������
			</td>
			<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px; border-right:0px;}">
				���
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
				��������
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
		�������� �� ��������
	</p>

	<table align="center" width="90%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				��� ������� �� �������� �������� �� ��������, ����������� �������� �����
				<font style="{color:#F00000; font-weight=bold;}">
				(�� ������������ � �� ���������� ��������)
				</font>
				:
			</td>
		</tr>
	</table>

	<form method="post" name="dataform" action="submit-comment.php">
		<table align="center" width="90%" border="1" cellpadding="10" cellspacing="0" style="{background:#FFFFE1; border-color:blue}">
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					������ ��� � �������:<br>
					<input type="text" name="name" maxLength="200" style="width:100%">
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					������ e-mail �����
					<font style="{font-size:80%; font-style=italic;}">
						(���� �� ���� ���������� ������ � �� �� �������� ���� �� ������ � ���
						������� ����� �������� �� ���� ������)
					</font>
					:<br>
					<input type="text" name="email" maxLength="100" style="width:100%">
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					��������. ���� ������������ ���������� � ���������� ����� ��������
					������� ������������ ������:<br>
					<textarea name="comment" rows="16" style="width:100%"></textarea>
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					������ �� ������ � �������: ���� �������� ������ �� �������
					<?= $randnum1word ?> � <?= $randnum2word ?> (���� �����).
					<input type="text" name="captcha" maxLength="5" style="width:100%">
				</td>
			</tr>
			<tr>
				<td align="center" style="{border-left:0px; border-right:0px; border-top:0px; border-bottom:0px;}">
					<p style="{margin-top:10px; margin-bottom:10px;}">
						<input type="submit" value="���������">
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
		�������� ������� ��� ����������� �� ��������� ������.
	</p>
<?php
	}
?>
</body>
