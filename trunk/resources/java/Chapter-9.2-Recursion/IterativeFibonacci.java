import java.util.Scanner;

public class IterativeFibonacci {
	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);
		System.out.print("n = ");
		int n = input.nextInt();

		long result = fib(n);
		System.out.printf("F%d = %d%n", n, result);
		input.close();
	}

	public static long fib(int n) {
		long fn = 1;
		long fn_1 = 1;
		long fn_2 = 1;

		for (int i = 2; i < n; i++) {
			fn = fn_1 + fn_2;

			fn_2 = fn_1;
			fn_1 = fn;
		}

		return fn;
	}
}
