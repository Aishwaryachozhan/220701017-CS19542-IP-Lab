import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;

@WebServlet("/StudentSuggestionServlet")
public class StudentSuggestionServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    // Sample array of student names
    private String[] studentNames = { "Alice","Arthey","Afrin","Ashmita", "Bob","Babu", "Charlie", "David", "Edward", "Frank", "George", "Henry", "Irene" };

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Get the query parameter from the URL
        String query = request.getParameter("query");
        StringBuilder suggestions = new StringBuilder();
        
        // Check for null or empty input
        if (query != null && !query.isEmpty()) {
            // Loop through the names to find matches
            for (String name : studentNames) {
                if (name.toLowerCase().startsWith(query.toLowerCase())) {
                    suggestions.append(name).append("<br>");
                }
            }
        }
        
        // Set the response content type and write the response
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        out.println(suggestions.toString());
    }
}
