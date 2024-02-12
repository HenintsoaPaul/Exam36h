# CREATE DATABASE the;
# USE the;

CREATE TABLE VarietesThes(
                             idVarieteThe INT AUTO_INCREMENT,
                             NomVariete VARCHAR(100)  NOT NULL,
                             Occupation DECIMAL(15,2)   NOT NULL,
                             RendementParPied DECIMAL(15,2)   NOT NULL,
                             PRIMARY KEY(idVarieteThe),
                             UNIQUE(NomVariete)
);

CREATE TABLE Parcelles(
                          idParcelle INT AUTO_INCREMENT,
                          Surface DECIMAL(25,2)   NOT NULL,
                          idVarieteThe INT,
                          PRIMARY KEY(idParcelle),
                          FOREIGN KEY(idVarieteThe) REFERENCES VarietesThes(idVarieteThe)
);

CREATE TABLE CategoriesDepenses(
                                   idCategorieDepense INT AUTO_INCREMENT,
                                   NomCategorie VARCHAR(50) ,
                                   PRIMARY KEY(idCategorieDepense),
                                   UNIQUE(NomCategorie)
);

CREATE TABLE Depenses(
                         idDepense INT AUTO_INCREMENT,
                         DateDepense DATE NOT NULL,
                         MontantDepense DECIMAL(15,2)   NOT NULL,
                         idCategorieDepense INT NOT NULL,
                         PRIMARY KEY(idDepense),
                         FOREIGN KEY(idCategorieDepense) REFERENCES CategoriesDepenses(idCategorieDepense)
);

CREATE TABLE Status(
                       idStatu INT AUTO_INCREMENT,
                       NomStatu VARCHAR(50)  NOT NULL,
                       PRIMARY KEY(idStatu),
                       UNIQUE(NomStatu)
);

CREATE TABLE Genres(
                       idGenre INT AUTO_INCREMENT,
                       NomGenre VARCHAR(50)  NOT NULL,
                       PRIMARY KEY(idGenre),
                       UNIQUE(NomGenre)
);

CREATE TABLE Cueilleurs(
                           idCeuilleur INT AUTO_INCREMENT,
                           Nom VARCHAR(50)  NOT NULL,
                           DateNaissance DATE NOT NULL,
                           idGenre INT NOT NULL,
                           PRIMARY KEY(idCeuilleur),
                           FOREIGN KEY(idGenre) REFERENCES Genres(idGenre)
);

CREATE TABLE Users(
                      idUser INT AUTO_INCREMENT,
                      Pseudo VARCHAR(50)  NOT NULL,
                      Password VARCHAR(100)  NOT NULL,
                      idStatu INT NOT NULL,
                      PRIMARY KEY(idUser),
                      FOREIGN KEY(idStatu) REFERENCES Status(idStatu)
);

CREATE TABLE Cueillettes(
                            idCeuillette INT AUTO_INCREMENT,
                            DateCeuillette DATE NOT NULL,
                            PoidsCeuilli DECIMAL(15,2)   NOT NULL,
                            idParcelle INT NOT NULL,
                            idCeuilleur INT NOT NULL,
                            PRIMARY KEY(idCeuillette),
                            FOREIGN KEY(idParcelle) REFERENCES Parcelles(idParcelle),
                            FOREIGN KEY(idCeuilleur) REFERENCES Cueilleurs(idCeuilleur)
);
