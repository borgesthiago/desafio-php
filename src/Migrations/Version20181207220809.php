<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181207220809 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE remuneracao (id INT AUTO_INCREMENT NOT NULL, salario DOUBLE PRECISION DEFAULT NULL, gratificacao DOUBLE PRECISION DEFAULT NULL, desconto DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE funcionario ADD remuneracao_id INT DEFAULT NULL, ADD tipo VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CF3AF70DDF FOREIGN KEY (remuneracao_id) REFERENCES remuneracao (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7510A3CF3AF70DDF ON funcionario (remuneracao_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE funcionario DROP FOREIGN KEY FK_7510A3CF3AF70DDF');
        $this->addSql('DROP TABLE remuneracao');
        $this->addSql('DROP INDEX UNIQ_7510A3CF3AF70DDF ON funcionario');
        $this->addSql('ALTER TABLE funcionario DROP remuneracao_id, DROP tipo');
    }
}
