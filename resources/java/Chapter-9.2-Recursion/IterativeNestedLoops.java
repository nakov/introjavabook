import java.util.Scanner;

public class IterativeNestedLoops {
	public static int numberOfLoops;
	public static int numberOfIterations;
	public static int[] loops;

	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);

		System.out.print("N = ");
		numberOfLoops = input.nextInt();

		System.out.print("K = ");
		numberOfIterations = input.nextInt();

		input.close();

		loops = new int[numberOfLoops];

		nestedLoops();
	}

	public static void nestedLoops() {
		initLoops();

		int currentPosition;

		while (true) {
			printLoops();

			currentPosition = numberOfLoops - 1;
			loops[currentPosition] = loops[currentPosition] + 1;

			while (loops[currentPosition] > numberOfIterations) {
				loops[currentPosition] = 1;
				currentPosition--;

				if (currentPosition < 0) {
					return;
				}
				loops[currentPosition] = loops[currentPosition] + 1;
			}
		}
	}

	public static void initLoops() {
		for (int i = 0; i < numberOfLoops; i++) {
			loops[i] = 1;
		}
	}

	public static void printLoops() {
		for (int i = 0; i < numberOfLoops; i++) {
			System.out.printf("%d ", loops[i]);
		}
		System.out.println();
	}
}
