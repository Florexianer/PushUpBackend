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
    pk_workout INTEGER PRIMARY KEY AUTOINCREMENT,
    start       varchar(255),
    end         varchar(255),
    pushUpCount INTEGER,
    fk_pk_username varchar(255),
    FOREIGN KEY (fk_pk_username) REFERENCES User(pk_username)
);

INSERT INTO USER(pk_username, password)
VALUES ('Florian', 'xy');

INSERT INTO USER(pk_username, password)
VALUES ('Florian2', 'xy');

INSERT INTO USER(pk_username, password)
VALUES ('Florian3', 'xy');

UPDATE User
SET before = ?, after = ?
WHERE pk_username = ?;
