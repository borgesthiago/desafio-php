<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181208004438 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contato (id INT AUTO_INCREMENT NOT NULL, telefone VARCHAR(10) DEFAULT NULL, celular VARCHAR(11) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE funcionario ADD contato_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CFB279BE46 FOREIGN KEY (contato_id) REFERENCES contato (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7510A3CFA76ED395 ON funcionario (user_id)');
        $this->addSql('CREATE INDEX IDX_7510A3CFB279BE46 ON funcionario (contato_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE funcionario DROP FOREIGN KEY FK_7510A3CFB279BE46');
        $this->addSql('DROP TABLE contato');
        $this->addSql('ALTER TABLE funcionario DROP FOREIGN KEY FK_7510A3CFA76ED395');
        $this->addSql('DROP INDEX UNIQ_7510A3CFA76ED395 ON funcionario');
        $this->addSql('DROP INDEX IDX_7510A3CFB279BE46 ON funcionario');
        $this->addSql('ALTER TABLE funcionario DROP contato_id');
    }
}
