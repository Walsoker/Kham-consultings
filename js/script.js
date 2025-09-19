 // Gestion du menu mobile
 const menuIcon = document.querySelector('.icons');
 const navLinks = document.querySelector('.nav-links');
 const menuIconElement = document.getElementById('menu-icon');

 menuIcon.addEventListener('click', () => {
     navLinks.classList.toggle('active');
     
     // Changement d'icône
     if (navLinks.classList.contains('active')) {
         menuIconElement.classList.replace('bx-menu', 'bx-x');
     } else {
         menuIconElement.classList.replace('bx-x', 'bx-menu');
     }
 });

 // Fermer le menu en cliquant sur un lien
 document.querySelectorAll('.nav-links a').forEach(link => {
     link.addEventListener('click', () => {
         navLinks.classList.remove('active');
         menuIconElement.classList.replace('bx-x', 'bx-menu');
     });
 });

 // Changement de style de la navbar au scroll
 window.addEventListener('scroll', () => {
     const navbar = document.querySelector('.navbar');
     if (window.scrollY > 50) {
         navbar.classList.add('scrolled');
     } else {
         navbar.classList.remove('scrolled');
     }
 });