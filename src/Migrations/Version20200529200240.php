<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200529200240 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande CHANGE totht totht DOUBLE PRECISION NOT NULL, CHANGE tottva tottva DOUBLE PRECISION NOT NULL, CHANGE totttc totttc VARCHAR(50) NOT NULL, CHANGE numc numc VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE compteur CHANGE numcom numcom INT NOT NULL');
        $this->addSql('ALTER TABLE lcommande ADD numc VARCHAR(50) NOT NULL, CHANGE produit_id produit_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande CHANGE numc numc VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE totht totht DOUBLE PRECISION DEFAULT NULL, CHANGE tottva tottva DOUBLE PRECISION DEFAULT NULL, CHANGE totttc totttc VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE compteur CHANGE numcom numcom INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lcommande DROP numc, CHANGE produit_id produit_id INT NOT NULL');
    }
}
