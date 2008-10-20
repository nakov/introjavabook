import java.util.Scanner;

public class PrimesMatrix {

	static boolean isPrime(int number) {
		int maxDivider = (int) Math.sqrt(number);

		for (int divider = 2; divider <= maxDivider; divider++) {
			if (number % divider == 0) {
				return false;
			}
		}
		return true;
	}

	static int findNextPrime(int startNumber) {
		int number = startNumber;
		while (!isPrime(number)) {
			number++;
		}
		return number;
	}

	static void printMatrix(int dimension) {
		int lastPrime = 1;
		for (int row = 0; row < dimension; row++) {
			for (int col = 0; col < dimension; col++) {
				int nextPrime = findNextPrime(lastPrime + 1);
				System.out.printf(" %d", nextPrime);
				lastPrime = nextPrime;
			}
			System.out.println();
		}
	}

	static int readN() {
		Scanner input = new Scanner(System.in);
		System.out.print("N = ");
		int n = input.nextInt();
		return n;
	}

	public static void main(String[] args) {
		int n = readN();
		printMatrix(n);
	}
}
