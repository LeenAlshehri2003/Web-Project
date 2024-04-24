function fetchReviews() {
    // Fetch the language partner ID from the URL (assuming it's passed as a query parameter)
    var urlParams = new URLSearchParams(window.location.search);
    var languagePartnerId = urlParams.get('partnerId');

    // Make an AJAX request to the PHP file to fetch the reviews
    $.ajax({
        url: 'fetch_reviews.php',
        type: 'GET',
        data: { partnerId: languagePartnerId },
        success: function(response) {
            // Process the reviews data returned from the PHP file
            var reviews = JSON.parse(response);

            // Clear the existing reviews list
            $('#reviews-list').empty();

            // Loop through the reviews and append them to the reviews list
            for (var i = 0; i < reviews.length; i++) {
                var review = reviews[i];

                // Create the HTML for each review
                var reviewHtml = '<li>' +
                    '<div class="single-comments">' +
                    '<div class="comments__author">' +
                    '<img src="../assets/img/Reviewers/' + review.Photo + '" alt="Reviewer\'s personal image">' +
                    '</div>' +
                    '<div class="comments__text">' +
                    '<h4 class="sub-title mb-10">' + review.FirstName + ' ' + review.LastName + ' <span class="float-start date-text">' + review.CreatedAt + '</span> <span class="float-end date-text star-icon mb-20">';

                // Add star rating HTML dynamically based on the rating value
                for (var j = 1; j <= review.Rating; j++) {
                    reviewHtml += '<a href="#"><i class="fas fa-star"></i></a>';
                }

                reviewHtml += '</span></h4>' +
                    '<p>' + review.Comment + '</p>' +
                    '</div></div><br></li>';

                // Append the review HTML to the reviews list
                $('#reviews-list').append(reviewHtml);
            }
        },
        error: function() {
            console.log('Error fetching reviews.');
        }
    });
}