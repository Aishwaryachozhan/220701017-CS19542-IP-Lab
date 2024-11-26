import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

@WebServlet("/student")
public class StudentServlet extends HttpServlet {

    // Database connection details
    private static final String JDBC_URL = "jdbc:mysql://localhost:3306/mysql?useSSL=false&serverTimezone=UTC";
    private static final String JDBC_USER = "root";
    private static final String JDBC_PASSWORD = "valli";

    // JDBC driver registration (explicit)
    static {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");  // Register MySQL driver
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
    }

    // Handle GET request to load student registration numbers and display form
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><body>");
        out.println("<h2>Select a Student Registration Number</h2>");
        out.println("<form method='POST' action='student'>");
        out.println("<select name='reg_no'>");

        // Fetch registration numbers from the database
        try (Connection conn = DriverManager.getConnection(JDBC_URL, JDBC_USER, JDBC_PASSWORD)) {
            String sql = "SELECT reg_no FROM student_db";  // Assuming "students" is the table name
            PreparedStatement stmt = conn.prepareStatement(sql);
            ResultSet rs = stmt.executeQuery();

            while (rs.next()) {
                out.println("<option value='" + rs.getInt("reg_no") + "'>" + rs.getInt("reg_no") + "</option>");
            }

        } catch (SQLException e) {
            out.println("<h3>Error: " + e.getMessage() + "</h3>");
        }

        out.println("</select>");
        out.println("<input type='submit' value='Get Details'>");
        out.println("</form>");
        out.println("</body></html>");
    }

    // Handle POST request to fetch and display student details
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String regNo = request.getParameter("reg_no");

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><body>");

        // Fetch student details based on the selected registration number
        try (Connection conn = DriverManager.getConnection(JDBC_URL, JDBC_USER, JDBC_PASSWORD)) {
            String sql = "SELECT * FROM student_db WHERE reg_no = ?";
            PreparedStatement stmt = conn.prepareStatement(sql);
            stmt.setInt(1, Integer.parseInt(regNo));
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                out.println("<h3>Student Details</h3>");
                out.println("<p><strong>Registration Number:</strong> " + regNo + "</p>");
                out.println("<p><strong>Name:</strong> " + rs.getString("name") + "</p>");
                out.println("<p><strong>Age:</strong> " + rs.getInt("age") + "</p>");
                out.println("<p><strong>Course:</strong> " + rs.getString("course") + "</p>");
            } else {
                out.println("<h3>Student not found!</h3>");
            }

        } catch (SQLException e) {
            out.println("<h3>Error: " + e.getMessage() + "</h3>");
        }

        out.println("<br><a href='student'>Go Back</a>");
        out.println("</body></html>");
    }
}


