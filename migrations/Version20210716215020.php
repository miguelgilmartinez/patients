<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210716215020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE health_data (health_data_uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', patient BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_B07624DC1ADAD7EB (patient), PRIMARY KEY(health_data_uuid)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (patient_uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', activity_id INT DEFAULT NULL, user_uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', email VARCHAR(255) DEFAULT NULL, time_zone VARCHAR(20) NOT NULL, gender VARCHAR(10) NOT NULL, birth_date DATE NOT NULL, hobbies LONGTEXT DEFAULT NULL, emergency_phone VARCHAR(100) DEFAULT NULL, emergency_name VARCHAR(100) NOT NULL, datetime_added DATETIME NOT NULL, friend_phone VARCHAR(100) DEFAULT NULL, operator_phone VARCHAR(100) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, INDEX IDX_1ADAD7EB81C06096 (activity_id), PRIMARY KEY(patient_uuid)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE health_data ADD CONSTRAINT FK_B07624DC1ADAD7EB FOREIGN KEY (patient) REFERENCES patient (patient_uuid)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB81C06096');
        $this->addSql('ALTER TABLE health_data DROP FOREIGN KEY FK_B07624DC1ADAD7EB');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE health_data');
        $this->addSql('DROP TABLE patient');
    }
}
