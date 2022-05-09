<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413233847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison ADD veh_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F5AF9748C FOREIGN KEY (veh_id) REFERENCES vehicule (id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1F5AF9748C ON livraison (veh_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F5AF9748C');
        $this->addSql('DROP INDEX IDX_A60C9F1F5AF9748C ON livraison');
        $this->addSql('ALTER TABLE livraison DROP veh_id');
    }
}
