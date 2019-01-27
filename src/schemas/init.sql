DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100),
    phone_number VARCHAR(50),
    country_code CHAR(2),
    timezone VARCHAR(20),
    inserted_on DATETIME DEFAULT now(),
    updated_on DATETIME DEFAULT now()
);
CREATE UNIQUE INDEX contacts_id_uindex ON phonebook.contacts (id);
