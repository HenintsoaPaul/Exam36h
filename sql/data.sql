INSERT INTO the_status (NomStatu)
VALUES ('Admin'),
       ('User');

INSERT INTO the_Genres (NomGenre)
VALUES ('Homme'),
       ('Femme'),
       ('Non Binaire');

INSERT INTO the_VarietesThes (NomVariete, Occupation, RendementParPied)
VALUES ('Vert', 500, 4),
       ('Noir', 1000, 1),
       ('Citronelle', 100, 10),
       ('Bad Guyz', 250, 2);

INSERT INTO the_CategoriesDepenses (NomCategorie)
VALUES ('Engrais'),
       ('Carburant'),
       ('Logistique');

INSERT INTO the_parcelles (Surface, idVarieteThe)
VALUES (3, 1),
       (2, 2),
       (2, 3);

INSERT INTO the_Cueilleurs (Nom, DateNaissance, idGenre)
VALUES ('Alex', '2000-02-09', 1),
       ('Henintsoa', '2000-02-03', 1);

INSERT INTO the_Users (pseudo, password, idstatu)
VALUES ('alexAdmin', 'admin', 1),
       ('henints', 'user', 2),
       ('Sergiana', 'user', 2);

INSERT INTO the_mois (NomMois)
VALUES ('Janvier'), ('Fevrier'), ('Mars'), ('Avril'), ('Mai'), ('Juin'),
       ('Juillet'), ('Aout'), ('Septembre'), ('Octobre'), ('Novembre'), ('Decembre');