
CREATE table users (
    id serial primary key,
    nom varchar(100) not null,
    email varchar(100) not null UNIQUE,
    password varchar(100) not null,
    date_inscription DATETIME default CURRENT_TIMESTAMP
)

create table posts (
    id int primary key,
    titre varchar(100) not null,
    contenu TEXT not null,
    utilisateur_id int,
    date_inscription DATETIME default CURRENT_TIMESTAMP,

    Foreign Key (utilisateur_id) REFERENCES users(id)
)

create table comments (
    id int primary key,
    contenu text not null,
    utilisateur_id int,
    post_id int,
    date_inscription DATETIME default CURRENT_TIMESTAMP, 
    
    Foreign Key (utilisateur_id) REFERENCES users(id),
    Foreign Key (post_id) REFERENCES posts(id)  
)

select * from users

select * from comments

select * from posts
