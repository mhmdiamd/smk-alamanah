INSERT INTO categories (name, description) VALUES
('Mountain', 'Bikes for off-road trails.'),
('Road', 'Bikes for speed on pavement.'),
('Hybrid', 'Versatile bikes for mixed terrains.');

INSERT INTO dealers (name, location, contact) VALUES
('CycleWorks', '123 Bike Lane, City A', '555-0101'),
('SpeedyWheels', '456 Road St, City B', '555-0102');

INSERT INTO bicycles (category_id, dealer_id, brand, model, price, image, description) VALUES
(1, 1, 'Trek', 'Marlin 5', 599.99, 'trek_marlin5.png', 'Versatile mountain bike.'),
(2, 1, 'Giant', 'Defy Advanced 2', 2499.99, 'giant_defy.png', 'Lightweight road bike.'),
(1, 2, 'Specialized', 'Rockhopper', 749.99, 'specialized_rockhopper.png', 'Durable for rugged terrains.'),
(3, 2, 'Cannondale', 'Quick 4', 899.99, 'cannondale_quick4.png', 'Ideal for city and trails.');

INSERT INTO inventories (bicycle_id, dealer_id, stock) VALUES
(9, 4, 10),
(10, 4, 5),
(11, 5, 8),
(12, 5, 12);
