import java.util.Arrays;
import java.util.HashSet;
import java.util.LinkedList;
import java.util.List;
import java.util.Set;

/**
 * Incomplete implementation of {@link Dictionary} interface using
 * hash map. Collisions are resolved by chaining.
 * 
 * @author Vladimir Tsanev
 * 
 * @param <K>
 * @param <V>
 */
public class HashDictionary<K, V> implements Dictionary<K, V> {

	private static final int DEFAULT_CAPACITY = 8;
	private static final float DEFAULT_LOAD_FACTOR = 0.75f;
	private List<DictionaryEntry<K, V>>[] table;
	private float loadFactor;
	private int threshold;
	private int size;

	public HashDictionary() {
		this(DEFAULT_CAPACITY, DEFAULT_LOAD_FACTOR);
	}

	@SuppressWarnings("unchecked")
	private HashDictionary(int capacity, float loadFactor) {
		/*
		 *  FIXME: Add validation of the parameters and make this
		 *  constructor public. 
		 */
		this.table = new List[capacity];
		this.loadFactor = loadFactor;
		this.threshold = 
			(int) (this.table.length * this.loadFactor);
	}

	@Override
	public void clear() {
		Arrays.fill(this.table, null);
		this.size = 0;
	}

	@Override
	public Set<DictionaryEntry<K, V>> entriesSet() {
		Set<DictionaryEntry<K, V>> entries = 
			new HashSet<DictionaryEntry<K, V>>(this.table.length);
		for (List<DictionaryEntry<K, V>> chain : this.table) {
			entries.addAll(chain);
		}
		return entries;
	}

	private List<DictionaryEntry<K, V>> findChain(K key) {
		int index = key.hashCode();
		index = index < 0 ? -index : index;
		index = index % this.table.length;
		if (table[index] == null) {
			table[index] = new LinkedList<DictionaryEntry<K, V>>();
		}
		return table[index];
	}

	@Override
	public V get(K key) {
		List<DictionaryEntry<K, V>> chain = findChain(key);
		for (DictionaryEntry<K, V> dictionaryEntry : chain) {
			if (dictionaryEntry.getKey().equals(key)) {
				return dictionaryEntry.getValue();
			}
		}
		return null;
	}

	@Override
	public boolean isEmpty() {
		return size == 0;
	}

	@Override
	public void put(K key, V value) {
		List<DictionaryEntry<K, V>> chain = findChain(key);
		for (DictionaryEntry<K, V> dictionaryEntry : chain) {
			if (dictionaryEntry.getKey().equals(key)) {
				return;
			}
		}
		chain.add(new DictionaryEntry<K, V>(key, value));
		if (size++ >= threshold) {
			expand();
		}
	}

	/**
	 * Expands the underling table 
	 */
	@SuppressWarnings("unchecked")
	private void expand() {
		/* FIXME: Here is a bug if you expand table so much that
		 * new capacity became 2^31 or more next time the new 
		 * capacity will be negative and exception will be thrown.
		 * You can prevent this by returning from this method 
		 * without doing expanding in this case. But note you 
		 * can increase threshold. Be careful because it is the 
		 * upper limit of the size and it should be int.
		 */
		int newCapacity = 2 * this.table.length;
		List<DictionaryEntry<K, V>>[] oldTable = this.table;
		this.table = new List[newCapacity];
		this.threshold = (int) (newCapacity * this.loadFactor);
		for (List<DictionaryEntry<K, V>> oldChain : oldTable) {
			if (oldChain == null) {
				continue;
			}
			for (DictionaryEntry<K, V> dictionaryEntry : oldChain) {
				List<DictionaryEntry<K, V>> chain = 
					findChain(dictionaryEntry.getKey());
				chain.add(dictionaryEntry);
			}
		}
	}

	@Override
	public boolean remove(K key) {
		List<DictionaryEntry<K, V>> chain = findChain(key);
		for (DictionaryEntry<K, V> dictionaryEntry : chain) {
			if (dictionaryEntry.getKey().equals(key)) {
				size--;
				return true;
			}
		}
		return false;
	}

}
