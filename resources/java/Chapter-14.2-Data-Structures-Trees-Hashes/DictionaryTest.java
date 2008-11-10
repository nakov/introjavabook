public class DictionaryTest {

	public static void main(String[] args) {
		Dictionary<String, Integer> treeDictionary = createTreeDictionary();
		System.out.println(treeDictionary.remove("Fifth"));
		Dictionary<String, Integer> hashDictionary = createHashDictionary();
		System.out.println(hashDictionary.remove("Fifth"));
		stressTest();
	}

	private static void stressTest() {
		Dictionary<Integer, Integer> hashDictionary = new HashDictionary<Integer, Integer>();
		for (int i = 0; i < Integer.MAX_VALUE; i++) {
			Integer iObj = Integer.valueOf(i);
			hashDictionary.put(iObj, iObj);
			if (i % 10000 ==0) {
				System.out.println(i);
			}
		}

	}

	private static Dictionary<String, Integer> createTreeDictionary() {
		Dictionary<String, Integer> dictionary = new TreeSetDictionary<String, Integer>();
		dictionary.put("First", 1);
		dictionary.put("Fifth", 5);
		// dictionary.put(null, 5);

		return dictionary;
	}

	private static Dictionary<String, Integer> createHashDictionary() {
		Dictionary<String, Integer> dictionary = new HashDictionary<String, Integer>();
		dictionary.put("First", 1);
		dictionary.put("Fifth1", 5);
		dictionary.put("First2", 1);
		dictionary.put("Fifth3", 5);
		dictionary.put("First4", 1);
		dictionary.put("Fifth34", 5);
		dictionary.put("First34", 1);
		dictionary.put("Fifth4532", 5);
		dictionary.put("Fifth435", 5);
		// dictionary.put(null, 5);

		return dictionary;
	}
}