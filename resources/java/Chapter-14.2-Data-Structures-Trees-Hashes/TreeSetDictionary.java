import java.util.SortedSet;
import java.util.TreeSet;

/**
 * Implementation of {@link Dictionary} interface using 
 * {@link TreeSet}.
 * @param <K> Type of the keys
 * @param <V> Type of the values
 * 
 * @author Vladimir Tsanev
 */
public class TreeSetDictionary<K extends Comparable<K>, V> implements
		Dictionary<K, V> {
	/**
	 * Inner class that extends {@link DictionaryEntry}. This class 
	 * add ability to compare entries by key implementing 
	 * {@link Comparable} interface.
	 */
	public class TreeDictionaryEntry extends DictionaryEntry<K, V> 
			implements Comparable<DictionaryEntry<K, V>> {
		/**
		 * Constructs TreeDictionaryEntry by specified key and value.
		 * @param key key for the entry
		 * @param value value for the entry
		 */
		public TreeDictionaryEntry(K key, V value) {
			super(key, value);
		}

		/**
		 * Compares this entry with specified entry for order.
		 * 
		 * @param entry entry to be compared
		 * @return a negative integer, zero, or a positive integer as
		 * this entry's key is less than, equal to, or greater than 
		 * the specified entry's key.
		 * @see Comparable#compareTo(Object)
		 */
		@Override
		public int compareTo(DictionaryEntry<K, V> entry) {
			return this.getKey().compareTo(entry.getKey());
		}
	}

	private TreeSet<TreeDictionaryEntry> tree;

	/**
	 * Constructs an empty {@link TreeSetDictionary}.
	 */
	public TreeSetDictionary() {
		this.tree = new TreeSet<TreeDictionaryEntry>();
	}

	@Override
	public void clear() {
		this.tree.clear();
	}

	/**
	 * @return {@link SortedSet} with entries of current dictionary.
	 * Entries are sorted by key.
	 */
	@Override
	public SortedSet<DictionaryEntry<K, V>> entriesSet() {
		SortedSet<DictionaryEntry<K, V>> treeCopy = new 
			TreeSet<DictionaryEntry<K, V>>(this.tree);
		return treeCopy;
	}

	/**
	 * Finds a value for specified key traversing the tree in 
	 * n*log(n).
	 * @param key the key to search by.
	 * @return the value for specified key. If not found returns 
	 * <code>null</code>
	 */
	@Override
	public V get(K key) {
		if (this.isEmpty()) {
			return null;
		}
		TreeDictionaryEntry entry = this.tree.first();
		do {
			int compareKeysResult = entry.getKey().compareTo(key);
			if (compareKeysResult < 0) {
				/* higher return last strongly greater entry. */
				entry = this.tree.higher(entry);
			} else if (compareKeysResult > 0) {
				/* lower return first strongly less entry. */
				entry = this.tree.lower(entry);
			} else {
				return entry.getValue();
			}
		} while (entry != null);
		return null;
	}

	@Override
	public boolean remove(K key) {
		/*
		 * First we create a fake entry. With null value, but with 
		 * the right key. So compareTo method for TreeDictionaryEntry
		 * still works.
		 */
		DictionaryEntry<K, V> emptyEntry = new TreeDictionaryEntry(
				key, null);
		return this.tree.remove(emptyEntry);
	}

	@Override
	public boolean isEmpty() {
		return this.tree.isEmpty();
	}

	/**
	 * {@inheritDoc}
	 * @throws NullPointerException
	 *             if the specified element is null.
	 */
	@Override
	public void put(K key, V value) {
		if (key == null) {
			throw new NullPointerException("key cannot be null");
		}
		TreeDictionaryEntry newEntry = 
			new TreeDictionaryEntry(key, value);
		this.tree.add(newEntry);
	}
}
