<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230225193620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE typegoup (id INT AUTO_INCREMENT NOT NULL, type_ground VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groups ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970C54C8C93 FOREIGN KEY (type_id) REFERENCES typegoup (id)');
        $this->addSql('CREATE INDEX IDX_F06D3970C54C8C93 ON groups (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970C54C8C93');
        $this->addSql('DROP TABLE typegoup');
        $this->addSql('DROP INDEX IDX_F06D3970C54C8C93 ON groups');
        $this->addSql('ALTER TABLE groups DROP type_id');
    }
}
