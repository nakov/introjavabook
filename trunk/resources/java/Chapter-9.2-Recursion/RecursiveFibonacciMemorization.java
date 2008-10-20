import java.util.Scanner;

public class RecursiveFibonacciMemorization {
	public static long[] numbers;

	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);
		System.out.print("n = ");
		int n = input.nextInt();

		numbers = new long[n + 2];
		numbers[1] = 1;
		numbers[2] = 1;

		long result = fib(n);
		System.out.printf("F%d = %d%n", n, result);
		input.close();
	}

	public static long fib(int n) {
		if (0 == numbers[n]) {
			numbers[n] = fib(n - 1) + fib(n - 2);
		}

		return numbers[n];
	}
}
