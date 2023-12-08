
    function register() {
    var nom = document.getElementById("{{ registrationForm.nom.vars.id }}").value;
    var prenom = document.getElementById("{{ registrationForm.prenom.vars.id }}").value;
    var email = document.getElementById("{{ registrationForm.email.vars.id }}").value;
    var password = document.getElementById("{{ registrationForm.plainPassword.vars.id }}").value;
    var cin = document.getElementById("{{ registrationForm.cin.vars.id }}").value;
    var dateNaissance = document.getElementById("{{ registrationForm.date_naissance.vars.id }}").value;
    var userType = document.getElementById("{{ registrationForm.roles.vars.id }}").value;

    // Check if any field is empty
    if (!nom.trim() || !prenom.trim() || !email.trim() || !password.trim() || !cin.trim() || !dateNaissance.trim() || !userType.trim()) {
    document.getElementById("alertEmpty").style.display = "block";
    return false;
}

    // Add additional validation logic here if needed

    // Show the success modal
    document.getElementById("successModal").style.display = "block";

    // Prevent form submission
    return false;
}

    // Function to close the success modal
    function closeSuccessModal() {
    document.getElementById("successModal").style.display = "none";
}
