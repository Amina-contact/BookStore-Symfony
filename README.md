# BookStore
Est une application Symfony 5.4 qui est appelée bookstore.
Cette application gére quatre entités :Auteur,Livre,Genre et User.
La vidéo de démonstration : https://youtu.be/yyL_q_nafkY
# Contraintes techniques :
Toutes les opérations d’ajout, de modification et de suppression ne peuvent se faire que par
un utilisateur authentifié et ayant le rôle "ROLE_ADMIN". Les utilisateurs anonymes auront
accès en lecture sur toutes les entités sauf "User".
Utilisation des Fixtures de Doctrine pour ajouter des données de test(générées en utilisant Faker).
# Actions proposées par l’application :
  ● lister tous les livres ,modifier,supprimer un livre.<br>
  ● Lister les livres dont la date de parution est comprise entre deux années données.<br>
  ● Lister tous les genres et ajouter,supprimer,modifier un genre.<br>
  ● Lister tous les auteurs et ajouter,modifier,supprimer un auteur.<br>
  # 
  ![livreListe](https://user-images.githubusercontent.com/98979712/152445913-87d589ca-a5a1-4cbd-a6ad-af7f8f22ff3a.PNG)
 # Ajouter un livre
  ![newbook](https://user-images.githubusercontent.com/98979712/152446084-92cca3a0-c9de-48f8-a411-c1713c3268f7.PNG)
 # Modifier un livre
  ![editBook](https://user-images.githubusercontent.com/98979712/152446218-5266ca91-9a83-490b-92ca-e527e6c161f9.PNG)
 # Login
![login](https://user-images.githubusercontent.com/98979712/152446240-4c22be2e-0b5e-495d-a29e-f3bece69fbc2.PNG)
 # Sign up
![inscriptin](https://user-images.githubusercontent.com/98979712/152446246-caeffe64-8039-4b4d-89a0-5b34764102d4.PNG)
  



