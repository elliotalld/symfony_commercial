<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200529160132 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(50) NOT NULL, libelle VARCHAR(50) NOT NULL, responsable VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, ville VARCHAR(50) NOT NULL, tel VARCHAR(50) NOT NULL, portable VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, matfisc VARCHAR(50) NOT NULL, cin VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande CHANGE totht totht DOUBLE PRECISION NOT NULL, CHANGE tottva tottva DOUBLE PRECISION NOT NULL, CHANGE totttc totttc VARCHAR(50) NOT NULL, CHANGE numc numc VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE compteur CHANGE numcom numcom INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('ALTER TABLE commande CHANGE numc numc VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE totht totht DOUBLE PRECISION DEFAULT NULL, CHANGE tottva tottva DOUBLE PRECISION DEFAULT NULL, CHANGE totttc totttc VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE compteur CHANGE numcom numcom INT DEFAULT NULL');
    }
}
