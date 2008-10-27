import java.util.Set;

/**
 * Interface that defines basic methods needed for 
 * a class which maps keys to values. 
 * 
 * @param <K> Type of the keys
 * @param <V> Type of the values
 * 
 * @author Vladimir Tsanev
 */
public interface Dictionary<K, V> {

	/**
	 * Adds specified value by specified key in the current
	 * Dictionary.
	 * @param key key for the new value 
	 * @param value value to be mapped with 
	 * that key in current Dictionary.
	 * @throws NullPointerException if specified key is null.
	 */
	public void put(K key, V value);

	/**
	 * Finds the value mapped by specified key.
	 * @param key key for which the value is needed.
	 * @return value for the specified key if present, 
	 * or <code>null</code> if there is no value with such 
	 * key in the current Dictionary.
	 */
	public V get(K key);
	
	/**
	 * Removes a value mapped by specified key.
	 * @param key key for which the value will be removed
	 * @return <code>true</code> if value for the specified key if 
	 * present, or <code>false</code> if there is no value with such 
	 * key in the current Dictionary.
	 */
	public boolean remove(K key);

	/**
	 * @return Set of {@link DictionaryEntry} with all 
	 * (key, value) pairs in current Dictionary.
	 */
	public Set<DictionaryEntry<K, V>> entriesSet();

	/**
	 * Checks if there is elements in the current Dictionary.
	 * @return <code>true</code> if there is more than 
	 * one element in current Dictionary, and <code>false</code>
	 * otherwise.
	 */
	public boolean isEmpty();

	/**
	 * Removes all elements from current Dictionary. 
	 */
	public void clear();
}
