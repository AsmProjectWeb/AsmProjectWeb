<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220092023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post ADD post_user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DBEFE6CCE FOREIGN KEY (post_user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DBEFE6CCE ON post (post_user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DBEFE6CCE');
        $this->addSql('DROP INDEX IDX_5A8A6C8DBEFE6CCE ON post');
        $this->addSql('ALTER TABLE post DROP post_user_id_id');
    }
}
