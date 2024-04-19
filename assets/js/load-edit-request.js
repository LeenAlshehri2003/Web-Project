$(document).ready(function() {
  // Extract request ID from URL
  const urlParams = new URLSearchParams(window.location.search);
  const requestId = urlParams.get('requestId');

  if (requestId) {
      $.ajax({
          url: '../php/fetch_request.php',  // This PHP file fetches the request details
          type: 'GET',
          data: { id: requestId },
          dataType: 'json',
          success: function(data) {
              // Assuming data is returned as JSON
              $('select[name="ProficiencyLevel"]').val(data.ProficiencyLevel);
              $('input[name="SessionDate"]').val(data.SessionDate);
              $('select[name="SessionDuration"]').val(data.SessionDuration);
              $('input[type="text"][placeholder="hh:mm"]').val(data.SessionTime);
              $('input[name="RequestID"]').val(data.RequestID);
              // Additional fields can be added here
          },
          error: function() {
              alert('Failed to retrieve request data.');
          }
      });
  }
})