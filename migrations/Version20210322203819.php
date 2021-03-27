<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322203819 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_2');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_1');
        $this->addSql('ALTER TABLE reservationevent DROP FOREIGN KEY reservationevent_ibfk_2');
        $this->addSql('CREATE TABLE reservationevenement (id INT AUTO_INCREMENT NOT NULL, id_event INT NOT NULL, id_user INT NOT NULL, date_reservation DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reservationevent');
        $this->addSql('DROP TABLE reservationhotel');
        $this->addSql('DROP TABLE reservationtransport');
        $this->addSql('DROP TABLE reservationvols');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_3');
        $this->addSql('DROP INDEX id_user ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_3');
        $this->addSql('ALTER TABLE commentaire DROP id_user, CHANGE id_event id_event INT DEFAULT NULL, CHANGE contenu contenu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCD52B4B97 FOREIGN KEY (id_event) REFERENCES evennement (id)');
        $this->addSql('DROP INDEX id_event ON commentaire');
        $this->addSql('CREATE INDEX IDX_67F068BCD52B4B97 ON commentaire (id_event)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_3 FOREIGN KEY (id_event) REFERENCES evennement (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evennement DROP FOREIGN KEY evennement_ibfk_1');
        $this->addSql('ALTER TABLE evennement DROP FOREIGN KEY evennement_ibfk_2');
        $this->addSql('ALTER TABLE evennement DROP FOREIGN KEY evennement_ibfk_3');
        $this->addSql('DROP INDEX id_hotel ON evennement');
        $this->addSql('DROP INDEX id_transport ON evennement');
        $this->addSql('DROP INDEX id_vol ON evennement');
        $this->addSql('ALTER TABLE evennement CHANGE description description VARCHAR(255) NOT NULL, CHANGE date_deb date_deb DATE NOT NULL, CHANGE date_fin date_fin DATE NOT NULL');
        $this->addSql('ALTER TABLE hotel MODIFY id_hotel INT NOT NULL');
        $this->addSql('ALTER TABLE hotel DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE hotel CHANGE nom_hotel nom_hotel VARCHAR(25) NOT NULL, CHANGE adresse adresse VARCHAR(33) NOT NULL, CHANGE categorie categorie VARCHAR(55) NOT NULL, CHANGE pays pays VARCHAR(44) NOT NULL, CHANGE ville ville VARCHAR(55) NOT NULL, CHANGE description description VARCHAR(25) NOT NULL, CHANGE id_hotel id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE hotel ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1B91C4E97 FOREIGN KEY (id_vol_id) REFERENCES vols (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD16298578D FOREIGN KEY (id_hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1BAC8B44D FOREIGN KEY (id_transport_id) REFERENCES transport (id)');
        $this->addSql('DROP INDEX id_vol ON promotion');
        $this->addSql('CREATE INDEX IDX_C11D7DD1B91C4E97 ON promotion (id_vol_id)');
        $this->addSql('DROP INDEX id_hotel ON promotion');
        $this->addSql('CREATE INDEX IDX_C11D7DD16298578D ON promotion (id_hotel_id)');
        $this->addSql('DROP INDEX id_transport ON promotion');
        $this->addSql('CREATE INDEX IDX_C11D7DD1BAC8B44D ON promotion (id_transport_id)');
        $this->addSql('ALTER TABLE transport DROP idtransport');
        $this->addSql('ALTER TABLE vols MODIFY idvol INT NOT NULL');
        $this->addSql('ALTER TABLE vols DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE vols CHANGE nomvol nomvol VARCHAR(20) NOT NULL, CHANGE img img VARCHAR(200) NOT NULL, CHANGE idvol id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE vols ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, id_client INT NOT NULL, objet VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, message VARCHAR(1000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, reponse VARCHAR(1000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, statut VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX id_client (id_client), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservationevent (id INT AUTO_INCREMENT NOT NULL, id_event INT NOT NULL, id_user INT NOT NULL, date_rv INT NOT NULL, prix INT NOT NULL, nbre INT NOT NULL, INDEX id_event (id_event), INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservationhotel (id INT AUTO_INCREMENT NOT NULL, id_hotel INT NOT NULL, id_user INT NOT NULL, date_rv DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservationtransport (id INT AUTO_INCREMENT NOT NULL, id_transport INT NOT NULL, id_user INT NOT NULL, date_rv INT NOT NULL, INDEX id_transport (id_transport), INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservationvols (id INT AUTO_INCREMENT NOT NULL, id_vol INT NOT NULL, id_user INT NOT NULL, date_rv DATE NOT NULL, INDEX id_user (id_user), INDEX id_vol (id_vol), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (iduser INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, login VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, password VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, cin INT NOT NULL, date_nais DATE NOT NULL, ville VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, num INT NOT NULL, pays VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, sexe VARCHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, codepostal INT NOT NULL, role VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX email (email), UNIQUE INDEX cin (cin), UNIQUE INDEX login (login), PRIMARY KEY(iduser)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_1 FOREIGN KEY (id_client) REFERENCES user (iduser) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservationevent ADD CONSTRAINT reservationevent_ibfk_1 FOREIGN KEY (id_event) REFERENCES evennement (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservationevent ADD CONSTRAINT reservationevent_ibfk_2 FOREIGN KEY (id_user) REFERENCES user (iduser) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP TABLE reservationevenement');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCD52B4B97');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCD52B4B97');
        $this->addSql('ALTER TABLE commentaire ADD id_user INT NOT NULL, CHANGE id_event id_event INT NOT NULL, CHANGE contenu contenu TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_2 FOREIGN KEY (id_user) REFERENCES user (iduser) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_3 FOREIGN KEY (id_event) REFERENCES evennement (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX id_user ON commentaire (id_user)');
        $this->addSql('DROP INDEX idx_67f068bcd52b4b97 ON commentaire');
        $this->addSql('CREATE INDEX id_event ON commentaire (id_event)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCD52B4B97 FOREIGN KEY (id_event) REFERENCES evennement (id)');
        $this->addSql('ALTER TABLE evennement CHANGE description description VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE date_deb date_deb VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE date_fin date_fin VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE evennement ADD CONSTRAINT evennement_ibfk_1 FOREIGN KEY (id_transport) REFERENCES transport (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evennement ADD CONSTRAINT evennement_ibfk_2 FOREIGN KEY (id_vol) REFERENCES vols (idvol) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evennement ADD CONSTRAINT evennement_ibfk_3 FOREIGN KEY (id_hotel) REFERENCES hotel (id_hotel) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX id_hotel ON evennement (id_hotel)');
        $this->addSql('CREATE INDEX id_transport ON evennement (id_transport)');
        $this->addSql('CREATE INDEX id_vol ON evennement (id_vol)');
        $this->addSql('ALTER TABLE hotel MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE hotel DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE hotel CHANGE nom_hotel nom_hotel VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresse adresse VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE categorie categorie VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE pays pays VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE ville ville VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE description description VARCHAR(155) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE id id_hotel INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE hotel ADD PRIMARY KEY (id_hotel)');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1B91C4E97');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD16298578D');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1BAC8B44D');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1B91C4E97');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD16298578D');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1BAC8B44D');
        $this->addSql('DROP INDEX idx_c11d7dd1b91c4e97 ON promotion');
        $this->addSql('CREATE INDEX id_vol ON promotion (id_vol_id)');
        $this->addSql('DROP INDEX idx_c11d7dd16298578d ON promotion');
        $this->addSql('CREATE INDEX id_hotel ON promotion (id_hotel_id)');
        $this->addSql('DROP INDEX idx_c11d7dd1bac8b44d ON promotion');
        $this->addSql('CREATE INDEX id_transport ON promotion (id_transport_id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1B91C4E97 FOREIGN KEY (id_vol_id) REFERENCES vols (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD16298578D FOREIGN KEY (id_hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1BAC8B44D FOREIGN KEY (id_transport_id) REFERENCES transport (id)');
        $this->addSql('ALTER TABLE transport ADD idtransport INT NOT NULL');
        $this->addSql('ALTER TABLE vols MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE vols DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE vols CHANGE nomvol nomvol INT NOT NULL, CHANGE img img VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE id idvol INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE vols ADD PRIMARY KEY (idvol)');
    }
}
