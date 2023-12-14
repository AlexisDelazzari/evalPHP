<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231213201754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE generated_champion_legendary_item (generated_champion_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_81DED00E126217E (generated_champion_id), INDEX IDX_81DED00E126F525E (item_id), PRIMARY KEY(generated_champion_id, item_id))  ENGINE = InnoDB');
        $this->addSql('CREATE TABLE generated_champion_mythic_item (generated_champion_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_541F37F5126217E (generated_champion_id), INDEX IDX_541F37F5126F525E (item_id), PRIMARY KEY(generated_champion_id, item_id))  ENGINE = InnoDB');
        $this->addSql('ALTER TABLE generated_champion_legendary_item ADD CONSTRAINT FK_81DED00E126217E FOREIGN KEY (generated_champion_id) REFERENCES generated_champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE generated_champion_legendary_item ADD CONSTRAINT FK_81DED00E126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE generated_champion_mythic_item ADD CONSTRAINT FK_541F37F5126217E FOREIGN KEY (generated_champion_id) REFERENCES generated_champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE generated_champion_mythic_item ADD CONSTRAINT FK_541F37F5126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE generated_champion_item DROP FOREIGN KEY FK_8BA37688126217E');
        $this->addSql('ALTER TABLE generated_champion_item DROP FOREIGN KEY FK_8BA37688126F525E');
        $this->addSql('DROP TABLE generated_champion_item');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE generated_champion_item (generated_champion_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_8BA37688126F525E (item_id), INDEX IDX_8BA37688126217E (generated_champion_id), PRIMARY KEY(generated_champion_id, item_id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE generated_champion_item ADD CONSTRAINT FK_8BA37688126217E FOREIGN KEY (generated_champion_id) REFERENCES generated_champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE generated_champion_item ADD CONSTRAINT FK_8BA37688126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE generated_champion_legendary_item DROP FOREIGN KEY FK_81DED00E126217E');
        $this->addSql('ALTER TABLE generated_champion_legendary_item DROP FOREIGN KEY FK_81DED00E126F525E');
        $this->addSql('ALTER TABLE generated_champion_mythic_item DROP FOREIGN KEY FK_541F37F5126217E');
        $this->addSql('ALTER TABLE generated_champion_mythic_item DROP FOREIGN KEY FK_541F37F5126F525E');
        $this->addSql('DROP TABLE generated_champion_legendary_item');
        $this->addSql('DROP TABLE generated_champion_mythic_item');
    }
}
