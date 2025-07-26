CREATE TABLE bicycles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    dealer_id INT NOT NULL,
    brand VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description TEXT,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (dealer_id) REFERENCES dealers(id)
);
