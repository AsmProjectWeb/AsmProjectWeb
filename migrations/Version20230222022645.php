<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222022645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE group_members DROP FOREIGN KEY FK_C3A086F3B3BB53C');
        $this->addSql('ALTER TABLE group_members ADD CONSTRAINT FK_C3A086F3B3BB53C FOREIGN KEY (groupid_id) REFERENCES groups (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE group_members DROP FOREIGN KEY FK_C3A086F3B3BB53C');
        $this->addSql('ALTER TABLE group_members ADD CONSTRAINT FK_C3A086F3B3BB53C FOREIGN KEY (groupid_id) REFERENCES group_members (id)');
    }
}
