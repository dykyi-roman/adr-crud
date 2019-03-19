<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190319071049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Only one migration for run a project';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('player');

        $table->addColumn('id', Type::INTEGER)->setAutoincrement(true);
        $table->addColumn('name', Type::STRING);
        $table->addColumn('email', Type::STRING)->setUnsigned(true);
        $table->addColumn('age', Type::SMALLINT);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
