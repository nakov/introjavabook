import java.util.Scanner;

public class TemperatureConverter {
	public static double convertFahrenheitToCelsius(double temperatureF) {
		double temperatureC = (temperatureF - 32) * 5 / 9;
		return temperatureC;
	}

	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);
		System.out
				.println("Enter your body temperature in Fahrenheit degrees: ");
		double temperature = input.nextDouble();

		temperature = convertFahrenheitToCelsius(temperature);

		System.out.printf("Your body temperature in Celsius degrees is %f.%n",
				temperature);

		if (temperature >= 37) {
			System.out.println("You are ill!");
		}

		input.close();
	}
}
