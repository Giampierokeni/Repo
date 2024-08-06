CREATE TABLE TallerMicrocontroladores 
(
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre_microcontrolador VARCHAR(50) NOT NULL, 
    modelo VARCHAR(50) NOT NULL, 
    fecha_adquisicion DATE NOT NULL, 
    estado ENUM('En uso', 'En reparación', 'Disponible', 'Descartado')
);
