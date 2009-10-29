<?php
	header('Cache-Control: no-cache');
	header('Pragma: no-cache');
	header("Expires: 0");
	
	$urls = array(
		"/knigi/java/programming/kniga-Nakov-Java-programirane/" => "������� �� ����� �� Java ������������ - ������ ������!",
		"/knigi/nars/Vavedenie-v-programiraneto-s-Java-Nakov/" => "���� :: ����� �� Java: ��������� � �������������� � Java (�� ������� ����� � ��������)",
		"/computer-science/books/free/kniga-Intro-Java-programirane/" => "���������� ����� :: ������������ :: ����� :: ��������� :: ����� Intro Java",
		"/java/elektronna-kniga/programirane-kniga-Java-Nakov/" => "������������ :: Java :: ���������� ����� :: ����� �� ������������ �� Java �� ������� ����� � ��������",
		"/bezplatno/e-kniga/Nakov-kniga-programirane-Intro-Java/" => "��������� >> ���������� ����� >> ����� Intro Java �� ����� � ��������",
		"/bulgarski/Intro-Java-book-edna-kniga-programirane-Java-Nakov/" => "��������� ����� - ��������� - Intro Java: ���� ����� �� ������������ �� Java �� ����� � ��������",
		"/downloads/free/java-books/Nakov-kniga-online-book/" => "��������� ����������� ������ ����� �� ����� �� �������� �� �������������� �� Java",
		"/free/books/programming/Introduction-to-Programming-Using-Java-by-Svetlin-Nakov/" => "Books :: Introduction to Programming Using Java :: Free Java Programming Book by Svetlin Nakov and His Team",
		"/books/java/Introduction-to-Java-Programming-course-for-beginners/" => "Free Books Online :: Introduction to Java Programming - Comprehensive Course for Beginners",
		"/tutorials/programming/java/Introduction-to-the-Java-Programming-Language/" => "Programming Tutorials :: Introduction to the Java Programming Language (by Svetlin Nakov)",
		"/books/intro-java/Introduction-to-Computer-Science-using-Java/" => "Books :: Intro Java :: Introduction to Computer Science using Java"
	);
	
	$texts = array(
		"/knigi/java/programming/kniga-Nakov-Java-programirane/" => 
			"����� ����� �� ���������� �� ������� �� ������� ����� � �������� �� Java ������������. �� ������� �� ������� ��������������� �������� �� ��������������, " .
			"����� �� �� ������ ���� ����� �� ��� �� �������� � ���������� ���� �����������. ���� � ���� ������� �����, �� ����� �� ������� ����� ��������� " .
			"����������� � �������������� (����������, ������, �����), ���� � ��-������ ��������� ���� ��������, ��������� �� ����� � �������-����������� " .
			"������������ (���). ������� ������� ���� �������� �� �������������� � �� ������� ��������� ������� � ���������� �� ���������� �� ��������� ���������� ���� " .
			"���� �����, ��� ����������, GUI ���������� � ��������� �����������. �� � ������� ������ � ��������������. ��� ������ �� ������� �� ������������, ������������ " .
			"����� �� ��������. ����� � �� �������� �������� ������������ ������� - ������������ ������ �� ������ �� ������ �� ������� �� ��������� ��������� �������. " .
			"������� ��, �� �� ������� ���������, � ���������� � ������������ ����� �� ������ (��� ���� �� �� ������� �� ������) ������ ������, ����� �� ������ ���� " .
			"����������. �����!",
		"/knigi/nars/Vavedenie-v-programiraneto-s-Java-Nakov/" => 
			"���� � ��������� �� Java �� ���������� �������� �� ���������� �� ������� (����). ��� � ���� ������� ����� �� Java ������������, ������������ ��������� �� ���������. " .
			"������� ��������� � �������������� � Java �� ������� ����� � �������� � ����������� �� ������ �� �������� ���� ������ ���� �� ����������� ���� � ���������� � � " .
			"������� ��� ����������� �� ���-������� ������ ������ � ������ �� ������ �� ��������� ��� � �������� �� ������ �� ����������� � ������������. ������� �����, " .
			"����������� �� ���������� �������� �� ���������� �� ������� � ������ ��������� ������� � ������������ �� ������������ � ���������� ��������� ����������, � ������� " .
			"������ �� ��������� ������������ ������ �� ������ ��������������, � ����� ������� � �������� ���������, ���� �� �� ����������� ��������������. �������� ������ �� " .
			"������ ������� �������� ������ � ���������� � �������� � �� ����� �������� �������� � ������ ����� � �������� ��������� � �����������. ������� ��, ����� �� ������� " .
			"������ ���� �� ���. ������� ������������, ������������� ����� � �� ���������� ����� � ��������������.",
		"/computer-science/books/free/kniga-Intro-Java-programirane/" => 
			"����������� �� �������������� � ������� �� ������������ �� ������� �������, � ����� �� ��������� ������������ ����� (computer science) � �������������. ������������ " .
			"� �������� �� ������ �� ���������� ��������, ����� ������� ���������� ������. ���� �������� ���������� ��� ������ �����, ����� ���������, ��������� ������� ��������� " .
			"� ����� ������� �������� (������� �����). ����������� ����� ��������� � �������������� � Java �� ������� ����� � �������� (Intro Java book) ��������� �������� � " .
			"�������� �� ������������ ������������ � ��� �� ��� �� ������� ��������� ������������ ������� � �� ������ ������������ �� �������� �� ������ �� ������������. ������� " .
			"� ���������, ����������� ���� ������ � ������� ���, ���������� �� ��������, � ����� �� ��������� �� ������������� � ����������� �������� � ��������.",
		"/java/elektronna-kniga/programirane-kniga-Java-Nakov/" => 
			"��� ������� ���������� ����� �� ������������ �� Java, ��� ��������� �� ���� �� ���-����������� ����� �� ���������: ������� �� ������������ �� ������� ����� � " .
			"��������. ���� � ������� �����, ����� ������ �� ���������, �� �� ��������� � �������������� � �� �� ������� �� ������� � ������������ ������������ ���� ����������. " .
			"������� �� �� ����� �� ��������� �������� �� ��������������, ��� �������� �� ����� �� ������������. ���� ��� ���� ������ �� ��������� � ��������� ���������� �� " .
			"���������� �� ���������� � ���� �� ����� (���� JDBC � Hibernate), ��� ���������� (Java servlets, JSP, JSF � �����), ����� � ���������� �� GUI ���������� (AWT � Swing)." . 
			"�� �� � ��������� ������ ��������� � �������������� ��������� �������� �� ����������. ��� ��� ���� ���� �� �������. �������������� ���� ��������, �� ����� ���� � ������.",
		"/bezplatno/e-kniga/Nakov-kniga-programirane-Intro-Java/" => 
			"�� ���� ��� ���� ������ �� ��������� ��������� ������������ ����� Intro Java �� ������� ����� � ��������. ���� � ������� ����� �� ������������, ����� ������ �� ������ " .
			"��������� � ���������� ��������� �����������. �� � ������� ������ ��� ��������� �� �������� �� ��������������: ��������� �������, ��������� �� ����� � ���������. ������ " .
			"����������� ����� � ������� ������������, ����� �� ������ � ���� �� ����� �����. ��� �� ������ �� �� ��������, ��������� ������� ������. ��������� �����������. ������� " .
			"���� ������ �� �������� �� ������������. ������� � �� ������� ����� � ������ �� ������������ ���������. ����� �� �� ���� ���� ������� �� � �� �� ������. �������������� � " .
			"�������� � ���� �� �� ����� ���� � ������� �������� �� ������ � ������ �� ��������. �����!",
		"/bulgarski/Intro-Java-book-edna-kniga-programirane-Java-Nakov/" => 
			"����� ����� �� ����� �� ���� ���������� ��������� ����� �� ������������ �� Java �� ����� � ��������. ������� ��������� � �������������� � Java (�������� ��� ���� Intro " .
			"Java book) � ���������� ��������� ��������, ����������� �� ��������� ������, ��������� ����������� � ��������� �������� � ������������ ����. ���� �� � �������� ����������� " .
			"������ �� ����� ����������� ����� �� Java, � � ��������� ����������, � ����� ���������� �������� ������� ���� ���� � ���� ������� ������ � ������������ �� ���������� �� " .
			"��������������. ������� �� ���� ����� ��������� ���� ������ � ������, ����� � ��������, ������� ��������� ��������� �� ����� � ��������������, ��������� ��������� � " .
			"�������� �� ��������� � ����������� �� �������-������������� ������������ (���). � ������� � �������� ������ �� ������� ����� �� �������� �� ������ �� ������������, �������� " .
			"�� ����� �� ��������� �� ������� � ���������� �� ������������, � ����� ��� ������� � ������ ���������. ��� ������ �� ������� ����� ����������, ��������� ���������� ������� " .
			"� ������� ������ ���������� �� ������ �����. ��� ������������ ���� �� �������. �� �� 90% �� ������ �������� �� ������������. ���������� 10% �� ��������, ��� ����� �� ����.",
		"/downloads/free/java-books/Nakov-kniga-online-book/" => 
			"����� ����� �� ����� �� ������� ��������� ��������� ����� �� ������ �� ��������������. ��������� ����������� ������ ����� �� ����� �� �������� �� �������������� �� Java �" .
			"��������� ������� ������ � ������������ �� ���������� �� �������������� � ���������� �� ���������� �������. Download the free Intro Java programming book by Svetlin Nakov " .
			"and his team. �� ���������� ���-������� ���������, ����� ����� ���� �� ������ ���� �������� � ��������: �� �� �� ������� �� ������������ ������ �� ������������. ����� �� " .
			"�� � ������ ���� � ������. ������� ������������ � �� ��������� ��������������. ��� �� �� ��������, ������� �� ��������, ������ ����������� � ������� ������ ���. ��� ����� " .
			"����� ��������� �������� �� ������� ��������� �����������, �� ����� � ������� � ���������� �� ��������� ���� ������� ������ �� ������ � ���� ������ ������.",
		"/free/books/programming/Introduction-to-Programming-Using-Java-by-Svetlin-Nakov/" => 
			"Welcome to the official web site of the free open source online book Introduction to programming with Java by Svetlin Nakov and his team. This is an unique book about the " .
			"introduction to programming using Java programming language. It is free Java programming book covering the fundamental concepts of computer programming: logical thinking, " .
			"data structures, algorithms and object-oriented programming (OOP). This is a conceptual book for beginners, a comprehensive programming tutorial, a textbook for software " .
			"developers focusing on the basic concepts of computer programming. Follow the book and try to solve all exercises at the end of each chapter. To learn programming you need " .
			"to practice. Svetlin Nakov is proven software engineer with 15 years of experience as software engineer, project leader and software development trainer. Read his " .
			"recommendations about how to become a computer programmer, how to solve problems in informatics and computer science and gain the programming skills easy. The book is " .
			"originally written in Bulgarian an currently there is no English version.",
		"/books/java/Introduction-to-Java-Programming-course-for-beginners/" => 
			"Welcome to the Web site of the free Java programming book Introduction to Java Programming. This online book is a comprehensive computer programming course for beginners. " .
			"The book is developed by skillful and experienced team of software engineers and shares their expertise in the bases of computer programming and problem solving. The book " .
			"covers the computer programming fundamentals: Java language, data structures, algorithms and object-oriented programming (OOP). To be effective, be sure to solve all the " .
			"exercises in the book. At least try to solve them and see how programming is working. Practicing is the only way to learn programming. The book is in Bulgarian and we still " .
			"don't have an English transalation.",
		"/tutorials/programming/java/Introduction-to-the-Java-Programming-Language/" => 
			"If you are looking for a good computer programming tutorial in Bulgarian, you are at the right Web site. Here you can learn the fundamentals of computer programming. This is " .
			"a programming tutorial covering the important programming concepts like data structures and algorithms. The book Introduction to the Java Programming Language by Svetlin " .
			"Nakov and his team can be downloaded for free in PDF format. Download the book and start reading it. Follow the instructions and try to solve all assignments and exercises. " .
			"This is the only way to effectively learn to program. Practicing is the most important thing, do it every day.",
		"/books/intro-java/Introduction-to-Computer-Science-using-Java/" => 
			"Many books try to introduce the concepts of computer programming. The Intro Java book (Introduction to computer programming with Java by Svetlin Nakov and his team) is an " .
			"uniuqe computer programming tutorial in Bulgarian that makes an introduction to computer science using Java programming language but focuses on the fundamentals: programming " .
			"constructs, arrays, loops, recursion, data structures, algorithms and complexity, problem solving and object-oriented programming (OOP). This is really a good start for " .
			"beginners. The book is written by a team of experienced software engineers and is easy to read and follow. The most important is to put enough time and effort to work on the " .
			"exercises. Solve all the exercises in the book and you will really learn how to program. We don't still have an English version (sorry)."
	);
	
	$requestURL = $_SERVER["REDIRECT_URL"];
	$title = $urls[$requestURL];
	if ($title == null)
	{
		$title = $urls[$requestURL . '/'];
	}
	if ($title == null)
	{
		header('Location: /');
		die;
	}
	
	$homepage_url = "http://" . $_SERVER["SERVER_NAME"];
	$homepage_contents = file_get_contents($homepage_url);
	
	$new_contents = preg_replace(
		"/<title>.*?<\/title>/", 
		"<title>" . $title . "</title>", 
		$homepage_contents);
	
	$meta_keywords = generate_meta_keywords($requestURL);
	$new_contents = preg_replace(
		"/<meta name=\\\"keywords\\\".*?\/>/", 
		$meta_keywords, 
		$new_contents);
	
	$meta_description = generate_meta_description($title);
	$new_contents = preg_replace(
		"/<meta name=\\\"description\\\".*?\/>/", 
		$meta_description, 
		$new_contents);
	
	$primary_content = $texts[$requestURL];
	$primary_content = "\n<p>" . $primary_content . "</p>\n\n" .
		"<p><a href=\"/\">��� ��������� �������� �� ������� \"��������� � �������������� � Java\" �� ������� ����� � ��������</a></p>\n";
	$new_contents = preg_replace(
		"/<div id=\\\"primarycontent\\\"[\S|\s]*?<div id=\\\"secondarycontent\\\">/",
		'<div id="primarycontent"><div class="post"><div class="header"><h1>' . $title . '</h1></div>' . 
		'<div class="content">' . $primary_content . '</div></div></div><div id="secondarycontent">',
		$new_contents);
		
	echo $new_contents;		
?>

<?php

function generate_meta_keywords($url) {
	$tokens = preg_split("/[\/-]+/", $url);
	$first = true;
	$keywords = "";
	foreach ($tokens as $token) {
		if (strlen($token) > 2) {
			if (! $first) {
				$keywords = $keywords . ", ";
			}
			$first = false;
			$keywords = $keywords . $token;
		}
	}
	$meta = "<meta name=\"keywords\" content=\"" . $keywords . "\" />";
	return $meta;
}

function generate_meta_description($title) {
	$meta = "<meta name=\"description\" content=\"" . $title . "\" />";
	return $meta;
}
?>
