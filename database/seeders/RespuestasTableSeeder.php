<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Respuestas;

class RespuestasTableSeeder extends Seeder
{
    public function run()
    {
        $respuestas = [
            //CIENCIA
            ['respuesta' => 'H2O', 'correcta' => 1, 'preguntas_id' => 1],
            ['respuesta' => 'O2', 'correcta' => 0, 'preguntas_id' => 1],
            ['respuesta' => 'CO2', 'correcta' => 0, 'preguntas_id' => 1],
            ['respuesta' => 'H2', 'correcta' => 0, 'preguntas_id' => 1],

            ['respuesta' => 'Saturno', 'correcta' => 1, 'preguntas_id' => 2],
            ['respuesta' => 'Júpiter', 'correcta' => 0, 'preguntas_id' => 2],
            ['respuesta' => 'Urano', 'correcta' => 0, 'preguntas_id' => 2],
            ['respuesta' => 'Marte', 'correcta' => 0, 'preguntas_id' => 2],

            ['respuesta' => 'Albert Einstein', 'correcta' => 1, 'preguntas_id' => 3],
            ['respuesta' => 'Isaac Newton', 'correcta' => 0, 'preguntas_id' => 3],
            ['respuesta' => 'Galileo Galilei', 'correcta' => 0, 'preguntas_id' => 3],
            ['respuesta' => 'Nikola Tesla', 'correcta' => 0, 'preguntas_id' => 3],

            ['respuesta' => 'Energía solar', 'correcta' => 1, 'preguntas_id' => 4],
            ['respuesta' => 'Energía eléctrica', 'correcta' => 0, 'preguntas_id' => 4],
            ['respuesta' => 'Energía térmica', 'correcta' => 0, 'preguntas_id' => 4],
            ['respuesta' => 'Energía cinética', 'correcta' => 0, 'preguntas_id' => 4],

            ['respuesta' => 'Corazón', 'correcta' => 1, 'preguntas_id' => 5],
            ['respuesta' => 'Hígado', 'correcta' => 0, 'preguntas_id' => 5],
            ['respuesta' => 'Riñón', 'correcta' => 0, 'preguntas_id' => 5],
            ['respuesta' => 'Pulmón', 'correcta' => 0, 'preguntas_id' => 5],

            ['respuesta' => '299,792 km/s', 'correcta' => 1, 'preguntas_id' => 6],
            ['respuesta' => '300,000 km/s', 'correcta' => 0, 'preguntas_id' => 6],
            ['respuesta' => '150,000 km/s', 'correcta' => 0, 'preguntas_id' => 6],
            ['respuesta' => '1,000,000 km/s', 'correcta' => 0, 'preguntas_id' => 6],

            ['respuesta' => 'Calcio', 'correcta' => 1, 'preguntas_id' => 7],
            ['respuesta' => 'Hierro', 'correcta' => 0, 'preguntas_id' => 7],
            ['respuesta' => 'Magnesio', 'correcta' => 0, 'preguntas_id' => 7],
            ['respuesta' => 'Fósforo', 'correcta' => 0, 'preguntas_id' => 7],

            ['respuesta' => 'Fotosíntesis', 'correcta' => 1, 'preguntas_id' => 8],
            ['respuesta' => 'Respiración celular', 'correcta' => 0, 'preguntas_id' => 8],
            ['respuesta' => 'Digestión', 'correcta' => 0, 'preguntas_id' => 8],
            ['respuesta' => 'Transpiración', 'correcta' => 0, 'preguntas_id' => 8],

            ['respuesta' => 'Helio', 'correcta' => 1, 'preguntas_id' => 9],
            ['respuesta' => 'Hidrógeno', 'correcta' => 0, 'preguntas_id' => 9],
            ['respuesta' => 'Oxígeno', 'correcta' => 0, 'preguntas_id' => 9],
            ['respuesta' => 'Nitrógeno', 'correcta' => 0, 'preguntas_id' => 9],

            ['respuesta' => 'Riñón', 'correcta' => 1, 'preguntas_id' => 10],
            ['respuesta' => 'Hígado', 'correcta' => 0, 'preguntas_id' => 10],
            ['respuesta' => 'Estómago', 'correcta' => 0, 'preguntas_id' => 10],
            ['respuesta' => 'Corazón', 'correcta' => 0, 'preguntas_id' => 10],

            ['respuesta' => 'Glóbulo rojo', 'correcta' => 1, 'preguntas_id' => 11],
            ['respuesta' => 'Glóbulo blanco', 'correcta' => 0, 'preguntas_id' => 11],
            ['respuesta' => 'Plaqueta', 'correcta' => 0, 'preguntas_id' => 11],
            ['respuesta' => 'Linfocito', 'correcta' => 0, 'preguntas_id' => 11],

            ['respuesta' => 'Júpiter', 'correcta' => 1, 'preguntas_id' => 12],
            ['respuesta' => 'Saturno', 'correcta' => 0, 'preguntas_id' => 12],
            ['respuesta' => 'Urano', 'correcta' => 0, 'preguntas_id' => 12],
            ['respuesta' => 'Neptuno', 'correcta' => 0, 'preguntas_id' => 12],

            ['respuesta' => 'Protón', 'correcta' => 1, 'preguntas_id' => 13],
            ['respuesta' => 'Neutrón', 'correcta' => 0, 'preguntas_id' => 13],
            ['respuesta' => 'Electrón', 'correcta' => 0, 'preguntas_id' => 13],
            ['respuesta' => 'Átomo', 'correcta' => 0, 'preguntas_id' => 13],

            ['respuesta' => 'Sólido', 'correcta' => 1, 'preguntas_id' => 14],
            ['respuesta' => 'Líquido', 'correcta' => 0, 'preguntas_id' => 14],
            ['respuesta' => 'Gaseoso', 'correcta' => 0, 'preguntas_id' => 14],
            ['respuesta' => 'Plasma', 'correcta' => 0, 'preguntas_id' => 14],

            ['respuesta' => 'Newton', 'correcta' => 1, 'preguntas_id' => 15],
            ['respuesta' => 'Joule', 'correcta' => 0, 'preguntas_id' => 15],
            ['respuesta' => 'Kilogramo', 'correcta' => 0, 'preguntas_id' => 15],
            ['respuesta' => 'Pascal', 'correcta' => 0, 'preguntas_id' => 15],

            ['respuesta' => 'Ostra', 'correcta' => 1, 'preguntas_id' => 16],
            ['respuesta' => 'Caracol', 'correcta' => 0, 'preguntas_id' => 16],
            ['respuesta' => 'Mejillón', 'correcta' => 0, 'preguntas_id' => 16],
            ['respuesta' => 'Erizo de mar', 'correcta' => 0, 'preguntas_id' => 16],

            ['respuesta' => 'Cráneo', 'correcta' => 1, 'preguntas_id' => 17],
            ['respuesta' => 'Fémur', 'correcta' => 0, 'preguntas_id' => 17],
            ['respuesta' => 'Esternón', 'correcta' => 0, 'preguntas_id' => 17],
            ['respuesta' => 'Escápula', 'correcta' => 0, 'preguntas_id' => 17],

            ['respuesta' => 'Piel', 'correcta' => 1, 'preguntas_id' => 18],
            ['respuesta' => 'Hígado', 'correcta' => 0, 'preguntas_id' => 18],
            ['respuesta' => 'Cerebro', 'correcta' => 0, 'preguntas_id' => 18],
            ['respuesta' => 'Corazón', 'correcta' => 0, 'preguntas_id' => 18],

            ['respuesta' => 'Gravedad', 'correcta' => 1, 'preguntas_id' => 19],
            ['respuesta' => 'Fuerza centrífuga', 'correcta' => 0, 'preguntas_id' => 19],
            ['respuesta' => 'Fuerza electromagnética', 'correcta' => 0, 'preguntas_id' => 19],
            ['respuesta' => 'Fuerza de fricción', 'correcta' => 0, 'preguntas_id' => 19],

            ['respuesta' => 'Agua', 'correcta' => 1, 'preguntas_id' => 20],
            ['respuesta' => 'Aceite', 'correcta' => 0, 'preguntas_id' => 20],
            ['respuesta' => 'Gas', 'correcta' => 0, 'preguntas_id' => 20],
            ['respuesta' => 'Alcohol', 'correcta' => 0, 'preguntas_id' => 20],

            //EDUCACION
            ['respuesta' => 'Palabra con el mismo significado', 'correcta' => 1, 'preguntas_id' => 21],
            ['respuesta' => 'Palabra con el significado opuesto', 'correcta' => 0, 'preguntas_id' => 21],
            ['respuesta' => 'Palabra con el mismo sonido', 'correcta' => 0, 'preguntas_id' => 21],
            ['respuesta' => 'Palabra con diferente significado', 'correcta' => 0, 'preguntas_id' => 21],

            ['respuesta' => 'Matemáticas', 'correcta' => 1, 'preguntas_id' => 22],
            ['respuesta' => 'Historia', 'correcta' => 0, 'preguntas_id' => 22],
            ['respuesta' => 'Física', 'correcta' => 0, 'preguntas_id' => 22],
            ['respuesta' => 'Lengua', 'correcta' => 0, 'preguntas_id' => 22],

            ['respuesta' => 'Libro', 'correcta' => 1, 'preguntas_id' => 23],
            ['respuesta' => 'Verbo', 'correcta' => 0, 'preguntas_id' => 23],
            ['respuesta' => 'Adjetivo', 'correcta' => 0, 'preguntas_id' => 23],
            ['respuesta' => 'Pronombre', 'correcta' => 0, 'preguntas_id' => 23],

            ['respuesta' => 'Portugués', 'correcta' => 1, 'preguntas_id' => 24],
            ['respuesta' => 'Español', 'correcta' => 0, 'preguntas_id' => 24],
            ['respuesta' => 'Inglés', 'correcta' => 0, 'preguntas_id' => 24],
            ['respuesta' => 'Francés', 'correcta' => 0, 'preguntas_id' => 24],

            ['respuesta' => 'Pequeño', 'correcta' => 1, 'preguntas_id' => 25],
            ['respuesta' => 'Grande', 'correcta' => 0, 'preguntas_id' => 25],
            ['respuesta' => 'Mediano', 'correcta' => 0, 'preguntas_id' => 25],
            ['respuesta' => 'Alto', 'correcta' => 0, 'preguntas_id' => 25],

            ['respuesta' => '27', 'correcta' => 1, 'preguntas_id' => 26],
            ['respuesta' => '24', 'correcta' => 0, 'preguntas_id' => 26],
            ['respuesta' => '26', 'correcta' => 0, 'preguntas_id' => 26],
            ['respuesta' => '28', 'correcta' => 0, 'preguntas_id' => 26],

            ['respuesta' => 'Martes', 'correcta' => 1, 'preguntas_id' => 27],
            ['respuesta' => 'Domingo', 'correcta' => 0, 'preguntas_id' => 27],
            ['respuesta' => 'Viernes', 'correcta' => 0, 'preguntas_id' => 27],
            ['respuesta' => 'Miércoles', 'correcta' => 0, 'preguntas_id' => 27],

            ['respuesta' => 'China', 'correcta' => 1, 'preguntas_id' => 28],
            ['respuesta' => 'India', 'correcta' => 0, 'preguntas_id' => 28],
            ['respuesta' => 'EE. UU.', 'correcta' => 0, 'preguntas_id' => 28],
            ['respuesta' => 'Brasil', 'correcta' => 0, 'preguntas_id' => 28],

            ['respuesta' => 'Resumen', 'correcta' => 1, 'preguntas_id' => 29],
            ['respuesta' => 'Índice', 'correcta' => 0, 'preguntas_id' => 29],
            ['respuesta' => 'Prólogo', 'correcta' => 0, 'preguntas_id' => 29],
            ['respuesta' => 'Bibliografía', 'correcta' => 0, 'preguntas_id' => 29],

            ['respuesta' => 'Marte', 'correcta' => 1, 'preguntas_id' => 30],
            ['respuesta' => 'Venus', 'correcta' => 0, 'preguntas_id' => 30],
            ['respuesta' => 'Tierra', 'correcta' => 0, 'preguntas_id' => 30],
            ['respuesta' => 'Júpiter', 'correcta' => 0, 'preguntas_id' => 30],

            ['respuesta' => 'Triángulo', 'correcta' => 1, 'preguntas_id' => 31],
            ['respuesta' => 'Cuadrado', 'correcta' => 0, 'preguntas_id' => 31],
            ['respuesta' => 'Círculo', 'correcta' => 0, 'preguntas_id' => 31],
            ['respuesta' => 'Rectángulo', 'correcta' => 0, 'preguntas_id' => 31],

            ['respuesta' => 'Escuela', 'correcta' => 1, 'preguntas_id' => 32],
            ['respuesta' => 'Biblioteca', 'correcta' => 0, 'preguntas_id' => 32],
            ['respuesta' => 'Casa', 'correcta' => 0, 'preguntas_id' => 32],
            ['respuesta' => 'Parque', 'correcta' => 0, 'preguntas_id' => 32],

            ['respuesta' => '9', 'correcta' => 1, 'preguntas_id' => 33],
            ['respuesta' => '11', 'correcta' => 0, 'preguntas_id' => 33],
            ['respuesta' => '12', 'correcta' => 0, 'preguntas_id' => 33],
            ['respuesta' => '8', 'correcta' => 0, 'preguntas_id' => 33],

            ['respuesta' => 'A', 'correcta' => 1, 'preguntas_id' => 34],
            ['respuesta' => 'E', 'correcta' => 0, 'preguntas_id' => 34],
            ['respuesta' => 'I', 'correcta' => 0, 'preguntas_id' => 34],
            ['respuesta' => 'O', 'correcta' => 0, 'preguntas_id' => 34],

            ['respuesta' => 'Ratón', 'correcta' => 1, 'preguntas_id' => 35],
            ['respuesta' => 'Elefante', 'correcta' => 0, 'preguntas_id' => 35],
            ['respuesta' => 'Perro', 'correcta' => 0, 'preguntas_id' => 35],
            ['respuesta' => 'Gato', 'correcta' => 0, 'preguntas_id' => 35],

            ['respuesta' => 'Educación física', 'correcta' => 1, 'preguntas_id' => 36],
            ['respuesta' => 'Matemáticas', 'correcta' => 0, 'preguntas_id' => 36],
            ['respuesta' => 'Lengua', 'correcta' => 0, 'preguntas_id' => 36],
            ['respuesta' => 'Ciencias', 'correcta' => 0, 'preguntas_id' => 36],

            ['respuesta' => 'Geografía', 'correcta' => 1, 'preguntas_id' => 37],
            ['respuesta' => 'Historia', 'correcta' => 0, 'preguntas_id' => 37],
            ['respuesta' => 'Física', 'correcta' => 0, 'preguntas_id' => 37],
            ['respuesta' => 'Biología', 'correcta' => 0, 'preguntas_id' => 37],

            ['respuesta' => 'Inglés', 'correcta' => 1, 'preguntas_id' => 38],
            ['respuesta' => 'Francés', 'correcta' => 0, 'preguntas_id' => 38],
            ['respuesta' => 'Alemán', 'correcta' => 0, 'preguntas_id' => 38],
            ['respuesta' => 'Español', 'correcta' => 0, 'preguntas_id' => 38],

            ['respuesta' => '10', 'correcta' => 1, 'preguntas_id' => 39],
            ['respuesta' => '9', 'correcta' => 0, 'preguntas_id' => 39],
            ['respuesta' => '8', 'correcta' => 0, 'preguntas_id' => 39],
            ['respuesta' => '7', 'correcta' => 0, 'preguntas_id' => 39],

            ['respuesta' => 'Ojo', 'correcta' => 1, 'preguntas_id' => 40],
            ['respuesta' => 'Boca', 'correcta' => 0, 'preguntas_id' => 40],
            ['respuesta' => 'Mano', 'correcta' => 0, 'preguntas_id' => 40],
            ['respuesta' => 'Oído', 'correcta' => 0, 'preguntas_id' => 40],

            //ALIMENTACION
            ['respuesta' => 'Plátano', 'correcta' => 1, 'preguntas_id' => 41],
            ['respuesta' => 'Manzana', 'correcta' => 0, 'preguntas_id' => 41],
            ['respuesta' => 'Fresa', 'correcta' => 0, 'preguntas_id' => 41],
            ['respuesta' => 'Naranja', 'correcta' => 0, 'preguntas_id' => 41],

            ['respuesta' => 'Vino', 'correcta' => 1, 'preguntas_id' => 42],
            ['respuesta' => 'Cerveza', 'correcta' => 0, 'preguntas_id' => 42],
            ['respuesta' => 'Agua', 'correcta' => 0, 'preguntas_id' => 42],
            ['respuesta' => 'Jugo', 'correcta' => 0, 'preguntas_id' => 42],

            ['respuesta' => 'Zanahoria', 'correcta' => 1, 'preguntas_id' => 43],
            ['respuesta' => 'Pepino', 'correcta' => 0, 'preguntas_id' => 43],
            ['respuesta' => 'Tomate', 'correcta' => 0, 'preguntas_id' => 43],
            ['respuesta' => 'Lechuga', 'correcta' => 0, 'preguntas_id' => 43],

            ['respuesta' => 'Leche', 'correcta' => 1, 'preguntas_id' => 44],
            ['respuesta' => 'Queso', 'correcta' => 0, 'preguntas_id' => 44],
            ['respuesta' => 'Yogur', 'correcta' => 0, 'preguntas_id' => 44],
            ['respuesta' => 'Mantequilla', 'correcta' => 0, 'preguntas_id' => 44],

            ['respuesta' => 'Cereal', 'correcta' => 1, 'preguntas_id' => 45],
            ['respuesta' => 'Ensalada', 'correcta' => 0, 'preguntas_id' => 45],
            ['respuesta' => 'Pizza', 'correcta' => 0, 'preguntas_id' => 45],
            ['respuesta' => 'Sopa', 'correcta' => 0, 'preguntas_id' => 45],

            ['respuesta' => 'Pastel', 'correcta' => 1, 'preguntas_id' => 46],
            ['respuesta' => 'Galletas', 'correcta' => 0, 'preguntas_id' => 46],
            ['respuesta' => 'Tarta', 'correcta' => 0, 'preguntas_id' => 46],
            ['respuesta' => 'Helado', 'correcta' => 0, 'preguntas_id' => 46],

            ['respuesta' => 'Pizza', 'correcta' => 1, 'preguntas_id' => 47],
            ['respuesta' => 'Hamburguesa', 'correcta' => 0, 'preguntas_id' => 47],
            ['respuesta' => 'Taco', 'correcta' => 0, 'preguntas_id' => 47],
            ['respuesta' => 'Pasta', 'correcta' => 0, 'preguntas_id' => 47],

            ['respuesta' => 'Carne de vaca', 'correcta' => 1, 'preguntas_id' => 48],
            ['respuesta' => 'Carne de cerdo', 'correcta' => 0, 'preguntas_id' => 48],
            ['respuesta' => 'Pollo', 'correcta' => 0, 'preguntas_id' => 48],
            ['respuesta' => 'Pescado', 'correcta' => 0, 'preguntas_id' => 48],

            ['respuesta' => 'Pescado', 'correcta' => 1, 'preguntas_id' => 49],
            ['respuesta' => 'Carne', 'correcta' => 0, 'preguntas_id' => 49],
            ['respuesta' => 'Pollo', 'correcta' => 0, 'preguntas_id' => 49],
            ['respuesta' => 'Frutas', 'correcta' => 0, 'preguntas_id' => 49],

            ['respuesta' => 'Azúcar', 'correcta' => 1, 'preguntas_id' => 50],
            ['respuesta' => 'Sal', 'correcta' => 0, 'preguntas_id' => 50],
            ['respuesta' => 'Miel', 'correcta' => 0, 'preguntas_id' => 50],
            ['respuesta' => 'Sirope', 'correcta' => 0, 'preguntas_id' => 50],

            ['respuesta' => 'Fresa', 'correcta' => 1, 'preguntas_id' => 51],
            ['respuesta' => 'Frambuesa', 'correcta' => 0, 'preguntas_id' => 51],
            ['respuesta' => 'Cereza', 'correcta' => 0, 'preguntas_id' => 51],
            ['respuesta' => 'Uva', 'correcta' => 0, 'preguntas_id' => 51],

            ['respuesta' => 'Pan', 'correcta' => 1, 'preguntas_id' => 52],
            ['respuesta' => 'Pasta', 'correcta' => 0, 'preguntas_id' => 52],
            ['respuesta' => 'Galletas', 'correcta' => 0, 'preguntas_id' => 52],
            ['respuesta' => 'Tortillas', 'correcta' => 0, 'preguntas_id' => 52],

            ['respuesta' => 'Zumo de naranja', 'correcta' => 1, 'preguntas_id' => 53],
            ['respuesta' => 'Café', 'correcta' => 0, 'preguntas_id' => 53],
            ['respuesta' => 'Leche', 'correcta' => 0, 'preguntas_id' => 53],
            ['respuesta' => 'Agua', 'correcta' => 0, 'preguntas_id' => 53],

            ['respuesta' => 'Lechuga', 'correcta' => 1, 'preguntas_id' => 54],
            ['respuesta' => 'Espinacas', 'correcta' => 0, 'preguntas_id' => 54],
            ['respuesta' => 'Pepino', 'correcta' => 0, 'preguntas_id' => 54],
            ['respuesta' => 'Acelga', 'correcta' => 0, 'preguntas_id' => 54],

            ['respuesta' => 'Piña', 'correcta' => 1, 'preguntas_id' => 55],
            ['respuesta' => 'Coco', 'correcta' => 0, 'preguntas_id' => 55],
            ['respuesta' => 'Mango', 'correcta' => 0, 'preguntas_id' => 55],
            ['respuesta' => 'Banana', 'correcta' => 0, 'preguntas_id' => 55],

            ['respuesta' => 'Hamburguesa', 'correcta' => 1, 'preguntas_id' => 56],
            ['respuesta' => 'Pizza', 'correcta' => 0, 'preguntas_id' => 56],
            ['respuesta' => 'Taco', 'correcta' => 0, 'preguntas_id' => 56],
            ['respuesta' => 'Ensalada', 'correcta' => 0, 'preguntas_id' => 56],

            ['respuesta' => 'Mantequilla', 'correcta' => 1, 'preguntas_id' => 57],
            ['respuesta' => 'Queso', 'correcta' => 0, 'preguntas_id' => 57],
            ['respuesta' => 'Yogur', 'correcta' => 0, 'preguntas_id' => 57],
            ['respuesta' => 'Crema', 'correcta' => 0, 'preguntas_id' => 57],

            ['respuesta' => 'Aceite de oliva', 'correcta' => 1, 'preguntas_id' => 58],
            ['respuesta' => 'Aceite de girasol', 'correcta' => 0, 'preguntas_id' => 58],
            ['respuesta' => 'Manteca', 'correcta' => 0, 'preguntas_id' => 58],
            ['respuesta' => 'Margarina', 'correcta' => 0, 'preguntas_id' => 58],

            ['respuesta' => 'Galleta', 'correcta' => 1, 'preguntas_id' => 59],
            ['respuesta' => 'Chocolatina', 'correcta' => 0, 'preguntas_id' => 59],
            ['respuesta' => 'Fruta', 'correcta' => 0, 'preguntas_id' => 59],
            ['respuesta' => 'Piruleta', 'correcta' => 0, 'preguntas_id' => 59],

            ['respuesta' => 'Naranja', 'correcta' => 1, 'preguntas_id' => 60],
            ['respuesta' => 'Mandarina', 'correcta' => 0, 'preguntas_id' => 60],
            ['respuesta' => 'Limón', 'correcta' => 0, 'preguntas_id' => 60],
            ['respuesta' => 'Pomelo', 'correcta' => 0, 'preguntas_id' => 60],

            //PROGRAMACION
            ['respuesta' => 'HTML', 'correcta' => 1, 'preguntas_id' => 61],
            ['respuesta' => 'CSS', 'correcta' => 0, 'preguntas_id' => 61],
            ['respuesta' => 'JavaScript', 'correcta' => 0, 'preguntas_id' => 61],
            ['respuesta' => 'PHP', 'correcta' => 0, 'preguntas_id' => 61],

            ['respuesta' => 'HyperText Markup Language', 'correcta' => 1, 'preguntas_id' => 62],
            ['respuesta' => 'Hyper Text Managed Language', 'correcta' => 0, 'preguntas_id' => 62],
            ['respuesta' => 'High Tech Markup Language', 'correcta' => 0, 'preguntas_id' => 62],
            ['respuesta' => 'HyperText Model Language', 'correcta' => 0, 'preguntas_id' => 62],

            ['respuesta' => 'CSS', 'correcta' => 1, 'preguntas_id' => 63],
            ['respuesta' => 'HTML', 'correcta' => 0, 'preguntas_id' => 63],
            ['respuesta' => 'JavaScript', 'correcta' => 0, 'preguntas_id' => 63],
            ['respuesta' => 'PHP', 'correcta' => 0, 'preguntas_id' => 63],

            ['respuesta' => 'Una variable almacena datos', 'correcta' => 1, 'preguntas_id' => 64],
            ['respuesta' => 'Una variable es un tipo de función', 'correcta' => 0, 'preguntas_id' => 64],
            ['respuesta' => 'Una variable almacena comandos', 'correcta' => 0, 'preguntas_id' => 64],
            ['respuesta' => 'Una variable es un tipo de archivo', 'correcta' => 0, 'preguntas_id' => 64],

            ['respuesta' => 'Python', 'correcta' => 1, 'preguntas_id' => 65],
            ['respuesta' => 'JavaScript', 'correcta' => 0, 'preguntas_id' => 65],
            ['respuesta' => 'HTML', 'correcta' => 0, 'preguntas_id' => 65],
            ['respuesta' => 'PHP', 'correcta' => 0, 'preguntas_id' => 65],

            ['respuesta' => 'Comparación de valores', 'correcta' => 1, 'preguntas_id' => 66],
            ['respuesta' => 'Asignación de valores', 'correcta' => 0, 'preguntas_id' => 66],
            ['respuesta' => 'Definición de variables', 'correcta' => 0, 'preguntas_id' => 66],
            ['respuesta' => 'Incremento de valores', 'correcta' => 0, 'preguntas_id' => 66],

            ['respuesta' => 'Bucle', 'correcta' => 1, 'preguntas_id' => 67],
            ['respuesta' => 'Función', 'correcta' => 0, 'preguntas_id' => 67],
            ['respuesta' => 'Condicional', 'correcta' => 0, 'preguntas_id' => 67],
            ['respuesta' => 'Clase', 'correcta' => 0, 'preguntas_id' => 67],

            ['respuesta' => 'Error de programación', 'correcta' => 1, 'preguntas_id' => 68],
            ['respuesta' => 'Error de compilación', 'correcta' => 0, 'preguntas_id' => 68],
            ['respuesta' => 'Fallo en el sistema', 'correcta' => 0, 'preguntas_id' => 68],
            ['respuesta' => 'Error de ejecución', 'correcta' => 0, 'preguntas_id' => 68],

            ['respuesta' => 'Java', 'correcta' => 1, 'preguntas_id' => 69],
            ['respuesta' => 'C++', 'correcta' => 0, 'preguntas_id' => 69],
            ['respuesta' => 'C#', 'correcta' => 0, 'preguntas_id' => 69],
            ['respuesta' => 'Python', 'correcta' => 0, 'preguntas_id' => 69],

            ['respuesta' => 'Integrated Development Environment', 'correcta' => 1, 'preguntas_id' => 70],
            ['respuesta' => 'International Data Environment', 'correcta' => 0, 'preguntas_id' => 70],
            ['respuesta' => 'Intelligent Development Environment', 'correcta' => 0, 'preguntas_id' => 70],
            ['respuesta' => 'Internal Data Environment', 'correcta' => 0, 'preguntas_id' => 70],

            ['respuesta' => 'JavaScript', 'correcta' => 1, 'preguntas_id' => 71],
            ['respuesta' => 'Python', 'correcta' => 0, 'preguntas_id' => 71],
            ['respuesta' => 'PHP', 'correcta' => 0, 'preguntas_id' => 71],
            ['respuesta' => 'Ruby', 'correcta' => 0, 'preguntas_id' => 71],

            ['respuesta' => 'Cascading Style Sheets', 'correcta' => 1, 'preguntas_id' => 72],
            ['respuesta' => 'Control Style System', 'correcta' => 0, 'preguntas_id' => 72],
            ['respuesta' => 'Class Style Sheets', 'correcta' => 0, 'preguntas_id' => 72],
            ['respuesta' => 'Code Style Sheets', 'correcta' => 0, 'preguntas_id' => 72],

            ['respuesta' => 'Python', 'correcta' => 1, 'preguntas_id' => 73],
            ['respuesta' => 'JavaScript', 'correcta' => 0, 'preguntas_id' => 73],
            ['respuesta' => 'C++', 'correcta' => 0, 'preguntas_id' => 73],
            ['respuesta' => 'Java', 'correcta' => 0, 'preguntas_id' => 73],

            ['respuesta' => 'Un bloque de código reutilizable', 'correcta' => 1, 'preguntas_id' => 74],
            ['respuesta' => 'Un tipo de variable', 'correcta' => 0, 'preguntas_id' => 74],
            ['respuesta' => 'Un tipo de error', 'correcta' => 0, 'preguntas_id' => 74],
            ['respuesta' => 'Un archivo de configuración', 'correcta' => 0, 'preguntas_id' => 74],

            ['respuesta' => 'Sistema de gestión de datos', 'correcta' => 1, 'preguntas_id' => 75],
            ['respuesta' => 'Tipo de base de datos', 'correcta' => 0, 'preguntas_id' => 75],
            ['respuesta' => 'Lenguaje de programación', 'correcta' => 0, 'preguntas_id' => 75],
            ['respuesta' => 'Sistema de control de versiones', 'correcta' => 0, 'preguntas_id' => 75],

            ['respuesta' => 'Colección de elementos', 'correcta' => 1, 'preguntas_id' => 76],
            ['respuesta' => 'Archivo de texto', 'correcta' => 0, 'preguntas_id' => 76],
            ['respuesta' => 'Variable de entorno', 'correcta' => 0, 'preguntas_id' => 76],
            ['respuesta' => 'Comando de sistema', 'correcta' => 0, 'preguntas_id' => 76],

            ['respuesta' => '.php', 'correcta' => 1, 'preguntas_id' => 77],
            ['respuesta' => '.html', 'correcta' => 0, 'preguntas_id' => 77],
            ['respuesta' => '.css', 'correcta' => 0, 'preguntas_id' => 77],
            ['respuesta' => '.js', 'correcta' => 0, 'preguntas_id' => 77],

            ['respuesta' => 'Sistema de control de versiones', 'correcta' => 1, 'preguntas_id' => 78],
            ['respuesta' => 'Herramienta de gestión de bases de datos', 'correcta' => 0, 'preguntas_id' => 78],
            ['respuesta' => 'Framework para aplicaciones web', 'correcta' => 0, 'preguntas_id' => 78],
            ['respuesta' => 'Lenguaje de programación', 'correcta' => 0, 'preguntas_id' => 78],

            ['respuesta' => 'Cambio en el código fuente', 'correcta' => 1, 'preguntas_id' => 79],
            ['respuesta' => 'Eliminación de archivos', 'correcta' => 0, 'preguntas_id' => 79],
            ['respuesta' => 'Revertir cambios', 'correcta' => 0, 'preguntas_id' => 79],
            ['respuesta' => 'Agregar comentarios', 'correcta' => 0, 'preguntas_id' => 79],

            ['respuesta' => 'Git', 'correcta' => 1, 'preguntas_id' => 80],
            ['respuesta' => 'SVN', 'correcta' => 0, 'preguntas_id' => 80],
            ['respuesta' => 'Mercurial', 'correcta' => 0, 'preguntas_id' => 80],
            ['respuesta' => 'Subversion', 'correcta' => 0, 'preguntas_id' => 80],

            //JUEGOS
            ['respuesta' => 'Mario', 'correcta' => 1, 'preguntas_id' => 81],
            ['respuesta' => 'Luigi', 'correcta' => 0, 'preguntas_id' => 81],
            ['respuesta' => 'Waluigi', 'correcta' => 0, 'preguntas_id' => 81],
            ['respuesta' => 'Yoshi', 'correcta' => 0, 'preguntas_id' => 81],

            ['respuesta' => 'NES', 'correcta' => 1, 'preguntas_id' => 82],
            ['respuesta' => 'Super NES', 'correcta' => 0, 'preguntas_id' => 82],
            ['respuesta' => 'Game Boy', 'correcta' => 0, 'preguntas_id' => 82],
            ['respuesta' => 'Wii', 'correcta' => 0, 'preguntas_id' => 82],

            ['respuesta' => 'Minecraft', 'correcta' => 1, 'preguntas_id' => 83],
            ['respuesta' => 'Fortnite', 'correcta' => 0, 'preguntas_id' => 83],
            ['respuesta' => 'Roblox', 'correcta' => 0, 'preguntas_id' => 83],
            ['respuesta' => 'Terraria', 'correcta' => 0, 'preguntas_id' => 83],

            ['respuesta' => 'Minecraft', 'correcta' => 1, 'preguntas_id' => 84],
            ['respuesta' => 'Fortnite', 'correcta' => 0, 'preguntas_id' => 84],
            ['respuesta' => 'Rust', 'correcta' => 0, 'preguntas_id' => 84],
            ['respuesta' => 'ARK', 'correcta' => 0, 'preguntas_id' => 84],

            ['respuesta' => 'Pokémon', 'correcta' => 1, 'preguntas_id' => 85],
            ['respuesta' => 'Zelda', 'correcta' => 0, 'preguntas_id' => 85],
            ['respuesta' => 'Super Mario', 'correcta' => 0, 'preguntas_id' => 85],
            ['respuesta' => 'Tetris', 'correcta' => 0, 'preguntas_id' => 85],

            ['respuesta' => 'Fortnite', 'correcta' => 1, 'preguntas_id' => 86],
            ['respuesta' => 'PUBG', 'correcta' => 0, 'preguntas_id' => 86],
            ['respuesta' => 'Apex Legends', 'correcta' => 0, 'preguntas_id' => 86],
            ['respuesta' => 'Call of Duty', 'correcta' => 0, 'preguntas_id' => 86],

            ['respuesta' => 'Tails', 'correcta' => 1, 'preguntas_id' => 87],
            ['respuesta' => 'Knuckles', 'correcta' => 0, 'preguntas_id' => 87],
            ['respuesta' => 'Shadow', 'correcta' => 0, 'preguntas_id' => 87],
            ['respuesta' => 'Eggman', 'correcta' => 0, 'preguntas_id' => 87],

            ['respuesta' => 'Pokémon', 'correcta' => 1, 'preguntas_id' => 88],
            ['respuesta' => 'Zelda', 'correcta' => 0, 'preguntas_id' => 88],
            ['respuesta' => 'Mario', 'correcta' => 0, 'preguntas_id' => 88],
            ['respuesta' => 'Metroid', 'correcta' => 0, 'preguntas_id' => 88],

            ['respuesta' => 'Nintendo', 'correcta' => 1, 'preguntas_id' => 89],
            ['respuesta' => 'Sony', 'correcta' => 0, 'preguntas_id' => 89],
            ['respuesta' => 'Microsoft', 'correcta' => 0, 'preguntas_id' => 89],
            ['respuesta' => 'Sega', 'correcta' => 0, 'preguntas_id' => 89],

            ['respuesta' => 'The Legend of Zelda: Breath of the Wild', 'correcta' => 1, 'preguntas_id' => 90],
            ['respuesta' => 'Super Mario Odyssey', 'correcta' => 0, 'preguntas_id' => 90],
            ['respuesta' => 'Animal Crossing: New Horizons', 'correcta' => 0, 'preguntas_id' => 90],
            ['respuesta' => 'Splatoon 2', 'correcta' => 0, 'preguntas_id' => 90],

            ['respuesta' => 'Clash Royale', 'correcta' => 1, 'preguntas_id' => 91],
            ['respuesta' => 'World of Warcraft', 'correcta' => 0, 'preguntas_id' => 91],
            ['respuesta' => 'League of Legends', 'correcta' => 0, 'preguntas_id' => 91],
            ['respuesta' => 'Apex Legends', 'correcta' => 0, 'preguntas_id' => 91],

            ['respuesta' => 'Mario', 'correcta' => 1, 'preguntas_id' => 92],
            ['respuesta' => 'Luigi', 'correcta' => 0, 'preguntas_id' => 92],
            ['respuesta' => 'Waluigi', 'correcta' => 0, 'preguntas_id' => 92],
            ['respuesta' => 'Yoshi', 'correcta' => 0, 'preguntas_id' => 92],

            ['respuesta' => 'The Legend of Zelda', 'correcta' => 1, 'preguntas_id' => 93],
            ['respuesta' => 'Mario', 'correcta' => 0, 'preguntas_id' => 93],
            ['respuesta' => 'Metroid', 'correcta' => 0, 'preguntas_id' => 93],
            ['respuesta' => 'Kirby', 'correcta' => 0, 'preguntas_id' => 93],

            ['respuesta' => 'Minecraft', 'correcta' => 1, 'preguntas_id' => 94],
            ['respuesta' => 'Fortnite', 'correcta' => 0, 'preguntas_id' => 94],
            ['respuesta' => 'Rust', 'correcta' => 0, 'preguntas_id' => 94],
            ['respuesta' => 'ARK', 'correcta' => 0, 'preguntas_id' => 94],

            ['respuesta' => 'FIFA', 'correcta' => 1, 'preguntas_id' => 95],
            ['respuesta' => 'PES', 'correcta' => 0, 'preguntas_id' => 95],
            ['respuesta' => 'NBA 2K', 'correcta' => 0, 'preguntas_id' => 95],
            ['respuesta' => 'Madden', 'correcta' => 0, 'preguntas_id' => 95],

            ['respuesta' => 'Minecraft', 'correcta' => 1, 'preguntas_id' => 96],
            ['respuesta' => 'Fortnite', 'correcta' => 0, 'preguntas_id' => 96],
            ['respuesta' => 'Terraria', 'correcta' => 0, 'preguntas_id' => 96],
            ['respuesta' => 'Roblox', 'correcta' => 0, 'preguntas_id' => 96],

            ['respuesta' => 'Minecraft', 'correcta' => 1, 'preguntas_id' => 97],
            ['respuesta' => 'Roblox', 'correcta' => 0, 'preguntas_id' => 97],
            ['respuesta' => 'Fortnite', 'correcta' => 0, 'preguntas_id' => 97],
            ['respuesta' => 'Terraria', 'correcta' => 0, 'preguntas_id' => 97],

            ['respuesta' => 'Rojo', 'correcta' => 1, 'preguntas_id' => 98],
            ['respuesta' => 'Verde', 'correcta' => 0, 'preguntas_id' => 98],
            ['respuesta' => 'Azul', 'correcta' => 0, 'preguntas_id' => 98],
            ['respuesta' => 'Amarillo', 'correcta' => 0, 'preguntas_id' => 98],

            ['respuesta' => 'League of Legends', 'correcta' => 1, 'preguntas_id' => 99],
            ['respuesta' => 'Valorant', 'correcta' => 0, 'preguntas_id' => 99],
            ['respuesta' => 'Overwatch', 'correcta' => 0, 'preguntas_id' => 99],
            ['respuesta' => 'Dota 2', 'correcta' => 0, 'preguntas_id' => 99],

            ['respuesta' => 'League of Legends', 'correcta' => 1, 'preguntas_id' => 100],
            ['respuesta' => 'Dota 2', 'correcta' => 0, 'preguntas_id' => 100],
            ['respuesta' => 'Heroes of the Storm', 'correcta' => 0, 'preguntas_id' => 100],
            ['respuesta' => 'Smite', 'correcta' => 0, 'preguntas_id' => 100],

            //ANIMACION
            ['respuesta' => 'Pixar', 'correcta' => 1, 'preguntas_id' => 101],
            ['respuesta' => 'DreamWorks', 'correcta' => 0, 'preguntas_id' => 101],
            ['respuesta' => 'Disney', 'correcta' => 0, 'preguntas_id' => 101],
            ['respuesta' => 'Blue Sky Studios', 'correcta' => 0, 'preguntas_id' => 101],

            ['respuesta' => 'Timón', 'correcta' => 1, 'preguntas_id' => 102],
            ['respuesta' => 'Pumba', 'correcta' => 0, 'preguntas_id' => 102],
            ['respuesta' => 'Mufasa', 'correcta' => 0, 'preguntas_id' => 102],
            ['respuesta' => 'Simba', 'correcta' => 0, 'preguntas_id' => 102],

            ['respuesta' => 'Bob Esponja', 'correcta' => 1, 'preguntas_id' => 103],
            ['respuesta' => 'Patrick Estrella', 'correcta' => 0, 'preguntas_id' => 103],
            ['respuesta' => 'Squidward', 'correcta' => 0, 'preguntas_id' => 103],
            ['respuesta' => 'Calamardo', 'correcta' => 0, 'preguntas_id' => 103],

            ['respuesta' => 'León', 'correcta' => 1, 'preguntas_id' => 104],
            ['respuesta' => 'Tigre', 'correcta' => 0, 'preguntas_id' => 104],
            ['respuesta' => 'Cebra', 'correcta' => 0, 'preguntas_id' => 104],
            ['respuesta' => 'Guepardo', 'correcta' => 0, 'preguntas_id' => 104],

            ['respuesta' => 'Frozen', 'correcta' => 1, 'preguntas_id' => 105],
            ['respuesta' => 'Enredados', 'correcta' => 0, 'preguntas_id' => 105],
            ['respuesta' => 'Moana', 'correcta' => 0, 'preguntas_id' => 105],
            ['respuesta' => 'La Bella y la Bestia', 'correcta' => 0, 'preguntas_id' => 105],

            ['respuesta' => 'Saiyan', 'correcta' => 1, 'preguntas_id' => 106],
            ['respuesta' => 'Humanos', 'correcta' => 0, 'preguntas_id' => 106],
            ['respuesta' => 'Namekianos', 'correcta' => 0, 'preguntas_id' => 106],
            ['respuesta' => 'Androide', 'correcta' => 0, 'preguntas_id' => 106],

            ['respuesta' => 'Mickey Mouse', 'correcta' => 1, 'preguntas_id' => 107],
            ['respuesta' => 'Donald Duck', 'correcta' => 0, 'preguntas_id' => 107],
            ['respuesta' => 'Goofy', 'correcta' => 0, 'preguntas_id' => 107],
            ['respuesta' => 'Pluto', 'correcta' => 0, 'preguntas_id' => 107],

            ['respuesta' => 'Toy Story', 'correcta' => 1, 'preguntas_id' => 108],
            ['respuesta' => 'Cars', 'correcta' => 0, 'preguntas_id' => 108],
            ['respuesta' => 'Monsters Inc.', 'correcta' => 0, 'preguntas_id' => 108],
            ['respuesta' => 'Coco', 'correcta' => 0, 'preguntas_id' => 108],

            ['respuesta' => 'Homer Simpson', 'correcta' => 1, 'preguntas_id' => 109],
            ['respuesta' => 'Bart Simpson', 'correcta' => 0, 'preguntas_id' => 109],
            ['respuesta' => 'Marge Simpson', 'correcta' => 0, 'preguntas_id' => 109],
            ['respuesta' => 'Lisa Simpson', 'correcta' => 0, 'preguntas_id' => 109],

            ['respuesta' => 'Dexter', 'correcta' => 1, 'preguntas_id' => 110],
            ['respuesta' => 'Jimmy Neutron', 'correcta' => 0, 'preguntas_id' => 110],
            ['respuesta' => 'Phineas', 'correcta' => 0, 'preguntas_id' => 110],
            ['respuesta' => 'Perry el Ornitorrinco', 'correcta' => 0, 'preguntas_id' => 110],

            ['respuesta' => 'Doraemon', 'correcta' => 1, 'preguntas_id' => 111],
            ['respuesta' => 'Shiro', 'correcta' => 0, 'preguntas_id' => 111],
            ['respuesta' => 'Totoro', 'correcta' => 0, 'preguntas_id' => 111],
            ['respuesta' => 'Astro Boy', 'correcta' => 0, 'preguntas_id' => 111],

            ['respuesta' => 'Bob Esponja', 'correcta' => 1, 'preguntas_id' => 112],
            ['respuesta' => 'Patrick Estrella', 'correcta' => 0, 'preguntas_id' => 112],
            ['respuesta' => 'Arenita Mejillas', 'correcta' => 0, 'preguntas_id' => 112],
            ['respuesta' => 'Calamardo', 'correcta' => 0, 'preguntas_id' => 112],

            ['respuesta' => 'Frozen', 'correcta' => 1, 'preguntas_id' => 113],
            ['respuesta' => 'Rapunzel', 'correcta' => 0, 'preguntas_id' => 113],
            ['respuesta' => 'Moana', 'correcta' => 0, 'preguntas_id' => 113],
            ['respuesta' => 'La Bella y la Bestia', 'correcta' => 0, 'preguntas_id' => 113],

            ['respuesta' => 'Sonic', 'correcta' => 1, 'preguntas_id' => 114],
            ['respuesta' => 'Tails', 'correcta' => 0, 'preguntas_id' => 114],
            ['respuesta' => 'Shadow', 'correcta' => 0, 'preguntas_id' => 114],
            ['respuesta' => 'Knuckles', 'correcta' => 0, 'preguntas_id' => 114],

            ['respuesta' => 'Los Simpsons', 'correcta' => 1, 'preguntas_id' => 115],
            ['respuesta' => 'Los Picapiedra', 'correcta' => 0, 'preguntas_id' => 115],
            ['respuesta' => 'Futurama', 'correcta' => 0, 'preguntas_id' => 115],
            ['respuesta' => 'South Park', 'correcta' => 0, 'preguntas_id' => 115],

            ['respuesta' => 'Dragon Ball Z', 'correcta' => 1, 'preguntas_id' => 116],
            ['respuesta' => 'Naruto', 'correcta' => 0, 'preguntas_id' => 116],
            ['respuesta' => 'One Piece', 'correcta' => 0, 'preguntas_id' => 116],
            ['respuesta' => 'Bleach', 'correcta' => 0, 'preguntas_id' => 116],

            ['respuesta' => 'Up', 'correcta' => 1, 'preguntas_id' => 117],
            ['respuesta' => 'Coco', 'correcta' => 0, 'preguntas_id' => 117],
            ['respuesta' => 'Ratatouille', 'correcta' => 0, 'preguntas_id' => 117],
            ['respuesta' => 'Monsters Inc.', 'correcta' => 0, 'preguntas_id' => 117],

            ['respuesta' => 'Bob Esponja', 'correcta' => 1, 'preguntas_id' => 118],
            ['respuesta' => 'Doraemon', 'correcta' => 0, 'preguntas_id' => 118],
            ['respuesta' => 'SpongeBob', 'correcta' => 0, 'preguntas_id' => 118],
            ['respuesta' => 'Patrick Estrella', 'correcta' => 0, 'preguntas_id' => 118],

            ['respuesta' => 'Scooby-Doo', 'correcta' => 1, 'preguntas_id' => 119],
            ['respuesta' => 'Tom y Jerry', 'correcta' => 0, 'preguntas_id' => 119],
            ['respuesta' => 'Los Simpsons', 'correcta' => 0, 'preguntas_id' => 119],
            ['respuesta' => 'Doraemon', 'correcta' => 0, 'preguntas_id' => 119],

            ['respuesta' => 'La Máquina del Misterio', 'correcta' => 1, 'preguntas_id' => 120],
            ['respuesta' => 'La Máquina del Tiempo', 'correcta' => 0, 'preguntas_id' => 120],
            ['respuesta' => 'La Furgoneta Misteriosa', 'correcta' => 0, 'preguntas_id' => 120],
            ['respuesta' => 'La Máquina de Investigación', 'correcta' => 0, 'preguntas_id' => 120],



        ];

        foreach ($respuestas as $respuesta) {
            Respuestas::create($respuesta);
        }
    }
}
