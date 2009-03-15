<?php
	require_once("settings.php");
	
	function ConnectToDB()
	{
		$result = mysql_pconnect(DB_HOST, DB_USER, DB_PASS);
		if ($result) {
			$result = mysql_select_db(DB_NAME);
		}
		return $result;
	}
	
	function AppendBugToDB($sender_name, $sender_email, $page_number, $row_number,
		$bug_description, $sender_agree_to_be_listed)
	{
		$sender_name = MySQLEscapeString($sender_name);
		$sender_email = MySQLEscapeString($sender_email);
		$page_number = MySQLEscapeString($page_number);
		$row_number = MySQLEscapeString($row_number);
		$bug_description = MySQLEscapeString($bug_description);
		$sender_agree_to_be_listed = MySQLEscapeString($sender_agree_to_be_listed);
		$insert_query = 
			"INSERT INTO introjavabook_bugs ".
			"(sent_by, sender_email, page_number, row_number, description, ".
			"sender_agree_to_be_listed) ".
			"VALUES ('$sender_name', '$sender_email', '$page_number', '$row_number', ".
			" '$bug_description', '$sender_agree_to_be_listed')";
		$sql_result = mysql_query($insert_query);
		return $sql_result;	
	}
	
	function AppendCommentToDB($bug_id, $sender_name, $sender_email, $comment)
	{
		$bug_id = MySQLEscapeString($bug_id);
		$sender_name = MySQLEscapeString($sender_name);
		$sender_email = MySQLEscapeString($sender_email);
		$comment = MySQLEscapeString($comment);
		$insert_query = 
			"INSERT INTO introjavabook_bug_comments (bug_id, sent_by, sender_email, comment) ".
			"VALUES ('$bug_id', '$sender_name', '$sender_email', '$comment') ";
		$sql_result = mysql_query($insert_query);
		return $sql_result;	
	}
	
	function SendEmailNotificationsForBug($bug_id, $sender_name, $sender_email, $page_number,
		$row_number, $bug_description, $sender_agree_to_be_listed)
	{
		$date = date('d-m-Y H:i:s');
		$agree = "�";
		if (! $sender_agree_to_be_listed ) {
			$agree = "�� �";
		}

		$bug_description = RemoveUnwantedSlashes($bug_description);
		
		$mail_body = 
			"$sender_name � ������� ������ � ������� \"��������� � �������������� � Java\".\n\n".
			"����: $date\n".
			"�������� (���): $sender_name\n".
			"�������� (e-mail): $sender_email\n".
			"��������: $page_number\n".
			"��� (������): $row_number\n".
			"���������� $agree �������� �� �� �� ��������� �����.\n".
			"�������� �� ��������:\n\n$bug_description\n\n\n".
			"See the bug here: http://www.nakov.com/introjavabook-bugs/show-bug.php?id=$bug_id\n";
		$mail_recipients = MAIL_RECIPIENTS;
		$mail_subject = 
			"Bug report: Introduction to Programming with Java";
		$mail_headers = 
			"Return-Path: $sender_email\n".
			"From: $sender_email\n".
			"Reply-To: $sender_email\n".
			"Content-Type: text/plain; charset=\"windows-1251\"\n".
			"Content-Transfer-Encoding: 8bit\n";

		$mail_result = mail($mail_recipients, $mail_subject, $mail_body, $mail_headers);
		return $mail_result;
	}

	function SendEmailNotificationsForComment($bug_id, $sender_name, $sender_email, $comment)
	{
		$bug = GetBugById($bug_id);
		if ($bug == false) {
			return false;
		}

		$comment = RemoveUnwantedSlashes($comment);
		
		$bug_sender_email = $bug['sender_email'];
		$bug_date = $bug['date'];
		$bug_page_number = $bug['page_number'];
		$bug_row_number = $bug['row_number'];
		$bug_description = $bug['description'];

		$comment_date = date('d-m-Y H:i:s');
		$comment = stripslashes($comment);
		
		$mail_body = 
			"$sender_name � �������� �������� �� ������ #$bug_id � ������� \"��������� � �������������� � Java\".\n\n".
			"����: $comment_date\n".
			"�������� ��������� (���): $sender_name\n".
			"�������� ��������� (e-mail): $sender_email\n".
			"��������:\n\n$comment\n\n".
			"���������� � �� ������ #$bug_id �� ���. $bug_page_number, ��� $bug_row_number,".
			" ��������� �� $bug_sent_by �� $bug_date :\n".
			"\n$bug_description\n\n".
			"See the comment here: http://www.nakov.com/introjavabook-bugs/show-bug.php?id=$bug_id\n";
		$mail_recipients = MAIL_RECIPIENTS . ", $bug_sender_email";
		$mail_subject = 
			"Bug comment: Intorduction to Programming with Java";
		$mail_headers = 
			"Return-Path: $sender_email\n".
			"From: $sender_email\n".
			"Reply-To: $sender_email\n".
			"Content-Type: text/plain; charset=\"windows-1251\"\n".
			"Content-Transfer-Encoding: 8bit\n";

		$mail_result = mail($mail_recipients, $mail_subject, $mail_body, $mail_headers);
		return $mail_result;
	}

	function GetAllBugsFromDB()
	{
		$select_query = 
			"SELECT bug_id, sent_by, DATE_FORMAT(sent_on,'%e-%m-%Y %k:%i') as date, ".
			"page_number, row_number, description ".
			"FROM introjavabook_bugs ".
			"ORDER BY page_number, date";
		$sql_result = mysql_query($select_query);
		return $sql_result;	
	}
	
	function GetBugById($bug_id) {
		$bug_id = MySQLEscapeString($bug_id);
		$select_query = 
			"SELECT bug_id, sent_by, sender_email, ".
			"DATE_FORMAT(sent_on,'%e-%m-%Y %k:%i') as date, ".
			"page_number, row_number, description ".
			"FROM introjavabook_bugs ".
			"WHERE bug_id = $bug_id ";
		$sql_result = mysql_query($select_query);
		if ($sql_result) {
			$row = mysql_fetch_array($sql_result);
			return $row;
		} else {
			return false;
		}
	}
	
	function GetAllCommentsForBug($bug_id)
	{
		$bug_id = MySQLEscapeString($bug_id);
		$select_query = 
			"SELECT sent_by, DATE_FORMAT(sent_on,'%e-%m-%Y %k:%i') as date, comment ".
			"FROM introjavabook_bug_comments ".
			"WHERE bug_id='$bug_id' ".
			"ORDER BY date";
		$sql_result = mysql_query($select_query);
		return $sql_result;	
	}
	
	function RemoveUnwantedSlashes($text) {
		if (get_magic_quotes_gpc()) {
			$text = stripslashes($text);
		}
		return $text;
	}

	function MySQLEscapeString($text) {
		$text_without_slashes = RemoveUnwantedSlashes($text);
		$escaped_text = mysql_real_escape_string($text_without_slashes);
		return $escaped_text;
	}

	function HtmlEscapeFormattedText($html_text) {
		$result_html_text = TextWrap($html_text, 100);
		$result_html_text = htmlspecialchars($result_html_text);
		$result_html_text = str_replace(' ', '&nbsp;', $result_html_text);
		$result_html_text = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $result_html_text);
		$result_html_text = nl2br($result_html_text);
		return $result_html_text;
	}

	function TextWrap($string, $breaksAt = 78, $breakStr = "\n", $cut = 1 , $padStr="") {
		/*
			$string    The string to be wrapped.
			$breaksAt  How many characters each line should be.
			$breakStr  What character should be used to cause a break.
			$cut       If the cut is set to 1, the string is always wrapped at the specified width.
			$padStr    Allows for the wrapped lines to be padded at the begining.
		*/
			
		$newString = "";
		$lines = explode($breakStr, $string);
		$cnt = count($lines);
		for ($x=0; $x<$cnt; $x++) {
		  if (strlen($lines[$x]) > $breaksAt) {
		    $str = $lines[$x];
		    while (strlen($str) > $breaksAt) {
		      $find = 1 ;
		      $pos = strrpos(substr($str, 0, $breaksAt+1), " ");
		      if ($pos == false) {
						if ($cut) {
							$pos = $breaksAt ;
							$find = 0 ;
						} else {
							$pos= strpos($str, " ");
							if ($pos == false) {
								break;
							}
						}
		      }
		      $newString .= $padStr.substr($str, 0, $pos).$breakStr;
		      $str = substr($str, $pos + $find);
		    }
		    $newString .= $padStr . $str . $breakStr;
		  }
		  else{
		    $newString .= $padStr . $lines[$x] . $breakStr;
		  }
		}

		$result = substr($newString, 0, -(strlen($breakStr)));
		return $result;
	}
	
	function GetNumberAsWord($num) {
		switch($num) {
			case 1: return "����";
			case 2: return "���";
			case 3: return "���";
			case 4: return "������";
			case 5: return "���";
			case 6: return "����";
			case 7: return "�����";
			case 8: return "����";
			case 9: return "�����";
			case 10: return "�����";
			case 11: return "����������";
			case 12: return "����������";
			case 13: return "����������";
			case 14: return "�������������";
			case 15: return "����������";
			case 16: return "�����������";
			case 17: return "������������";
			case 18: return "�����������";
			case 19: return "������������";
			case 20: return "��������";
			default: throw new Exception("GetNumberAsWord: invalid number"); 
		}
	}

?>