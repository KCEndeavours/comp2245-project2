<?php
include('../config.php');

session_start();

$contactId = $_GET['id'];

// Fetch contact details from the database
$query = $conn->prepare("SELECT * FROM contacts WHERE id = :contactId");
$query->bindParam(':contactId', $contactId, PDO::PARAM_INT);
$query->execute();
$contactDetails = $query->fetch(PDO::FETCH_ASSOC);

if ($contactDetails) {
    // Fetch notes for the contact
    $query2 = $conn->prepare("SELECT * FROM notes WHERE contact_id = :contactId");
    $query2->bindParam(':contactId', $contactId, PDO::PARAM_INT);
    $query2->execute();
    $notes = $query2->fetchAll();

    $creatorID = $contactDetails['created_by'];

    $query3 = $conn->prepare("SELECT * FROM users WHERE id = :creatorID");
    $query3->bindParam(':creatorID', $creatorID, PDO::PARAM_INT);
    $query3->execute();
    $creatorDetails = $query3->fetch(PDO::FETCH_ASSOC);
    $creatorName = $creatorDetails['firstname'] . ' ' . $creatorDetails['lastname'];

    $assignedId = $contactDetails['assigned_to'];
    if ($assignedId == NULL) {
        $assignedName = 'Not assigned';
    } else {
        $query4 = $conn->prepare("SELECT * FROM users WHERE id = $assignedId");
        $query4->execute();
        $assignedDetails = $query4->fetch(PDO::FETCH_ASSOC);
        $assignedName = $assignedDetails['firstname'] . ' ' . $assignedDetails['lastname'];
        }

?>

    <h1>Contact Details</h1>

    <div id="contactDetails">
        <div id="head">
            <!-- Display contact details here -->
            <img src="../favicon.ico">
            <div id="block">
                <h3><?php echo $contactDetails['title'] . '  ' . $contactDetails['firstname'] . ' ' . $contactDetails['lastname']; ?></h3>
                <!-- Add other contact details -->
                <div id="time">
                    <h6>Created on <?php echo $contactDetails['created_at'] . ' by ' . $creatorName; ?></h6>
                    <h6>Updated on <?php echo $contactDetails['updated_at']; ?></h6>
                </div>     
            </div>   
            <div id="viewbtns">
                <!-- Assign button -->
                <?php if ($assignedId !== $_SESSION['userid']) { ?>
                    <button id="assignBtn" onclick="assignToMe(<?php echo $contactDetails['id']; ?>, <?php echo $_SESSION['userid']; ?>)">Assign to Me</button>
                <?php } ?>

                <!-- Update type button -->
                <button id="updateTypeBtn" onclick="updateType('<?php echo $contactDetails['id']; ?>', '<?php echo $contactDetails['type']; ?>')">
                    <?php
                    if ($contactDetails['type'] === 'Sales Lead') {
                        echo "Update to Support";
                    } else {
                        echo "Update to Sales Lead";
                    }
                    ?>
                </button>
            </div>

        </div>
        <div id="mainDetails">
            <div>
                <label for="email"></label>
                <h4 id="email">Email<?php echo $contactDetails['email']; ?></h4>  
            </div>
            <div>
                <label for="telephone"></label>
                <h4 id="telephone">Telephone <?php echo $contactDetails['telephone']; ?></h4>
            </div>
            <div>
                <label for="company"></label>
                <h4 id="company">Company <?php echo $contactDetails['company']; ?></h4>
            </div>
            <div>
                <label for="assigned"></label>
                <h4 id="assigned">Assigned to <?php echo $assignedName; ?></h4>
            </div>
        </div>
    </div>

    <div id="notesSection">
        <!-- Display existing notes -->
        <h2>Notes</h2>
        <ul id="notesList">
            <?php
            // Checks for existing notes assigned to contact
            if (empty($notes)) {
                echo "No notes available for this contact.";
            } else {
            // Query the database and display all notes associated with this contact
                foreach ($notes as $note) {
                    echo "<li>{$note['comment']} - {$note['created_by']} at {$note['created_at']}</li>";
                }
            }
            ?>
        </ul>

        <!-- Add new note section -->
        <h2>Add New Note</h2>
        <form id="addNoteForm">
            <textarea name="noteComment" placeholder="Enter your note here" required></textarea>
            <button type="submit">Add Note</button>
        </form>
    </div>
    <?php
} else {
    echo "Contact not found.";
}
?>