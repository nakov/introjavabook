<table align="center" width="90%" border="1" cellpadding="1" cellspacing="0" style="{background:#FFFFE1; border-color:blue; font-size:85%}">
	<tr style="{background:#E0E0FF;}">
		<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
			Изпратена от
		</td>
		<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
			Дата
		</td>
		<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
			Страница
		</td>
		<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px;}">
			Ред
		</td>
		<td style="{font-weight:bold; text-align:center; border-left:0px; border-top:0px; border-right:0px;}">
			Описание
		</td>
	</tr>
<?php
	$bugs_result_set = GetAllBugsFromDB();
	if ($bugs_result_set) {
		while ($row = mysql_fetch_array($bugs_result_set)) {
			$bug_id = $row['bug_id'];
			$name = $row['sent_by'];
			$date = $row['date'];
			$page_number = $row['page_number'];
			$row_number = $row['row_number'];
			$description = $row['description'];
			$description_short = substr($description, 0, 50);
			if ($description_short != $description) {
				$description_short .= ' ...';
			}
?>	
	<tr>
		<td style="{border-left:0px; border-top:0px;}">
			<?=htmlspecialchars($name)?>
		</td>
		<td style="{border-left:0px; border-top:0px;}">
			<?=htmlspecialchars($date)?>
		</td>
		<td style="{border-left:0px; border-top:0px;}">
			<?=htmlspecialchars($page_number)?>
		</td>
		<td style="{border-left:0px; border-top:0px;}">
			<?=htmlspecialchars($row_number)?>
		</td>
		<td style="{border-left:0px; border-top:0px; border-right:0px;}">
			<a href="show-bug.php?id=<?=$bug_id?>" target="_blank">
				<?=htmlspecialchars($description_short)?>
			</a>
		</td>
	</tr>
<?php
		}
	} else {
?>	
	<tr>
		<td colspan="5" style="{border-left:0px; border-top:0px; border-right:0px; border-bottom:0px;}">
			<p style="{margin-top:5px; margin-bottom:5px; color:red; font-size:120%; font-weight:bold; text-align:center}">
				Настъпи проблем при извличане на изпратените грешки от базата данни!
			</p>
		</td>
	</tr>
<?php
	}
?>	
</table>