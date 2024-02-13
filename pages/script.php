<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <title>Magic Tea</title>
</head>
<body>
    <header class="shadow">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="navbar-brand text-uppercase">
                    <p class="fw-bold">  Magic<span id="logoMark" class=" mx-1 px-1 bg-success rounded">Tea</span>  </p>
                </div>
            </div>
        </div>
        <a href="../">Accueil</a>
    </header>
    <section class="my-5" id="main">
        <div class="container">
            <h1>Script de creation SQL</h1>
            <div class="row text-center">
                <textarea name="" id="" cols="100" rows="100" readonly>
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

                </textarea>

             </div>
        </div>
      </section>
      <footer >
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container flex-column flex-md-row">
            <ul class="navbar-nav d-flex flex-column">
                <li class="nav-item">  
                    <h3>Contributors</h3>
                </li>
                <li class="nav-item">
                    <p>JACQUES Chan Alex - ETU 002434</p>
                </li>
                <li class="nav-item">
                    <p> MANITRAJA Henintsoa Paul - ETU 002443</p>
                </li>
                <li class="nav-item">
                    <p>RAVELOMANANTSOA Sergiana Francourt - ETU 002610</p>
                </li>
              </ul>
              <div class="row">
                <div class="col-12 ">
                    <h3>Project Links</h3>
                    <div class="row">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://github.com/HenintsoaPaul/Exam36h.git"><i class="fs-3 bi bi-github"> <span class="d-lg-none">GitHub</span></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://l.facebook.com/l.php?u=https%3A%2F%2Fdocs.google.com%2Fspreadsheets%2Fd%2F1Q8Oczl6oQT6WgojNK7fKyvjbzqYngUimhr0WameKUuc%2Fedit%3Fusp%3Dsharing%26fbclid%3DIwAR1pgGXX2rgX6dULnqfkz-GFEiO4jAInFvmoYboGbGwzYF1uwM8Ee_LWPS0&h=AT2e6NxSJGK9xOz8hrzZ8oYuGVmQOPDnpWvYYB0eUHsqmhcpYQ1P39SFgGvcuSqzSkMiBWZ-R4xu22vYaPSJ0wK1uF1KHPrnLxZernD5TOJZMjroyiJVbyQr2tdGBF7lXRMXPA">
                                  <i class="fs-3 bi bi-file-earmark-spreadsheet"><span class=" d-lg-none px-1">Google Sheet</span></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
        </div>
    </div>
</footer>

</body>
<script src="../assets/js/bootstrap.min.js"></script>
</html>