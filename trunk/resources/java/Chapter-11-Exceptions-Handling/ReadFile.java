import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStreamReader;

public class ReadFile {
	public static void main(String[] args) {
		try {
			readFile("C:\\tools\\eclipse\\eclipse.ini");
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	public static void readFile(String fileName) throws IOException {
		FileInputStream fis = null;
		BufferedReader in = null;
		try {
			fis = new FileInputStream(fileName);
			in = new BufferedReader(new InputStreamReader(fis));
			String tmp = null;
			while ((tmp = in.readLine()) != null) {
				System.out.println(tmp);
			}
		} catch (FileNotFoundException e) {
			System.out.println("The file \"" + fileName + "\" does not exist!");
		} finally {
			if (in != null) {
				in.close();
			}
			if (fis != null) {
				fis.close();
			}
		}
	}
}
