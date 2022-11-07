drop database if exists challenge;
create database if not exists challenge;
use challenge;

CREATE Table chargeClient(
    idChargeClient INT(4) PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)  NOT NULL,
    prenom VARCHAR(255)  NOT NULL,
      photo VARCHAR(100)
)ENGINE = INNODB;

create table utilisateurs(
    idUtilisateurs int(11) auto_increment primary key,
    login varchar(50),
    email varchar(255),
    role varchar(50),   -- admin ou visiteur
    etat int(1),        -- 1:activé 0:desactivé
    pwd varchar(255)
) ENGINE = INNODB;
CREATE TABLE honoraire(
    idHonoraire int(11) auto_increment primary key,
    montant  DECIMAL NOT NULL,
    date DATE  NOT NULL,
    moisHonoraire VARCHAR (100) NOT NULL,
    idChargeClient INT (4)
)ENGINE = INNODB;


  Alter table honoraire add constraint 
    foreign key(idChargeClient) references  chargeclient(idChargeClient);
INSERT INTO  utilisateurs( login, role, email, pwd) VALUES
('admin','ADMIN','Nad@gmail.com',md5('123')),
('user1','USER','user1@gmail.com',md5('123')),
('user2','USER','user2@gmail.com',md5('123'));

INSERT INTO  ChargeClient( nom, prenom) VALUES
('nad','GUZ'),
('Alim','BEN');

--INSERT INTO `honoraire` ( `montant`, `date`, `idChargeClient`) VALUES ( '54', '2022-11-02', '11');
-- SELECT SUM(montant) AS sommeHono,idChargeClient FROM honoraire GROUP BY idChargeClient;
--SELECT * FROM `honoraire` ORDER BY montant DESC; --pour ordre decroissence
--SELECT SUM(montant) AS sommeHono,idChargeClient FROM honoraire GROUP BY idChargeClient ORDER BY montant DESC;--la somme + ordre decroissence
--DELETE FROM `chargeclient` WHERE idChargeClient = 20; --pour vider les champ
--SELECT*FROM  honoraire INNER JOIN chargeClient ON honoraire.idChargeClient