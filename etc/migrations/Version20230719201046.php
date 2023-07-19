<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230719201046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE work_entries ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE work_entries ALTER user_id TYPE UUID');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE work_entries ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE work_entries ALTER user_id TYPE UUID');
        $this->addSql('ALTER TABLE users ALTER id TYPE UUID');
    }
}
