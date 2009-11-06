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
	<title>����� "��������� � �������������� � Java" - ��������� �� ������</title>
</head>

<body>
<?php
	if (count($_POST) != 0) {
		$sender_name = trim(ltrim(ereg_replace('[^�-��-�A-Za-z -]','',$_POST['name'])));
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
		
		$message = "�������� � ������. ���������� ��!";
		if ($sender_name == '' || $page_number == '' || $row_number == '' || $bug_description == '' || $captcha == '') {
			$message = "��������� �����.<br>\n".
				"���� ��������� ������ ������ �� ������� ������ ����������!";
		} else {
			if ($captcha != $_SESSION['captcha']) {
				$message = "��������� �� ������!<br>\n".
					"��� �� ��� ���, ��������� ������ �� ������ �� ������ ������ ����������.";
			} else if (! AppendBugToDB($sender_name, $sender_email, $page_number, $row_number,
				$bug_description, $sender_agreed_to_be_listed)) {
				$message = "�������� ������� � ������ �����. ���� �������� ��-�����.";
			} else {
				$bug_id = mysql_insert_id();
				if (! SendEmailNotificationsForBug($bug_id, $sender_name, $sender_email,
					$page_number, $row_number, $bug_description, $sender_agreed_to_be_listed)) {
					$message = "�������� ������� ��� ����������� �� �������� �� �������� ".
						"�� �������. ���� �������� ��-�����.";
				}
			}
		}
?>
	<p style="{font-size:150%; text-align:center;}">
		<?= $message ?>
	</p>

	<p style="{text-align:center; font-size:85%;}">
		<a href="submit-bug.php">������� ��� ���������� �� ��������� �� ������ � ������� "��������� � �������������� � Java"</a>
	</p>
<?php
	} else {
?>
	<p style="{font-size:180%; text-align:center;}">
		����� "��������� � �������������� � Java"
	</p>
	
	<p style="{font-size:150%; text-align:center;}">
		��������� �� ������
	</p>

	<table align="center" width="90%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				���� ����� �� ��������� ������ ������, ����� �� �������, �� ��
				�� � ���� ��������� �� ���� ����� ���. ��������� �������
				�� ����������� �� ������� ������:
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
				���� ���� ��� �� �������, �� ��������, ����� ������ �� ���������, �� � ����
				��������� �� ����� ���� �� �������, ������ �� ��������� �������� �����
				<font style="{color:#F00000; font-weight=bold;}">
				(�� ������������ � �� ���������� ��������)
				</font>
				:
			</td>
		</tr>
	</table>
	
	<form method="post" name="dataform" action="submit-bug.php">
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
						������� ��������� ������)
					</font>
					:<br>
					<input type="text" name="email" maxLength="100" style="width:100%">
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					����� �� ��������
					<font style="{font-size:80%; font-style=italic;}">
						(����������� ���� �����, "," � "-", � ��� �������� �� �� ������ ��
						��������� ��������, �������� ���� ���� ������. �������� "283",
						"270, 275" ��� "171-172" ��� "")
					</font>
					:<br>
					<input type="text" name="page" maxLength="100" style="width:100%">
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					����� �� ���
					<font style="{font-size:80%; font-style=italic;}">
						(����������� ���� �����, "," � "-", � ��� �� ������ �� ���������� ���� ���
						�������� �� �� ������ �� ��������� ���, �������� ���� ���� ������.
						�������� "12" ��� "17, 19" ��� "16-23" ��� "")
					</font>
					<input type="text" name="row" maxLength="100" style="width:100%">
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					�������� �� ������, ��������� ��� ���� �������. ���� ������� ���������� �
					���������� ��������, ���� ����� ���������� ��������:<br>
					<textarea name="description" rows="16" style="width:100%"></textarea>
				</td>
			</tr>
			<tr>
				<td style="{border-left:0px; border-right:0px; border-top:0px;}">
					<input type="checkbox" name="agreed_to_be_listed" checked="true">
					&nbsp;
					����� ����� �� �� ���� ����������� � ���������� ������� �� �������
					� �������� "������������� �� ������� ������".
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
	</form>
<?php
	}
?>
	<p style="{text-align:center; font-size:85%;}">
		<a href="http://www.introprogramming.info/">������� ��� ����� �� ������� "��������� � �������������� � Java"</a>
	</p>
</body>
</html>
