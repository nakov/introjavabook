import java.util.Arrays;
import java.util.Scanner;

public class SimpleExpressionEvaluator {

	public static void main(String[] args) {
		String expression = readExpression();

		int[] numbers = extractNumbers(expression);
		String[] operators = extractOperators(expression);

		int result = calculateExpression(numbers, operators);
		System.out.printf("%s = %d \n", expression, result);
	}
	
	static int[] extractNumbers(String expression) {
		String[] splitResult = expression.split("[+-]");

		int numbersCount = splitResult.length;
		int[] numbers = new int[numbersCount];

		int currentNumber;
		for (int index = 0; index < numbersCount; index++) {
			currentNumber = Integer.parseInt(splitResult[index]);
			numbers[index] = currentNumber;
		}

		return numbers;
	}
	
	static String[] extractOperators(String expression) {
		String[] operators = expression.split("[0123456789]+");

		int operatorsCount = operators.length;
		if (operatorsCount > 0) {
			operators = Arrays.copyOfRange(operators, 1, operatorsCount);
		}
		return operators;
	}

	static int calculateExpression(int[] numbers, 
									String[] operators) {
		int result = numbers[0];

		for (int i = 1; i < numbers.length; i++) {
			String nextOperator = operators[i - 1];
			int nextNumber = numbers[i];

			if (nextOperator.equals("+")) {
				result += nextNumber;
			} else if (nextOperator.equals("-")) {
				result -= nextNumber;
			}
		}
		return result;
	}

	static String readExpression() {
		Scanner input = new Scanner(System.in);
		System.out.print("Enter expression: ");
		String expression = input.nextLine();
		input.close();

		return expression;
	}
	//
//	public static void main(String[] args) {
//		String expression = "1+2-7+2-1+28";
//		int[] numbers = extractNumbers(expression);
//		for (int number : numbers) {
//			System.out.printf("%s ", number);
//		}
//	}
//
//	public static void main(String[] args) {
//		String expression = "1+2-7+2-1+28";
//		String[] operators = extractOperators(expression);
//		for (String operator : operators) {
//			System.out.printf("'%s' ", operator);
//		}
//	}
//
//	public static void main(String[] args) {
//		// Expression: 1 + 2 - 3 + 4
//		int[] numbers = { 1, 2, 3, 4 };
//		String[] operators = { "+", "-", "+" };
//
//		// Expected result: 4
//		int result = calculateExpression(numbers, operators);
//		System.out.printf("Result is: %s", result);
//	}

}
