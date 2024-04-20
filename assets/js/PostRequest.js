document.getElementById("postRequestForm").addEventListener("submit", function(event) {
    let isValid = true;
    let fields = ["proficiencyLevel", "languagePartner", "sessionDate", "sessionStartTime", "sessionDuration"];
    
    fields.forEach(function(field) {
        let input = document.getElementById(field);
        if (!input.value) {
            input.style.borderColor = "red";
            isValid = false;
        } else {
            input.style.borderColor = ""; // Reset on correct input
        }
    });
    
    if (!isValid) {
        alert("Please fill out all required fields.");
        event.preventDefault(); // Prevent form submission
    }
});
