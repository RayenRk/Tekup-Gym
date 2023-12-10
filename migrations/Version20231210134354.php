<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231210134354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Coach (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) DEFAULT NULL, date_naissance DATE DEFAULT NULL, cin BIGINT DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, password VARCHAR(100) DEFAULT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', annee_experience INT DEFAULT NULL, INDEX IDX_FE9842C8BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, date_expiration DATE DEFAULT NULL, date_debut DATE DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, INDEX IDX_351268BBA76ED395 (user_id), INDEX IDX_351268BBBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adherant (id INT AUTO_INCREMENT NOT NULL, gender VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE administrator (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) DEFAULT NULL, date_naissance DATE DEFAULT NULL, cin BIGINT DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, password VARCHAR(100) DEFAULT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE imc (id INT AUTO_INCREMENT NOT NULL, weight DOUBLE PRECISION NOT NULL, height DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messagerie (id INT AUTO_INCREMENT NOT NULL, adherant_id INT DEFAULT NULL, coach_id INT DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, date_message DATE DEFAULT NULL, INDEX IDX_14E8F60CBE612E45 (adherant_id), INDEX IDX_14E8F60C3C105691 (coach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) DEFAULT NULL, date_naissance DATE DEFAULT NULL, cin BIGINT DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, password VARCHAR(100) DEFAULT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Coach ADD CONSTRAINT FK_FE9842C8BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BBBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60CBE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C3C105691 FOREIGN KEY (coach_id) REFERENCES Coach (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Coach DROP FOREIGN KEY FK_FE9842C8BCF5E72D');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BBA76ED395');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BBBCF5E72D');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60CBE612E45');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C3C105691');
        $this->addSql('DROP TABLE Coach');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE adherant');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE imc');
        $this->addSql('DROP TABLE messagerie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
