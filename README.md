# Quizoot - Plataforma de Formularios Interactivos  
> Proyecto del Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Web (DAW2)

**Quizoot** es una plataforma web diseñada para crear, gestionar y responder formularios interactivos (quiz). Permite a los usuarios crear sus propios cuestionarios, evaluar conocimientos y competencias, y obtener resultados en tiempo real. La aplicación está desarrollada como parte del módulo de **Desarrollo Web en Entorno Cliente y Servidor**, correspondiente al segundo curso del CFGS **Desarrollo de Aplicaciones Web (DAW)**.

---

## 🛠️ Tecnologías utilizadas

- **Frontend**: Vue 3 + Pinia (gestión de estado) + PrimeVue + Bootstrap
- **Backend**: Laravel 10
- **Autenticación**: Laravel Breeze + Spatie Laravel Permission
- **Base de Datos**: MySQL / SQLite
- **API RESTful**: Comunicación entre frontend y backend

---

## 🧪 Características principales

### 💡 Funcionalidades clave:
1. **Creación de formularios personalizados**:
   - Crea preguntas y formularios múltiples de elección, verdadero/falso y más.
   - Asigna categorías.

2. **Gestión de respuestas**:
   - Los usuarios pueden responder los formularios y ver sus resultados inmediatamente.
   - Opción para mostrar respuestas correctas después de completar el formulario.

3. **Rankings y estadísticas**:
   - Muestra rankings globales basados en puntajes y desempeño.

4. **Autenticación y roles**:
   - Sistema de registro e inicio de sesión seguro.
   - Gestión de roles y permisos con **Spatie Laravel Permission**.

5. **Interfaz moderna**:
   - Diseño responsive y atractivo utilizando Bootstrap y PrimeVue.
   - Animaciones suaves y experiencia de usuario intuitiva.

---

## 🚀 Instalación

### Requisitos previos

- PHP >= 8.1
- Node.js & npm
- Composer
- MySQL o SQLite


## Como usar


### Clonar Repositorio 

```bash
git clone ....
```

### Instalar vía Composer

Entrar a la carpeta del repositorio
```bash
composer install
```

### Copiar el fichero .env.example  a .env edita las credenciales de la base de datos y la url


### Generar Application Key

```bash
php artisan key:generate
```

### Migrar base de datos

```bash
php artisan migrate
```

### Lanzar Seeders

```bash
php artisan db:seed
```

### Instalar las dependencias de Node

```bash
npm install

npm run dev
```

### Lanzar servidor

```bash
php artisan serve
```

### Lanzar a producción

```bash
npm run build or yarn build
```

### 👥 Autores
- Javier Figueroa – javierfigueroa969@gmail.com
- Marc Santiago
