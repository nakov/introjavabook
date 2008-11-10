import java.util.Comparator;
import java.util.Map;
import java.util.Scanner;
import java.util.SortedMap;
import java.util.TreeMap;

/**
 * This class demonstrates using of {@link TreeMap} class.
 * 
 * @author Vladimir Tsanev
 * 
 */
public class TreeMapDemo {
	private static final String TEXT = "Test text words Count " +
			"words count teSt";
	public static void main(String[] args) {
		SortedMap<String, Integer> wordsCounts = 
			createWordsCounts(TEXT);
		printWordsCount(wordsCounts);
	}

	private static SortedMap<String, Integer> createWordsCounts(
			String text) {
		Scanner textScanner = new Scanner(text);
		
		Comparator<String> caseInsensitiveComparator = 
			new Comparator<String>(){

				@Override
				public int compare(String o1, String o2) {
					return o1.compareToIgnoreCase(o2);
				}
			
		};		
		SortedMap<String, Integer> words = 
//			new TreeMap<String, Integer>();
			new TreeMap<String, Integer>(caseInsensitiveComparator);
		while (textScanner.hasNext()) {
			String word = textScanner.next();
			Integer count = words.get(word);
			if (count == null) {
				count = 0;
			}
			words.put(word, count + 1);
		}
		return words;
	}

	private static void printWordsCount(
			SortedMap<String, Integer> wordsCounts) {
		for (Map.Entry<String, Integer> wordEntry 
				: wordsCounts.entrySet()) {
			System.out.printf(
					"word '%s' is seen %d times in the text%n", 
					wordEntry.getKey(), wordEntry.getValue());
		}
		
	}
}

/* The output is:

word 'Count' is seen 1 times in the text
word 'Test' is seen 1 times in the text
word 'count' is seen 1 times in the text
word 'teSt' is seen 1 times in the text
word 'text' is seen 1 times in the text
word 'words' is seen 2 times in the text

*/