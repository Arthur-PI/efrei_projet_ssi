-- Create the database and use it
CREATE DATABASE website_db;
USE website_db;

-- Create the first user and grant him only necessary access
CREATE USER 'user1'@'%' IDENTIFIED BY 'password';
GRANT SELECT, INSERT, UPDATE, DELETE ON website_db.* TO 'user1'@'%';

-- Create the two tables
CREATE TABLE utilisateur (
	id				INTEGER AUTO_INCREMENT NOT NULL,
	nom				VARCHAR(100) NOT NULL,
	prenom			VARCHAR(100) NOT NULL,
	date_naissance	DATE NOT NULL,
	numero_cb		VARCHAR(20) NOT NULL,
	ville			VARCHAR(20) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE commentaire (
	id				INTEGER AUTO_INCREMENT NOT NULL,
	description		VARCHAR(100) NOT NULL,
	utilisateur_id	INTEGER NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(utilisateur_id) REFERENCES utilisateur(id) ON DELETE CASCADE
);

-- Create the view for user2
CREATE VIEW utilisateurView AS SELECT id, nom, prenom, date_naissance, ville FROM utilisateur;

-- Create the second user and grant him only read access on the view
CREATE USER 'user2'@'%' IDENTIFIED BY 'password';
GRANT SELECT ON website_db.utilisateurView TO 'user2'@'%';
