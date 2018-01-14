CREATE TABLE contact(
	NumContact int NOT NULL UNIQUE AUTO_INCREMENT, 
	NomContact varchar(255),
	PrenomContact varchar(255),
	NumTelContact varchar(255),
	MailContact varchar(255),
	NumEditeur int NOT NULL,
	PRIMARY KEY (NumContact)
	
);
CREATE TABLE editeur(
	NumEditeur int NOT NULL UNIQUE AUTO_INCREMENT,
	NomEditeur varchar(255),
	VilleEditeur varchar(255),
	RueEditeur varchar(255),
	CodePostaleEditeur varchar(255),
	PRIMARY KEY (NumEditeur)
	
);
CREATE TABLE loger(
	IdLoger int NOT NULL UNIQUE AUTO_INCREMENT,
	NumLogement int NOT NULL,
	NumReservation int NOT NULL,
	PlacesFrais int,
	PRIMARY KEY (IdLoger)

);
CREATE TABLE suivi(
	RefSuivi int NOT NULL UNIQUE AUTO_INCREMENT,
	FestivalSuivi int NOT NULL,
	PremierContact int,
	Relance bit,
	Reponse bit,
	NumEditeur int NOT NULL,
	AnneeSuivi int NOT NULL,
	PRIMARY KEY (RefSuivi)

);
CREATE TABLE logement(
	NumLogement int NOT NULL UNIQUE AUTO_INCREMENT,

	NomLogement varchar (255),

	VilleLogement varchar(255),
	RueLogement varchar(255),
	CodePostaleLogement varchar(255),
	NombreChambres int,
	CoutLongementNuit int,
	PRIMARY KEY (NumLogement)
);
CREATE TABLE reservation(
	NumReservation int NOT NULL UNIQUE AUTO_INCREMENT,
	FestivalReservation int NOT NULL,

	NumEditeurReservation int NOT NULL,
	DateReservation date,
	Commentaire text(999),

	PrixEspace double,
	Statut bit,
	EtatFacture bit,
	PRIMARY KEY (NumReservation)

);
CREATE TABLE jeux(
	NumJeux int NOT NULL UNIQUE AUTO_INCREMENT,
	FestivalJeux int,
	NomJeux varchar(255),
	NombreJoueur int,
	DateSortie date,
	DureePartie int,
	NumEditeur int NOT NULL,
	CodeCategorie int NOT NULL,
	CommentaireJeux varchar (999),
	PRIMARY KEY (NumJeux)
);
CREATE TABLE categorie(
	CodeCategorie int NOT NULL UNIQUE AUTO_INCREMENT,
	NomCategorie varchar(255),
	PRIMARY KEY (CodeCategorie)
);


CREATE TABLE Festival(

	AnneeFestival int NOT NULL UNIQUE,
	DateFestival date, 
	NombreTables int,
	PrixPlaceStandard double,
	Courant boolean,
	PRIMARY KEY (AnneeFestival)
);
CREATE TABLE zone(
	NumZone int NOT NULL UNIQUE AUTO_INCREMENT,
	NomZone varchar(255),
	AnneeZone int NOT NULL,
	PRIMARY KEY (NumZone)
);
CREATE TABLE concerner(
	IdConcerner int NOT NULL UNIQUE AUTO_INCREMENT,
	NumReservation int NOT NULL UNIQUE,
	NumJeux int NOT NULL UNIQUE,

	NumZone int NOT NULL,

	Nombre int, 
	Recu boolean,
	Retour boolean, 
	don boolean,
	PRIMARY KEY (IdConcerner)
	
);
CREATE TABLE localiser(
	IdLocaliser int NOT NULL UNIQUE AUTO_INCREMENT,
	NumReservation int NOT NULL UNIQUE,
	NumZone int NOT NULL UNIQUE,
	PRIMARY KEY (IdLocaliser)
	
);
CREATE TABLE regrouper (
	IdRegrouper int NOT NULL UNIQUE AUTO_INCREMENT,
	NumEditeur int NOT NULL,
	NumZone int NOT NULL,
	PRIMARY KEY (IdRegrouper)
	
);
CREATE TABLE organiser (
	IdOrganiser int NOT NULL UNIQUE AUTO_INCREMENT,
	NumZone int NOT NULL UNIQUE,
	CodeCategorie int NOT NULL UNIQUE,
	PRIMARY KEY (IdOrganiser)
);
