CREATE TABLE Users (
    id INT(6) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    password VARCHAR(10) NOT NULL,
    email VARCHAR(50),
    role VARCHAR(30) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)

CREATE TABLE Contacts (
    id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(5) NOT NULL,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    telephone VARCHAR(20),
    company VARCHAR(30) NOT NULL,
    type VARCHAR(30),
    assigned_to INT(6),
    created_by INT(6),
    created_at DATETIME,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
)

ALTER TABLE Contacts
    ADD CONSTRAINT assigned_to FOREIGN KEY (assigned_to) REFERENCES users(id),
    ADD CONSTRAINT created_by FOREIGN KEY (created_by) REFERENCES users(id);

CREATE TABLE Notes (
    id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    contact_id INT(6) UNSIGNED NOT NULL,
    comment TEXT(255),
    created_by INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (created_by) REFERENCES Users(id),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)

ALTER TABLE NOtes
    ADD CONSTRAINT contact_id FOREIGN KEY (contact_id) REFERENCES Contacts(id),
    ADD CONSTRAINT n_created_by FOREIGN KEY (created_by) REFERENCES users(id);

SET @password = PASSWORD('password123');
INSERT INTO users (firstname, lastname, password, email, role) VALUES
('Jim', 'Francis', @password, 'admin@project2.com', 'IT Support')

