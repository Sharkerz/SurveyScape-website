@extends('layouts.app')

@section('content')

<link href="{{ asset('css/conditions.css') }}" rel="stylesheet">
<div id="back">
    <a href="javascript:window.history.go(-1)"><i id="back_logo" class="material-icons">arrow_back</i></a>
</div>
<div class="container" id="presentation">

    <br>
    <h1 class="titre" id="titre">CONDITIONS D’UTILISATION SURVEY SCAPE </h1>
    <br>
    <div class="row" id="text1">

        <div class="col" id="text11">

            <p id="text_title"> 
                SURVEY SCAPE, SAS au capital de 100 000€, ayant pour siège social 6 Rue Eugénie Brazier à Illkirch-Graffenstaden 67100, immatriculée au RCS Créteil 804 864 908 prise en la personne de son représentant légal. 
            </p>
            <p id="text_title">  
                Directeur de Publication : Léo Auvray
            </p> 
            <p id="text_title">  
                Hébergeur : GANDI SAS, 63-65 boulevard Massena-75013 Paris.
            </p> 
            <p id="text_bold">  
                ARTICLE 1- DEFINITIONS
            </p> 
            <p id="text_title">  
            APPLICATION : Logiciel en ligne de création et gestion de sondages, enquêtes, questionnaires et études de marché.
            </p> 
            <p id="text_title">  
            COMPTE : Espace personnel de l’UTILISATEUR, accessible en ligne au moyen de l’identifiant et du mot de passe associés.
            </p> 
            <p id="text_title">  
            UTILISATEUR(S) : Désigne toutes personnes physiques ou morales utilisant les SERVICES proposés par le SITE
            </p> 
            <p id="text_title">  
            SERVICE(S) : Accès en ligne aux fonctionnalités de L’APPLICATION via le SITE, hébergement des données associées à l’utilisation des fonctionnalités de L’APPLICATION. Certains services sont réservés aux personnes ayant payé le prix de l’abonnement correspondant.
            </p> 
            <p id="text_title">  
            SITE : Site internet accessible à l’adresse  <a href="{{route("home")}}">www.surveyscape.com</a>
            </p> 
            <p id="text_bold">  
            ARTICLE 2- ENTREE EN VIGUEUR ET APPLICATION DES CONDITIONS GENERALES
            </p> 
            <p id="text_title">  
            Les présentes Conditions Générales s'appliquent à l'ensemble des SERVICES. Cette version annule et remplace les versions antérieures.
            </p> 
            <p id="text_title">  
            Tout UTILISATEUR est soumis aux présentes Conditions Générales, qu'il reconnaît avoir lues et acceptées sans restriction ni réserve.
            </p> 
            <p id="text_title">  
            SURVEY SCAPE se réserve le droit de modifier les présentes Conditions Générales à tout moment et sans préavis. Néanmoins, en cas de modification des présentes Conditions Générales, les commandes passées demeurent régies par les Conditions Générales applicables au jour de la commande.
            </p> 
            <p id="text_title">  
            Il appartient à l'UTILISATEUR d'imprimer les présentes Conditions Générales. En cas de contestation sur leur contenu le système de sauvegarde du SITE fait foi entre les parties.
            </p> 
            <p id="text_bold">  
            ARTICLE 3- CONFIGURATION REQUISE
            </p> 
            <p id="text_title">  
            Pour utiliser les SERVICES, chaque UTILISATEUR doit disposer d’une connexion internet haut-débit (à ses frais et non compris dans le prix de l’accès aux SERVICES) et des logiciels suivants :
            </p> 
            <li id="text_title">
            Un navigateur internet à jour parmis la liste suivante :
            </li>
            <ul>
                <li id="text_title"> Internet Explorer</li>
                <li id="text_title"> Google Chrome</li>
                <li id="text_title"> Mozilla Firefox</li>
                <li id="text_title"> Opéra</li>
                <li id="text_title"> Safari</li>
            </ul>
            <li id="text_title">Javascript activé sur le navigateur </li>
            <p id="text_title">  
            SURVEY SCAPE pourra informer L’UTILISATEUR (par email ou affichage internet) de la nécessité de mettre à jour certains navigateurs requis ou d’installer certains logiciels complémentaires.
            </p> 
            <p id="text_title">  
            L’UTILISATEUR accepte que s’il ne procède pas aux mises à jour requises, il risque de ne plus pouvoir accéder à tout ou partie des SERVICES ou que les SERVICES aient des performances dégradées.
            </p> 
            <p id="text_bold">  
            ARTICLE 4 - COMPTES 
            </p> 
            <p id="text_title">  
            Pour accéder aux SERVICES, l’UTILISATEUR doit préalablement créer un compte. La création de compte et l’utilisation des comptes sont réservées à des personnes majeures et civilement capables.
            </p> 
            <p id="text_title">  
            En créant un compte, l’utilisateur reconnaît avoir pris connaissance des caractéristiques essentielles des SERVICES et du prix de ces derniers via les informations fournies sur le SITE.
            </p> 
            <p id="text_title">  
            La création de compte se fait en ligne, en remplissant les champs de formulaire. Les champs de formulaire obligatoires sont signalés et le défaut de réponse à ces champs obligatoires empêche la création de compte. 
            </p> 
            <p id="text_title">  
            Les informations fournies par l'UTILISATEUR lors de la création du compte doivent être exactes et éventuellement être mises à jour via les formulaires dédiés sur le SITE. 
            </p> 
            <p id="text_title">  
            L'UTILISATEUR s'étant inscrit avec des informations fantaisistes ou qui n'ont pas été mises à jour s'expose à ne pas être reconnu, lors d'une contestation, par SURVEY SCAPE comme un UTILISATEUR autorisé à utiliser les SERVICES ou à effectuer une réclamation. 
            </p>
            <p id="text_title">  
            Le compte est strictement personnel. Il ne peut être cédé, transféré, loué, ou prêté.
            </p> 
            <p id="text_title">  
            L'UTILISATEUR est responsable de la sécurité des codes d’accès à son compte. Il lui appartient de les conserver de façon confidentielle et sécurisée. L’UTILISATEUR reconnaît être responsable des codes d’accès et supporter seul les conséquences qui pourraient résulter de l'utilisation faite par des tiers qui auraient eu connaissance de ceux-ci. Toute perte ou divulgation involontaire d'éléments susceptibles de permettre à un tiers de prendre connaissance des codes d’accès doit être immédiatement signalée à SURVEY SCAPE afin que les identifiants soient invalidés dans les meilleurs délais.
            </p> 
            <p id="text_title">  
            Il est recommandé à L'UTILISATEUR de se déconnecter du COMPTE une fois qu'il a fini d'utiliser les SERVICES. 
            </p> 
            <p id="text_bold">  
            ARTICLE 5 – DISPONIBILITE DES SERVICES
            </p>
            <p id="text_title">  
            Les SERVICES sont accessibles 24h/24h, sous réserve d'interruptions accidentelles (panne, erreur, rupture des connexions réseaux) ou nécessaires au bon fonctionnement du SERVICE. <br><br>
            SURVEY SCAPE se réserve notamment la faculté de procéder à des interruptions du SERVICE pour les besoins de l'exécution des opérations de maintenance (changement de matériel, correction des erreurs, mises à jour, correction de failles de sécurité), et s'engage, dans la mesure du possible et sauf situation exceptionnelle, à procéder à ces interruptions au cours des périodes de non utilisation ou de moindre utilisation de SERVICE par l’UTILISATEUR. <br><br>
            Aucune indemnité de quelque nature que ce soit ou remboursement du prix de l’abonnement n'est due par SURVEY SCAPE pour ces interruptions.
            </p>
            <p id="text_bold">  
            ARTICLE 6 – RESPONSABILITE
            </p>
            <p id="text_title">  
            L’UTILISATEUR est seul responsable de l’utilisation des SERVICES et supporte seul les risques liés à leur utilisation. Les enquêtes, sondages, questionnaires, études de marché sont faite sous la responsabilité pleine et entière des UTILISATEURS, SURVEY SCAPE intervenant uniquement en sa qualité d’éditeur de logiciel fournit comme un service (logiciel ASP). <br><br>
            L’UTILISATEUR reconnaît avoir reçu de SURVEY SCAPE toutes les informations relatives aux SERVICES, afin qu'il puisse apprécier son adéquation à ses besoins. <br><br>
            SURVEY SCAPE ne pourra notamment être tenue responsable des dommages subis par l’UTILISATEUR et liés notamment :
            </p>
            <ul>
                <li id="text_title">à toute interruption du SERVICE indépendante du contrôle de SURVEY SCAPE, ainsi que toutes interruptions prévues à l'article 8 ; </li>
                <li id="text_title">à une utilisation du SERVICE par L’UTILISATEUR non conforme aux présentes conditions générales et à la documentation d’utilisation accessible sur le SITE ;</li>
                <li id="text_title">au non-respect de la configuration requise ;</li>
            </ul>
            <p id="text_title">  
            Dans l'hypothèse où la responsabilité SURVEY SCAPE vis à vis d’un UTILISATEUR serait reconnue par une décision de justice exécutoire ou définitive, celle-ci est plafonnée au montant de l’abonnement payé lors de la survenance du fait générateur du dommage ou à une année du prix de l’abonnement. La responsabilité contractuelle SURVEY SCAPE se prescrit contractuellement trois (3) mois à compter du fait générateur permettant de mettre en cause sa responsabilité. <br><br>
            Dans l'hypothèse où la responsabilité SURVEY SCAPE ou de l’un de ses dirigeants ou employés serait mise en cause par un tiers du fait des agissements d’un UTLISATEUR, l’UTILISATEUR s’engage à indemniser SURVEY SCAPE de tout dommages et intérêts, frais (avocats, huissiers, experts) ainsi que des dépens. <br><br>
            En aucun cas, SURVEY SCAPE ne pourra être tenue pour responsable des dommages directs ou indirects, matériels ou immatériels, corporels ou incorporels, liés à l'utilisation de l’APPLICATION, du SITE ou des SERVICES en ce compris les pertes d'exploitation ou pertes financières résultant de l'utilisation ou de l'impossibilité d'utiliser les SERVICES. <br><br>
            Les SERVICES sont fournis en l’état et sans garantie de quelque nature que se soit. SURVEY SCAPE ne garantit notamment pas que les SERVICES ne comportent pas d'erreurs ou d'anomalies de fonctionnement. SURVEY SCAPE ne garantit aucun résultat quantitatif ou qualitatif ni aucune performance. <br><br>
            SURVEY SCAPE ne garantit pas la compatibilité, ou l’interopérabilité de L’APPLICATION avec un quelconque logiciel, matériel, ou format de base de données. SURVEY SCAPE ne garantit aucune réversibilité de quelque nature que ce soit. <br><br>
            SURVEY SCAPE n’effectue aucun contrôle et aucune modération avant la mise en ligne des sondages, enquêtes ou études qui demeurent sous la pleine et entière responsabilité de l’UTILISATEUR. <br><br>
            L’utilisateur reconnait et accepte que les données hébergées puissent ne plus être accessibles au terme de l’abonnement et que SURVEY SCAPE puisse détruire les données hébergé sans délais ou préavis l’issu de l’abonnement.
            </p>
            <p id="text_bold">  
            ARTICLE  7 - FORCE MAJEURE
            </p>
            <p id="text_title">  
            L’UTILISATEUR reconnaît et accepte expressément que SURVEY SCAPE est déliée de ses obligations au titre du présent contrat, en cas de force majeure. Outre les cas de force majeure habituellement reconnus par les lois et les tribunaux, constituent un cas de force majeure au sens du présent contrat les interruptions de la fourniture de l'électricité ou des services de télécommunication par les opérateurs publics ou privés, les décisions législatives ou réglementaires affectant le SERVICE et modifiant l'équilibre contractuel. <br><br>
            En cas de force majeure, SURVEY SCAPE pourra terminer, sans préavis, le SERVICE et les abonnements pourront être résiliés de plein droit, sans formalité judicaire ni indemnité de quelque nature que ce soit.
            </p>
            <p id="text_bold">  
            ARTICLE 8 – PROPRIÉTÉ INTELLECTUELLE
            </p>
            <p id="text_title">  
            L’ensemble du contenu accessible par l’intermédiaire des SERVICES ou du SITE est protégé par les dispositions du code de la propriété intellectuelle et les traités internationaux sur le droit d’auteur. Tous les droits sont réservés par SURVEY SCAPE<br><br>
            Toutes reproductions, représentations, diffusions, extraction qualitativement ou quantitativement substantielles, réutilisations, modifications, adaptations, traductions, arrangements du contenu accessible sont strictement interdits. <br><br>
            Le droit de correction sur l’APPLICATION et le SITE sont réservés. <br><br>
            SURVEY SCAPE est une marque déposée auprès de l'INPI.
            </p>
            <p id="text_bold">  
            ARTICLE 9 – ACCORD ET AUTORISATION D’UTILISATION D’IMAGE / LOGO
            </p>
            <p id="text_title">  
            L’UTILISATEUR autorise expressément la société SURVEY SCAPE à citer son nom et/ou le nom de son entreprise ainsi qu’à faire apparaître son logo sur le SITE, et notamment sur la page d'accueil.<br><br>
            Cette autorisation est valable pour une durée indéterminée et illimitée. La société SURVEY SCAPE s’engage quant à elle à retirer du SITE, immédiatement et sans mise en demeure, toute référence faite au nom, à l’image et/ou au logo de l’utilisateur ou de son entreprise sur simple demande.
            </p>
            <p id="text_title">  
            ARTICLE 10 - ATTRIBUTION DE JURIDICTION ET LOI APPLICABLE
            </p>
            <p id="text_title">  
            Pour toutes contestations pouvant naître à l'occasion du présent contrat, attribution de juridiction est faite aux tribunaux compétents de la Ville de Créteil (94) en France (FR). <br><br>
            Le droit applicable au présent contrat est le droit français (FR). 
            </p>
            <p id="text_title">  
            ARTICLE 11 –PROTECTION DES DONNEES PERSONNELLES - OBLIGATIONS DE SURVEY SCAPE AGISSANT EN TANT QUE SOUS-TRAITANT
            </p>
            <p id="text_title">  
            16.1. Description du traitement pour lequel SURVEY SCAPE est sous-traitant<br><br>
            SURVEY SCAPE est autorisée à traiter pour le compte de l’UTILISATEUR les données personnelles nécessaires pour fournir les SERVICES. Les parties reconnaissent que dans ce cadre, SURVEY SCAPE agit en qualité de sous-traitant pour le compte de l’UTILISATEUR, agissant en qualité de responsable de traitement au sens du Règlement 2016/679 du Parlement Européen et du Conseil du 27 avril 2016 (« RGPD »). <br><br>
            Les caractéristiques du traitement de données personnelles pour lequel SURVEY SCAPE agit en qualité de sous-traitant sont les suivantes : 
            </p>
            <ul>
                <li id="text_title"> Nature du traitement : l’enregistrement, l’organisation, la structuration, la conservation et l’extraction des données personnelles transmises par l’UTILISATEUR</li>
                <li id="text_title"> Finalités du traitement : la fourniture des SERVICES à l’UTILISATEUR</li>
                <li id="text_title"> Types de données personnelles traitées : identification des répondants aux sondages ; résultats des sondages</li>
                <li id="text_title"> Catégories de personnes concernées : personnes impliquées dans les sondages, les enquêtes et les études de marché</li>
                <li id="text_title"> Durée du traitement : la durée du traitement correspond à la durée des SERVICES.</li>
            </ul>
            <p id="text_title">  
            16.2. Obligations de SURVEY SCAPE agissant en qualité de sous-traitant
            </p>
            <p id="text_title">  
            En tant que sous-traitant, SURVEY SCAPE s’engage à :
            </p>
            <ul>
                <li id="text_title">n'utiliser les données personnelles qui lui sont confiées par l’UTILISATEUR que pour le compte de l’UTILISATEUR, conformément aux instructions documentées de l’UTILISATEUR et aux seules fins de réalisation du présent contrat ;  </li>
                <li id="text_title">ne pas transférer les données personnelles vers un pays tiers ou à une organisation internationale, à moins d'être tenu d'y procéder en vertu du droit applicable ; dans ce cas, SURVEY SCAPE informe l’UTILISATEUR de cette obligation juridique avant le transfert, sauf si le droit applicable interdit une telle information pour des motifs importants d'intérêt public ; </li>
                <li id="text_title">ne pas céder, utiliser, modifier ou divulguer les données personnelles à quiconque, que ce soit à titre gratuit ou onéreux, sauf consentement écrit préalable de l’UTILISATEUR ;  </li>
                <li id="text_title">prendre les mesures techniques, organisationnelles et structurelles appropriées afin de préserver, au regard de la nature des données personnelles et des risques présentés par la mise en œuvre du contrat, la confidentialité et la sécurité des données à caractère personnel et notamment empêcher qu'elles ne soient déformées, endommagées ou communiquées à des tiers non autorisés ; </li>
                <li id="text_title">prendre toutes les mesures requises pour s'assurer que ses salariés impliqués dans la réalisation des prestations soient informés et formés de manière adéquate pour respecter les engagements souscrits par SURVEY SCAPE en termes de confidentialité et de sécurité des données personnelles conformément aux présentes ;  </li>
                <li id="text_title">obtenir l'autorisation écrite préalable de l’UTILISATEUR avant de recruter un sous-traitant et lui imposer contractuellement les mêmes obligations en matière de données personnelles que celles fixées au présent contrat ; </li>
                <li id="text_title">notifier à l’UTILISATEUR tout incident grave relatif au traitement et à la sécurité des données personnelles et notamment tout accès, divulgation, utilisation ou accès non autorisé ou modification ou destruction des données personnelles ;  </li>
                <li id="text_title">en tenant compte de la nature du traitement, coopérer avec l’UTILISATEUR pour la mise en œuvre les droits des personnes concernées, en ce compris droit d’accès, de rectification, d’effacement et d’opposition, droit à la limitation du traitement, droit à la portabilité des données, droit de ne pas faire l’objet d’une décision individuelle automatisée (y compris le profilage ) ; </li>
                <li id="text_title">compte tenu de la nature du traitement et des informations mises à sa disposition, aider l’UTILISATEUR à garantir le respect des obligations relatives à la sécurité du traitement, aux analyses d'impact et aux consultations préalables ;  </li>
                <li id="text_title">selon le choix de l’UTILISATEUR, supprimer toutes les données personnelles ou les renvoyer à l’UTILISATEUR au terme du présent contrat et détruire les copies existantes, à moins que le droit applicable n'exige la conservation des données à caractère personnel ; </li>
                <li id="text_title">mettre à la disposition de l’UTILISATEUR toutes les informations nécessaires pour démontrer le respect des obligations prévues au présent article et pour permettre la réalisation d'audits, y compris des inspections, par l’UTILISATEUR ou un autre auditeur qu'il a mandaté, et contribuer à ces audits ;  </li>
                <li id="text_title">informer immédiatement l’UTILISATEUR si, selon lui, une instruction de l’UTILISATEUR constitue une violation du présent contrat ou d'autres dispositions du droit de l'Union européenne ou du droit des États membres relatives à la protection des données.  </li>
            </ul>
            <p id="text_title">  
            Transfert hors Espace Economique Européen (« EEE ») [NB : paragraphe à modifier en fonction des éventuels transferts hors UE effectués par les prestataires de Drag’n Survey]Dans l’hypothèse d’un Utilisateur qui accède à ou utilise l’Application dans un pays en dehors de l’EEE qui n’assure pas un niveau de protection adéquat, ou qui est lui-même établi en dehors de l’EEE dans un tel pays, il appartient à cet Utilisateur d’observer les règles du RGPD relatives aux transferts de données personnelles vers un pays tiers qui n’assure pas un niveau de protection adéquat.
            </p>
            <p id="text_bold">  
            ARTICLE 12 – OBLIGATIONS DE SURVEY SCAPE AGISSANT EN TANT QUE RESPONSABLE DE TRAITEMENT
            </p>
            <p id="text_title">  
            L‘UTILISATEUR peut consulter la <a href="{{route("politique_de_confidentialite")}}">politique de confidentialité </a> pour s’informer sur les traitements sur ses données personnelles opérés par SURVEY SCAPE en tant que responsable de traitement.
            </p>
            <br>

            


<div>


@endsection