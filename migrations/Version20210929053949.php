<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929053949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendrier (id INT AUTO_INCREMENT NOT NULL, culture_id INT DEFAULT NULL, mois VARCHAR(20) NOT NULL, INDEX IDX_B2753CB9B108249D (culture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE culture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE culture_region (culture_id INT NOT NULL, region_id INT NOT NULL, INDEX IDX_D87CDE81B108249D (culture_id), INDEX IDX_D87CDE8198260155 (region_id), PRIMARY KEY(culture_id, region_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donnee (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piece_jointe (id INT AUTO_INCREMENT NOT NULL, donnee_id INT DEFAULT NULL, culture_id INT DEFAULT NULL, solution_id INT DEFAULT NULL, lien VARCHAR(255) NOT NULL, contenu LONGTEXT DEFAULT NULL, INDEX IDX_AB5111D4C310CCAD (donnee_id), INDEX IDX_AB5111D4B108249D (culture_id), INDEX IDX_AB5111D41C0BE183 (solution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE precipitation (id INT AUTO_INCREMENT NOT NULL, donnee_id INT DEFAULT NULL, taux DOUBLE PRECISION NOT NULL, INDEX IDX_FBC9E244C310CCAD (donnee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, donnee_id INT DEFAULT NULL, population INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_F62F176C310CCAD (donnee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sol (id INT AUTO_INCREMENT NOT NULL, donnee_id INT DEFAULT NULL, constituants VARCHAR(255) NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, INDEX IDX_F975500C310CCAD (donnee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solution (id INT AUTO_INCREMENT NOT NULL, publication_id INT DEFAULT NULL, contenu LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_9F3329DB38B217A7 (publication_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE temperature (id INT AUTO_INCREMENT NOT NULL, donnee_id INT DEFAULT NULL, valeur DOUBLE PRECISION NOT NULL, INDEX IDX_BE4E2A6CC310CCAD (donnee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(100) DEFAULT NULL, telephone VARCHAR(15) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D64998260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE calendrier ADD CONSTRAINT FK_B2753CB9B108249D FOREIGN KEY (culture_id) REFERENCES culture (id)');
        $this->addSql('ALTER TABLE culture_region ADD CONSTRAINT FK_D87CDE81B108249D FOREIGN KEY (culture_id) REFERENCES culture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE culture_region ADD CONSTRAINT FK_D87CDE8198260155 FOREIGN KEY (region_id) REFERENCES region (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE piece_jointe ADD CONSTRAINT FK_AB5111D4C310CCAD FOREIGN KEY (donnee_id) REFERENCES donnee (id)');
        $this->addSql('ALTER TABLE piece_jointe ADD CONSTRAINT FK_AB5111D4B108249D FOREIGN KEY (culture_id) REFERENCES culture (id)');
        $this->addSql('ALTER TABLE piece_jointe ADD CONSTRAINT FK_AB5111D41C0BE183 FOREIGN KEY (solution_id) REFERENCES solution (id)');
        $this->addSql('ALTER TABLE precipitation ADD CONSTRAINT FK_FBC9E244C310CCAD FOREIGN KEY (donnee_id) REFERENCES donnee (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176C310CCAD FOREIGN KEY (donnee_id) REFERENCES donnee (id)');
        $this->addSql('ALTER TABLE sol ADD CONSTRAINT FK_F975500C310CCAD FOREIGN KEY (donnee_id) REFERENCES donnee (id)');
        $this->addSql('ALTER TABLE solution ADD CONSTRAINT FK_9F3329DB38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE temperature ADD CONSTRAINT FK_BE4E2A6CC310CCAD FOREIGN KEY (donnee_id) REFERENCES donnee (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64998260155 FOREIGN KEY (region_id) REFERENCES region (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendrier DROP FOREIGN KEY FK_B2753CB9B108249D');
        $this->addSql('ALTER TABLE culture_region DROP FOREIGN KEY FK_D87CDE81B108249D');
        $this->addSql('ALTER TABLE piece_jointe DROP FOREIGN KEY FK_AB5111D4B108249D');
        $this->addSql('ALTER TABLE piece_jointe DROP FOREIGN KEY FK_AB5111D4C310CCAD');
        $this->addSql('ALTER TABLE precipitation DROP FOREIGN KEY FK_FBC9E244C310CCAD');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176C310CCAD');
        $this->addSql('ALTER TABLE sol DROP FOREIGN KEY FK_F975500C310CCAD');
        $this->addSql('ALTER TABLE temperature DROP FOREIGN KEY FK_BE4E2A6CC310CCAD');
        $this->addSql('ALTER TABLE solution DROP FOREIGN KEY FK_9F3329DB38B217A7');
        $this->addSql('ALTER TABLE culture_region DROP FOREIGN KEY FK_D87CDE8198260155');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64998260155');
        $this->addSql('ALTER TABLE piece_jointe DROP FOREIGN KEY FK_AB5111D41C0BE183');
        $this->addSql('DROP TABLE calendrier');
        $this->addSql('DROP TABLE culture');
        $this->addSql('DROP TABLE culture_region');
        $this->addSql('DROP TABLE donnee');
        $this->addSql('DROP TABLE piece_jointe');
        $this->addSql('DROP TABLE precipitation');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE sol');
        $this->addSql('DROP TABLE solution');
        $this->addSql('DROP TABLE temperature');
        $this->addSql('DROP TABLE user');
    }
}
