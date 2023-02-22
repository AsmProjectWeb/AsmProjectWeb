<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222083743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mess ADD conversation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mess ADD CONSTRAINT FK_6B0AF3BA9AC0396 FOREIGN KEY (conversation_id) REFERENCES conversation (id)');
        $this->addSql('CREATE INDEX IDX_6B0AF3BA9AC0396 ON mess (conversation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mess DROP FOREIGN KEY FK_6B0AF3BA9AC0396');
        $this->addSql('DROP INDEX IDX_6B0AF3BA9AC0396 ON mess');
        $this->addSql('ALTER TABLE mess DROP conversation_id');
    }
}
