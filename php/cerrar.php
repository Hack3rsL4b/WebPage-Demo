<?php
// Inicializar la sesión.
session_start();

// Destruir todas las variables de sesión. 
session_destroy();
// Volver al inicio
 header("Location: ./");
