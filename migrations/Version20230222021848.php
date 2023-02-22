<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222021848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE group_members ADD user_id INT DEFAULT NULL, ADD groupid_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE group_members ADD CONSTRAINT FK_C3A086F3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE group_members ADD CONSTRAINT FK_C3A086F3B3BB53C FOREIGN KEY (groupid_id) REFERENCES group_members (id)');
        $this->addSql('CREATE INDEX IDX_C3A086F3A76ED395 ON group_members (user_id)');
        $this->addSql('CREATE INDEX IDX_C3A086F3B3BB53C ON group_members (groupid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE group_members DROP FOREIGN KEY FK_C3A086F3A76ED395');
        $this->addSql('ALTER TABLE group_members DROP FOREIGN KEY FK_C3A086F3B3BB53C');
        $this->addSql('DROP INDEX IDX_C3A086F3A76ED395 ON group_members');
        $this->addSql('DROP INDEX IDX_C3A086F3B3BB53C ON group_members');
        $this->addSql('ALTER TABLE group_members DROP user_id, DROP groupid_id');
    }
}
