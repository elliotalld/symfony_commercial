<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200529203349 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reglement (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, facture_id INT DEFAULT NULL, modereg VARCHAR(50) NOT NULL, montant VARCHAR(50) NOT NULL, numpiece VARCHAR(50) NOT NULL, echeance VARCHAR(50) NOT NULL, INDEX IDX_EBE4C14C19EB6921 (client_id), INDEX IDX_EBE4C14C7F2DEE08 (facture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14C7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE commande CHANGE totht totht DOUBLE PRECISION NOT NULL, CHANGE tottva tottva DOUBLE PRECISION NOT NULL, CHANGE totttc totttc VARCHAR(50) NOT NULL, CHANGE numc numc VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE compteur CHANGE numcom numcom INT NOT NULL');
        $this->addSql('ALTER TABLE lcommande DROP FOREIGN KEY FK_57961F0AF347EFB');
        $this->addSql('DROP INDEX IDX_57961F0AF347EFB ON lcommande');
        $this->addSql('ALTER TABLE lcommande ADD produit_id INT DEFAULT NULL, DROP produit');
        $this->addSql('ALTER TABLE lcommande ADD CONSTRAINT FK_57961F0AF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_57961F0AF347EFB ON lcommande (produit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE reglement');
        $this->addSql('ALTER TABLE commande CHANGE numc numc VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE totht totht DOUBLE PRECISION DEFAULT NULL, CHANGE tottva tottva DOUBLE PRECISION DEFAULT NULL, CHANGE totttc totttc VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE compteur CHANGE numcom numcom INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lcommande DROP FOREIGN KEY FK_57961F0AF347EFB');
        $this->addSql('DROP INDEX IDX_57961F0AF347EFB ON lcommande');
        $this->addSql('ALTER TABLE lcommande ADD produit INT NOT NULL, DROP produit_id');
        $this->addSql('ALTER TABLE lcommande ADD CONSTRAINT FK_57961F0AF347EFB FOREIGN KEY (produit) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_57961F0AF347EFB ON lcommande (produit)');
    }
}
