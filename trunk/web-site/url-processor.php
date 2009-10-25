<?php
	header('Cache-Control: no-cache');
	header('Pragma: no-cache');
	header("Expires: 0");
	
	$urls = array(
		"/knigi/java/programming/kniga-Nakov-Java-programirane/" => "Книгата на Наков за Java програмиране - четете онлайн!",
		"/knigi/nars/Vavedenie-v-programiraneto-s-Java-Nakov/" => "НАРС :: Книги за Java: Въведение в програмирането с Java (от Светлин Наков и колектив)",
		"/computer-science/books/free/kniga-Intro-Java-programirane/" => "Компютърни науки :: програмиране :: книги :: безплатни :: книга Intro Java",
		"/java/elektronna-kniga/programirane-kniga-Java-Nakov/" => "Програмиране :: Java :: електронни книги :: книга за програмиране на Java от Светлин Наков и колектив",
		"/bezplatno/e-kniga/Nakov-kniga-programirane-Intro-Java/" => "Безплатно >> електронна книга >> книга Intro Java от Наков и колектив",
		"/bulgarski/Intro-Java-book-edna-kniga-programirane-Java-Nakov/" => "Български книги - безплатно - Intro Java: една книга за програмиране на Java от Наков и колектив",
		"/downloads/free/java-books/Nakov-kniga-online-book/" => "Изтеглете безплатната онлайн книга на Наков за основите на програмирането на Java",
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
