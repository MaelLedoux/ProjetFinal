<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250708095549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE portfolio_project ADD image VARCHAR(255) NOT NULL, ADD video VARCHAR(255) DEFAULT NULL, ADD lien VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL, DROP slug, DROP client, DROP lieu, DROP data_projet, DROP images, CHANGE categorie categorie VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE portfolio_project ADD client VARCHAR(255) NOT NULL, ADD lieu VARCHAR(255) NOT NULL, ADD data_projet DATE NOT NULL, ADD images JSON NOT NULL, DROP video, DROP lien, DROP created_at, CHANGE categorie categorie VARCHAR(255) NOT NULL, CHANGE image slug VARCHAR(255) NOT NULL');
    }
}
