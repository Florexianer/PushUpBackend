DROP TABLE User;
DROP TABLE Workout;

CREATE TABLE User
(
    pk_username varchar(255),
    password    varchar(255),
    before      BLOB,
    after       BLOB
);

CREATE TABLE Workout
(
    pk_workout INTEGER AUTO_INCREMENT,
    start       varchar(255),
    end         varchar(255),
    pushUpCount INTEGER,
    fk_pk_username varchar(255),
    FOREIGN KEY (fk_pk_username) REFERENCES User(pk_username)
);

INSERT INTO USER(pk_username, password)
VALUES ('Florian', 'xy');

UPDATE User
SET before = ?, after = ?
WHERE pk_username = ?;
