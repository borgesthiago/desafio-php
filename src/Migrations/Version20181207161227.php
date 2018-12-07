<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181207161227 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE funcionario ADD remuneracao_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CF3AF70DDF FOREIGN KEY (remuneracao_id) REFERENCES remuneracao (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7510A3CF3AF70DDF ON funcionario (remuneracao_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE funcionario DROP FOREIGN KEY FK_7510A3CF3AF70DDF');
        $this->addSql('DROP INDEX UNIQ_7510A3CF3AF70DDF ON funcionario');
        $this->addSql('ALTER TABLE funcionario DROP remuneracao_id');
    }
}
