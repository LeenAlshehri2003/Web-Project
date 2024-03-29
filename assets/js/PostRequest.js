$(document).ready(function() {
  var partnerLanguages = {
    'Partner1': ['English'],
    'Partner2': ['Spanish', 'Arabic'],
    'Partner3': ['English', 'Spanish'],
    'Partner4': ['English', 'Japanese'],
    'Partner5': ['French'],
    'Partner6': ['English', 'Italian'],
    'Partner7': ['Chinese']
};
console.log('Partner Languages:', partnerLanguages);

$('#languagePartner').change(function() {
    var selectedPartner = $(this).val();
    var languages = partnerLanguages[selectedPartner] || []; // Added fallback to an empty array

    console.log('Selected Partner:', selectedPartner); // Debugging
    console.log('Languages:', languages); // Debugging

    $('#languageSelect').empty(); // Clear existing options
    $('#languageSelect').append('<option value="">Select a Language</option>'); // Add default option

    // Append new options
    languages.forEach(function(language) {
        $('#languageSelect').append($('<option>', {
            value: language,
            text: language
        }));
        console.log('Added language:', language);
    });
});
  $('#postRequestForm').on('submit', function(e) {
      e.preventDefault(); // Prevent the default form submission

      var allFieldsFilled = true;
      // Reset any previous highlights
      $('input, select').css('border', '');

      // Check required fields, including the time field
      $(this).find('input[type="text"], input[type="date"], input[type="time"], select').each(function() {
          if ($.trim($(this).val()).length == 0) {
              allFieldsFilled = false;
              // Highlight unfilled fields
              $(this).css('border', '2px solid red');
          }
      });

      if (!allFieldsFilled) {
          alert('Please fill in all required fields highlighted in red.');
          return false; // Stop the function
      }

      var formData = $(this).serialize();

      $.ajax({
          type: 'POST',
          url: 'assets/php/handleRequest.php',
          data: formData,
          success: function(response) {
              alert('Request Posted Successfully');
              // Consider redirecting the user or clearing the form here
              $('#postRequestForm').trigger('reset'); // Reset the form fields
              $('input, select').css('border', ''); // Reset highlights
          },
          error: function() {
              alert('There was an error posting your request.');
          }
      });
  });
});
