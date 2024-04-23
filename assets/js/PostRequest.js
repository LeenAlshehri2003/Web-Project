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
        Swal.fire({
            title: 'LinguaLink',
            text: 'Please fill all required fields',
            icon: 'info',
            confirmButtonColor: '#FFA500',  
            confirmButtonText: 'OK'
            
          });
        event.preventDefault(); // Prevent form submission
    }
})
// Global variable to hold the current price per hour
var currentPricePerHour = 0;

function fetchPrice() {
    var selection = document.getElementById('languagePartner').value;
    var partnerId = selection.split('-')[0];  // Assuming the value is 'PartnerID-LanguageID'

    fetch('../assets/php/fetchPrice.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'partnerId=' + partnerId
    })
    .then(response => response.json())
    .then(data => {
        currentPricePerHour = data.price; // Store the latest price per hour
        updateTotalCost(); // Update the total cost immediately after fetching the price
    })
    .catch(error => console.error('Error fetching price:', error));
}

function updateTotalCost() {
    var duration = document.getElementById('sessionDuration').value;
    var totalCost = currentPricePerHour * duration;
    document.getElementById('totalCost').innerText = 'Total Cost: $' + totalCost;
}
;
