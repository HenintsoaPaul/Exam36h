-- Veiw Cueilleurs
create or replace view the_v_cueilleurs as
select idCueilleur , Nom , DateNaissance , NomGenre 
from the_Cueilleurs 
join the_Genres on the_Cueilleurs.idGenre = the_Genres.idGenre;

-- View Cueillettes
create or replace view the_v_cueillettes as
select idCeuillette , DateCeuillette , PoidsCeuilli , idParcelle , the_Cueilleurs.Nom as NomCueilleur
from the_Cueillettes
join the_Cueilleurs on the_Cueillettes.idCueilleur = the_Cueilleurs.idCueilleur;

-- View Parcelles
create or replace view the_v_parcelles as 
select idParcelle , Surface , NomVariete 
from the_Parcelles
join the_VarietesThes on the_VarietesThes.idVarieteThe = the_Parcelles.idVarieteThe; 


-- View Categorie

select idSalaire , salaire , 
  into variable
  from table
 where condition
