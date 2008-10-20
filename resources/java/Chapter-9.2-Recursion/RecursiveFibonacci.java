import java.util.Scanner;

public class RecursiveFibonacci {
	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);
		System.out.print("n = ");
		int n = input.nextInt();

		long result = fib(n);
		System.out.printf("F%d = %d%n", n, result);
		input.close();
	}

	public static long fib(int n) {
		if (n <= 2) {
			return 1;
		}
		return fib(n - 1) + fib(n - 2);
	}
}