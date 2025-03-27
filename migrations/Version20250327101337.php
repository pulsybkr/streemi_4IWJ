<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250327101337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE category (id SERIAL NOT NULL, nom VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE comment (id SERIAL NOT NULL, parent_comment_id INT DEFAULT NULL, publisher_id INT NOT NULL, media_id INT NOT NULL, content TEXT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9474526CBF2AF943 ON comment (parent_comment_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9474526C40C86FCE ON comment (publisher_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9474526CEA9FDD75 ON comment (media_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE episode (id SERIAL NOT NULL, season_id INT NOT NULL, title VARCHAR(255) NOT NULL, duration INT NOT NULL, released_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DDAA1CDA4EC001D1 ON episode (season_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN episode.released_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE language (id SERIAL NOT NULL, nom VARCHAR(255) NOT NULL, code VARCHAR(3) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE media (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, short_description TEXT NOT NULL, long_description TEXT NOT NULL, release_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, cover_image VARCHAR(255) NOT NULL, staff JSON NOT NULL, casting JSON NOT NULL, mediaType VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE media_category (media_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(media_id, category_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_92D3773EA9FDD75 ON media_category (media_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_92D377312469DE2 ON media_category (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE media_language (media_id INT NOT NULL, language_id INT NOT NULL, PRIMARY KEY(media_id, language_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DBBA5F07EA9FDD75 ON media_language (media_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DBBA5F0782F1BAF4 ON media_language (language_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE movie (id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE playlist (id SERIAL NOT NULL, creator_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D782112D61220EA6 ON playlist (creator_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN playlist.created_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN playlist.updated_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE playlist_media (id SERIAL NOT NULL, playlist_id INT NOT NULL, media_id INT NOT NULL, added_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_C930B84F6BBD148 ON playlist_media (playlist_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_C930B84FEA9FDD75 ON playlist_media (media_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN playlist_media.added_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE playlist_subscription (id SERIAL NOT NULL, playlist_id INT NOT NULL, subscriber_id INT NOT NULL, subscribed_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_832940C6BBD148 ON playlist_subscription (playlist_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_832940C7808B1AD ON playlist_subscription (subscriber_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN playlist_subscription.subscribed_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE season (id SERIAL NOT NULL, serie_id INT NOT NULL, number VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F0E45BA9D94388BD ON season (serie_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE serie (id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE subscription (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, duration INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE subscription_history (id SERIAL NOT NULL, subscriber_id INT NOT NULL, subscription_id INT NOT NULL, start_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_54AF90D07808B1AD ON subscription_history (subscriber_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_54AF90D09A1887DC ON subscription_history (subscription_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN subscription_history.start_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN subscription_history.end_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE upload (id SERIAL NOT NULL, uploaded_by_id INT NOT NULL, uploaded_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_17BDE61FA2B28FE8 ON upload (uploaded_by_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN upload.uploaded_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "user" (id SERIAL NOT NULL, current_subscription_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, account_status VARCHAR(255) NOT NULL, profile_picture VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D93D649DDE45DDE ON "user" (current_subscription_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE watch_history (id SERIAL NOT NULL, watcher_id INT NOT NULL, media_id INT NOT NULL, last_watched_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, number_of_views INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DE44EFD8C300AB5D ON watch_history (watcher_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DE44EFD8EA9FDD75 ON watch_history (media_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN watch_history.last_watched_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526C40C86FCE FOREIGN KEY (publisher_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_category ADD CONSTRAINT FK_92D3773EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_category ADD CONSTRAINT FK_92D377312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F07EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F0782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FBF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist ADD CONSTRAINT FK_D782112D61220EA6 FOREIGN KEY (creator_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84F6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C7808B1AD FOREIGN KEY (subscriber_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334BF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D07808B1AD FOREIGN KEY (subscriber_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D09A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE upload ADD CONSTRAINT FK_17BDE61FA2B28FE8 FOREIGN KEY (uploaded_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649DDE45DDE FOREIGN KEY (current_subscription_id) REFERENCES subscription (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8C300AB5D FOREIGN KEY (watcher_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP CONSTRAINT FK_9474526CBF2AF943
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP CONSTRAINT FK_9474526C40C86FCE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP CONSTRAINT FK_9474526CEA9FDD75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE episode DROP CONSTRAINT FK_DDAA1CDA4EC001D1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_category DROP CONSTRAINT FK_92D3773EA9FDD75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_category DROP CONSTRAINT FK_92D377312469DE2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_language DROP CONSTRAINT FK_DBBA5F07EA9FDD75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_language DROP CONSTRAINT FK_DBBA5F0782F1BAF4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE movie DROP CONSTRAINT FK_1D5EF26FBF396750
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist DROP CONSTRAINT FK_D782112D61220EA6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_media DROP CONSTRAINT FK_C930B84F6BBD148
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_media DROP CONSTRAINT FK_C930B84FEA9FDD75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_subscription DROP CONSTRAINT FK_832940C6BBD148
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE playlist_subscription DROP CONSTRAINT FK_832940C7808B1AD
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE season DROP CONSTRAINT FK_F0E45BA9D94388BD
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE serie DROP CONSTRAINT FK_AA3A9334BF396750
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE subscription_history DROP CONSTRAINT FK_54AF90D07808B1AD
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE subscription_history DROP CONSTRAINT FK_54AF90D09A1887DC
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE upload DROP CONSTRAINT FK_17BDE61FA2B28FE8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649DDE45DDE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE watch_history DROP CONSTRAINT FK_DE44EFD8C300AB5D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE watch_history DROP CONSTRAINT FK_DE44EFD8EA9FDD75
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE comment
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE episode
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE language
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE media
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE media_category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE media_language
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE movie
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE playlist
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE playlist_media
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE playlist_subscription
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE season
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE serie
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE subscription
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE subscription_history
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE upload
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "user"
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE watch_history
        SQL);
    }
}
