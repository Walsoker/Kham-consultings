# Kham-consultings

Kham-consultings est un site vitrine (showcase website) pour le cabinet de conseil juridique Kham Consulting. C'est une entreprise spécialisée dans le conseil stratégique, la structuration juridique et la protection de la propriété intellectuelle pour les entrepreneurs et créateurs africains (particulièrement dans les secteurs culturels et artistiques).

Stack technique
Langages : HTML (63%), CSS (29.7%), PHP (5.2%), JavaScript (2.1%)
Framework/Architecture : Site statique avec backend PHP pour traiter les formulaires de contact
Bibliothèques notables :
AOS (Animate On Scroll) – pour les animations au scroll
Boxicons – icônes SVG
Fetch API – pour les requêtes asynchrones du formulaire
Comment c'est organisé
Code
.
├── index.html           # Page d'accueil (hero, services, projets, témoignages, FAQ)
├── contact.html         # Page de contact avec formulaire
├── index.php            # Backend pour traiter les soumissions de formulaire
├── css/
│   └── style.css        # Tous les styles (global, responsive)
├── js/
│   └── script.js        # Interactions : menu mobile, navbar scroll
└── img/                 # Images de la galerie
Comment ça fonctionne :

L'utilisateur remplit le formulaire sur contact.html
Le JavaScript envoie les données en POST vers index.php via Fetch
index.php valide les données, les nettoie (htmlspecialchars, filter_var) et envoie un email via la fonction PHP mail()
Une réponse JSON est retournée au frontend pour afficher un message de succès/erreur
Comment le lancer
Aucune installation complexe requise — c'est un site PHP basique :

bash
# 1. Cloner le repo
git clone https://github.com/Walsoker/Kham-consultings.git
cd Kham-consultings

# 2. Lancer un serveur PHP local
php -S localhost:8000

# 3. Ouvrir dans le navigateur
# http://localhost:8000
Configurations requises :

Serveur PHP (localhost suffit pour dev)
Modifier l'adresse email dans index.php (ligne 3) pour recevoir les messages

