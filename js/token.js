// Función para generar un token aleatorio
function generarTokenUsuario() {
    return 'usuario_' + Math.random().toString(36).substr(2, 9);
}

// Verificar si ya existe un token en localStorage
if (!localStorage.getItem('token_usuario')) {
    const nuevoToken = generarTokenUsuario();
    localStorage.setItem('token_usuario', nuevoToken);
    console.log("✅ Token generado:", nuevoToken);
} else {
    console.log("ℹ️ Token ya existente:", localStorage.getItem('token_usuario'));
}

// Exportar token para usarlo desde otros scripts si se desea
function obtenerTokenUsuario() {
    return localStorage.getItem('token_usuario');
}
