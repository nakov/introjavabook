<?php
	$comments_result_set = GetAllCommentsForBug($bug_id);
	if ($comments_result_set) {
		$row = mysql_fetch_array($comments_result_set);
		if ($row != false) {
?>
			<p style="{font-size:150%; text-align:center;}">
				Коментари по тази грешка
			</p>
<?php
			while ($row != false) {
				$comment_sent_by = $row['sent_by'];
				$comment_date = $row['date'];
				$comment_body = $row['comment'];
				$comments_count = $comments_count + 1;
?>
				<table align="center" width="90%" border="1" cellpadding="5" cellspacing="0" style="{background:#FFFFE1; border-color:blue; font-size:85%;}">
					<tr>
						<td width="80" style="{background:#E0E0FF; font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
							Изпратен от
						</td>
						<td style="{border-left:0px; border-top:0px; border-right:0px;}">
							<?=htmlspecialchars($comment_sent_by)?>
						</td>
					</tr>
					<tr>
						<td width="80" style="{background:#E0E0FF; font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
							Дата
						</td>
						<td style="{border-left:0px; border-top:0px; border-right:0px;}">
							<?=htmlspecialchars($comment_date)?>
						</td>
					</tr>
					<tr>
						<td width="80" style="{background:#E0E0FF; font-weight:bold; text-align:center; border-left:0px; border-top:0px; border-bottom:0px;}">
							Коментар
						</td>
						<td style="{border-left:0px; border-top:0px; border-bottom:0px; border-right:0px; font-family:'Courier New',Courier, monospace;}">
							<?=HtmlEscapeFormattedText($comment_body)?>
						</td>
					</tr>
				</table>
<?php
				$row = mysql_fetch_array($comments_result_set);
				if ($row) {
?>
					<br>
<?php
				}
			}
		} else {
			// no comments found
?>
			<br>
			<table align="center" width="90%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						До момента няма коментари по тази грешка.
					</td>
				</tr>
			</table>
<?php
		}
	} else {
?>
	<tr>
		<td colspan="5" style="{border-left:0px; border-top:0px; border-right:0px; border-bottom:0px;}">
			<p style="{margin-top:5px; margin-bottom:5px; color:red; font-size:120%; font-weight:bold; text-align:center}">
				Настъпи проблем при извличане на коментарите по грешка # <?=htmlspecialchars($bug_id)?>.
			</p>
		</td>
	</tr>
<?php
	}
?>
