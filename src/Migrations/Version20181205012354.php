<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181205012354 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE funcionario (id INT AUTO_INCREMENT NOT NULL, secretaria_id INT NOT NULL, nome VARCHAR(255) NOT NULL, matricula VARCHAR(7) NOT NULL, cpf VARCHAR(11) NOT NULL, endereco VARCHAR(255) DEFAULT NULL, INDEX IDX_7510A3CF584CC12E (secretaria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE funcionario ADD CONSTRAINT FK_7510A3CF584CC12E FOREIGN KEY (secretaria_id) REFERENCES secretaria (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE funcionario');
    }
}
