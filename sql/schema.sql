# CREATE DATABASE the;
# USE the;

CREATE TABLE the_VarietesThes(
                                 idVarieteThe INT AUTO_INCREMENT,
                                 NomVariete VARCHAR(100)  NOT NULL,
                                 Occupation DECIMAL(15,2)   NOT NULL,
                                 RendementParPied DECIMAL(15,2)   NOT NULL,
                                 PRIMARY KEY(idVarieteThe),
                                 UNIQUE(NomVariete)
);

CREATE TABLE the_Parcelles(
                              idParcelle INT AUTO_INCREMENT,
                              Surface DECIMAL(25,2)   NOT NULL,
                              idVarieteThe INT,
                              PRIMARY KEY(idParcelle),
                              FOREIGN KEY(idVarieteThe) REFERENCES the_VarietesThes(idVarieteThe)
);

CREATE TABLE the_CategoriesDepenses(
                                       idCategorieDepense INT AUTO_INCREMENT,
                                       NomCategorie VARCHAR(50) ,
                                       PRIMARY KEY(idCategorieDepense),
                                       UNIQUE(NomCategorie)
);

CREATE TABLE the_Depenses(
                             idDepense INT AUTO_INCREMENT,
                             DateDepense DATE NOT NULL,
                             MontantDepense DECIMAL(15,2)   NOT NULL,
                             idCategorieDepense INT NOT NULL,
                             PRIMARY KEY(idDepense),
                             FOREIGN KEY(idCategorieDepense) REFERENCES the_CategoriesDepenses(idCategorieDepense)
);

CREATE TABLE the_Status(
                           idStatu INT AUTO_INCREMENT,
                           NomStatu VARCHAR(50)  NOT NULL,
                           PRIMARY KEY(idStatu),
                           UNIQUE(NomStatu)
);

CREATE TABLE the_Genres(
                           idGenre INT AUTO_INCREMENT,
                           NomGenre VARCHAR(50)  NOT NULL,
                           PRIMARY KEY(idGenre),
                           UNIQUE(NomGenre)
);

CREATE TABLE the_Cueilleurs(
                               idCeuilleur INT AUTO_INCREMENT,
                               Nom VARCHAR(50)  NOT NULL,
                               DateNaissance DATE NOT NULL,
                               idGenre INT NOT NULL,
                               PRIMARY KEY(idCeuilleur),
                               FOREIGN KEY(idGenre) REFERENCES the_Genres(idGenre)
);

CREATE TABLE the_Users(
                          idUser INT AUTO_INCREMENT,
                          Pseudo VARCHAR(50)  NOT NULL,
                          Password VARCHAR(100)  NOT NULL,
                          idStatu INT NOT NULL,
                          PRIMARY KEY(idUser),
                          FOREIGN KEY(idStatu) REFERENCES the_Status(idStatu)
);

CREATE TABLE the_Cueillettes(
                                idCeuillette INT AUTO_INCREMENT,
                                DateCeuillette DATE NOT NULL,
                                PoidsCeuilli DECIMAL(15,2)   NOT NULL,
                                idParcelle INT NOT NULL,
                                idCeuilleur INT NOT NULL,
                                PRIMARY KEY(idCeuillette),
                                FOREIGN KEY(idParcelle) REFERENCES the_Parcelles(idParcelle),
                                FOREIGN KEY(idCeuilleur) REFERENCES the_Cueilleurs(idCeuilleur)
);
