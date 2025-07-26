CREATE TABLE inventories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bicycle_id INT NOT NULL,
    dealer_id INT NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    FOREIGN KEY (bicycle_id) REFERENCES bicycles(id),
    FOREIGN KEY (dealer_id) REFERENCES dealers(id)
);
