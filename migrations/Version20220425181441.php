<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425181441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL, CHANGE unit_id unit_id INT DEFAULT NULL, CHANGE country_id country_id INT DEFAULT NULL, CHANGE subcampaign_id subcampaign_id INT DEFAULT NULL, CHANGE force_type_id force_type_id INT DEFAULT NULL, CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
         $this->addSql('ALTER TABLE user DROP is_verified, CHANGE country_id country_id INT DEFAULT 337, CHANGE force_type_id force_type_id INT DEFAULT 3, CHANGE unit_id unit_id INT DEFAULT 1300, CHANGE subcampaign_id subcampaign_id INT DEFAULT 369, CHANGE password password VARCHAR(255) DEFAULT NULL');
    }
}
