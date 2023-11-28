<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127163722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493C105691');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494B09E92C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BE612E45');
        $this->addSql('DROP INDEX IDX_8D93D649BE612E45 ON user');
        $this->addSql('DROP INDEX IDX_8D93D6493C105691 ON user');
        $this->addSql('DROP INDEX IDX_8D93D6494B09E92C ON user');
        $this->addSql('ALTER TABLE user DROP adherant_id, DROP coach_id, DROP administrator_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD adherant_id INT DEFAULT NULL, ADD coach_id INT DEFAULT NULL, ADD administrator_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493C105691 FOREIGN KEY (coach_id) REFERENCES coach (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BE612E45 FOREIGN KEY (adherant_id) REFERENCES adherant (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649BE612E45 ON user (adherant_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6493C105691 ON user (coach_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6494B09E92C ON user (administrator_id)');
    }
}
