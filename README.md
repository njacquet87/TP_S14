Notre projet a été fait avec l'aide de Wamp. Les ports utilisés sont basés sur ceux utilisés précédemment par le projet La Cosina (préalablement enlevés de Wamp pour éviter tout conflit de ports).


Pour la base de données, nous avons suivi les consignes :
CREATE TABLE users (
    id serial primary key,
    nom varchar(100) not null,
    email varchar(100) not null UNIQUE,
    password varchar(100) not null,
    date_inscription DATETIME default CURRENT_TIMESTAMP
)
Une table users qui prend nom, email mot de passe et date d'inscription par rapport à la date et heure de l'enregistrement

create table posts (
    id int primary key,
    titre varchar(100) not null,
    contenu TEXT not null,
    utilisateur_id int,
    date_publication DATETIME default CURRENT_TIMESTAMP,
    Foreign Key (utilisateur_id) REFERENCES users(id)
)
Une table posts qui prend un titre, un contenu pour écrire, l'utilisateur qui écrit le post et la date qui fonctionne comme pour user.

create table comments (
    id int primary key,
    contenu text not null,
    utilisateur_id int,
    post_id int,
    date_commentaire DATETIME default CURRENT_TIMESTAMP,
   
    Foreign Key (utilisateur_id) REFERENCES users(id),
    Foreign Key (post_id) REFERENCES posts(id)  
)
Une table comments qui prend un contenu texte, l'utilisateur qui l'a écrit, le post qui est "visé" et la date/heure.


On peut donc s'inscrire avec un mot de passe contenu en mode hashé dans une base de données. On peut sur le site créer des posts et commenter ceux que l'on choisit.
