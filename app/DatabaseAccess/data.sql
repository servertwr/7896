INSERT INTO Cliente (nombre, apellido, usuario, correo, contrasena)
VALUES
('Emilio', 'Monroy', 'monroyhdze', 'monroyhdze@gmail.com', '12345'),
('Isabel', 'Gutiérrez', 'isagut', 'isagut@hotmail.com', '12345'),
('Marco', 'Perez', 'elregente', 'elregente@gmail.com', '12345'),
('Ofelia', 'Danoise', 'ofdanoise', 'inverno13@outlook.com', 'lanovia'),
('Arturo', 'Cortez', 'azul17', 'azul17@gmail.com', 'mardelnorte'),
('Alma', 'Rosado', 'rosalva', 'rosalva@yahoo.com', 'siete'),
('Jorge', 'Martinez', 'joMar', 'joMar@gmail.com', 'jorjito');


INSERT INTO Puesto (nResponsable, nPuesto, correo, contrasena)
VALUES
('Isaac Asimov', 'Pizzas Estrella', 'fundacion@gmail.com', 'hariseldon'),
('Harper Lee', 'Carnes de Avez', 'mockingbird@tokill.com', 'scout'),
('Sartre', 'El muro', 'elhombre@nacelibre.com', 'elmuro123'),
('Julio César', 'Galia', 'julio@cesar.com', 'germania');

INSERT INTO Categoria(nombreCat)
VALUES
('Vegetariano'),
('Pescados y mariscos'),
('Carnes Rojas'),
('Avez'),
('Frituras');

INSERT INTO SubCategoria(nombreSub, idCat)
VALUES
('Ensalada', 1),
('Tofu', 1);

INSERT INTO SubCategoria(nombreSub, idCat)
VALUES
('Camarón', 2),
('Salmón', 2),
('Pulpo', 2),
('Mojarra', 2),
('Ostra', 2),
('Tiburón', 2),
('Trucha', 2);

INSERT INTO SubCategoria(nombreSub, idCat)
VALUES
('Pato', 4),
('Pollo', 4),
('Pingüino', 4),
('Pavo', 4);



INSERT INTO SubCategoria(nombreSub, idCat)
VALUES
('Ternera', 3),
('Cerdo', 3),
('Toro', 3),
('Caballo', 3),
('Cabra', 3),
('Cordero', 3),
('Buey', 3);

INSERT INTO SubCategoria(nombreSub, idCat)
VALUES
('Pizza', 5),
('Papas a la francesa', 5),
('Pan dulce', 5),
('Tamales', 5);
