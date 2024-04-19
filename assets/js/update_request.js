$(document).ready(function() {
  $('#editRequestForm').on('submit', function(e) {
    e.preventDefault();
    const formData = $(this).serialize(); // Serialize the form data.

    $.ajax({
      url: '../php/update_request.php',
      type: 'POST',
      data: formData,
      success: function(response) {
        alert('Request updated successfully.');
        // Optionally redirect or update the UI
      },
      error: function() {
        alert('Error updating request.');
      }
    });
  });
});