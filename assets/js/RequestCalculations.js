

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