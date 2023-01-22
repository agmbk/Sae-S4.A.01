<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221204225512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }


    public function up(Schema $schema): void
    {

        $this->addSql('ALTER TABLE SaeA01.utilisateur ALTER mot_de_passe TYPE VARCHAR(255)');
    }


    public function down(Schema $schema): void
    {

        $this->addSql('ALTER TABLE SaeA01.utilisateur ALTER mot_de_passe TYPE VARCHAR(50)');
    }
}
