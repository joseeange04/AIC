<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929065828 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE month (id INT AUTO_INCREMENT NOT NULL, mois VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE year (id INT AUTO_INCREMENT NOT NULL, annee INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE donnee ADD mois_id INT DEFAULT NULL, ADD annee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE donnee ADD CONSTRAINT FK_8527605CFA0749B8 FOREIGN KEY (mois_id) REFERENCES month (id)');
        $this->addSql('ALTER TABLE donnee ADD CONSTRAINT FK_8527605C543EC5F0 FOREIGN KEY (annee_id) REFERENCES year (id)');
        $this->addSql('CREATE INDEX IDX_8527605CFA0749B8 ON donnee (mois_id)');
        $this->addSql('CREATE INDEX IDX_8527605C543EC5F0 ON donnee (annee_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donnee DROP FOREIGN KEY FK_8527605CFA0749B8');
        $this->addSql('ALTER TABLE donnee DROP FOREIGN KEY FK_8527605C543EC5F0');
        $this->addSql('DROP TABLE month');
        $this->addSql('DROP TABLE year');
        $this->addSql('DROP INDEX IDX_8527605CFA0749B8 ON donnee');
        $this->addSql('DROP INDEX IDX_8527605C543EC5F0 ON donnee');
        $this->addSql('ALTER TABLE donnee DROP mois_id, DROP annee_id');
    }
}
