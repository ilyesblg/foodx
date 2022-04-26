<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413213440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, id_client_id INT DEFAULT NULL, id_carte INT NOT NULL, num_carte VARCHAR(100) NOT NULL, date_ex DATE NOT NULL, mp VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BAD4FFFD99DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_carte (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, montant_max DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cheques (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT DEFAULT NULL, id_cheques INT NOT NULL, montant DOUBLE PRECISION NOT NULL, date_cheque DATE NOT NULL, lieu VARCHAR(100) NOT NULL, signature VARCHAR(255) NOT NULL, INDEX IDX_C2782E2A76C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chequier (id INT AUTO_INCREMENT NOT NULL, num_compte_id INT DEFAULT NULL, id_chequier INT NOT NULL, date_creation DATE NOT NULL, motif_chequier VARCHAR(255) NOT NULL, INDEX IDX_A2F202D6801B12FC (num_compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_publication_id INT DEFAULT NULL, nom_client_id INT DEFAULT NULL, id_commentaire INT NOT NULL, description_commentaire VARCHAR(255) NOT NULL, date_commentaire DATE NOT NULL, INDEX IDX_67F068BC5D4AAA1 (id_publication_id), INDEX IDX_67F068BC8D1A1860 (nom_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, fullname_client_id INT NOT NULL, num_compte INT NOT NULL, rib_compte VARCHAR(150) NOT NULL, solde_compte DOUBLE PRECISION NOT NULL, date_creation DATETIME NOT NULL, type_compte VARCHAR(100) NOT NULL, seuil_compte DOUBLE PRECISION NOT NULL, taux_interet DOUBLE PRECISION NOT NULL, etat_compte INT NOT NULL, INDEX IDX_CFF6526033BE058B (fullname_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, id_operation INT NOT NULL, montant DOUBLE PRECISION NOT NULL, date_operation DATE NOT NULL, type_c VARCHAR(100) NOT NULL, depense_hebdomadaire DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, nom_client_id INT DEFAULT NULL, id_publication INT NOT NULL, titre_publication VARCHAR(255) NOT NULL, description_publication VARCHAR(255) NOT NULL, categorie_publication VARCHAR(255) NOT NULL, date_publication DATETIME NOT NULL, INDEX IDX_AF3C67798D1A1860 (nom_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, nom_u_id INT DEFAULT NULL, type_rec VARCHAR(100) NOT NULL, date_rec DATETIME NOT NULL, etat_rec VARCHAR(100) NOT NULL, desc_rec VARCHAR(150) NOT NULL, INDEX IDX_CE606404167559FE (nom_u_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, rib_emetteur_id INT DEFAULT NULL, fullname_emetteur_id INT DEFAULT NULL, id_transaction INT NOT NULL, rib_recepteur VARCHAR(150) NOT NULL, montant_transaction DOUBLE PRECISION NOT NULL, date_transaction DATETIME NOT NULL, description_transaction VARCHAR(255) NOT NULL, fullname_recepteur VARCHAR(150) NOT NULL, type_transaction VARCHAR(100) NOT NULL, etat_transaction INT NOT NULL, INDEX IDX_723705D169AC2DBB (rib_emetteur_id), INDEX IDX_723705D169057DC9 (fullname_emetteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, cin_u INT NOT NULL, nom_u VARCHAR(100) NOT NULL, prenom_u VARCHAR(100) NOT NULL, date_naissance DATE NOT NULL, email_u VARCHAR(255) NOT NULL, num_tel INT NOT NULL, role VARCHAR(100) NOT NULL, mot_de_passe VARCHAR(100) NOT NULL, activation_token VARCHAR(50) DEFAULT NULL, reset_token VARCHAR(50) DEFAULT NULL, bloquer_token VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD99DED506 FOREIGN KEY (id_client_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE cheques ADD CONSTRAINT FK_C2782E2A76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE chequier ADD CONSTRAINT FK_A2F202D6801B12FC FOREIGN KEY (num_compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC5D4AAA1 FOREIGN KEY (id_publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC8D1A1860 FOREIGN KEY (nom_client_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526033BE058B FOREIGN KEY (fullname_client_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67798D1A1860 FOREIGN KEY (nom_client_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404167559FE FOREIGN KEY (nom_u_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D169AC2DBB FOREIGN KEY (rib_emetteur_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D169057DC9 FOREIGN KEY (fullname_emetteur_id) REFERENCES compte (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD99DED506');
        $this->addSql('ALTER TABLE cheques DROP FOREIGN KEY FK_C2782E2A76C50E4A');
        $this->addSql('ALTER TABLE chequier DROP FOREIGN KEY FK_A2F202D6801B12FC');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D169AC2DBB');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D169057DC9');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC5D4AAA1');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC8D1A1860');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526033BE058B');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67798D1A1860');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404167559FE');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE categorie_carte');
        $this->addSql('DROP TABLE cheques');
        $this->addSql('DROP TABLE chequier');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE operation');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE utilisateur');
    }
}
