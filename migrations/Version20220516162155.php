<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220516162155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE service ADD forces_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location DROP INDEX UNIQ_5E9E89CBD9F966B, ADD INDEX FK_5E9E89CBD9F966B (description_id)');
        $this->addSql('DROP INDEX IDX_75EA56E0FB7336F0 ON messenger_messages');
        $this->addSql('DROP INDEX IDX_75EA56E0E3BD61CE ON messenger_messages');
        $this->addSql('ALTER TABLE messenger_messages CHANGE queue_name queue_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD28474090C');
        $this->addSql('DROP INDEX UNIQ_E19D9AD28474090C ON service');
        $this->addSql('ALTER TABLE service DROP forces_id');
        $this->addSql('ALTER TABLE unit_status DROP FOREIGN KEY FK_EC598EEAF8BD700D');
        $this->addSql('ALTER TABLE unit_status DROP FOREIGN KEY FK_EC598EEA93E64E4D');
        $this->addSql('ALTER TABLE unit_status DROP FOREIGN KEY FK_EC598EEA64D218E');
        $this->addSql('ALTER TABLE unit_status DROP FOREIGN KEY FK_EC598EEA51C8A0EA');
        $this->addSql('ALTER TABLE unit_status DROP FOREIGN KEY FK_EC598EEAE2F501F7');
        $this->addSql('DROP INDEX IDX_EC598EEAE2F501F7 ON unit_status');
        $this->addSql('ALTER TABLE user CHANGE forces_id forces_id INT DEFAULT 109 NOT NULL, CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE selected_date selected_date DATE DEFAULT \'1939-09-03\', CHANGE scstart_date scstart_date DATE DEFAULT \'1918-04-01\', CHANGE scend_date scend_date DATE DEFAULT \'1945-12-31\'');
        $this->addSql('ALTER TABLE user RENAME INDEX idx_8d93d6498474090c TO FK _USER_Forces');
    }
}
