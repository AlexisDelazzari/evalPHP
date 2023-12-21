<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231216234110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE generated_champion ADD random_name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE generated_champion ADD CONSTRAINT FK_5E2490DC50CCC94 FOREIGN KEY (random_name_id) REFERENCES random_name (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E2490DC50CCC94 ON generated_champion (random_name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE generated_champion DROP FOREIGN KEY FK_5E2490DC50CCC94');
        $this->addSql('DROP INDEX UNIQ_5E2490DC50CCC94 ON generated_champion');
        $this->addSql('ALTER TABLE generated_champion DROP random_name_id');
    }
}
