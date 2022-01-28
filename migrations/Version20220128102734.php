<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220128102734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE activity_user ADD CONSTRAINT FK_8E570DDB81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity_user ADD CONSTRAINT FK_8E570DDBA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649CCFA12B8 FOREIGN KEY (profile_id) REFERENCES user_profile (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6491ED93D47 FOREIGN KEY (user_group_id) REFERENCES `user_group` (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649C703EEC9 FOREIGN KEY (documentation_id) REFERENCES documentation (id)');

        $this->addSql('INSERT INTO user_group (id, name) VALUES (1, "Group 1"), (2, "Group 2"), (3, "Group 3"), (4, "Group 4");');

        $this->addSql('INSERT INTO documentation (id, name, description) VALUES (1, "Document 1", "Document description 1"),
            (2, "Document 2", "Document description 2"),
            (3, "Document 3", "Document description 3"),
            (4, "Document 4", "Document description 4"),
            (5, "Document 5", "Document description 5"),
            (6, "Document 6", "Document description 6")
        ');

        $this->addSql('INSERT INTO activity (id, name, priority) VALUES 
            (1, "Activity 1", 3),
            (2, "Activity 2", 2),
            (3, "Activity 3", 1),
            (4, "Activity 4", 3),
            (5, "Activity 5", 2);
        ');

        $this->addSql('INSERT INTO user_profile (id, name) VALUES 
            (1, "User Profile 1"), 
            (2, "User Profile 2"), 
            (3, "User Profile 3"), 
            (4, "User Profile 4"), 
            (5, "User Profile 5");
        ');

        $this->addSql('INSERT INTO user (id, profile_id, user_group_id, documentation_id, name) VALUES 
            (1, 1, 1, 1, "User 1"), 
            (2, 2, 1, 1, "User 2"), 
            (3, 3, 1, 1, "User 3"), 
            (4, 4, 1, 1, "User 4"), 
            (5, 5, 1, 1, "User 5");
        ');

        $this->addSql('INSERT INTO activity_user (activity_id, user_id) VALUES 
            (1, 1),
            (1, 2),
            (1, 3),
            (1, 4),
            (2, 1),
            (2, 2),
            (2, 3),
            (4, 5),
            (5, 1),
            (5, 2),
            (5, 5);
        ');


    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE activity_user DROP FOREIGN KEY FK_8E570DDB81C06096');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649C703EEC9');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6491ED93D47');
        $this->addSql('ALTER TABLE activity_user DROP FOREIGN KEY FK_8E570DDBA76ED395');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649CCFA12B8');
        
        $this->addSql('TRUNCATE TABLE user_profile;');
        $this->addSql('TRUNCATE TABLE user;');
        $this->addSql('TRUNCATE TABLE activity;');
        $this->addSql('TRUNCATE TABLE documentation;');
        $this->addSql('TRUNCATE TABLE user_group;');
        $this->addSql('TRUNCATE TABLE user_group;');
        $this->addSql('TRUNCATE TABLE activity_user;');
    }
}
