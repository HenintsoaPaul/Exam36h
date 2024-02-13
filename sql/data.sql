INSERT INTO the_Status (NomStatu)
VALUES ('Admin'),
       ('User');

INSERT INTO the_Genres (NomGenre)
VALUES ('Homme'),
       ('Femme'),
       ('Non Binaire');

INSERT INTO the_VarietesThes (NomVariete, Occupation, RendementParPied)
VALUES ('Vert', 500, 4),
       ('Noir', 1000, 1),
       ('Bad Guyz', 250, 2);

INSERT INTO the_CategoriesDepenses (NomCategorie)
VALUES ('Engrais'),
       ('Carburant'),
       ('Logistique');

INSERT INTO the_Parcelles (Surface, idVarieteThe)
VALUES (3, 1),
       (2, 2),
       (2, 3);

INSERT INTO the_Cueilleurs (Nom, DateNaissance, idGenre)
VALUES ('Alex', '2000-02-09', 1),
       ('Henintsoa', '2000-02-03', 1);

INSERT INTO the_Users (pseudo, password, idstatu)
VALUES ('alexAdmin', 'admin', 1),
       ('henints', 'user', 2);
INSERT INTO the_Users (pseudo, password, idstatu)
VALUES ('Sergiana', 'user', 2);

INSERT INTO the_Mois (NomMois)
VALUES ('Janvier'), ('Fevrier'), ('Mars'), ('Avril'), ('Mai'), ('Juin'),
       ('Juillet'), ('Aout'), ('Septembre'), ('Octobre'), ('Novembre'), ('Decembre');

INSERT INTO the_Regenerations (idMois, idVarieteThe)
VALUES (1, 1),
       (6, 1);

INSERT INTO the_Mallus (Mallus, DateConfig)
VALUES (10, '2024-01-01');

INSERT INTO the_Bonus (Bonus, DateConfig)
VALUES (10, '2024-01-01');

INSERT INTO the_PoidsMinimal (Poids, DateConfig)
VALUES (100, '2024-01-01');

INSERT INTO the_Depenses (DateDepense, MontantDepense, idCategorieDepense)
VALUES ('2024-01-01', 10, 1);

INSERT INTO the_PrixVente (MontantPrixVente, dateConfig, idVarieteThe)
VALUES (100, '2024-01-01', 1),
       (100, '2024-01-01', 2),
       (100, '2024-01-01', 3);

INSERT INTO the_Salaires (salaire, DateDebutSalaire)
VALUES (50, '2024-01-01');