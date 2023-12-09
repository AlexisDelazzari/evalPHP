<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231209232032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB43DA5256D');
        $this->addSql('DROP INDEX UNIQ_45437EB43DA5256D ON champion');
        $this->addSql('ALTER TABLE champion ADD image VARCHAR(255) NOT NULL, DROP image_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE champion ADD image_id INT DEFAULT NULL, DROP image');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB43DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_45437EB43DA5256D ON champion (image_id)');
    }
}
