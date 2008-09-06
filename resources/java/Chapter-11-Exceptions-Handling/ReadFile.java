import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStreamReader;


public class ReadFile {
	public static void main(String... a) throws IOException {
		readFile("C:\\tools\\eclipse\\eclipse.ini");
	}

	public static void readFile(String fileName) throws IOException {
		FileInputStream fis = new FileInputStream(fileName);
		try {
			BufferedReader in = new BufferedReader(new InputStreamReader(fis));
			try {
				String tmp = null;
				while ((tmp = in.readLine()) != null) {
					System.out.println(tmp);
				}
			} finally {
				in.close();
			}
		} finally {
			fis.close();
		}
	}
}
