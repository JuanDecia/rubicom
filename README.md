# 🚀 Rubicom - Desarrollo Web con PHP

![GitHub last commit](https://img.shields.io/github/last-commit/JuanDecia/rubicom?color=blue&logo=github) 
![GitHub repo size](https://img.shields.io/github/repo-size/JuanDecia/rubicom?label=tama%C3%B1o) 
![GitHub](https://img.shields.io/github/license/JuanDecia/rubicom?color=green)

Aplicación web desarrollada con **PHP** para el backend y **JavaScript**, **HTML** y **CSS** para el frontend. Incluye funcionalidades de autenticación, gestión de contenido y bases de datos.

---

## 🛠 Tecnologías Usadas (Reales)

| Frontend          | Backend           | Base de Datos     | Herramientas      |
|-------------------|-------------------|-------------------|------------------|
| ![HTML5](https://skillicons.dev/icons?i=html) | ![PHP](https://skillicons.dev/icons?i=php) | ![MySQL](https://skillicons.dev/icons?i=mysql) | ![Git](https://skillicons.dev/icons?i=git) |
| ![CSS3](https://skillicons.dev/icons?i=css) |  |  | ![VSCode](https://skillicons.dev/icons?i=vscode) |
| ![JavaScript](https://skillicons.dev/icons?i=javascript) |  |  | ![XAMPP](https://img.shields.io/badge/-XAMPP-FB7A24?logo=xampp&logoColor=white) |

---

## 💡 Ejemplos Reales de Código

### 1. Conexión a MySQL con PHP
    ```php
      // database.php
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "rubicom";
        
        $conn = new mysqli($host, $user, $password, $database);
        
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        ?>
      
      2. Autenticación de Usuario (PHP + JS)
      php
        // login.php
        
        <?php
        session_start();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // Validación en la base de datos
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = $conn->query($query);
            
            if ($result->num_rows > 0) {
                $_SESSION['loggedin'] = true;
                header("Location: dashboard.php");
            } else {
                echo "<script>alert('Credenciales incorrectas');</script>";
            }
        }
        ?>
    ```

---

## 📂 Estructura del Repositorio

```
  /rubicom
  ├── assets/
  │   ├── css/          # Estilos CSS
  │   └── js/           # Scripts JavaScript
  ├── includes/
  │   ├── database.php  # Conexión a MySQL
  │   └── auth.php      # Lógica de autenticación
  ├── admin/            # Panel de administración
  ├── public/           # Páginas accesibles
  └── index.php         # Página principal
```

---

## 🚀 Cómo Ejecutar el Proyecto

* Requisitos: XAMPP/MAMP instalado.

* Clona el repositorio:

```bash
  git clone https://github.com/JuanDecia/rubicom.git
```

* Coloca la carpeta en htdocs (XAMPP) o www (MAMP).

* Importa la base de datos (rubicom.sql).

* Accede desde:

```
http://localhost/rubicom
```

---

## 📫 Contacto

¿Dudas o colaboración? ¡Contáctame!

📧 Email: juan@example.com  
🔗 GitHub: JuanDecia  

⭐ ¡Si te gusta el proyecto, déjame una estrella!
