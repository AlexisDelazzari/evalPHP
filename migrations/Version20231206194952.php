<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231206194952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE secondary_rune DROP FOREIGN KEY FK_A25ACA1F3DA5256D');
        $this->addSql('DROP INDEX UNIQ_A25ACA1F3DA5256D ON secondary_rune');
        $this->addSql('ALTER TABLE secondary_rune DROP image_id, CHANGE description image VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE secondary_rune ADD image_id INT DEFAULT NULL, CHANGE image description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE secondary_rune ADD CONSTRAINT FK_A25ACA1F3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A25ACA1F3DA5256D ON secondary_rune (image_id)');
    }
}
