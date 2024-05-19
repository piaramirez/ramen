window.addEventListener('scroll', function() {
    var menu = document.getElementById('Menu');
    var itemListnav = document.querySelector('.itemListnav'); // Utiliza querySelector para seleccionar por clase
    if (window.scrollY > 100) { 
      menu.style.backgroundColor = '#000000';
      itemListnav.style.backgroundColor = '#000000';
    } else {
      menu.style.backgroundColor = 'transparent';
      itemListnav.style.backgroundColor = 'transparent'; // Asegúrate de restaurar el color transparente cuando el menú no está fijo
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const menuBurger = document.getElementById('checkBurger');
    menuBurger.addEventListener('click', function() {
        if (menuBurger.checked) { // Cambia a menuBurger
            const itemListnav = document.querySelector('.itemListnav');
            itemListnav.style.display = 'flex';
        } else {
            const itemListnav = document.querySelector('.itemListnav');
            itemListnav.style.display = 'none';
        }
    });
});
