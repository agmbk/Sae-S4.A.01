<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230115173024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fournir DROP FOREIGN KEY fournir_ibfk_1');
        $this->addSql('ALTER TABLE fournir DROP FOREIGN KEY fournir_ibfk_2');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY commande_ibfk_1');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY ligne_commande_ibfk_1');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY ligne_commande_ibfk_2');
        $this->addSql('DROP TABLE fournir');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('ALTER TABLE matches CHANGE hote hote VARCHAR(64) DEFAULT NULL, CHANGE date_heure date_heure DATETIME DEFAULT NULL, CHANGE gymnase gymnase VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fournir (code_frs CHAR(5) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, ref_pdt CHAR(5) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, pu_achat NUMERIC(8, 2) DEFAULT \'0.00\', INDEX i_fk_frs1 (code_frs), INDEX i_fk_pdt1 (ref_pdt), PRIMARY KEY(code_frs, ref_pdt)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commande (numero_cde INT AUTO_INCREMENT NOT NULL, code_frs CHAR(5) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, date_cde DATE DEFAULT \'NULL\', INDEX i_fk_frs2 (code_frs), PRIMARY KEY(numero_cde)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE fournisseur (code_frs CHAR(5) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, nom CHAR(30) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, PRIMARY KEY(code_frs)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_1D1C63B3F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE produit (ref_pdt CHAR(5) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, libelle CHAR(64) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_general_ci`, PRIMARY KEY(ref_pdt)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ligne_commande (numero_cde INT NOT NULL, ref_pdt CHAR(5) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, pu_cde NUMERIC(8, 2) DEFAULT \'0.00\', quantite INT DEFAULT 0, INDEX i_fk_cde (numero_cde), INDEX i_fk_pdt2 (ref_pdt), PRIMARY KEY(numero_cde, ref_pdt)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE fournir ADD CONSTRAINT fournir_ibfk_1 FOREIGN KEY (code_frs) REFERENCES fournisseur (code_frs)');
        $this->addSql('ALTER TABLE fournir ADD CONSTRAINT fournir_ibfk_2 FOREIGN KEY (ref_pdt) REFERENCES produit (ref_pdt)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT commande_ibfk_1 FOREIGN KEY (code_frs) REFERENCES fournisseur (code_frs)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT ligne_commande_ibfk_1 FOREIGN KEY (numero_cde) REFERENCES commande (numero_cde)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT ligne_commande_ibfk_2 FOREIGN KEY (ref_pdt) REFERENCES produit (ref_pdt)');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE matches CHANGE hote hote VARCHAR(64) DEFAULT \'NULL\', CHANGE date_heure date_heure DATETIME DEFAULT \'NULL\', CHANGE gymnase gymnase VARCHAR(64) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
    }
}
