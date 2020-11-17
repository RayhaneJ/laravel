DROP DATABASE IF EXISTS laravel_projet;

CREATE DATABASE IF NOT EXISTS laravel_projet;
USE laravel_projet;

create table if not exists dossiers
 (
   id_doc bigint unsigned not null ,
   no_nanterre bigint unsigned not null  ,
   type_doc char(32) null  
   , primary key (id_doc) 
 ) 
 comment = "";


create table if not exists etudiants
 (
   no_nanterre bigint unsigned not null  ,
   no_nanterre_1 bigint unsigned null  ,
   cv char(32) null  ,
   lettre_motiv char(32) null  ,
   classe char(32) null  ,
   prenom char(32) null  ,
   nom char(32) null  ,
   dt_naiss char(32) null  ,
   no_tel char(32) null 
   , primary key (no_nanterre) 
 ) 
 comment = "";


create table if not exists jurys
 (
   no_nanterre bigint unsigned not null ,
   statut char(32) null  ,
   prenom char(32) null  ,
   nom char(32) null  ,
   dt_naiss char(32) null  ,
   no_tel char(32) null 
   , primary key (no_nanterre) 
 ) 
 comment = "";


create table if not exists entreprises
 (
   id_entreprise bigint unsigned not null ,
   no_tel char(32) null  ,
   no_rue char(32) null  ,
   nom_rue char(32) null  ,
   ville char(32) null  ,
   cd_postal char(32) null  
   , primary key (id_entreprise) 
 ) 
 comment = "";


create table if not exists offrestages
 (
   id_stage bigint unsigned not null ,
   id_entreprise bigint unsigned not null  ,
   titre_stage char(32) null  ,
   deb_stage char(32) null  ,
   fin_stage char(32) null  ,
   duree char(32) null  ,
   desc_stage char(32) null  
   , primary key (id_stage) 
 ) 
 comment = "";


create table if not exists tuteurs
 (
   no_nanterre bigint unsigned not null ,
   statut char(32) null  ,
   prenom char(32) null  ,
   nom char(32) null  ,
   dt_naiss char(32) null  ,
   no_tel char(32) null 
   , primary key (no_nanterre) 
 ) 
 comment = "";


create table if not exists juges
 (
   no_nanterre bigint unsigned not null ,
   id_doc bigint unsigned not null  
   , primary key (no_nanterre,id_doc) 
 ) 
 comment = "";


create table if not exists postule
 (
   no_nanterre bigint unsigned not null  ,
   id_stage bigint unsigned not null  
   , primary key (no_nanterre,id_stage) 
 ) 
 comment = "";




alter table dossiers 
  add foreign key fk_dossier_etudiant (no_nanterre)
      references etudiants (no_nanterre) ;


alter table etudiants 
  add foreign key fk_etudiant_tuteur (no_nanterre_1)
      references tuteurs (no_nanterre) ;


alter table offrestages 
  add foreign key fk_offre_stage_entreprise (id_entreprise)
      references entreprises (id_entreprise) ;


alter table juges 
  add foreign key fk_juge_jury (no_nanterre)
      references jurys (no_nanterre) ;


alter table juges 
  add foreign key fk_juge_dossier (id_doc)
      references dossiers (id_doc) ;


alter table postule 
  add foreign key fk_postule_etudiant (no_nanterre)
      references etudiants (no_nanterre) ;


alter table postule 
  add foreign key fk_postule_offre_stage (id_stage)
      references offrestages (id_stage) ;






//A mettre quand tu as fait la migration

alter table entreprises 
  add foreign key fk_etudiant_user (id_entreprise)
      references users (id) ;

alter table etudiants 
  add foreign key fk_etudiant_user (no_nanterre)
      references users (id) ;

alter table jurys
  add foreign key fk_jury_user (no_nanterre)
      references users (id) ;

alter table tuteurs 
  add foreign key fk_tuteur_user (no_nanterre)
      references users (id) ;
