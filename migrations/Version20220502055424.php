<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220502055424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE continents ADD CONSTRAINT FK_42D13510ADCF3648 FOREIGN KEY (loctype_id) REFERENCES loc_type (id)');
        $this->addSql('ALTER TABLE continents ADD CONSTRAINT FK_42D13510B9B994C1 FOREIGN KEY (subcampaign_id) REFERENCES sub_campaign (id)');
        $this->addSql('CREATE INDEX IDX_42D13510ADCF3648 ON continents (loctype_id)');
        $this->addSql('CREATE INDEX IDX_42D13510B9B994C1 ON continents (subcampaign_id)');
        $this->addSql('ALTER TABLE continents RENAME INDEX idx_6cc70c7cd9f966b TO IDX_42D13510D9F966B');
        $this->addSql('ALTER TABLE countries ADD CONSTRAINT FK_5D66EBADC80060CD FOREIGN KEY (theatre_id) REFERENCES theatres (id)');
        $this->addSql('CREATE INDEX IDX_5D66EBADC80060CD ON countries (theatre_id)');
        $this->addSql('ALTER TABLE headline ADD CONSTRAINT FK_E0E861BDB9B994C1 FOREIGN KEY (subcampaign_id) REFERENCES sub_campaign (id)');
        $this->addSql('ALTER TABLE location CHANGE description_id description_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBD9F966B FOREIGN KEY (description_id) REFERENCES description (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E9E89CBD9F966B ON location (description_id)');
        $this->addSql('ALTER TABLE unit_status ADD CONSTRAINT FK_EC598EEAF8BD700D FOREIGN KEY (unit_id) REFERENCES units (id)');
        $this->addSql('ALTER TABLE unit_status ADD CONSTRAINT FK_EC598EEA93E64E4D FOREIGN KEY (unit_changed_id) REFERENCES units (id)');
        $this->addSql('ALTER TABLE unit_status ADD CONSTRAINT FK_EC598EEA64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE unit_status ADD CONSTRAINT FK_EC598EEA51C8A0EA FOREIGN KEY (higher_unit_id) REFERENCES units (id)');
        $this->addSql('ALTER TABLE unit_status ADD CONSTRAINT FK_EC598EEAE2F501F7 FOREIGN KEY (co_id) REFERENCES co (id)');
        $this->addSql('CREATE INDEX IDX_EC598EEAE2F501F7 ON unit_status (co_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A5E89255');
        $this->addSql('DROP INDEX IDX_8D93D649A5E89255 ON user');
        $this->addSql('ALTER TABLE user CHANGE first_name first_name VARCHAR(255) DEFAULT NULL, CHANGE selected_date selected_date DATE DEFAULT NULL, CHANGE scstart_date scstart_date DATE DEFAULT NULL, CHANGE scend_date scend_date DATE DEFAULT NULL, CHANGE forceType_id force_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A5E89255 FOREIGN KEY (force_type_id) REFERENCES force_type (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649A5E89255 ON user (force_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE continents DROP FOREIGN KEY FK_42D13510ADCF3648');
        $this->addSql('ALTER TABLE continents DROP FOREIGN KEY FK_42D13510B9B994C1');
        $this->addSql('DROP INDEX IDX_42D13510ADCF3648 ON continents');
        $this->addSql('DROP INDEX IDX_42D13510B9B994C1 ON continents');
        $this->addSql('ALTER TABLE continents RENAME INDEX idx_42d13510d9f966b TO IDX_6CC70C7CD9F966B');
        $this->addSql('ALTER TABLE countries DROP FOREIGN KEY FK_5D66EBADC80060CD');
        $this->addSql('DROP INDEX IDX_5D66EBADC80060CD ON countries');
        $this->addSql('ALTER TABLE headline DROP FOREIGN KEY FK_E0E861BDB9B994C1');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CBD9F966B');
        $this->addSql('DROP INDEX UNIQ_5E9E89CBD9F966B ON location');
        $this->addSql('ALTER TABLE location CHANGE description_id description_id INT DEFAULT 5449');
        $this->addSql('ALTER TABLE unit_status DROP FOREIGN KEY FK_EC598EEAF8BD700D');
        $this->addSql('ALTER TABLE unit_status DROP FOREIGN KEY FK_EC598EEA93E64E4D');
        $this->addSql('ALTER TABLE unit_status DROP FOREIGN KEY FK_EC598EEA64D218E');
        $this->addSql('ALTER TABLE unit_status DROP FOREIGN KEY FK_EC598EEA51C8A0EA');
        $this->addSql('ALTER TABLE unit_status DROP FOREIGN KEY FK_EC598EEAE2F501F7');
        $this->addSql('DROP INDEX IDX_EC598EEAE2F501F7 ON unit_status');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A5E89255');
        $this->addSql('DROP INDEX IDX_8D93D649A5E89255 ON user');
        $this->addSql('ALTER TABLE user CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE selected_date selected_date DATE DEFAULT \'1939-09-03\', CHANGE scstart_date scstart_date DATE DEFAULT \'1918-04-01\', CHANGE scend_date scend_date DATE DEFAULT \'1945-12-31\', CHANGE force_type_id forceType_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A5E89255 FOREIGN KEY (forceType_id) REFERENCES forces (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649A5E89255 ON user (forceType_id)');
    }
}
