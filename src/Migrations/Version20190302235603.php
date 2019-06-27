<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190302235603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mapy (id INT AUTO_INCREMENT NOT NULL, mapa TINYTEXT NOT NULL, mapa_id INT NOT NULL, pvp INT NOT NULL, json_przejscia TEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mapy_glowne (id INT AUTO_INCREMENT NOT NULL, map_id INT NOT NULL, nazwa_mapy TINYTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moby (id INT AUTO_INCREMENT NOT NULL, mapa TINYTEXT NOT NULL, min INT NOT NULL, max INT NOT NULL, unikalne_moby TEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sklepy (id INT AUTO_INCREMENT NOT NULL, mapa TINYTEXT NOT NULL, nick TINYTEXT NOT NULL, x INT NOT NULL, y INT NOT NULL, shop_id INT NOT NULL, procent INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE mapy');
        $this->addSql('DROP TABLE mapy_glowne');
        $this->addSql('DROP TABLE moby');
        $this->addSql('DROP TABLE sklepy');
    }
}
