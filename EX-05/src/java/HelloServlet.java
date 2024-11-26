/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */

import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.annotation.WebServlet;

@WebServlet("/HelloServlet")

/**
 *
 * @author 91938
 */
public class HelloServlet extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
              
        // Extract form data
        String name = request.getParameter("name");
        String rollno = request.getParameter("rollno");
        String gender = request.getParameter("gender");
        String year = request.getParameter("year");
        String department = request.getParameter("department");
        String section = request.getParameter("section");
        String mobileNo = request.getParameter("mobile_no");
        String emailId = request.getParameter("email_id");
        String address = request.getParameter("address");
        String city = request.getParameter("city");
        String country = request.getParameter("country");
        String pincode = request.getParameter("pincode");

        // Set response content type
        response.setContentType("text/html");

        // Create response output
        response.getWriter().println("<html><body>");
        response.getWriter().println("<h1>Registration Details</h1>");
        response.getWriter().println("<p><strong>Student Name:</strong> " + name + "</p>");
        response.getWriter().println("<p><strong>Roll Number:</strong> " + rollno + "</p>");
        response.getWriter().println("<p><strong>Gender:</strong> " + gender + "</p>");
        response.getWriter().println("<p><strong>Year:</strong> " + year + "</p>");
        response.getWriter().println("<p><strong>Department:</strong> " + department + "</p>");
        response.getWriter().println("<p><strong>Section:</strong> " + section + "</p>");
        response.getWriter().println("<p><strong>Mobile Number:</strong> " + mobileNo + "</p>");
        response.getWriter().println("<p><strong>E-Mail ID:</strong> " + emailId + "</p>");
        response.getWriter().println("<p><strong>Address:</strong> " + address + "</p>");
        response.getWriter().println("<p><strong>City:</strong> " + city + "</p>");
        response.getWriter().println("<p><strong>Country:</strong> " + country + "</p>");
        response.getWriter().println("<p><strong>Pincode:</strong> " + pincode + "</p>");
        response.getWriter().println("</body></html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
