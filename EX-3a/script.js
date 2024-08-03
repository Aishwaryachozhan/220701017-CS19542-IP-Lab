function validateForm() {
    // Get form values
    var regno = document.getElementById("regno").value;
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var contact = document.getElementById("contact").value;
    var year = document.getElementById("year").value;
    var dept = document.getElementById("dept").value;
    var cat = document.getElementById("cat").value;
    var sem = document.getElementById("sem").value;
    var ccode = document.getElementById("ccode").value;
    var cname = document.getElementById("cname").value;
    var credit = document.getElementById("credit").value;
    var gender = document.querySelector('input[name="gender"]:checked');          

    
    

    // Error message elements
    var regno_error = document.getElementById("regno-error");
    var name_error = document.getElementById("name-error");
    var email_error = document.getElementById("email-error");
    var contact_error = document.getElementById("contact-error");
    var year_error = document.getElementById("year-error");
    var dept_error = document.getElementById("dept-error");
    var cat_error = document.getElementById("cat-error");
    var sem_error = document.getElementById("sem-error");
    var ccode_error = document.getElementById("ccode-error");
    var cname_error = document.getElementById("cname-error");
    var credit_error = document.getElementById("credit-error");
    var gender_error = document.getElementById("gender-error"); 

    

    // Reset error messages
    document.querySelectorAll('.error').forEach(error => error.innerHTML = "");

    // Regul
    const emailReg = /^([\w-]+(\.[\w-]+)*)@([\w-]+)\.([a-zA-Z]{2,})(\.[a-zA-Z]{2,})?$/;
    const PEReg = /^[a-zA-Z]{2}[0-9]{2}[a-zA-Z]{1}[0-9]{2}$/;
    const CReg = /^[a-zA-Z]{2}[0-9]{5}$/;
    const OEReg = /^[a-zA-z]{2}[a-zA-z\d]{5}$/;

    var isvalid= true;
    if (regno === "") {
        regno_error.innerHTML="Register No. is required.";
        document.getElementById("regno").focus();
         isvalid= false;
    }
    else if (/^[0-9]{9}$/.test(regno)===false)
    {
        regno_error.innerHTML="Please enter a valid Register No.";
        document.getElementById("regno").focus();
         isvalid= false;
    }
    if (name === "") {
        name_error.innerHTML="Name is required.";
        document.getElementById("name").focus();
         isvalid= false;
    }
    if ((email === "") || (!emailReg.test(email)))
        {
        email_error.innerHTML="Please enter a valid Email Address.";
        document.getElementById("email").focus();
         isvalid= false;
        }
    if ((contact === "") || (/^[0-9]{10}$/.test(contact)===false))
    {
        contact_error.innerHTML="Please enter a valid Contact Number.";
        document.getElementById("contact").focus();
         isvalid= false;
    }

    if (year === "") {
        year_error.innerHTML="Select Year";
        document.getElementById("year").focus();
         isvalid= false;
    }
    if (dept === "") {
        dept_error.innerHTML="Select Dept.";
        document.getElementById("dept").focus();
         isvalid= false;
    }
    if (cat === "") {
        cat_error.innerHTML="Select Category";
        document.getElementById("dept").focus();
         isvalid= false;
    }
    if (sem === "") {
        sem_error.innerHTML="Select Semester";
        document.getElementById("sem").focus();
         isvalid= false;
    }
    
    if ((ccode === "") || ((cat==="Professional Elective" && !PEReg.test(ccode)) || (cat==="Core" && !CReg.test(ccode)) || (cat==="Open Elective" && !OEReg.test(ccode))))
        {
        ccode_error.innerHTML="Please enter a valid Subject Code.";
        document.getElementById("ccode").focus();
         isvalid= false;
        }
    if (cname === "") {
        cname_error.innerHTML="Course Name is required.";
        document.getElementById("cname").focus();
         isvalid= false;
    }
    if ((credit === "") || (/^[2-5]$/.test(credit)==false))
        {
        credit_error.innerHTML="Please enter a valid Credit Point (2-5).";
        document.getElementById("credit").focus();
         isvalid= false;
        }
    if (!gender) {
        gender_error.innerHTML = "Please select your gender.";
         isvalid= false;
    }
    
    return isvalid;
}
