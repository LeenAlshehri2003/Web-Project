document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('editRequestForm'); // Ensure your form has this ID

  form.addEventListener('submit', function(event) {
      let isValid = true;

      // List all the fields you want to check
      const fieldsToCheck = [
          document.querySelector('[name="ProficiencyLevel"]'),
          document.querySelector('[name="SessionDate"]'),
          document.querySelector('[name="SessionTime"]'),
          document.querySelector('[name="SessionDuration"]')
      ];

      fieldsToCheck.forEach(field => {
          if (!field.value.trim()) {
              isValid = false;
              // Optionally, add a visual indication of error
              field.style.borderColor = 'red';
          } else {
              // Reset the visual indication if correctly filled
              field.style.borderColor = '';
          }
      });

      if (!isValid) {
          event.preventDefault(); // Prevent form submission
          Swal.fire({
            title: 'LinguaLink',
            text: 'Please fill all the fields.',
            icon: 'error',
            confirmButtonColor: '#FFA500',  
            confirmButtonText: 'OK'
        });
      }
  });
});