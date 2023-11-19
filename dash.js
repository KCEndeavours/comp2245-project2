document.addEventListener("DOMContentLoaded", function() {


    const link = document.querySelectorAll('.li');

    link.forEach(function(event) {
        link.addEventListener('click') {
            if (link.value === 'Users') {
                content = 'endpoints/users.php';
            } else if (link.value === 'contacts') {
                content = 'endpoints/contacts.php';
            }
        };
         updateContactTable(content);
    });
    // Function to make an XMLHttpRequest and update the table
    function updateContactTable() {

        const req = new XMLHttpRequest();
        req.open("GET", content, true);

        req.onload = function() {
            if (req.status === 200) {
                const tableSection = document.querySelector('#table-container');
                tableSection.innerHTML = req.responseText;
            }
        };

        req.send();
    }

    // Make an initial request to load the contact table
    updateContactTable();

    // Rest of your code, including filter functionality
    const filterInput = document.getElementById('filterInput');
    const contactsTable = document.getElementById('contactsTable');

    filterInput.addEventListener('input', function() {
        const filterValue = filterInput.value.toLowerCase();

        // Loop through table rows and hide those that don't match the filter
        for (let i = 1; i < contactsTable.rows.length; i++) {
            const row = contactsTable.rows[i];
            const shouldShow = row.innerText.toLowerCase().includes(filterValue);
            row.style.display = shouldShow ? '' : 'none';
        }
    });
});
