document.addEventListener('DOMContentLoaded', function () {
    // Function to open the popup
    function openPopup() {
      document.getElementById('overlay').style.display = 'block';
      document.getElementById('popup').style.display = 'block';
    }
  
    // Function to close the popup
    function closePopup() {
      document.getElementById('overlay').style.display = 'none';
      document.getElementById('popup').style.display = 'none';
    }
  
    // Attach the openPopup function to the button click event
    document.getElementById('showPopupButton').addEventListener('click', openPopup);
  
    // Attach the closePopup function to the close button click event
    document.getElementById('popupCloseButton').addEventListener('click', closePopup);
  
    // Initially hide the popup
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('popup').style.display = 'none';
  });