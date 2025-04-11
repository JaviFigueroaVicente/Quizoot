<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Preguntas;

class PreguntasTableSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            // CIENCIA
            ['pregunta' => '¿Cuál es el símbolo químico del agua?', 'user_id' => 1],
            ['pregunta' => '¿Qué planeta tiene anillos?', 'user_id' => 1],
            ['pregunta' => '¿Qué científico propuso la teoría de la relatividad?', 'user_id' => 1],
            ['pregunta' => '¿Qué tipo de energía proviene del sol?', 'user_id' => 1],
            ['pregunta' => '¿Qué órgano humano bombea la sangre?', 'user_id' => 1],
            ['pregunta' => '¿Cuál es la velocidad de la luz?', 'user_id' => 1],
            ['pregunta' => '¿Qué mineral es esencial para los huesos?', 'user_id' => 1],
            ['pregunta' => '¿Cómo se llama el proceso de las plantas para hacer alimento?', 'user_id' => 1],
            ['pregunta' => '¿Qué gas hace flotar los globos?', 'user_id' => 1],
            ['pregunta' => '¿Qué órgano humano filtra la sangre?', 'user_id' => 1],

            ['pregunta' => '¿Qué célula lleva oxígeno en la sangre?', 'user_id' => 1],
            ['pregunta' => '¿Qué planeta es el más grande del sistema solar?', 'user_id' => 1],
            ['pregunta' => '¿Qué parte del átomo tiene carga positiva?', 'user_id' => 1],
            ['pregunta' => '¿Cuál es el estado más frío del agua?', 'user_id' => 1],
            ['pregunta' => '¿Qué unidad se usa para medir fuerza?', 'user_id' => 1],
            ['pregunta' => '¿Qué animal produce perlas?', 'user_id' => 1],
            ['pregunta' => '¿Qué hueso protege el cerebro?', 'user_id' => 1],
            ['pregunta' => '¿Cuál es el órgano más grande del cuerpo humano?', 'user_id' => 1],
            ['pregunta' => '¿Qué fuerza nos mantiene en el suelo?', 'user_id' => 1],
            ['pregunta' => '¿Qué líquido apaga el fuego?', 'user_id' => 1],

            // EDUCACIÓN
            ['pregunta' => '¿Qué es un sinónimo?', 'user_id' => 1],
            ['pregunta' => '¿Qué asignatura estudia los números?', 'user_id' => 1],
            ['pregunta' => '¿Qué palabra es un sustantivo?', 'user_id' => 1],
            ['pregunta' => '¿Qué idioma se habla en Brasil?', 'user_id' => 1],
            ['pregunta' => '¿Cuál es el antónimo de "grande"?', 'user_id' => 1],
            ['pregunta' => '¿Cuántas letras tiene el abecedario español?', 'user_id' => 1],
            ['pregunta' => '¿Qué día sigue después del lunes?', 'user_id' => 1],
            ['pregunta' => '¿Qué país tiene más población?', 'user_id' => 1],
            ['pregunta' => '¿Qué parte del libro contiene el resumen?', 'user_id' => 1],
            ['pregunta' => '¿Qué planeta tiene agua en estado líquido?', 'user_id' => 1],

            ['pregunta' => '¿Qué figura tiene tres lados?', 'user_id' => 1],
            ['pregunta' => '¿Cómo se llama el lugar donde estudias?', 'user_id' => 1],
            ['pregunta' => '¿Qué número va antes del 10?', 'user_id' => 1],
            ['pregunta' => '¿Cuál es la primera vocal?', 'user_id' => 1],
            ['pregunta' => '¿Qué animal vive en la escuela en cuentos?', 'user_id' => 1],
            ['pregunta' => '¿Qué es la educación física?', 'user_id' => 1],
            ['pregunta' => '¿Qué materia enseña sobre mapas?', 'user_id' => 1],
            ['pregunta' => '¿Qué idioma se enseña como lengua extranjera?', 'user_id' => 1],
            ['pregunta' => '¿Qué nota es la más alta?', 'user_id' => 1],
            ['pregunta' => '¿Qué parte del cuerpo usamos para leer?', 'user_id' => 1],

            // ALIMENTACIÓN
            ['pregunta' => '¿Qué fruta es amarilla y curva?', 'user_id' => 1],
            ['pregunta' => '¿Qué bebida se hace con uvas?', 'user_id' => 1],
            ['pregunta' => '¿Qué verdura es anaranjada y buena para la vista?', 'user_id' => 1],
            ['pregunta' => '¿Qué alimento proviene de las vacas?', 'user_id' => 1],
            ['pregunta' => '¿Qué se come en el desayuno?', 'user_id' => 1],
            ['pregunta' => '¿Qué dulce es típico en cumpleaños?', 'user_id' => 1],
            ['pregunta' => '¿Qué comida es redonda y con queso?', 'user_id' => 1],
            ['pregunta' => '¿Qué tipo de carne se usa en hamburguesas?', 'user_id' => 1],
            ['pregunta' => '¿Qué alimento viene del mar?', 'user_id' => 1],
            ['pregunta' => '¿Qué se usa para endulzar?', 'user_id' => 1],

            ['pregunta' => '¿Qué fruta es roja y tiene semillas en el exterior?', 'user_id' => 1],
            ['pregunta' => '¿Qué alimento se hace con trigo y se hornea?', 'user_id' => 1],
            ['pregunta' => '¿Qué bebida es típica del desayuno y es de color naranja?', 'user_id' => 1],
            ['pregunta' => '¿Qué vegetal es verde y tiene hojas?', 'user_id' => 1],
            ['pregunta' => '¿Qué fruta tropical tiene piña en su nombre?', 'user_id' => 1],
            ['pregunta' => '¿Qué comida rápida incluye pan, carne y lechuga?', 'user_id' => 1],
            ['pregunta' => '¿Qué producto lácteo se unta en el pan y es blanco?', 'user_id' => 1],
            ['pregunta' => '¿Qué se usa para cocinar y es un aceite vegetal?', 'user_id' => 1],
            ['pregunta' => '¿Qué alimento es redondo, pequeño y de color marrón o blanco?', 'user_id' => 1],
            ['pregunta' => '¿Qué fruta se asocia con la vitamina C?', 'user_id' => 1],

            // PROGRAMACIÓN
            ['pregunta' => '¿Qué lenguaje se usa para estructurar páginas web?', 'user_id' => 1],
            ['pregunta' => '¿Qué significa HTML?', 'user_id' => 1],
            ['pregunta' => '¿Qué lenguaje se usa para estilos en la web?', 'user_id' => 1],
            ['pregunta' => '¿Qué es una variable en programación?', 'user_id' => 1],
            ['pregunta' => '¿Qué lenguaje se usa comúnmente para backend?', 'user_id' => 1],
            ['pregunta' => '¿Qué simboliza "==" en muchos lenguajes?', 'user_id' => 1],
            ['pregunta' => '¿Qué estructura repite instrucciones?', 'user_id' => 1],
            ['pregunta' => '¿Qué es un bug?', 'user_id' => 1],
            ['pregunta' => '¿Qué lenguaje se usa en Android?', 'user_id' => 1],
            ['pregunta' => '¿Qué significa IDE?', 'user_id' => 1],

            ['pregunta' => '¿Qué lenguaje usa el navegador para ejecutar scripts?', 'user_id' => 1],
            ['pregunta' => '¿Qué significa CSS?', 'user_id' => 1],
            ['pregunta' => '¿Qué lenguaje se usa en inteligencia artificial?', 'user_id' => 1],
            ['pregunta' => '¿Qué es una función en código?', 'user_id' => 1],
            ['pregunta' => '¿Qué es una base de datos?', 'user_id' => 1],
            ['pregunta' => '¿Qué es un array?', 'user_id' => 1],
            ['pregunta' => '¿Qué extensión tienen los archivos PHP?', 'user_id' => 1],
            ['pregunta' => '¿Qué es Git?', 'user_id' => 1],
            ['pregunta' => '¿Qué es un commit?', 'user_id' => 1],
            ['pregunta' => '¿Qué se usa para controlar versiones de código?', 'user_id' => 1],

            // JUEGOS
            ['pregunta' => '¿Cuál es el personaje principal de Mario Bros?', 'user_id' => 1],
            ['pregunta' => '¿Qué consola lanzó Nintendo en 1985?', 'user_id' => 1],
            ['pregunta' => '¿Qué juego popular incluye construir con bloques?', 'user_id' => 1],
            ['pregunta' => '¿En qué juego hay criaturas llamadas "Creepers"?', 'user_id' => 1],
            ['pregunta' => '¿Qué saga de juegos es conocida por sus "Pokémon"?', 'user_id' => 1],
            ['pregunta' => '¿En qué juego hay una batalla real de 100 jugadores?', 'user_id' => 1],
            ['pregunta' => '¿Qué personaje es rival de Sonic?', 'user_id' => 1],
            ['pregunta' => '¿Qué juego tiene el lema "¡Atrápalos a todos!"?', 'user_id' => 1],
            ['pregunta' => '¿Qué empresa desarrolló "The Legend of Zelda"?', 'user_id' => 1],
            ['pregunta' => '¿Qué videojuego incluye una isla llamada "Hyrule"?', 'user_id' => 1],

            ['pregunta' => '¿Qué videojuego incluye guerras entre reinos en línea?', 'user_id' => 1],
            ['pregunta' => '¿Cómo se llama el fontanero de gorra roja?', 'user_id' => 1],
            ['pregunta' => '¿Qué videojuego tiene un personaje llamado Link?', 'user_id' => 1],
            ['pregunta' => '¿Qué videojuego tiene un modo "survival"?', 'user_id' => 1],
            ['pregunta' => '¿Qué saga incluye juegos como FIFA 22?', 'user_id' => 1],
            ['pregunta' => '¿Qué juego tiene modo creativo y supervivencia?', 'user_id' => 1],
            ['pregunta' => '¿Qué videojuego tiene herramientas como pico y espada?', 'user_id' => 1],
            ['pregunta' => '¿Qué color tiene la gorra de Luigi?', 'user_id' => 1],
            ['pregunta' => '¿Qué juego se juega en equipos 5v5 en línea?', 'user_id' => 1],
            ['pregunta' => '¿Qué videojuego tiene campeones como Jinx y Yasuo?', 'user_id' => 1],

            // ANIMACIÓN
            ['pregunta' => '¿Qué estudio creó Toy Story?', 'user_id' => 1],
            ['pregunta' => '¿Qué personaje dice "Hakuna Matata"?', 'user_id' => 1],
            ['pregunta' => '¿Quién vive en una piña debajo del mar?', 'user_id' => 1],
            ['pregunta' => '¿Qué animal es "Simba"?', 'user_id' => 1],
            ['pregunta' => '¿Qué película animada tiene a Elsa y Anna?', 'user_id' => 1],
            ['pregunta' => '¿Qué es Goku en Dragon Ball?', 'user_id' => 1],
            ['pregunta' => '¿Qué personaje tiene orejas grandes y es de Disney?', 'user_id' => 1],
            ['pregunta' => '¿Qué película tiene juguetes que cobran vida?', 'user_id' => 1],
            ['pregunta' => '¿Qué personaje amarillo vive en Springfield?', 'user_id' => 1],
            ['pregunta' => '¿Qué serie animada tiene un niño genio con un laboratorio?', 'user_id' => 1],

            ['pregunta' => '¿Qué personaje tiene un gato azul robot?', 'user_id' => 1],
            ['pregunta' => '¿Qué serie animada tiene esponjas, estrellas y ardillas?', 'user_id' => 1],
            ['pregunta' => '¿Qué princesa canta "Libre soy"?', 'user_id' => 1],
            ['pregunta' => '¿Qué criatura azul corre muy rápido?', 'user_id' => 1],
            ['pregunta' => '¿Qué familia animada tiene un padre llamado Homero?', 'user_id' => 1],
            ['pregunta' => '¿Qué anime tiene esferas mágicas para pedir deseos?', 'user_id' => 1],
            ['pregunta' => '¿Qué película tiene una casa que vuela con globos?', 'user_id' => 1],
            ['pregunta' => '¿Qué personaje usa pantalones cuadrados?', 'user_id' => 1],
            ['pregunta' => '¿Qué película animada ocurre en el océano y tiene a Dory?', 'user_id' => 1],
            ['pregunta' => '¿Qué serie tiene una pandilla con una furgoneta llamada "La Máquina del Misterio"?', 'user_id' => 1],
        ];

        foreach ($questions as $q) {
            Preguntas::create($q);
        }
    }
}