<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241107122027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE relation_detail_psous_detail_p ADD date_debut DATETIME NOT NULL, CHANGE uuid uuid VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sous_detail_produit CHANGE uuid uuid VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE relation_detail_psous_detail_p DROP date_debut, CHANGE uuid uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\'');
        $this->addSql('ALTER TABLE sous_detail_produit CHANGE uuid uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\'');
    }
}
