CREATE DATABASE test;

USE test;

CREATE TABLE  utilisateur (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(20),
    mdp VARCHAR(8),
    profil INT
);

INSERT INTO utilisateur VALUES (null, 'rakoto', 'rakoto', 0);
INSERT INTO utilisateur VALUES (null, 'rabe', 'rabe', 0);
INSERT INTO utilisateur VALUES (null, 'deba', 'deba', 1);