<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222084854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conversation (id INT AUTO_INCREMENT NOT NULL, last_message_id INT DEFAULT NULL, INDEX IDX_8A8E26E9BA0E79C3 (last_message_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mess (id INT AUTO_INCREMENT NOT NULL, conversation_id INT DEFAULT NULL, user_id INT DEFAULT NULL, content LONGTEXT NOT NULL, create_at DATETIME NOT NULL, INDEX IDX_6B0AF3BA9AC0396 (conversation_id), INDEX IDX_6B0AF3BAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, iduser_id INT DEFAULT NULL, conversation_id INT DEFAULT NULL, message_read_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D79F6B11786A81FB (iduser_id), INDEX IDX_D79F6B119AC0396 (conversation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E9BA0E79C3 FOREIGN KEY (last_message_id) REFERENCES mess (id)');
        $this->addSql('ALTER TABLE mess ADD CONSTRAINT FK_6B0AF3BA9AC0396 FOREIGN KEY (conversation_id) REFERENCES conversation (id)');
        $this->addSql('ALTER TABLE mess ADD CONSTRAINT FK_6B0AF3BAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B11786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B119AC0396 FOREIGN KEY (conversation_id) REFERENCES conversation (id)');
        $this->addSql('DROP TABLE friends');
        $this->addSql('DROP TABLE message');
        $this->addSql('ALTER TABLE comment CHANGE post_id post_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526C4B89032C ON comment (post_id)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('ALTER TABLE group_members ADD groupid_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE group_id rolemember INT NOT NULL');
        $this->addSql('ALTER TABLE group_members ADD CONSTRAINT FK_C3A086F3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE group_members ADD CONSTRAINT FK_C3A086F3B3BB53C FOREIGN KEY (groupid_id) REFERENCES groups (id)');
        $this->addSql('CREATE INDEX IDX_C3A086F3A76ED395 ON group_members (user_id)');
        $this->addSql('CREATE INDEX IDX_C3A086F3B3BB53C ON group_members (groupid_id)');
        $this->addSql('ALTER TABLE groups ADD createtor_id INT DEFAULT NULL, ADD type_group VARCHAR(255) NOT NULL, DROP creator_id');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970DCF2EE20 FOREIGN KEY (createtor_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F06D3970DCF2EE20 ON groups (createtor_id)');
        $this->addSql('ALTER TABLE post CHANGE subowner userberforeshare_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DF78E8722 FOREIGN KEY (userberforeshare_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DF78E8722 ON post (userberforeshare_id)');
        $this->addSql('ALTER TABLE post_liked CHANGE user_id user_id INT DEFAULT NULL, CHANGE post_id post_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post_liked ADD CONSTRAINT FK_5D024755A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post_liked ADD CONSTRAINT FK_5D0247554B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('CREATE INDEX IDX_5D024755A76ED395 ON post_liked (user_id)');
        $this->addSql('CREATE INDEX IDX_5D0247554B89032C ON post_liked (post_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE friends (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, friends_user_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, from_user_id INT NOT NULL, to_user_id INT NOT NULL, content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E9BA0E79C3');
        $this->addSql('ALTER TABLE mess DROP FOREIGN KEY FK_6B0AF3BA9AC0396');
        $this->addSql('ALTER TABLE mess DROP FOREIGN KEY FK_6B0AF3BAA76ED395');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B11786A81FB');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B119AC0396');
        $this->addSql('DROP TABLE conversation');
        $this->addSql('DROP TABLE mess');
        $this->addSql('DROP TABLE participant');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C4B89032C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('DROP INDEX IDX_9474526C4B89032C ON comment');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395 ON comment');
        $this->addSql('ALTER TABLE comment CHANGE post_id post_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970DCF2EE20');
        $this->addSql('DROP INDEX IDX_F06D3970DCF2EE20 ON groups');
        $this->addSql('ALTER TABLE groups ADD creator_id INT NOT NULL, DROP createtor_id, DROP type_group');
        $this->addSql('ALTER TABLE group_members DROP FOREIGN KEY FK_C3A086F3A76ED395');
        $this->addSql('ALTER TABLE group_members DROP FOREIGN KEY FK_C3A086F3B3BB53C');
        $this->addSql('DROP INDEX IDX_C3A086F3A76ED395 ON group_members');
        $this->addSql('DROP INDEX IDX_C3A086F3B3BB53C ON group_members');
        $this->addSql('ALTER TABLE group_members DROP groupid_id, CHANGE user_id user_id INT NOT NULL, CHANGE rolemember group_id INT NOT NULL');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DF78E8722');
        $this->addSql('DROP INDEX IDX_5A8A6C8DF78E8722 ON post');
        $this->addSql('ALTER TABLE post CHANGE userberforeshare_id subowner INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post_liked DROP FOREIGN KEY FK_5D024755A76ED395');
        $this->addSql('ALTER TABLE post_liked DROP FOREIGN KEY FK_5D0247554B89032C');
        $this->addSql('DROP INDEX IDX_5D024755A76ED395 ON post_liked');
        $this->addSql('DROP INDEX IDX_5D0247554B89032C ON post_liked');
        $this->addSql('ALTER TABLE post_liked CHANGE user_id user_id INT NOT NULL, CHANGE post_id post_id INT NOT NULL');
    }
}
