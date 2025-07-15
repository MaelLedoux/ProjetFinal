# ProjetFinal - Portfolio Architecte d'intérieur

Ce projet est un **portfolio interactif** destiné à une architecte d’intérieur (Mareva), avec :
- un site **frontend** HTML/CSS/JS en SPA,
- un **back-office Symfony** pour l’administration (ajout des projets, services, vidéos),
- une **API REST** pour exposer dynamiquement les données du portfolio.

---

## 🖥️ Structure du projet

```
📁 public/                 --> Site vitrine (HTML/CSS/JS)
📁 api/ (Symfony backend) --> API + Administration
📁 public/videos/         --> Vidéos de présentation (max 100 Mo)
```

---

## 📦 Technologies utilisées

- ✅ **Frontend** : HTML, CSS, Vanilla JavaScript (SPA)
- ✅ **Backend** : Symfony 6
- ✅ **Base de données** : MySQL
- ✅ **Envoi d’email** : PHPMailer (intégré à Symfony)
- ✅ **API** : routes `/api/services`, `/api/realisations` (GET)

---

## 🔗 Exemple d’API

### 📄 `GET /api/services`

```json
[
  {
    "id": 1,
    "titre": "Visualisation 3D",
    "description": "Création de rendus 3D photoréalistes",
    "image": null
  },
  ...
]
```

### 📄 `GET /api/realisations`

Retourne la liste des projets (dessins, maquettes...).

---

## 🔐 Administration

Accessible via :  
`http://localhost:8001/admin` (Symfony server)

Fonctionnalités :
- 📁 Ajout/modification/suppression de projets
- 🎥 Ajout de vidéos (YouTube ou fichiers locaux)
- ✉️ Consultation des messages du formulaire de contact
- 📂 Génération automatique des fichiers `projetX.html`

---

## 🧪 Tests

Des tests sont en cours d’implémentation avec PHPUnit (TDD en Symfony).

---

## 🚀 Lancement du projet

### Frontend (SPA HTML/CSS/JS) :
```
cd public
# Ouvrir index.html directement dans un navigateur ou via un serveur local (Live Server, etc.)
```

### Backend Symfony (API + Admin) :
```bash
cd api
symfony server:start --port=8001
```

Accès admin : `http://localhost:8001/admin`

---

## ❗ Fichier vidéo volumineux

⚠️ Le fichier `presentation.mp4` est volontairement stocké sous 100 Mo pour rester compatible avec GitHub. Pour des fichiers plus volumineux, envisager **Git LFS**.

---

## 📄 Auteur

Développé par **Maël Ledoux** dans le cadre de sa formation en développement web full-stack.  
> Thème : Portfolio "Tropical Chic" pour architecte d’intérieur.

---