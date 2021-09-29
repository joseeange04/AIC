<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929123438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE floraison (id INT AUTO_INCREMENT NOT NULL, culture_id INT NOT NULL, mois VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8984C2F8B108249D (culture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plantation (id INT AUTO_INCREMENT NOT NULL, culture_id INT NOT NULL, mois VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B789E5BAB108249D (culture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recolte (id INT AUTO_INCREMENT NOT NULL, culture_id INT NOT NULL, mois VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3433713CB108249D (culture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE floraison ADD CONSTRAINT FK_8984C2F8B108249D FOREIGN KEY (culture_id) REFERENCES culture (id)');
        $this->addSql('ALTER TABLE plantation ADD CONSTRAINT FK_B789E5BAB108249D FOREIGN KEY (culture_id) REFERENCES culture (id)');
        $this->addSql('ALTER TABLE recolte ADD CONSTRAINT FK_3433713CB108249D FOREIGN KEY (culture_id) REFERENCES culture (id)');
        $this->addSql('ALTER TABLE sol ADD argile DOUBLE PRECISION DEFAULT NULL, ADD limon DOUBLE PRECISION DEFAULT NULL, ADD sable DOUBLE PRECISION DEFAULT NULL, DROP pourcentage');
        $this->addSql('ALTER TABLE user DROP INDEX UNIQ_8D93D64998260155, ADD INDEX IDX_8D93D64998260155 (region_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE floraison');
        $this->addSql('DROP TABLE plantation');
        $this->addSql('DROP TABLE recolte');
        $this->addSql('ALTER TABLE sol ADD pourcentage DOUBLE PRECISION NOT NULL, DROP argile, DROP limon, DROP sable');
        $this->addSql('ALTER TABLE user DROP INDEX IDX_8D93D64998260155, ADD UNIQUE INDEX UNIQ_8D93D64998260155 (region_id)');
    }
}
