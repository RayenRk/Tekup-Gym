<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231121184513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_abonnement (categorie_id INT NOT NULL, abonnement_id INT NOT NULL, INDEX IDX_ABDBA217BCF5E72D (categorie_id), INDEX IDX_ABDBA217F1D74413 (abonnement_id), PRIMARY KEY(categorie_id, abonnement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_abonnement ADD CONSTRAINT FK_ABDBA217BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_abonnement ADD CONSTRAINT FK_ABDBA217F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE abonnement ADD adherant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BBBE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
        $this->addSql('CREATE INDEX IDX_351268BBBE612E45 ON abonnement (adherant_id)');
        $this->addSql('ALTER TABLE coach ADD annee_experience INT DEFAULT NULL, CHANGE annees_experience categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coach ADD CONSTRAINT FK_3F596DCCBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_3F596DCCBCF5E72D ON coach (categorie_id)');
        $this->addSql('ALTER TABLE messagerie ADD adherant_id INT DEFAULT NULL, ADD coach_id INT DEFAULT NULL, CHANGE date date_message DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60CBE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C3C105691 FOREIGN KEY (coach_id) REFERENCES coach (id)');
        $this->addSql('CREATE INDEX IDX_14E8F60CBE612E45 ON messagerie (adherant_id)');
        $this->addSql('CREATE INDEX IDX_14E8F60C3C105691 ON messagerie (coach_id)');
        $this->addSql('ALTER TABLE user ADD password VARCHAR(100) DEFAULT NULL, DROP mot_de_passe, CHANGE email email VARCHAR(100) DEFAULT NULL, CHANGE date_de_naissance date_naissance DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coach DROP FOREIGN KEY FK_3F596DCCBCF5E72D');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, nom_category VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categorie_abonnement DROP FOREIGN KEY FK_ABDBA217BCF5E72D');
        $this->addSql('ALTER TABLE categorie_abonnement DROP FOREIGN KEY FK_ABDBA217F1D74413');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_abonnement');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BBBE612E45');
        $this->addSql('DROP INDEX IDX_351268BBBE612E45 ON abonnement');
        $this->addSql('ALTER TABLE abonnement DROP adherant_id');
        $this->addSql('DROP INDEX IDX_3F596DCCBCF5E72D ON coach');
        $this->addSql('ALTER TABLE coach ADD annees_experience INT DEFAULT NULL, DROP categorie_id, DROP annee_experience');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60CBE612E45');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C3C105691');
        $this->addSql('DROP INDEX IDX_14E8F60CBE612E45 ON messagerie');
        $this->addSql('DROP INDEX IDX_14E8F60C3C105691 ON messagerie');
        $this->addSql('ALTER TABLE messagerie DROP adherant_id, DROP coach_id, CHANGE date_message date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD mot_de_passe VARCHAR(255) DEFAULT NULL, DROP password, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE date_naissance date_de_naissance DATE DEFAULT NULL');
    }
}
