import java.util.Scanner;

public class IterativeFactorial {

	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);
		System.out.print("n = ");
		int n = input.nextInt();

		long factorial = factorial(n);
		System.out.printf("%d! = %d%n", n, factorial);
		input.close();
	}

	public static long factorial(int n) {
		long result = 1;

		for (int i = 1; i <= n; i++) {
			result = result * i;
		}

		return result;
	}
}