<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220813014641 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $sql = <<<'SQL'

            CREATE TABLE IF NOT EXISTS `ac_auth_refresh_token` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `refresh_token` varchar(256) NOT NULL,
                `username` varchar(256) NOT NULL,
                `valid` datetime NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE `ac_auth_refresh_token`');
    }
}
