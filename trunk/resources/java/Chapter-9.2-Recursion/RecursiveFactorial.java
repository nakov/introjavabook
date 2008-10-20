import java.util.Scanner;

public class RecursiveFactorial {

	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);
		System.out.print("n = ");
		int n = input.nextInt();

		long factorial = factorial(n);
		System.out.printf("%d! = %d%n", n, factorial);
		input.close();
	}

	public static long factorial(int n) {
		// The bottom of the recursion
		if (n == 0) {
			return 1;
		}
		// Recursive call: the method calls itself
		else {
			return n * factorial(n - 1);
		}
	}
}
