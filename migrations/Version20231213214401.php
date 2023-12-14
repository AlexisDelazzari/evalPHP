<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231213214401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E3DA5256D');
        $this->addSql('DROP INDEX IDX_1F1B251E3DA5256D ON item');
        $this->addSql('ALTER TABLE item ADD image VARCHAR(255) NOT NULL, ADD is_mythic TINYINT(1) NOT NULL, DROP image_id, CHANGE is_botte is_botte TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item ADD image_id INT DEFAULT NULL, DROP image, DROP is_mythic, CHANGE is_botte is_botte VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E3DA5256D ON item (image_id)');
    }
}
