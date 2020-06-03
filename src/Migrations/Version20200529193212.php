<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200529193212 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, numl VARCHAR(50) NOT NULL, observation VARCHAR(50) NOT NULL, totht VARCHAR(50) NOT NULL, tottva VARCHAR(50) NOT NULL, totttc VARCHAR(50) NOT NULL, dateliv VARCHAR(50) NOT NULL, INDEX IDX_A60C9F1F19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE llivraison (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, numl VARCHAR(50) NOT NULL, pv VARCHAR(50) NOT NULL, qte VARCHAR(50) NOT NULL, tva VARCHAR(50) NOT NULL, lig INT NOT NULL, INDEX IDX_68540739F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE llivraison ADD CONSTRAINT FK_68540739F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE commande CHANGE totht totht DOUBLE PRECISION NOT NULL, CHANGE tottva tottva DOUBLE PRECISION NOT NULL, CHANGE totttc totttc VARCHAR(50) NOT NULL, CHANGE numc numc VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE compteur CHANGE numcom numcom INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE llivraison');
        $this->addSql('ALTER TABLE commande CHANGE numc numc VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE totht totht DOUBLE PRECISION DEFAULT NULL, CHANGE tottva tottva DOUBLE PRECISION DEFAULT NULL, CHANGE totttc totttc VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE compteur CHANGE numcom numcom INT DEFAULT NULL');
    }
}
