$(document).ready(function() {
  $.ajax({
      url: '../php/load_requests.php', // Ensure this points to your actual PHP script location
      type: 'GET',
      dataType: 'json',
      success: function(data) {
          data.forEach(function(item) {
              const content = `
                  <div class="col-lg-4 col-md-6">
                      <div class="z-blogs mb-30">
                          <div class="z-blogs__thumb mb-30">
                              <a href="Profile_Page.html"><img src="${item.PartnerPhoto}" alt="Profile picture" width="420" height="320"></a>
                          </div>
                          <div class="z-blogs__content">
                              <h5 class="mb-25">${item.Course} Course</h5>
                              <h4 class="sub-title mb-15">Status: ${item.Status}</h4>
                              <div>Session Date: ${item.SessionDate}</div>
                              <div>Session Time: ${item.SessionTime}</div>
                              <div>Duration: ${item.Duration} min</div>
                              <div>Proficiency Level: ${item.ProficiencyLevel}</div>
                              ${item.Status === 'Open' ? `
                                  <div class="info-container" style="display: flex; align-items: center; justify-content: space-between">
                                      <a href="EditRequest.html?requestId=${item.RequestID}" class="theme_btn">Edit</a>
                                      <button class="theme_btn" onclick="deleteRequest(${item.RequestID})">Delete</button>
                                  </div>` : ''}
                          </div>
                      </div>
                  </div>`;
              if (item.Status === 'Open') {
                  $('#nav-home').append(content); // Assuming 'Open' requests go in the 'Pending' tab
              } else if (item.Status === 'Accepted') {
                  $('#nav-profile').append(content); // Assuming 'Accepted' requests go in the 'Accepted' tab
              } else if (item.Status === 'Cancelled') {
                  $('#nav-profile1').append(content); // Assuming 'Cancelled' requests go in the 'Rejected' tab
              }
          });
      },
      error: function() {
          console.log('Error loading requests.');
      }
  });
});

// Function to handle request deletion
function deleteRequest(requestId) {
  if (confirm('Are you sure you want to delete this request?')) {
      $.ajax({
          url: '../php/delete_request.php', // Server-side script to handle deletion
          type: 'POST',
          data: { id: requestId },
          success: function(response) {
              alert('Request deleted successfully');
              // Reload the requests or remove the deleted element from the DOM
              location.reload();
          },
          error: function() {
              alert('Error deleting request.');
          }
      });
  }
}