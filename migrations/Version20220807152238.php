<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220807152238 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('DROP INDEX uniq_4vbv083va6917b55 ON note');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE note CHANGE note note VARCHAR(255) DEFAULT NULL');
    }
}
