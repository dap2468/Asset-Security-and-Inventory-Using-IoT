CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    firstname VARCHAR (30) NOT NULL,
    lastname VARCHAR (30) NOT NULL,
    username VARCHAR (30) NOT NULL,
    pwd VARCHAR (255) NOT NULL,
    email VARCHAR (100) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);

CREATE TABLE info (
    id INT(11) NOT NULL AUTO_INCREMENT,
    device_id INT (11) NOT NULL,
    device_name VARCHAR (255) NOT NULL,
    device_status VARCHAR (30),
    power_status VARCHAR (255),
    movement_status VARCHAR (255),
    last_updated DATETIME NOT NULL DEFAULT CURRENT_TIME,
    users_id INT (11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE
);