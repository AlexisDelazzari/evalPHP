<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231228080632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE champion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))   ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, generated_champion_id INT DEFAULT NULL, texte VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_67F068BCA76ED395 (user_id), INDEX IDX_67F068BC126217E (generated_champion_id), PRIMARY KEY(id))   ENGINE = InnoDB');
        $this->addSql('CREATE TABLE generated_champion (id INT AUTO_INCREMENT NOT NULL, champion_id INT DEFAULT NULL, summoner1_id INT DEFAULT NULL, summoner2_id INT DEFAULT NULL, secondary_rune1_id INT DEFAULT NULL, secondary_rune2_id INT DEFAULT NULL, user_id INT DEFAULT NULL, random_name_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_5E2490DFA7FD7EB (champion_id), INDEX IDX_5E2490DF6BFA9E6 (summoner1_id), INDEX IDX_5E2490DE40A0608 (summoner2_id), INDEX IDX_5E2490D1C1D7FBF (secondary_rune1_id), INDEX IDX_5E2490DEA8D051 (secondary_rune2_id), INDEX IDX_5E2490DA76ED395 (user_id), UNIQUE INDEX UNIQ_5E2490DC50CCC94 (random_name_id), PRIMARY KEY(id))   ENGINE = InnoDB');
        $this->addSql('CREATE TABLE generated_champion_item (generated_champion_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_8BA37688126217E (generated_champion_id), INDEX IDX_8BA37688126F525E (item_id), PRIMARY KEY(generated_champion_id, item_id))   ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price INT NOT NULL, image VARCHAR(255) NOT NULL, is_botte TINYINT(1) NOT NULL, is_mythic TINYINT(1) NOT NULL, PRIMARY KEY(id))   ENGINE = InnoDB');
        $this->addSql('CREATE TABLE primary_rune (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id))   ENGINE = InnoDB');
        $this->addSql('CREATE TABLE random_name (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))   ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secondary_rune (id INT AUTO_INCREMENT NOT NULL, primary_rune_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_A25ACA1FC5171405 (primary_rune_id), PRIMARY KEY(id))   ENGINE = InnoDB');
        $this->addSql('CREATE TABLE summoner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))   ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, is_admin VARCHAR(255) NOT NULL, is_confirmed TINYINT(1) NOT NULL, code_mail_inscription VARCHAR(255) NOT NULL, code_mail_reinitialisation VARCHAR(255) NOT NULL, PRIMARY KEY(id))   ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id))   ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC126217E FOREIGN KEY (generated_champion_id) REFERENCES generated_champion (id)');
        $this->addSql('ALTER TABLE generated_champion ADD CONSTRAINT FK_5E2490DFA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id)');
        $this->addSql('ALTER TABLE generated_champion ADD CONSTRAINT FK_5E2490DF6BFA9E6 FOREIGN KEY (summoner1_id) REFERENCES summoner (id)');
        $this->addSql('ALTER TABLE generated_champion ADD CONSTRAINT FK_5E2490DE40A0608 FOREIGN KEY (summoner2_id) REFERENCES summoner (id)');
        $this->addSql('ALTER TABLE generated_champion ADD CONSTRAINT FK_5E2490D1C1D7FBF FOREIGN KEY (secondary_rune1_id) REFERENCES secondary_rune (id)');
        $this->addSql('ALTER TABLE generated_champion ADD CONSTRAINT FK_5E2490DEA8D051 FOREIGN KEY (secondary_rune2_id) REFERENCES secondary_rune (id)');
        $this->addSql('ALTER TABLE generated_champion ADD CONSTRAINT FK_5E2490DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE generated_champion ADD CONSTRAINT FK_5E2490DC50CCC94 FOREIGN KEY (random_name_id) REFERENCES random_name (id)');
        $this->addSql('ALTER TABLE generated_champion_item ADD CONSTRAINT FK_8BA37688126217E FOREIGN KEY (generated_champion_id) REFERENCES generated_champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE generated_champion_item ADD CONSTRAINT FK_8BA37688126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE secondary_rune ADD CONSTRAINT FK_A25ACA1FC5171405 FOREIGN KEY (primary_rune_id) REFERENCES primary_rune (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC126217E');
        $this->addSql('ALTER TABLE generated_champion DROP FOREIGN KEY FK_5E2490DFA7FD7EB');
        $this->addSql('ALTER TABLE generated_champion DROP FOREIGN KEY FK_5E2490DF6BFA9E6');
        $this->addSql('ALTER TABLE generated_champion DROP FOREIGN KEY FK_5E2490DE40A0608');
        $this->addSql('ALTER TABLE generated_champion DROP FOREIGN KEY FK_5E2490D1C1D7FBF');
        $this->addSql('ALTER TABLE generated_champion DROP FOREIGN KEY FK_5E2490DEA8D051');
        $this->addSql('ALTER TABLE generated_champion DROP FOREIGN KEY FK_5E2490DA76ED395');
        $this->addSql('ALTER TABLE generated_champion DROP FOREIGN KEY FK_5E2490DC50CCC94');
        $this->addSql('ALTER TABLE generated_champion_item DROP FOREIGN KEY FK_8BA37688126217E');
        $this->addSql('ALTER TABLE generated_champion_item DROP FOREIGN KEY FK_8BA37688126F525E');
        $this->addSql('ALTER TABLE secondary_rune DROP FOREIGN KEY FK_A25ACA1FC5171405');
        $this->addSql('DROP TABLE champion');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE generated_champion');
        $this->addSql('DROP TABLE generated_champion_item');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE primary_rune');
        $this->addSql('DROP TABLE random_name');
        $this->addSql('DROP TABLE secondary_rune');
        $this->addSql('DROP TABLE summoner');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
