
# ifm_back

#Lancer le serveur:
-composer install

-php -S localhost:8000 -t public

#les routes

offre
-
params = 'id', 'entreprise','poste','ville','code_postal','presentation',
                 'activite','description'
                 
get('/offer/{id}')

get('/offer')

post('/offer')

put('/offer')

delete('/offer');

candidature
-
params =     'id', 'id_offre'

meme route qu'au dessus mais avec 'candidate' a la place de offer

favoris
-
params =     'id', 'id_offre'

meme route qu'au dessus mais avec 'favorite' a la place de offer

profil
-
params =      'id', 'nom','prenom','ville','email','tel','type_contrat',
                     'emploi_recherche','localisation','rayon','disponibilite',
                     'ad_cv','ad_photo'

meme route qu'au dessus mais avec 'profile' a la place de offer

