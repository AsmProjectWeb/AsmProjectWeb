<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222023509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_liked CHANGE user_id user_id INT DEFAULT NULL, CHANGE post_id post_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post_liked ADD CONSTRAINT FK_5D024755A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post_liked ADD CONSTRAINT FK_5D0247554B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('CREATE INDEX IDX_5D024755A76ED395 ON post_liked (user_id)');
        $this->addSql('CREATE INDEX IDX_5D0247554B89032C ON post_liked (post_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_liked DROP FOREIGN KEY FK_5D024755A76ED395');
        $this->addSql('ALTER TABLE post_liked DROP FOREIGN KEY FK_5D0247554B89032C');
        $this->addSql('DROP INDEX IDX_5D024755A76ED395 ON post_liked');
        $this->addSql('DROP INDEX IDX_5D0247554B89032C ON post_liked');
        $this->addSql('ALTER TABLE post_liked CHANGE user_id user_id INT NOT NULL, CHANGE post_id post_id INT NOT NULL');
    }
}
