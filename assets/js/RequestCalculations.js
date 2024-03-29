

document.getElementById('Duration').addEventListener('change', function() {
  // Retrieve the number of hours from the form
  const hours = parseFloat(this.value); // 'this' refers to the input element

  // Define the language partner's fee per hour
  const feePerHour = 20; // For example, $20 per hour

  // Check if the input is a valid number
  if (!isNaN(hours)) {
      // Calculate the total cost
      const totalCost = calculateSessionTotal(hours, feePerHour);

      // Display the total cost
      document.getElementById('totalCost').textContent = `The total cost for the language learning session is $${totalCost}.`;
  } else {
      // Clear the displayed total cost if the input is not a valid number
      document.getElementById('totalCost').textContent = '';
  }
});

function calculateSessionTotal(hours, feePerHour) {
  // Calculate total cost
  const totalCost = hours * feePerHour;

  // Return the total cost
  return totalCost;
}


const educatorLanguages = {
  Partner1: ['English'],
  Partner2: ['Spanish', 'Arabic'],
  Partner3: ['English', 'Spanish'],
  Partner4: ['English', 'Japanese'],
  Partner5: ['French'],
  Partner6: ['English', 'Italian'],
  Partner7: ['Chinese']
};

function updateLanguages() {
  const educatorSelect = document.getElementById('languagePartner');
  const languageSelect = document.getElementById('languageSelect');
  const selectedEducator = educatorSelect.value;

  languageSelect.innerHTML = '<option value="">Select a Language</option>';

  if (selectedEducator && educatorLanguages[selectedEducator]) {
      // Use a standard for loop instead of forEach
      for (let i = 0; i < educatorLanguages[selectedEducator].length; i++) {
          const language = educatorLanguages[selectedEducator][i];
          const option = document.createElement('option');
          option.value = language;
          option.textContent = language;
          languageSelect.appendChild(option);
      }
  }
}

document.getElementById('languagePartner').addEventListener('change', updateLanguages);

document.addEventListener("DOMContentLoaded", function() {
  const form = document.querySelector(".form"); // Adjust if necessary to target your form specifically

  form.addEventListener("submit", function(event) {
      let isValid = true;
      const selects = form.querySelectorAll("select");
      const inputs = form.querySelectorAll("input[type='text'], input[type='date']");
      
      // Check select elements for a value
      selects.forEach(function(select) {
          if (!select.value) {
              isValid = false;
              // Optionally, highlight the field or show a message
              select.style.borderColor = "red"; // Example of highlighting
          } else {
              select.style.borderColor = ""; // Reset if previously set
          }
      });

      // Check input fields for a value
      inputs.forEach(function(input) {
          if (!input.value) {
              isValid = false;
              // Optionally, highlight the field or show a message
              input.style.borderColor = "red"; // Example of highlighting
          } else {
              input.style.borderColor = ""; // Reset if previously set
          }
      });

      // Check if radio buttons for status updates are checked
      const statusUpdateYes = document.querySelector("input[type='radio'][name='Status'][id='Status']:checked");
      if (!statusUpdateYes) {
          isValid = false;
          // Handle how you want to show that this selection is required
      }

      if (!isValid) {
          event.preventDefault(); // Prevent form submission
          alert("Please fill in all required fields.");
      }
  });
});