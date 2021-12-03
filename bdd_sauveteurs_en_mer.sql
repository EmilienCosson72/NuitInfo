DROP DATABASE IF EXISTS nuitdelinfo;
CREATE DATABASE nuitdelinfo;
USE nuitdelinfo;

CREATE TABLE UTILISATEUR(
   Id_User INT AUTO_INCREMENT,
   Email_User VARCHAR(50) NOT NULL,
   Password_User VARCHAR(100) NOT NULL,
   Nom_Role VARCHAR(50) NOT NULL,
   Pseudo_User VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_User)
);

CREATE TABLE CATEGORIE(
   Id_Categorie INT AUTO_INCREMENT,
   Nom_Categorie VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_Categorie)
);

CREATE TABLE BATEAU_SECOURU_CONTRIBUTION(
   Id_Bateau INT AUTO_INCREMENT,
   Nom_Bateau VARCHAR(50) NOT NULL,
   Dimension_Bateau VARCHAR(25) NOT NULL,
   Desc_Bateau VARCHAR(5000),
   URL_Bateau VARCHAR(250),
   Est_Refuse BOOLEAN NOT NULL,
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Bateau),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE VICTIME_CONTRIBUTION(
   Id_Vict INT AUTO_INCREMENT,
   Nom_Vict VARCHAR(50) NOT NULL,
   Prenom_Vict VARCHAR(50) NOT NULL,
   Ville_Vict VARCHAR(50),
   Date_Naissance_Vict VARCHAR(50),
   Sexe_Vict VARCHAR(1),
   Est_Refuse BOOLEAN NOT NULL,
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Vict),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE INCIDENT_CONTRIBUTION(
   Id_Incident INT AUTO_INCREMENT,
   Date_Incident VARCHAR(25) NOT NULL,
   Localisation_Incident VARCHAR(50) NOT NULL,
   Desc_Incident VARCHAR(5000),
   Est_Refuse BOOLEAN NOT NULL,
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Incident),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE SAUVETEUR_CONTRIBUTION(
   Id_Sauv INT AUTO_INCREMENT,
   Nom_Sauv VARCHAR(50) NOT NULL,
   Prenom_Sauv VARCHAR(50) NOT NULL,
   Ville_Sauv VARCHAR(50),
   Date_Naissance_Sauv VARCHAR(25),
   Sexe_Sauv VARCHAR(1),
   Est_Refuse BOOLEAN NOT NULL,
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Sauv),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE BATEAU_SAUVETEUR(
   Id_Bateau INT AUTO_INCREMENT,
   Nom_Bateau VARCHAR(50) NOT NULL,
   Dimension_Bateau VARCHAR(25) NOT NULL,
   Desc_Bateau VARCHAR(5000),
   URL_Bateau VARCHAR(250),
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Bateau),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE BATEAU_SAUVETEUR_CONTRIBUTION(
   Id_Bateau INT AUTO_INCREMENT,
   Nom_Bateau VARCHAR(50) NOT NULL,
   Dimension_Bateau VARCHAR(25) NOT NULL,
   Desc_Bateau VARCHAR(5000),
   URL_Bateau VARCHAR(250),
   Est_Refuse BOOLEAN NOT NULL,
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Bateau),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE SAUVETEUR(
   Id_Sauv INT AUTO_INCREMENT,
   Nom_Sauv VARCHAR(50) NOT NULL,
   Prenom_Sauv VARCHAR(50) NOT NULL,
   Ville_Sauv VARCHAR(50),
   Date_Naissance_Sauv VARCHAR(25),
   Sexe_Sauv VARCHAR(1),
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Sauv),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE INCIDENT(
   Id_Incident INT AUTO_INCREMENT,
   Date_Incident VARCHAR(25) NOT NULL,
   Localisation_Incident VARCHAR(50) NOT NULL,
   Desc_Incident VARCHAR(5000),
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Incident),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE VICTIME(
   Id_Vict INT AUTO_INCREMENT,
   Nom_Vict VARCHAR(50) NOT NULL,
   Prenom_Vict VARCHAR(50) NOT NULL,
   Ville_Vict VARCHAR(50),
   Date_Naissance_Vict VARCHAR(50),
   Sexe_Vict VARCHAR(1),
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Vict),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE BATEAU_SECOURU(
   Id_Bateau INT AUTO_INCREMENT,
   Nom_Bateau VARCHAR(50) NOT NULL,
   Dimension_Bateau VARCHAR(25) NOT NULL,
   Desc_Bateau VARCHAR(5000),
   URL_Bateau VARCHAR(250),
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Bateau),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE ARTICLE(
   Id_Article INT AUTO_INCREMENT,
   Contenu_Article VARCHAR(50) NOT NULL,
   Desc_Article VARCHAR(50) NOT NULL,
   Date_Article VARCHAR(25) NOT NULL,
   Id_Categorie INT NOT NULL,
   Id_User INT NOT NULL,
   PRIMARY KEY(Id_Article),
   FOREIGN KEY(Id_Categorie) REFERENCES CATEGORIE(Id_Categorie),
   FOREIGN KEY(Id_User) REFERENCES UTILISATEUR(Id_User)
);

CREATE TABLE INTERVENTION(
   Id_Sauv INT,
   Id_Incident INT,
   PRIMARY KEY(Id_Sauv, Id_Incident),
   FOREIGN KEY(Id_Sauv) REFERENCES SAUVETEUR(Id_Sauv),
   FOREIGN KEY(Id_Incident) REFERENCES INCIDENT(Id_Incident)
);

CREATE TABLE DEGAT(
   Id_Incident INT,
   Id_Vict INT,
   PRIMARY KEY(Id_Incident, Id_Vict),
   FOREIGN KEY(Id_Incident) REFERENCES INCIDENT(Id_Incident),
   FOREIGN KEY(Id_Vict) REFERENCES VICTIME(Id_Vict)
);

CREATE TABLE NAVIGUATION(
   Id_Incident INT,
   Id_Bateau INT,
   PRIMARY KEY(Id_Incident, Id_Bateau),
   FOREIGN KEY(Id_Incident) REFERENCES INCIDENT(Id_Incident),
   FOREIGN KEY(Id_Bateau) REFERENCES BATEAU_SECOURU(Id_Bateau)
);

CREATE TABLE SECOURS(
   Id_Incident INT,
   Id_Bateau INT,
   PRIMARY KEY(Id_Incident, Id_Bateau),
   FOREIGN KEY(Id_Incident) REFERENCES INCIDENT(Id_Incident),
   FOREIGN KEY(Id_Bateau) REFERENCES BATEAU_SAUVETEUR(Id_Bateau)
);
