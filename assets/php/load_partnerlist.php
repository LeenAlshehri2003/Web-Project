<?php
session_start();
if(isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];
} else {
    header("Location: ../../HTML pages/SignInPartner.php"); // Redirect them to the login page if not logged in
    exit();
}

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
    AVG(r.Rating) AS AverageRating,
    GROUP_CONCAT(l.LanguageName SEPARATOR ', ') AS Languages
FROM 
    partners p
INNER JOIN 
    users u ON p.PartnerID = u.UserID
LEFT JOIN 
    sessions s ON p.PartnerID = s.PartnerID  
LEFT JOIN 
    reviews r ON s.SessionID = r.RequestID  
LEFT JOIN 
    userlanguages ul ON p.PartnerID = ul.UserID
LEFT JOIN 
    languages l ON ul.LanguageID = l.LanguageID
GROUP BY 
    p.PartnerID, u.FirstName, u.LastName, u.Photo, p.Age, p.Gender, p.SessionPrice, p.Bio
ORDER BY 
    AverageRating DESC;");




$sqlPartners->execute();

// Fetch data
$result = $sqlPartners->get_result();

// Check if there are any partners
if ($result->num_rows > 0) {
    // Loop through each partner and display profile details
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="grid-item">
        <div class="z-gallery mb-30">
            <div class="z-gallery__thumb mb-20">
                <a href="#"><img class="img-fluid" src="../assets/img/Partners images/<?php echo $row['ProfilePicture']; ?>" alt="" width="500" height="500"></a>
                <!-- Display AverageRating -->
                <div class="feedback-tag"><?php echo $row['AverageRating']; ?></div>
            </div>
            <div class="z-gallery__content">
                <div class="course__tag mb-15">
                    <?php
                    // Convert the comma-separated languages string into an array
                    $languages = explode(', ', $row['Languages']);
                    foreach ($languages as $language) {
                        echo "<span>$language</span>";
                    }
                    ?>
                </div>
                <h4 class="sub-title mb-20"><a class="partner-link" data-partner-id="<?php echo $row['PartnerID']; ?>" href="#"><?php echo $row['FullName']; ?></a></h4>
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
