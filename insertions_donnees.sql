-- Arthur

INSERT INTO UTILISATEUR (`Email_User`, `Password_User`, `Nom_Role`, `Pseudo_User`) VALUES ("gsgsfdgfd@gmail.com", "fdsfdgfdg", "Utilisateur", "User1"),
                                ("nvjkdazerx@gmail.com", "azeerdg", "Visiteur", "User2"), ("lkjjkhj@gmail.com", "fdsggfd", "Administrateur", "User3");

INSERT INTO VICTIME (`Nom_Vict`, `Prenom_Vict`, `Ville_Vict`, `Date_Naissance_Vict`, `Sexe_Vict`) VALUES ("DUPONT", "Jacky", "Louvigné de Bais", "21-05-1996", "H", "1"),
("DUPONS", "Thierry", "Bais", "25-10-1982", "H", "3"),
("DUPOND", "Denise", "Louvigné de Bais", "12-11-1943", "F", "2");

INSERT INTO VICTIME_CONTRIBUTION (`Nom_Vict`, `Prenom_Vict`, `Ville_Vict`, `Date_Naissance_Vict`, `Sexe_Vict`, `Est_Refuse`) VALUES ("DUPONT", "Jacky", "Louvigné de Bais", "21-05-1996", "H", false, "2"),
("DUPONS", "Thierry", "Bais", "25-10-1982", "H", true, "2"),
("DUPOND", "Denise", "Louvigné de Bais", "12-11-1943", "F", true, "1");

INSERT INTO SAUVETEUR (`Nom_Sauv`, `Prenom_Sauv`, `Ville_Sauv`, `Date_Naissance_Sauv`, `Sexe_Sauv`, `Id_User`) VALUES ("EZFDSF", "Michel", "Bréal Sous Vitré", "18-02-1964", "H", "1"),
("KJFDSF", "Michelle", "Rennes", "15-09-1964", "F", "3"), ("PPOUI", "Gilles", "Argentré Du Plessis", "30-11-1989", "H", "3");

INSERT INTO SAUVETEUR_CONTRIBUTION (`Nom_Sauv`, `Prenom_Sauv`, `Ville_Sauv`, `Date_Naissance_Sauv`, `Sexe_Sauv`, `Id_User`) VALUES ("EZFDSF", "Michel", "Bréal Sous Vitré", "18-02-1964", "H", "1", false, "2"),
("KJFDSF", "Michelle", "Rennes", "15-09-1964", "F", "3", true, "1"), ("PPOUI", "Gilles", "Argentré Du Plessis", "30-11-1989", "H", "3", true, "1");

INSERT INTO INCIDENT (`Date_Incident`, `Localisation_Incident`, `Desc_Incident`, `Id_User`) VALUES ("01-12-2021", "51°05&apos;24.9&quot;N 2°18&apos;58.8&quot;E", "Description de l'incident", "1"),
("28-10-2021", "51°05&apos;24.9&quot;N 2°18&apos;58.8&quot;E", "Description de l'incident n°2", "3"), ("21-06-2021", "51°05&apos;24.9&quot;N 2°18&apos;58.8&quot;E", "Description de l'incident n°3", "1");

INSERT INTO INCIDENT_CONTRIBUTION (`Date_Incident`, `Localisation_Incident`, `Desc_Incident`, `Est_Refuse`, `Id_User`) VALUES ("01-12-2021", "51°05&apos;24.9&quot;N 2°18&apos;58.8&quot;E", "Description de l'incident", false, "1"),
("28-10-2021", "51°05&apos;24.9&quot;N 2°18&apos;58.8&quot;E", "Description de l'incident n°2", true, "3"), ("21-06-2021", "51°05&apos;24.9&quot;N 2°18&apos;58.8&quot;E", "Description de l'incident n°3", true, "1");

-- Arthur

-- Emiliano

INSERT INTO BATEAU_SAUVETEUR(`Nom_Bateau`, `Dimension_Bateau`, `Desc_Bateau`, `Id_User`) VALUES ('Canot SH1', '10*10', 'Un canot demandé par le maire de Dunkerque au Ministre de la Marine et des Colonies a été commandé le 7 mai 1835. Il sera construit par l’État aux constructions navales de Cherbourg. C’est le cutter LE VIGILEANT qui ramènera le canot depuis Cherbourg. Celui-ci arrive le 7 juin à Dunkerque. Il est remis officiellement à la Société Humaine le 15 juin. Le canot est installé dans les locaux de la Société Humaine à l’est du chenal du port. Il est monté sur un solide chariot à 4 roues qui peut être tiré par un cheval ou trois hommes. Le bateau peut ainsi être lancé depuis la jetée à l’entrée ou à l’ouest du port. Des essais sont organisés le 14 juin 1836 – le redressement pose un problème lié à l’absence de lest à bord. Le 17 juin nouveaux essais avec 200 kilos de gueuze de fer. Ce dernier essai est un succès. Le 3 juillet un dernier essai concluant  testera la capacité du canot à naviguer avec 26 personnes à bord. Le deuxième canot qui remplacera le premier ne sera plus mis à l’eau par un chariot tiré par des chevaux mais grâce à un système de treuils et poulies depuis le quai. Ce premier canot participera* à 17 opérations de sauvetage. Il permettra de sauver 7 équipages et 56 personnes.', "1"),
 ('SUSAN GRAY', '10.03*2.64', 'Le nouveau canot nous vient de l’Angleterre, il porte le nom de SUSAN GRAY. Voici dans quelles circonstances il a été offert. En 1877, une goélette anglaise se brisait sur les plages de Margate, qui avait alors un matériel insuffisant pour le sauvetage dans la grande mer. Un homme généreux, M. Thomas Gray, voulut doter sa ville natale d’une embarcation de sauvetage pareille aux life-boats usités sur nos côtes. Il en fit construire un, que les pêcheurs de Margate trouvèrent trop grand et trop lourd pour leurs plages, M. Thomas Gray fit mettre sur les chantiers un canot plus léger, il mourut avant qu’il fût achevé. Plus tard sa veuve, Mme Gray, a voulu utiliser le life-boat, elle l’a offert à la Société Humaine de Dunkerque. M. Thomas Gray avait fait ses études à Dunkerque, il en avait conservé un excellent souvenir, il en parlait souvent, c’est ce souvenir que Mme Gray a voulu perpétuer en offrant une embarcation destinée au service du sauvetage dans cette localité ou dans ses environs. M. Samuel Pointon, maire de Margate, a désiré s’associer à cette généreuse pensée ; accompagné de son conseil, il est venu remettre le canot de sauvetage à notre Société, la ville de Dunkerque lui a fait une grande réception, tous les navires du port avaient hissé leurs pavois, la population s’était portée sur le quai où à 1 heure, au milieu d’une tempête du nord-est, venait s’amarrer le paquebot anglais ayant à sa remorque le SUSAN GRAY. * Les frais de réception de la délégation anglaise ont été pris en charge conjointement par la ville de Dunkerque et la Chambre de Commerce (Pv de la ville de Dunkerque du 23 avril 1880) Constructeur  Grande-Bretagne 1878 ​Type  Canot en bois à redressement, caisses à air en bois ​Dimensions Longueur : 10,03 m. Largeur : 2,64 m. Tirant d’eau NC. Poids de la coque NC Installation  26 avril 1880 Baptême   1880 Affecté à la jetée est le SUSAN GRAY fera sa première sortie le 2 mars afin de porter secours au lougre DIEU PROTEGE LA FRANCE. Condamné et vendu en 1898 Remplacé par l’AMICIA Trouvera sa place dans l’abri construit en 1886 à la jetée est – l’abri hébergera également la station porte amarre.', "2"),
  ('JEAN BART', '312.6*3.60', 'JEAN BART Constructeur Chantiers de Cornouailles à Douarnenez Type Coque en bois plastifié Longueur 12,6 m Largeur 3,60 m   15T Tirant d’eau lège 1,15m Moteur 2 P6L 520M2 2X250cv Nom donné en 20 décembre 1977 Installation novembre 1977 En réserve au 1er octobre 1997 Bénédiction le 20 décembre 1977 par le chanoine Delepoulle, archiprêtre de Dunkerque, en présence de l’amiral Amman, et du Vice-Amiral Picard-Destelan, adjoint au président de la SNSM – Marraine : Mme Prouvoyeur, épouse du maire de Dunkerque.', "1");

INSERT INTO BATEAU_SECOURU(`Nom_Bateau`, `Dimension_Bateau`, `Desc_Bateau`, `Id_User`) VALUES('Titanic', '269*0', 'Le RMS Titanic est un paquebot transatlantique britannique qui fait naufrage dans l&apos;océan Atlantique Nord en 1912 à la suite d&apos;une collision avec un iceberg, lors de son voyage inaugural de Southampton à New York. Entre 1 490 et 1 520 personnes trouvent la mort, ce qui fait de cet événement l&apos;une des plus grandes catastrophes maritimes survenues en temps de paix et la plus grande pour l&apos;époque.', "2"), 
('CHARBONNIER', '10*10', "Desc Charbonnier", "3"), ('PATRIARCHE JACOB', '10*10', "Desc Patriarche Jacob", "1");
INSERT INTO BATEAU_SAUVETEUR_CONTRIBUTION(`Nom_Bateau`, `Dimension_Bateau`, `Desc_Bateau`, `Est_Refuse`, `Id_User`) VALUES('VIVE LA NUIT DE L INFO', '10*10', "LREM IPSUM", true, "1");
INSERT INTO BATEAU_SECOURU_CONTRIBUTION(`Nom_Bateau`, `Dimension_Bateau`, `Desc_Bateau`, `Est_Refuse`, `Id_User`) VALUES('Charles de Gaule', '10*8', "LREM IPSUM", false, "3");

-- Emiliano
