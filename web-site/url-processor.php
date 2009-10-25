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
	$new_contents = preg_replace("/<title>.*?<\/title>/", "<title>" . $title . "</title>", $homepage_contents);
	$new_contents = preg_replace("/<h1>.*?<\/h1>/", "<h1>" . $title . "</h1>", $new_contents);
	echo $new_contents;		
?>
