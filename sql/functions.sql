# function GetPoidsRestantByParcelle( parcelleId ):
# get parcelle
# get all cueillette related to parcelle -> poidCueilli foreach -> sum => NESORINA
# poidsTotalParcel - NESORINA => RESULT
DELIMITER //
CREATE FUNCTION GetPoidsRestantInParcelle(parcelleId INT) RETURNS DECIMAL(10,  2)
BEGIN
    DECLARE poidsTotalParcel DECIMAL(100,  2);
    DECLARE NESORINA DECIMAL(100,  2);
    DECLARE poidsRestant DECIMAL(100,  2);

    -- Get the total weight of the parcel
    SET poidsTotalParcel = GetPoidsTotalInParcelle(parcelleId);

    -- Calculate the total harvested weight for the parcel
    SELECT SUM(PoidsCeuilli) INTO NESORINA FROM the_cueillettes WHERE idParcelle = parcelleId;

    -- Calculate the remaining weight
    SET poidsRestant = poidsTotalParcel - NESORINA;

    -- Return the remaining weight
    RETURN poidsRestant;
END //
DELIMITER ;


# function GetPoidsTotalInParcelle( parcelleId ):
# get surface : -> surface * 10.000 -> surface parcelle in m2
# get tee feet number : -> getSurface() / thisParcelle.getIdVariete.occupation -> nbPieds
# result : -> nbPieds * thisParcelle.getIdVariete.rendement
DELIMITER //
CREATE FUNCTION GetPoidsTotalInParcelle(parcelleId INT) RETURNS DECIMAL(10,  2)
BEGIN
    DECLARE surface DECIMAL(100,  2);
    DECLARE occupationRate DECIMAL(100,  2);
    DECLARE rendement DECIMAL(100,  2);
    DECLARE nbPieds DECIMAL(100,  2);
    DECLARE poidsTotal DECIMAL(100,  2);

    -- Get the surface area of the parcel
    SELECT surface INTO surface FROM the_parcelles WHERE idParcelle = parcelleId;

    -- Convert the surface area to square meters
    SET surface = surface *  10000;

    -- Get the occupancy rate and yield for the varietal planted in the parcel
    SELECT occupation, rendement INTO occupationRate, rendement
    FROM the_varietesthes v
             JOIN the_parcelles p ON p.idVarieteThe = v.idVarieteThe
    WHERE p.idVarieteThe = parcelleId;

    -- Calculate the number of tree feet
    SET nbPieds = surface / occupationRate;

    -- Calculate the total weight using the number of tree feet and yield
    SET poidsTotal = nbPieds * rendement;

    -- Return the total weight
    RETURN poidsTotal;
END //
DELIMITER ;

