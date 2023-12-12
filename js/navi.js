$(document).ready(() =>{
    //displays all contacts on first load
    contactsQuery();

    initNavi();

});

function contactsQuery(filter='') {
    let url = "php/contacts.php";
    let query = url;
    if(filter){
        query += "?filter=" + filter;
    }
    display(query);
}

function usersQuery() {
    let url = "php/users.php";
    let query = url;
    
    display(query);
}

function viewContactDetails(id) {
    let url = "php/viewcontact.php?id=" + id;
    display(url);
}


function updateType(id, type) {
    let url = "php/updatetype.php";
    let data = new FormData();
    data.append('id', id);
    data.append('type', type);

    console.log("ID:", id);
    console.log("CurrentType:", type);

    fetch(url, {
        method: 'POST',
        body: data
    })
    .then(response => response.text())
    .then(message => console.log(message))
    .catch(error => console.error('Error:', error));

    viewContactDetails(id);
}

function assignToMe(id, userid) {
    let url = "php/assigntome.php";
    let data = new FormData();
    data.append('id', id);
    data.append('assignedId', userid);

    fetch(url, {
        method: 'POST',
        body: data
    })
    .then(response => response.text())
    .then(message => console.log(message))
    .catch(error => console.error('Error:', error));

    viewContactDetails(id);
}


function addContact() {
    const url = "forms/new-contact.php";
    display(url);
}

function addUser() {
    const url = "forms/new-user.php";
    display(url);
}

// function checkNote() {
//     let valid = true;
//     const firstName = $("#firstname").val();
//     const lastName = $("#lastname").val();
//     const pass = $("#password").val();
//     const email = $("#email").val();

//     //if inputs are valid
//     if (valid) {
//         const url = "php/newuser.php";
//         const data = {
//             "firstname": firstName,
//             "lastname": lastName,
//             "password": pass,
//             "email":    email
//         };
//         display(url, body=data);
//     }
//     return false;
// }

function postNote(id, userid) {
    let url = "php/addnote.php";
    let data = new FormData();
    data.append('id', id);
    data.append('userid', userid);
    data.append("noteComment", $('#noteComment').val());

    fetch(url, {
        method: 'POST',
        body: data
    })
    .then(response => response.text())
    .then(text => {
        alert(text); 
        viewContactDetails(id);
    })
        
    .catch(error => {
        console.error('Error:', error);
    });
    return false;
}

function checkUser() {
    let valid = true;
    const firstName = $("#firstname").val();
    const lastName = $("#lastname").val();
    const pass = $("#password").val();
    const email = $("#email").val();
    const role = $("#role").val();

    //if inputs are valid
    if (valid) {
        const url = "php/newuser.php";
        const data = {
            "firstname": firstName,
            "lastname": lastName,
            "password": pass,
            "email": email,
            "role": role

        };
        display(url, body=data)
            .then(response => response.text())
            .then(text => {
                
                alert(text);
                addUser();
            })
            .catch(error => {
                console.error('Error:', error)
            });
        return false;
    }
}

function checkContact() {
    const title = $("#title").val();
    const firstName = $("#firstname").val();
    const lastName = $("#lastname").val();
    const email = $("#emailAddress").val();
    const phone = $("#telephone").val();
    const comp = $("#company").val();
    const type = $("#type").val();
    const assign_to = $("#assigned_to").val();

    const url = "php/newcontact.php";
    const data = {
        "title": title,
        "firstname": firstName,
        "lastname": lastName,
        "email": email,
        "telephone": phone,
        "company": comp,
        "type": type,
        "assigned_to": assign_to
    };

    display(url, body = data)
        .then(response => response.text())
        .then(text => {
            
            alert(text);
            addContact();
        })
        .catch(error => {
            console.error('Error:', error)
        });
        
    return false;
}


function logout() {
    const url = "php/logout.php";
    window.location = url;
}

async function display(url, body=null) {

    let data;
    if (body) {
        //POST request
        data = await post(url, body);
    } else {
        //GET request
        data = await get(url);
    }
    if(data) {
        $("main").html(data);
    } else {
        console.error("request failed");
    }
}

async function post(url, pbody={}) {
    let result;
    let fdata = formData(pbody);
    await fetch(url, {
        method: 'POST',
        body: fdata
    })
    .then(response => response.text())
    .then(data => result = data )
    .catch(error => console.error(error));
    return result;
}

async function get(url) {
    let result;
    await fetch(url)
    .then(response => response.text())
    .then(data => result = data )
    .catch(error => console.error(error));

    return result;
}

function initNavi() {
    $(".filter-button").click(function () {
        handleFilterButtonClick(this);
    });

    $("#home").click(() => {contactsQuery()});
    $("#newContact").click(addContact);
    $("#users").click(() => {usersQuery()});
    $("#logout").click(logout);

}

function handleFilterButtonClick(button) {

    $(".filter-button").addClass("selected");
    $(button).addClass("selected");
}

function formData(list) {
    let fdata = new FormData();
    for(var x in list){
        fdata.append(x,list[x]);
    }
    return fdata;
}

