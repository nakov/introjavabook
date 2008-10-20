import java.util.Scanner;

public class WordsCounter {

	static String extractSeparators(String text) {
		StringBuilder separators = new StringBuilder();

		int textLength = text.length();
		for (int index = 0; index < textLength; index++) {
			char character = text.charAt(index);

			if (!Character.isLetter(character)) {
				separators.append(character);
			}
		}

		return separators.toString();
	}

	static String[] extractWords(String text) {
		String separators = extractSeparators(text);

		if (separators.equals("")) {
			String[] words = new String[1];
			words[0] = text;
			return words;
		}

		separators = "[\\Q" + separators + "\\E]+";

		String[] words = text.split(separators);
		return words;
	}

	static boolean isUpperCase(String word) {
		boolean result = word.equals(word.toUpperCase());
		return result;
	}

	static boolean isLowerCase(String word) {
		boolean result = word.equals(word.toLowerCase());
		return result;
	}

	static void countWords(String[] words) {
		int totalCount = 0;
		int allUpperCaseCount = 0;
		int allLowerCaseCount = 0;

		for (String word : words) {
			if (word.equals("")) {
				continue;
			}

			totalCount++;
			if (isUpperCase(word)) {
				allUpperCaseCount++;
			} else if (isLowerCase(word)) {
				allLowerCaseCount++;
			}
		}

		System.out.printf("Total words count: %s\n", totalCount);
		System.out.printf("Upper case words count: %s\n", 
				allUpperCaseCount);
		System.out.printf("Lower case words count: %s\n", 
				allLowerCaseCount);
	}

	static String readText() {
		Scanner input = new Scanner(System.in);
		System.out.println("Enter text:");
		String text = input.nextLine();
		input.close();

		return text;
	}

	public static void main(String[] args) {
		String text = readText();
		String[] words = extractWords(text);
		countWords(words);
	}

//	public static void main(String[] args) {
//		String text = "This is wonderful!!! All separators like "
//				+ "these ,.(? and these /* are recognized. It works.";
//		String separators = extractSeparators(text);
//		System.out.println(separators);
//	}
//
//	public static void main(String[] args) {
//		String text = "";
//		String[] words = extractWords(text);
//		for (String word : words) {
//			System.out.print(word + " ");
//		}
//	}
//
//	public static void main(String[] args) {
//		String[] words = { "This", "is", "our", "TEST", "case" };
//		countWords(words);
//	}
//
//	public static void main(String[] args) {
//		String text = readText();
//		System.out.println(text);
//	}
//
//	public static void main(String[] args) {
//		String text = "We need several separators "
//				+ "like ! , ? and UPPER CASE words "
//				+ "and lower case words. This is all.";
//		String[] words = extractWords(text);
//		countWords(words);
//	}
}