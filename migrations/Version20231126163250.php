<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231126163250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, adherant_id INT DEFAULT NULL, type VARCHAR(100) DEFAULT NULL, date_expiration DATE DEFAULT NULL, date_debut DATE DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, INDEX IDX_351268BBBE612E45 (adherant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adherant (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE administrator (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coach (id INT NOT NULL, categorie_id INT DEFAULT NULL, annee_experience INT DEFAULT NULL, INDEX IDX_3F596DCCBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messagerie (id INT AUTO_INCREMENT NOT NULL, adherant_id INT DEFAULT NULL, coach_id INT DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, date_message DATE DEFAULT NULL, INDEX IDX_14E8F60CBE612E45 (adherant_id), INDEX IDX_14E8F60C3C105691 (coach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, adherant_id INT DEFAULT NULL, coach_id INT DEFAULT NULL, administrator_id INT DEFAULT NULL, nom VARCHAR(100) DEFAULT NULL, prenom VARCHAR(100) DEFAULT NULL, date_naissance DATE DEFAULT NULL, cin BIGINT DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, password VARCHAR(100) DEFAULT NULL, user_type VARCHAR(255) NOT NULL, INDEX IDX_8D93D649BE612E45 (adherant_id), INDEX IDX_8D93D6493C105691 (coach_id), INDEX IDX_8D93D6494B09E92C (administrator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BBBE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
        $this->addSql('ALTER TABLE adherant ADD CONSTRAINT FK_97DA58BCBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE administrator ADD CONSTRAINT FK_58DF0651BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coach ADD CONSTRAINT FK_3F596DCCBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE coach ADD CONSTRAINT FK_3F596DCCBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60CBE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C3C105691 FOREIGN KEY (coach_id) REFERENCES coach (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493C105691 FOREIGN KEY (coach_id) REFERENCES coach (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE categorie_abonnement ADD CONSTRAINT FK_ABDBA217F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_abonnement DROP FOREIGN KEY FK_ABDBA217F1D74413');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BBBE612E45');
        $this->addSql('ALTER TABLE adherant DROP FOREIGN KEY FK_97DA58BCBF396750');
        $this->addSql('ALTER TABLE administrator DROP FOREIGN KEY FK_58DF0651BF396750');
        $this->addSql('ALTER TABLE coach DROP FOREIGN KEY FK_3F596DCCBCF5E72D');
        $this->addSql('ALTER TABLE coach DROP FOREIGN KEY FK_3F596DCCBF396750');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60CBE612E45');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C3C105691');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BE612E45');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493C105691');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494B09E92C');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE adherant');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE coach');
        $this->addSql('DROP TABLE messagerie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
