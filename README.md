# BookStore
Est une application Symfony 5.4 qui est appelée bookstore.
Cette application gére quatre entités :Auteur,Livre,Genre et User.
# Contraintes techniques :
Toutes les opérations d’ajout, de modification et de suppression ne peuvent se faire que par
un utilisateur authentifié et ayant le rôle "ROLE_ADMIN". Les utilisateurs anonymes auront
accès en lecture sur toutes les entités sauf "User".
Utilisation des Fixtures de Doctrine pour ajouter des données de test(générées en utilisant Faker).
# Actions proposées par l’application :
  ● lister tous les livres et ajouter,modifier,supprimer un livre.
  ● Lister les livres dont la date de parution est comprise entre deux années données.
  ● Lister tous les genres et ajouter,supprimer,modifier un genre.
  ● Lister tous les auteurs et ajouter,modifier,supprimer un auteur.


