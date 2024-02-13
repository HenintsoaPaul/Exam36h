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

CREATE TABLE the_Salaires(
    idSalaire INT AUTO_INCREMENT,
    salaire DECIMAL(25,2)   NOT NULL,
    DateDebutSalaire DATE,
    PRIMARY KEY(idSalaire)
);

CREATE TABLE the_Mois(
    idMois INT AUTO_INCREMENT,
    NomMois VARCHAR(50)  NOT NULL,
    PRIMARY KEY(idMois),
    UNIQUE(NomMois)
);

CREATE TABLE the_PrixVente(
    idPrixVente INT AUTO_INCREMENT,
    MontantPrixVente DECIMAL(25,2)  ,
    dateConfig DATE NOT NULL,
    idVarieteThe INT NOT NULL,
    PRIMARY KEY(idPrixVente),
    UNIQUE(MontantPrixVente),
    FOREIGN KEY(idVarieteThe) REFERENCES the_VarietesThes(idVarieteThe)
);

CREATE TABLE the_PoidsMinimal(
    idPoidsMinimal INT AUTO_INCREMENT,
    Poids DECIMAL(25,2)   NOT NULL,
    DateConfig DATE NOT NULL,
    PRIMARY KEY(idPoidsMinimal)
);

CREATE TABLE the_Bonus(
    idBonus INT AUTO_INCREMENT,
    Bonus DECIMAL(25,2)   NOT NULL,
    DateConfig DATE NOT NULL,
    PRIMARY KEY(idBonus)
);

CREATE TABLE the_Mallus(
    idMallus INT AUTO_INCREMENT,
    Mallus DECIMAL(25,2)   NOT NULL,
    DateConfig DATE NOT NULL,
    PRIMARY KEY(idMallus)
);

CREATE TABLE the_Cueilleurs(
    idCueilleur INT AUTO_INCREMENT,
    Nom VARCHAR(50)  NOT NULL,
    DateNaissance DATE NOT NULL,
    idGenre INT NOT NULL,
    PRIMARY KEY(idCueilleur),
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
    idCueilleur INT NOT NULL,
    PRIMARY KEY(idCeuillette),
    FOREIGN KEY(idParcelle) REFERENCES the_Parcelles(idParcelle),
    FOREIGN KEY(idCueilleur) REFERENCES the_Cueilleurs(idCueilleur)
);

CREATE TABLE the_Regenerations(
    idRegeneration INT AUTO_INCREMENT,
    idMois INT NOT NULL,
    idVarieteThe INT NOT NULL,
    PRIMARY KEY(idRegeneration),
    FOREIGN KEY(idMois) REFERENCES the_Mois(idMois),
    FOREIGN KEY(idVarieteThe) REFERENCES the_VarietesThes(idVarieteThe)
);
