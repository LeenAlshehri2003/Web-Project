

$(document).ready(function () {
    $('.gf_btn').click(function () {
        // Remove the 'active' class from all buttons
        $('.gf_btn').removeClass('active');
        
        // Add the 'active' class to the clicked button
        $(this).addClass('active');

        // Get the data-filter value from the clicked button
        var filterValue = $(this).data('filter');

        // Show only the elements with the selected category or show all if 'All' button is clicked
        $('.grid-item').hide();
        if (filterValue === '*') {
            $('.grid-item').show();
        } else {
            $(filterValue).show();
        }
    });
});
