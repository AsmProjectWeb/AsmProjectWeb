<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222022256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groups ADD createtor_id INT DEFAULT NULL, DROP creator_id');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970DCF2EE20 FOREIGN KEY (createtor_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F06D3970DCF2EE20 ON groups (createtor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970DCF2EE20');
        $this->addSql('DROP INDEX IDX_F06D3970DCF2EE20 ON groups');
        $this->addSql('ALTER TABLE groups ADD creator_id INT NOT NULL, DROP createtor_id');
    }
}
