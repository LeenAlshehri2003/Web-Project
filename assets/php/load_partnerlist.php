<?php


// Include your database connection script
require_once 'db.php';

// Prepare SQL query to fetch partner profiles
$sqlPartners = $conn->prepare("SELECT 
p.PartnerID,
CONCAT(u.FirstName, ' ', u.LastName) AS FullName,
u.Photo AS ProfilePicture, 
p.Age,
p.Gender,
p.SessionPrice,
p.Bio,
COALESCE(ROUND(AVG(r.Rating), 2), 0) AS AverageRating,
GROUP_CONCAT(l.LanguageID) AS LanguageIDs,
GROUP_CONCAT(l.LanguageName SEPARATOR ', ') AS Languages
FROM 
partners p
INNER JOIN 
users u ON p.PartnerID = u.UserID
LEFT JOIN 
userlanguages ul ON p.PartnerID = ul.UserID
LEFT JOIN 
languages l ON ul.LanguageID = l.LanguageID
LEFT JOIN 
languagerequests lr ON p.PartnerID = lr.PartnerID
LEFT JOIN 
reviews r ON lr.RequestID = r.RequestID
GROUP BY 
p.PartnerID, u.FirstName, u.LastName, u.Photo, p.Age, p.Gender, p.SessionPrice, p.Bio
ORDER BY 
AverageRating DESC;


");


if ($sqlPartners === false) {
    // Handle SQL query preparation error
    echo "Error preparing SQL query: " . $conn->error;
    exit();
}

if (!$sqlPartners->execute()) {
    // Handle SQL query execution error
    echo "Error executing SQL query: " . $sqlPartners->error;
    exit();
}

$result = $sqlPartners->get_result();

// Check if there are any partners
if ($result->num_rows > 0) {
    // Loop through each partner and display profile details
    while ($row = $result->fetch_assoc()) {
        // Process partner data
        
        $languageClasses = ''; // Initialize language classes variable
        $languageIDs = explode(',', $row['LanguageIDs']); // Get language IDs
        
        // Loop through language IDs and add corresponding classes
        foreach ($languageIDs as $languageID) {
            switch ($languageID) {
                case "1":
                    $languageClasses .= ' cat1'; // English
                    break;
                case "2":
                    $languageClasses .= ' cat2'; // Arabic
                    break;
                case "3":
                    $languageClasses .= ' cat3'; // French
                    break;
                case "4":
                    $languageClasses .= ' cat4'; // Spanish
                    break;
                case "5":
                    $languageClasses .= ' cat5'; // Italian
                    break;
                case "6":
                    $languageClasses .= ' cat6'; // Japanese
                    break;
                case "7":
                    $languageClasses .= ' cat7'; // Chinese
                    break;
                // Add more cases for other languages as needed
                default:
                    break;
            }
        }
?>
        <div class="col-lg-4 col-md-6 grid-item<?php echo $languageClasses; ?>">
            <div class="z-gallery mb-30">
                <div class="z-gallery__thumb mb-20">
            

                    <a href="#"><img class="img-fluid" src="../assets/img/Partners images/<?php echo $row['ProfilePicture']; ?>" alt="" width="500" height="500"></a>
                    <!-- Display AverageRating -->
                    <div class="feedback-tag"><?php echo $row['AverageRating']; ?></div>
                </div>
                <div class="z-gallery__content">
                    <div class="course__tag mb-15">
                    <?php 
    $languages = explode(', ', $row['Languages']);
    foreach ($languages as $language) {
        echo "<span>{$language}</span>";
    }
    ?>
                    </div>
                    <?php
// Inside the loop where you generate the link
// Ensure that PartnerID is fetched correctly from the database
$partnerID = $row['PartnerID'];

// Check if PartnerID has a valid value before constructing the URL
if (!empty($partnerID)) {
    // Construct the URL with the PartnerID parameter
    $url = "http://localhost/Web-Project/HTML%20pages/Partner%20profile%20U.php?partnerId=$partnerID";
} else {
    // Handle the case where PartnerID is empty or undefined
    $url = "#"; // Or any other fallback URL
}
?>

<h4 class="sub-title mb-20"><a class="partner-link" data-partner-id="<?php echo $partnerID; ?>" href="#"><?php echo $row['FullName']; ?></a></h4>


                    <div class="course__meta">
                        <span><?php echo $row['Bio']; ?></span>
                    </div>
                    <br>
                    <h6><?php echo $row['SessionPrice']; ?>$/hour</h6>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo "No partners found.";
}

// Close the prepared statement
$sqlPartners->close();
?>
