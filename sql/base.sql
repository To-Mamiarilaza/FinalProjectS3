create database takalo;
use takalo;

create table Admin(
    idAdmin int primary key AUTO_INCREMENT,
    nom VARCHAR(20),
    mdp VARCHAR(20)
);
insert into Admin values(null,"koto","koto");
insert into Admin values(null,"jenny","jenny");
insert into Admin values(null,"oui","oui");

create table User(
    idUser int primary key AUTO_INCREMENT,
    nom VARCHAR(20),
    prenom VARCHAR(20),
    mdp VARCHAR(20),
    mail VARCHAR(20),
    tel VARCHAR(20)
);
insert into User values(null,"koto","koto","koto","koto@gmail.com","0341234520");
insert into User values(null,"jenny","jenny","jenny","jenny@gmail.com","0342345312");
insert into User values(null,"oui","oui","oui","oui@gmail.com","0331234523");

create table Categorie(
    idCategorie int primary key AUTO_INCREMENT,
    nom VARCHAR(20)
);

insert into Categorie values(null,"maquillage");
insert into Categorie values(null,"fourniture_bureau");
insert into Categorie values(null,"fourniture_maison");

create table Objet(
    idObjet int primary key AUTO_INCREMENT,
    idCategorie int,
    idUser int,
    nom VARCHAR(20),
    description VARCHAR(200),
    prix double precision,
    foreign key(idCategorie) references Categorie(idCategorie),
    foreign key(idUser) references User(idUser)
);

insert into Objet values(null,2,1,"pencil","couleur bleu et  moins couteux",10000);
insert into Objet values(null,1,2,"papier","couleur blanc et  moins couteux",1000);
insert into Objet values(null,3,3,"pinceaux","couleur rouge et  moins couteux",5000);

create table Photo(
    idPhoto int primary key AUTO_INCREMENT,
    idObjet int,
    photo VARCHAR(20),
    foreign key(idObjet) references Objet(idObjet)
);

insert into Photo values(null,2,"image1");
insert into Photo values(null,3,"image2");
insert into Photo values(null,1,"image3");

create table Echange(
    idEchange int primary key AUTO_INCREMENT,
    idObjetDemande int,
    idObjetEchange int,
    EtatEchange int,
    foreign key(idObjetDemande) references Objet(idObjet),
    foreign key(idObjetEchange) references Objet(idObjet)
);

insert into Echange values(null,2,1,0);
insert into Echange values(null,3,2,1);
insert into Echange values(null,3,1,-1);
insert into Echange values(null,4,1,0);


create or replace view  EchangeDetail as select e.idEchange,e.idObjetDemande,e.idObjetEchange,e.etatechange,(obj.idUser) as idRecepteur,(ob.idUser) as idEnvoyeur from echange e join objet obj on e.idObjetDemande=obj.idObjet join objet ob on e.idObjetEchange=ob.idObjet;