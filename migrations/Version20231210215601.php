<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231210215601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coach CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE nom nom VARCHAR(100) NOT NULL, CHANGE prenom prenom VARCHAR(100) DEFAULT NULL, CHANGE email email VARCHAR(100) DEFAULT NULL, CHANGE password password VARCHAR(100) DEFAULT NULL, CHANGE annee_experience annee_experience INT DEFAULT NULL, CHANGE categorie_id categorie_id INT DEFAULT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE coach ADD CONSTRAINT FK_FE9842C8BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_FE9842C8BCF5E72D ON coach (categorie_id)');
        $this->addSql('DROP INDEX IDX_14E8F60C3C105691 ON messagerie');
        $this->addSql('ALTER TABLE messagerie DROP coach_id');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Coach MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE Coach DROP FOREIGN KEY FK_FE9842C8BCF5E72D');
        $this->addSql('DROP INDEX IDX_FE9842C8BCF5E72D ON Coach');
        $this->addSql('DROP INDEX `primary` ON Coach');
        $this->addSql('ALTER TABLE Coach CHANGE id id INT DEFAULT 0 NOT NULL, CHANGE categorie_id categorie_id INT NOT NULL, CHANGE nom nom VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE annee_experience annee_experience INT NOT NULL');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60CA76ED395');
        $this->addSql('ALTER TABLE messagerie ADD coach_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_14E8F60C3C105691 ON messagerie (coach_id)');
    }
}
