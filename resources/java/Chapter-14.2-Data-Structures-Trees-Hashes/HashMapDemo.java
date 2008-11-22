import java.util.HashMap;
import java.util.Map;

/**
 * This class demonstrates using {@link HashMap}.
 * 
 * @author Vladimir Tsanev
 * 
 */
public class HashMapDemo {
	public static void main(String[] args) {
Map<String, Double> studentsNarks = 
	new HashMap<String, Double>();
studentsNarks.put("Pesho", 3.00);
studentsNarks.put("Gosho", 4.50);
studentsNarks.put("Nakov", 5.50);
studentsNarks.put("Vesko", 3.50);
studentsNarks.put("Tsanev", 4.00);
studentsNarks.put("Nerdy", 6.00);

Double tsanevMark = studentsNarks.get("Tsanev");
System.out.printf("Tsanev's mark: %.2f %n", tsanevMark);

studentsNarks.remove("Tsanev");
System.out.println("Tsanev removed.");

System.out.printf("Is Tsanev in the hash table: %b %n",
		studentsNarks.containsKey("Tsanev"));

studentsNarks.put("Nerdy", 3.25);
System.out.println("Nerdy's mark changed.");

System.out.println("Students and marks:");

for (Map.Entry<String, Double> studentMark 
		: studentsNarks.entrySet()) {
	System.out.printf("%s has %.2f%n", studentMark.getKey(),
			studentMark.getValue());
}
System.out.printf("There are %d students.%n",
		studentsNarks.size());
studentsNarks.clear();
System.out.println("Students hashmap cleard.");
System.out.printf("Is hash table empty: %b%n",
		studentsNarks.isEmpty());
	}
}