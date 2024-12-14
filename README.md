# 📌 **Application de Point de Vente**

---

## 📋 **Description**

Cette application de point de vente (POS) a été développée avec **CodeIgniter**. Elle permet de gérer les ventes, produits, clients, et plus encore.

---

## ⚙️ **Technologies Utilisées**

- **Framework** : CodeIgniter  
- **Version PHP** : 8.1.12 (Recommandée)  
- **Base de Données** : MySQL  

---

## 🛠️ **Installation et Configuration**

### **1. Prérequis**

Assurez-vous d'avoir installé les logiciels suivants :

- **XAMPP** (ou tout autre serveur local avec Apache et MySQL)  
- **PHP 8.1.12**  

### **2. Configuration de la Base de Données**

1. **Créer une base de données** nommée `poshajar` :

   ```sql
   CREATE DATABASE poshajar;
   # Déploiement de l'Application POS

## 1. Importation du Fichier SQL

Importer le fichier `poshajar.sql` pour créer les tables nécessaires à la base de données.

---

## 2. Placement du Projet

Placer le projet dans le dossier `htdocs` de votre serveur local :



---

## 3. Configuration de la Base de Données

Configurer le fichier `application/config/database.php` avec vos informations de connexion à la base de données :

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',       // Modifier si différent
    'password' => '',           // Modifier si différent
    'database' => 'poshajar',   // Nom de la base de données
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

```
---

markdown
Copy code
### 4. Exécutez la commande `composer install`

### 5. Lancement de l'Application

1. Démarrez le serveur Apache via XAMPP.
2. Accédez à l'application à l'adresse suivante : http://localhost/posHajar

---

## 🔑 **Informations de Connexion**


- **Nom d'utilisateur** : `admin`
- **Mot de passe** : `admin`
