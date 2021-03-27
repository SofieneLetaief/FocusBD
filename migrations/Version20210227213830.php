<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210227213830 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_1');
        $this->addSql('ALTER TABLE reservationevent DROP FOREIGN KEY reservationevent_ibfk_1');
        $this->addSql('ALTER TABLE transport DROP FOREIGN KEY transport_ibfk_1');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY evenement_ibfk_3');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY promotion_ibfk_1');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_2');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_1');
        $this->addSql('ALTER TABLE reservationevent DROP FOREIGN KEY reservationevent_ibfk_2');
        $this->addSql('ALTER TABLE reservationtransport DROP FOREIGN KEY reservationtransport_ibfk_2');
        $this->addSql('ALTER TABLE reservationvols DROP FOREIGN KEY reservationvols_ibfk_1');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY evenement_ibfk_2');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY promotion_ibfk_3');
        $this->addSql('ALTER TABLE reservationvols DROP FOREIGN KEY reservationvols_ibfk_2');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE guide');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reservationevent');
        $this->addSql('DROP TABLE reservationhotel');
        $this->addSql('DROP TABLE reservationtransport');
        $this->addSql('DROP TABLE reservationvols');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vols');
        $this->addSql('DROP INDEX idguide ON transport');
        $this->addSql('ALTER TABLE transport ADD idtransport INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_event INT NOT NULL, id_user INT NOT NULL, contenu TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX id_event (id_event), INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, id_hotel INT NOT NULL, id_vol INT NOT NULL, id_transport INT NOT NULL, titre VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_deb VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_fin VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prix INT NOT NULL, capacite INT NOT NULL, INDEX id_transport (id_transport), INDEX id_vol (id_vol), INDEX id_hotel (id_hotel), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE guide (idguide INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, cin INT NOT NULL, numtel INT NOT NULL, email VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, img VARCHAR(155) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(idguide)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE hotel (id_hotel INT AUTO_INCREMENT NOT NULL, nom_hotel VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, categorie VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, pays VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, ville VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, num_tel INT NOT NULL, nbre_chambre INT NOT NULL, `desc` VARCHAR(155) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_hotel)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, id_vol INT NOT NULL, id_hotel INT NOT NULL, id_transport INT NOT NULL, dateD INT NOT NULL, dateF INT NOT NULL, prix INT NOT NULL, INDEX id_hotel (id_hotel), INDEX id_transport (id_transport), INDEX id_vol (id_vol), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, id_client INT NOT NULL, objet VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, message VARCHAR(1000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, reponse VARCHAR(1000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, statut VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX id_client (id_client), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservationevent (id INT AUTO_INCREMENT NOT NULL, id_event INT NOT NULL, id_user INT NOT NULL, date_rv INT NOT NULL, prix INT NOT NULL, nbre INT NOT NULL, INDEX id_event (id_event), INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservationhotel (id INT AUTO_INCREMENT NOT NULL, id_hotel INT NOT NULL, id_user INT NOT NULL, date_rv DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservationtransport (id INT AUTO_INCREMENT NOT NULL, id_transport INT NOT NULL, id_user INT NOT NULL, date_rv INT NOT NULL, INDEX id_transport (id_transport), INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservationvols (id INT AUTO_INCREMENT NOT NULL, id_vol INT NOT NULL, id_user INT NOT NULL, date_rv DATE NOT NULL, INDEX id_user (id_user), INDEX id_vol (id_vol), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (iduser INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, login VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, password VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, cin INT NOT NULL, date_nais DATE NOT NULL, ville VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, num INT NOT NULL, pays VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, sexe VARCHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, codepostal INT NOT NULL, role VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX cin (cin), UNIQUE INDEX login (login), UNIQUE INDEX email (email), PRIMARY KEY(iduser)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vols (idvol INT AUTO_INCREMENT NOT NULL, nomvol INT NOT NULL, dep VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, dest VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, img VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prix INT NOT NULL, capacite INT NOT NULL, date DATE NOT NULL, PRIMARY KEY(idvol)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_1 FOREIGN KEY (id_event) REFERENCES evenement (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_2 FOREIGN KEY (id_user) REFERENCES user (iduser) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT evenement_ibfk_1 FOREIGN KEY (id_transport) REFERENCES transport (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT evenement_ibfk_2 FOREIGN KEY (id_vol) REFERENCES vols (idvol) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT evenement_ibfk_3 FOREIGN KEY (id_hotel) REFERENCES hotel (id_hotel) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT promotion_ibfk_1 FOREIGN KEY (id_hotel) REFERENCES hotel (id_hotel) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT promotion_ibfk_2 FOREIGN KEY (id_transport) REFERENCES transport (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT promotion_ibfk_3 FOREIGN KEY (id_vol) REFERENCES vols (idvol) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_1 FOREIGN KEY (id_client) REFERENCES user (iduser) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservationevent ADD CONSTRAINT reservationevent_ibfk_1 FOREIGN KEY (id_event) REFERENCES evenement (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservationevent ADD CONSTRAINT reservationevent_ibfk_2 FOREIGN KEY (id_user) REFERENCES user (iduser) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservationtransport ADD CONSTRAINT reservationtransport_ibfk_1 FOREIGN KEY (id_transport) REFERENCES transport (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservationtransport ADD CONSTRAINT reservationtransport_ibfk_2 FOREIGN KEY (id_user) REFERENCES user (iduser) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservationvols ADD CONSTRAINT reservationvols_ibfk_1 FOREIGN KEY (id_user) REFERENCES user (iduser) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservationvols ADD CONSTRAINT reservationvols_ibfk_2 FOREIGN KEY (id_vol) REFERENCES vols (idvol) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transport DROP idtransport');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT transport_ibfk_1 FOREIGN KEY (idguide) REFERENCES guide (idguide) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX idguide ON transport (idguide)');
    }
}
