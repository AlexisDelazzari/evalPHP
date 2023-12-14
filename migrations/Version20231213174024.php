<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231213174024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE summoner DROP FOREIGN KEY FK_ABE897633DA5256D');
        $this->addSql('DROP INDEX UNIQ_ABE897633DA5256D ON summoner');
        $this->addSql('ALTER TABLE summoner ADD image VARCHAR(255) NOT NULL, DROP image_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE summoner ADD image_id INT DEFAULT NULL, DROP image');
        $this->addSql('ALTER TABLE summoner ADD CONSTRAINT FK_ABE897633DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ABE897633DA5256D ON summoner (image_id)');
    }
}
