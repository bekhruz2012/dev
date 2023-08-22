<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230819043214 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $sql = <<<'SQL'

            CREATE TABLE IF NOT EXISTS `ac_user` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `mobile` char(16) NULL,
                `is_active` tinyint(1) unsigned DEFAULT 0,
                `is_verified` tinyint(1) unsigned DEFAULT 0,
                `role` varchar(30) NOT NULL,
                `name` varchar(128) NULL,
                `password_hash` varchar(255) NULL,
                `otp_code` varchar(10) DEFAULT NULL,
                `otp_code_purpose` varchar(128) DEFAULT NULL,
                `otp_code_requested_at` int(10) unsigned DEFAULT NULL,
                `created_at` int(10) unsigned NOT NULL,
                `updated_at` int(10) unsigned DEFAULT NULL,
                `activated_at` int(10) unsigned DEFAULT NULL,
                `verified_at` int(10) unsigned DEFAULT NULL,
                `last_login_at` int(10) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `user_mobile_unq` (`mobile`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SQL;
        $this->addSql($sql);

        $sql = <<<'SQL'

            CREATE TABLE IF NOT EXISTS `ac_user_profile` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `user_id` int(11) unsigned NOT NULL,
                `is_primary` tinyint(1) unsigned DEFAULT 0,
                `is_company` tinyint(1) unsigned DEFAULT 0,
                `name` varchar(128) NULL,
                `inn` varchar(30) NULL,
                `pinfl` varchar(30) NULL,
                `created_at` int(10) unsigned NOT NULL,
                PRIMARY KEY (`id`),
                CONSTRAINT `ac_user_profile_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `ac_user` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE `ac_user_profile`');
        $this->addSql('DROP TABLE `ac_user`');
    }
}
