/**
 * Class representing points in three dimensional space.
 * 
 * @author Vladimir Tsanev
 * 
 */
public class Point3D {
	private double x;
	private double y;
	private double z;

	/**
	 * Construct new {@link Point3D} instance by specified 
	 * Cartesian coordinates of the point.
	 * @param x x coordinate  of the point
	 * @param y y coordinate  of the point
	 * @param z z coordinate  of the point
	 */
	public Point3D(double x, double y, double z) {
		super();
		this.x = x;
		this.y = y;
		this.z = z;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		long temp;
		temp = Double.doubleToLongBits(x);
		result = prime * result + (int) (temp ^ (temp >>> 32));
		temp = Double.doubleToLongBits(y);
		result = prime * result + (int) (temp ^ (temp >>> 32));
		temp = Double.doubleToLongBits(z);
		result = prime * result + (int) (temp ^ (temp >>> 32));
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Point3D other = (Point3D) obj;
		if (Double.doubleToLongBits(x) 
				!= Double.doubleToLongBits(other.x))
			return false;
		if (Double.doubleToLongBits(y) 
				!= Double.doubleToLongBits(other.y))
			return false;
		if (Double.doubleToLongBits(z) 
				!= Double.doubleToLongBits(other.z))
			return false;
		return true;
	}

	
}
