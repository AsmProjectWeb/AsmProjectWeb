<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230223020855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE group_post (id INT AUTO_INCREMENT NOT NULL, post_id_id INT DEFAULT NULL, group_id_id INT DEFAULT NULL, INDEX IDX_73D037FDE85F12B8 (post_id_id), INDEX IDX_73D037FD2F68B530 (group_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE group_post ADD CONSTRAINT FK_73D037FDE85F12B8 FOREIGN KEY (post_id_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE group_post ADD CONSTRAINT FK_73D037FD2F68B530 FOREIGN KEY (group_id_id) REFERENCES groups (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE group_post DROP FOREIGN KEY FK_73D037FDE85F12B8');
        $this->addSql('ALTER TABLE group_post DROP FOREIGN KEY FK_73D037FD2F68B530');
        $this->addSql('DROP TABLE group_post');
    }
}
