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
	
	$texts = array(
		"/knigi/java/programming/kniga-Nakov-Java-programirane/" => 
			"Добре дошли на страницата на книгата на Светлин Наков и колектив за Java програмиране. От книгата ще научите фундаменталните принципи на програмирането, " .
			"които ще ви служат през целия ви път на развитие и изграждане като програмисти. Това е една чудесна книга, от която ще усвоите както основните " .
			"конструкции в програмирането (променливи, масиви, цикли), така и по-сложни концепции като рекурсия, структури от данни и обектно-ориентирано " .
			"програмиране (ООП). Книгата обхваща само основите на програмирането и не включва конкретни похвати и технологии за изграждане на софтуерни приложения като " .
			"бази данни, уеб приложения, GUI приложения и софтуерно инженерство. Тя е първата стъпка в програмирането. Ако веднъж се научите да програмирате, технологиите " .
			"бързо се научават. Важно е да развиете правилно алгоритмично мислене - способността стъпка по стъпка от задача да стигате до конкретно програмно решение. " .
			"Разбира се, за да усвоите материята, е необходимо и изключително важно да решите (или поне да се опитате да решите) всички задачи, които са дадени като " .
			"упражнения. Успех!",
		"/knigi/nars/Vavedenie-v-programiraneto-s-Java-Nakov/" => 
			"Това е учебникът по Java на Национална академия по разработка на софтуер (НАРС). Той е една отлична книга за Java програмиране, изключително подходяща за начинаещи. " .
			"Книгата Въведение в програмирането с Java от Светлин Наков и колектив е разработена на базата на събрания през години опит от едноименния курс в Академията и е " .
			"насочен към придобиване на най-важните базови знания и умения за писане на програмен код и решаване на задачи по информатика и програмиране. Светлин Наков, " .
			"учредителят на Национална академия по разработка на софтуер е опитен софтуерен инженер и преподавател по програмиране и съвременни софтуерни технологии, с отлични " .
			"умения да представя информацията стъпка по стъпка последователно, с много примери и детайлни обяснения, така че да почувствате програмирането. Неговото умение да " .
			"описва учебния материал просто и разбираемо е следвано и от целия авторски колектив и цялата книга е написана интересно и увлекателно. Разбира се, колко ще научите " .
			"зависи само от вас. Правете упражненията, практикувайте много и ще напреднете бързо в програмирането.",
		"/computer-science/books/free/kniga-Intro-Java-programirane/" => 
			"Изучаването на програмирането и езиците за програмиране са основни области, с които се занимават компютърните науки (computer science) и информатиката. Програмиране " .
			"е процесът на писане на компютърни програми, които решават определена задача. Една програма обикновено има входни данни, които обработва, изпълнява някакъв алгоритъм " .
			"и връща някакъв резултат (изходни данни). Безплатната книга Въведение в програмирането с Java от Светлин Наков и колектив (Intro Java book) запознава читателя с " .
			"основите на компютърното програмиране и има за цел да изгради логическо алгоритмично мислене и да развие способността за решаване на задачи по програмиране. Книгата " .
			"е безплатна, реализирана като проект с отворен код, доброволно от авторите, в помощ на общността на програмистите и софтуерните инженери в България.",
		"/java/elektronna-kniga/programirane-kniga-Java-Nakov/" => 
			"Ако търсите електронни книги за програмиране на Java, сте попаднали на една от най-подходящите книги за начинаещи: книгата за програмиране на Светлин Наков и " .
			"колектив. Това е първата книга, която трябва да прочетете, за да навлезете в програмирането и да се научите да мислите и разсъждавате алгоритмично като програмист. " .
			"Книгата ще ви научи на основните принципи на програмирането, без значение от езика за програмиране. След нея вече можете да прочетете и конкретни технологии за " .
			"разработка на приложения с бази от данни (като JDBC и Hibernate), уеб технологии (Java servlets, JSP, JSF и други), както и технологии за GUI приложения (AWT и Swing)." . 
			"За да е ефективно вашето навлизане в програмирането решавайте задачите за упражнения. Без тях нищо няма да научите. Програмирането иска практика, не става само с четене.",
		"/bezplatno/e-kniga/Nakov-kniga-programirane-Intro-Java/" => 
			"От този уеб сайт можете да изтеглите безплатно електронната книга Intro Java от Светлин Наков и колектив. Това е основна книга за програмиране, важен ресурс за всички " .
			"начинаещи в професията софтуерен разработчик. Тя е първата стъпка към научаване на основите на програмирането: логическо мислене, структури от данни и алгоритми. Четете " .
			"безплатната книга и правете упражненията, които са дадени в края на всяка глава. Ако не можете да се справите, прочетете главата отново. Ползвайте упътванията. Питайте " .
			"ваши колеги из форумите за програмиране. Важното е да вложите време и усилия да практикувате наученото. Иначе то ще мине през главата ви и ще си замине. Програмирането е " .
			"практика и може да се научи само с усилено решаване на задачи и писане на програми. Успех!",
		"/bulgarski/Intro-Java-book-edna-kniga-programirane-Java-Nakov/" => 
			"Добре дошли на сайта на една оригинална българска книга за програмиране на Java от Наков и колектив. Книгата Въведение в програмирането с Java (известна още като Intro " .
			"Java book) е оригинално българско творение, разработено от български автори, действащи програмисти и софтуерни инженери с дългогодишен опит. Това не е поредния некачествен " .
			"превод на някоя англоезична книга за Java, а е българска разработка, в която авторският колектив споделя своя опит и дава първите стъпки в овладяването на изкуството на " .
			"програмирането. Книгата ви дава важни концепции като работа с масиви, цикли и рекурсия, въвежда основните структури от данни в програмирането, понятията алгоритъм и " .
			"сложност на алгоритъм и концепциите на обектно-ориентираното програмиране (ООП). В книгата е споделен опитът на Светлин Наков за решаване на задачи по програмиране, натрупан " .
			"по време на стотиците му участия в състезания по програмиране, в които той нерядко е ставал победител. Ако искате да станете добър програмист, прочетете внимателно книгата " .
			"и правете всички упражнения от всички глави. Без упражненията няма да успеете. Те са 90% от вашето обучение по програмиране. Останалите 10% са теорията, без която не може.",
		"/downloads/free/java-books/Nakov-kniga-online-book/" => 
			"Добре дошли на сайта на първата българска безплатна книга за основи на програмирането. Изтеглете безплатната онлайн книга на Наков за основите на програмирането на Java и" .
			"направете първите стъпки в овладяването на изкуството на програмирането и професията на софтуерния инженер. Download the free Intro Java programming book by Svetlin Nakov " .
			"and his team. Не забравяйте най-важната препоръка, която Наков дава на всички свои студенти и курсисти: за да се научите да програмирате трябва да практикувате. Никой не " .
			"се е научил само с четене. Правете упражненията и ще овладеете програмирането. Ако не се справяте, питайте по форумите, четете упътванията и вложете повече хъс. Ако имате " .
			"добра мотивация наистина да станете софтуерен разработчик, ще имате и времето и търпението да преминете праз книгата стъпка по стъпка и през всички задачи.",
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
		"<p><a href=\"/\">Към началната страница на книгата \"Въведение в програмирането с Java\" от Светлин Наков и колектив</a></p>\n";
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
