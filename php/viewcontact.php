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

    <div id="contactDetails">
        <div id="head">
            <!-- Display contact details here -->
            <div id="basic">
                <img id="contactimg" src="../favicon.ico">
                <div id="block">
                    <h3><?php echo $contactDetails['title'] . '  ' . $contactDetails['firstname'] . ' ' . $contactDetails['lastname']; ?></h3>
                    <!-- Add other contact details -->
                    <div id="time">
                        <p>Created on <?php echo $contactDetails['created_at'] . ' by ' . $creatorName; ?></p>
                        <p>Updated on <?php echo $contactDetails['updated_at']; ?></p>
                    </div>     
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
            <div id="mail">
                <label for="email">Email:</label>
                <p id="email"><?php echo $contactDetails['email']; ?></p>  
            </div>
            <div id="tele">
                <label for="telephone">Telephone:</label>
                <p id="telephone"><?php echo $contactDetails['telephone']; ?></p>
            </div>
            <div id="com">
                <label for="company">Company:</label>
                <p id="company"> <?php echo $contactDetails['company']; ?></p>
            </div>
            <div id="assi">
                <label for="assigned">Assigned to:</label>
                <p id="assigned"><?php echo $assignedName; ?></p>
            </div>
        </div>
    </div>

    <div id="notesSection">
        <!-- Display existing notes -->
        <h4><i class="fa fa-sticky-note-o"></i>Notes</h4>
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
    </div>

        <!-- Add new note section -->
    <div id="newNote">
        <h5>Add a note about <?php echo $contactDetails['firstname']; ?></h5>
        <form id="addNoteForm" onsubmit="return postNote(<?php echo $contactDetails['id']; ?>, <?php echo $_SESSION['userid']; ?>)">
            <textarea name="noteComment" id="noteComment" placeholder="Enter your note here" required></textarea>
            <button type="submit">Add Note</button>
        </form>
    </div>
    
    <?php
} else {
    echo "Contact not found.";
}
?>