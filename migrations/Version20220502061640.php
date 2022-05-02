<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220502061640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service DROP forcetype');
        $this->addSql('ALTER TABLE user DROP forceType_id');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE service ADD forcetype INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD forceType_id INT DEFAULT NULL, CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE selected_date selected_date DATE DEFAULT \'1939-09-03\', CHANGE scstart_date scstart_date DATE DEFAULT \'1918-04-01\', CHANGE scend_date scend_date DATE DEFAULT \'1945-12-31\'');
        $this->addSql('CREATE INDEX IDX_8D93D649A5E89255 ON user (forceType_id)');
    }
}
