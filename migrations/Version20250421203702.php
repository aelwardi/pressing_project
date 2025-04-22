<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
final class Version20250421203702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            CREATE TABLE address (id SERIAL NOT NULL, pressing_id INT DEFAULT NULL, user_id INT DEFAULT NULL, full_address VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, created_at DATE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D4E6F81B8BA6AB2 ON address (pressing_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D4E6F81A76ED395 ON address (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE category (id SERIAL NOT NULL, pressing_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_64C19C1B8BA6AB2 ON category (pressing_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE equipment (id SERIAL NOT NULL, pressing_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, purchase_price DOUBLE PRECISION NOT NULL, supplier_name VARCHAR(255) NOT NULL, purchase_date DATE NOT NULL, description TEXT NOT NULL, brand VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D338D583B8BA6AB2 ON equipment (pressing_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE equipment_maintenance (id SERIAL NOT NULL, equipment_id INT DEFAULT NULL, maintenance_date DATE NOT NULL, technician_name VARCHAR(255) NOT NULL, description TEXT NOT NULL, cost DOUBLE PRECISION NOT NULL, next_maintenance DATE NOT NULL, report_pdf VARCHAR(255) DEFAULT NULL, maintenance_type VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4EC60CCE517FE9FE ON equipment_maintenance (equipment_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE media_file (id SERIAL NOT NULL, pressing_id INT DEFAULT NULL, product_id INT DEFAULT NULL, equipment_id INT DEFAULT NULL, service_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, media_type VARCHAR(255) NOT NULL, file_url VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4FD8E9C3B8BA6AB2 ON media_file (pressing_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4FD8E9C34584665A ON media_file (product_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4FD8E9C3517FE9FE ON media_file (equipment_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4FD8E9C3ED5CA9E6 ON media_file (service_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "order" (id SERIAL NOT NULL, user_id INT DEFAULT NULL, created_at DATE NOT NULL, total_price DOUBLE PRECISION NOT NULL, payment_method VARCHAR(255) NOT NULL, expected_delivery_date DATE NOT NULL, actual_delivery_date DATE NOT NULL, full_address TEXT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F5299398A76ED395 ON "order" (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE order_item (id SERIAL NOT NULL, order_id INT DEFAULT NULL, category_name VARCHAR(255) NOT NULL, service_name VARCHAR(255) NOT NULL, quantity INT NOT NULL, price DOUBLE PRECISION NOT NULL, image_url VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_52EA1F098D9F6D38 ON order_item (order_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE order_receipt (id SERIAL NOT NULL, order_id INT DEFAULT NULL, issue_date DATE NOT NULL, total_amount DOUBLE PRECISION NOT NULL, taxes DOUBLE PRECISION NOT NULL, discount DOUBLE PRECISION NOT NULL, payment_method VARCHAR(255) NOT NULL, pdffile VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A5E31F0E8D9F6D38 ON order_receipt (order_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE payment_method (id SERIAL NOT NULL, pressing_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_7B61A1F6B8BA6AB2 ON payment_method (pressing_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE pressing (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, created_at DATE NOT NULL, tax_number VARCHAR(255) NOT NULL, description TEXT NOT NULL, site_web VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE product (id SERIAL NOT NULL, pressing_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, supplier_name VARCHAR(255) NOT NULL, description TEXT NOT NULL, purchase_price DOUBLE PRECISION NOT NULL, sale_price DOUBLE PRECISION NOT NULL, stock_quantity INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D34A04ADB8BA6AB2 ON product (pressing_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE promotion (id SERIAL NOT NULL, service_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, start_at DATE NOT NULL, end_at DATE NOT NULL, discount DOUBLE PRECISION NOT NULL, promo_code VARCHAR(255) NOT NULL, image_url VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_C11D7DD1ED5CA9E6 ON promotion (service_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE schedule (id SERIAL NOT NULL, pressing_id INT DEFAULT NULL, day VARCHAR(255) NOT NULL, start_time TIME(0) WITHOUT TIME ZONE NOT NULL, end_time TIME(0) WITHOUT TIME ZONE NOT NULL, description TEXT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5A3811FBB8BA6AB2 ON schedule (pressing_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE service (id SERIAL NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E19D9AD212469DE2 ON service (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ticket (id SERIAL NOT NULL, user_id INT DEFAULT NULL, subject VARCHAR(255) NOT NULL, description TEXT NOT NULL, created_at DATE NOT NULL, closed_at DATE DEFAULT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_97A0ADA3A76ED395 ON ticket (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ticket_message (id SERIAL NOT NULL, user_id INT DEFAULT NULL, ticket_id INT DEFAULT NULL, author VARCHAR(255) NOT NULL, content TEXT NOT NULL, created_at DATE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_BA71692DA76ED395 ON ticket_message (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_BA71692D700047D2 ON ticket_message (ticket_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ticket_message_file (id SERIAL NOT NULL, ticket_message_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, file_type VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E5DC5162C5E9817D ON ticket_message_file (ticket_message_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "user" (id SERIAL NOT NULL, pressing_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, date_birth DATE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D93D649B8BA6AB2 ON "user" (pressing_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE address ADD CONSTRAINT FK_D4E6F81B8BA6AB2 FOREIGN KEY (pressing_id) REFERENCES pressing (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE category ADD CONSTRAINT FK_64C19C1B8BA6AB2 FOREIGN KEY (pressing_id) REFERENCES pressing (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment ADD CONSTRAINT FK_D338D583B8BA6AB2 FOREIGN KEY (pressing_id) REFERENCES pressing (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment_maintenance ADD CONSTRAINT FK_4EC60CCE517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_file ADD CONSTRAINT FK_4FD8E9C3B8BA6AB2 FOREIGN KEY (pressing_id) REFERENCES pressing (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_file ADD CONSTRAINT FK_4FD8E9C34584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_file ADD CONSTRAINT FK_4FD8E9C3517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_file ADD CONSTRAINT FK_4FD8E9C3ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "order" ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F098D9F6D38 FOREIGN KEY (order_id) REFERENCES "order" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE order_receipt ADD CONSTRAINT FK_A5E31F0E8D9F6D38 FOREIGN KEY (order_id) REFERENCES "order" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payment_method ADD CONSTRAINT FK_7B61A1F6B8BA6AB2 FOREIGN KEY (pressing_id) REFERENCES pressing (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product ADD CONSTRAINT FK_D34A04ADB8BA6AB2 FOREIGN KEY (pressing_id) REFERENCES pressing (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FBB8BA6AB2 FOREIGN KEY (pressing_id) REFERENCES pressing (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE service ADD CONSTRAINT FK_E19D9AD212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_message ADD CONSTRAINT FK_BA71692DA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_message ADD CONSTRAINT FK_BA71692D700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_message_file ADD CONSTRAINT FK_E5DC5162C5E9817D FOREIGN KEY (ticket_message_id) REFERENCES ticket_message (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649B8BA6AB2 FOREIGN KEY (pressing_id) REFERENCES pressing (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE address DROP CONSTRAINT FK_D4E6F81B8BA6AB2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE address DROP CONSTRAINT FK_D4E6F81A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE category DROP CONSTRAINT FK_64C19C1B8BA6AB2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment DROP CONSTRAINT FK_D338D583B8BA6AB2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment_maintenance DROP CONSTRAINT FK_4EC60CCE517FE9FE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_file DROP CONSTRAINT FK_4FD8E9C3B8BA6AB2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_file DROP CONSTRAINT FK_4FD8E9C34584665A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_file DROP CONSTRAINT FK_4FD8E9C3517FE9FE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE media_file DROP CONSTRAINT FK_4FD8E9C3ED5CA9E6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "order" DROP CONSTRAINT FK_F5299398A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE order_item DROP CONSTRAINT FK_52EA1F098D9F6D38
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE order_receipt DROP CONSTRAINT FK_A5E31F0E8D9F6D38
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payment_method DROP CONSTRAINT FK_7B61A1F6B8BA6AB2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE product DROP CONSTRAINT FK_D34A04ADB8BA6AB2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE promotion DROP CONSTRAINT FK_C11D7DD1ED5CA9E6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE schedule DROP CONSTRAINT FK_5A3811FBB8BA6AB2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE service DROP CONSTRAINT FK_E19D9AD212469DE2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA3A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_message DROP CONSTRAINT FK_BA71692DA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_message DROP CONSTRAINT FK_BA71692D700047D2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ticket_message_file DROP CONSTRAINT FK_E5DC5162C5E9817D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649B8BA6AB2
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE address
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE equipment
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE equipment_maintenance
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE media_file
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "order"
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE order_item
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE order_receipt
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE payment_method
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE pressing
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE product
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE promotion
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE schedule
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE service
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ticket
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ticket_message
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ticket_message_file
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "user"
        SQL);
    }
}
