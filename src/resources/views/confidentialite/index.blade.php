@extends('layouts.app')

@section('content')

<link href="{{ asset('css/conditions.css') }}" rel="stylesheet">
<div id="back">
    <a href="javascript:window.history.go(-1)"><i id="back_logo" class="material-icons">arrow_back</i></a>
</div>
<div class="container" id="presentation">

    <br>
    <h1 class="titre" id="titre">POLITIQUE DE CONFIDENTIALITE SURVEY SCAPE </h1>
    <br>
    <div class="row" id="text1">

        <div class="col" id="text11">

 
            <p id="text_bold">  
            1. DEFINITIONS
            </p> 
            <p id="text_title">  
            APPLICATION : Logiciel en ligne de création et gestion de sondages, enquêtes, questionnaires et études de marché. <br><br>
            UTILISATEUR(S) : Désigne toutes personnes physiques ou morales utilisant les SERVICES proposés par le SITE<br><br>
            SERVICE(S) : Accès en ligne aux fonctionnalités de L’APPLICATION via le SITE, hébergement des données associées à l’utilisation des fonctionnalités de L’APPLICATION. Certains services sont réservés aux personnes ayant payé le prix de l’abonnement correspondant.
            <p id="text_title">  
            SITE : Site internet accessible à l’adresse <a href="{{route("home")}}">www.surveyscape.com</a>
            </p> 
            <p id="text_bold">  
            2. FINALITES DU TRAITEMENT ET BASES LEGALES
            </p> 
            <ul>
                <li id="text_title">fournir les SERVICES et assurer la gestion et le suivi de la relation client. Ce traitement s’appuie sur l’article 6.1 (b) du Règlement 2016/679 du Parlement Européen et du Conseil du 27 avril 2016 (« RGPD »), en vertu duquel le traitement est licite s’il est nécessaire à l'exécution d'un contrat auquel la personne concernée est partie ;</li>
                <li id="text_title">assurer le suivi de la relation avec les prospects et d’effectuer des opérations de sollicitation commerciale. Ce traitement s’appuie sur l’article 6.1(f) du RGPD en vertu duquel le traitement est licite s’il est nécessaire aux intérêts légitimes du responsable de traitement, à savoir la gestion des clients et des prospects ;</li>
                <li id="text_title">d’analyser le trafic et de permettre au SITE de fonctionner. Ce traitement s’appuie sur l’article 6.1 (f) du RGPD, en vertu duquel le traitement est licite s’il est nécessaire aux fins des intérêts légitimes du responsable de traitement, à savoir la gestion de son site internet. Concernant les cookies publicitaires et de mesure d’audience, le traitement s’appuie sur l’article 6.1 (a) du RGPD, en vertu duquel le traitement est licite si la personne concernée a consenti au traitement ;</li>
                <li id="text_title">répondre à vos demandes dans le cadre de l’exercice de vos droits conformément au RGPD. Ce traitement s’appuie sur l’article 6.1 (c) du RGPD en vertu duquel le traitement est licite s’il est nécessaire au respect d’une obligation légale à laquelle le responsable de traitement est soumis./li></li>
                <li id="text_title"> Safari</li>
            </ul> 
            <p id="text_bold">  
            3. VOS DROITS
            </p> 
            <p id="text_title"> 
            Vous disposez du droit :
            </p>
            <ul>
                <li id="text_title">de demander à SURVEY SCAPE l'accès à vos données personnelles, leur rectification, leur effacement ainsi que la limitation de leur traitement ;</li>
                <li id="text_title">lorsque le traitement est basé sur l’exécution du contrat, de demander la portabilité de ses données ;</li>
                <li id="text_title">d’adresser des instructions spécifiques concernant l’utilisation de vos données personnelles après votre décès ;</li>
                <li id="text_title">de vous opposer à tout moment au traitement de vos données personnelles (i) pour des raisons tenant à votre situation particulière, quand ce traitement est fondé sur la poursuite des intérêts légitimes de SURVEY SCAPE; ou (ii) à des fins de prospection, y compris au profilage dans la mesure où il est lié à une telle prospection ;</li>
                <li id="text_title">de retirer votre consentement lorsque vous avez accepté le dépôt de cookie sur le SITE. Vous pouvez retirer ce consentement à tout moment en paramétrant votre navigateur.</li>
            </ul> 
            <p id="text_title">  
            Pour exercer ces droits, vous pouvez envoyer un email à contact@surveyscape.com, en indiquant vos nom et prénom et en justifiant de son identité. Conformément à l’article 12.5 du RGPD, SURVEY SCAPE pourra refuser de donner droit à la demande si cette dernière est manifestement infondée ou excessive.<br><br>
            Vous disposez également de la possibilité d’introduire une réclamation auprès de la Commission Nationale de l’Informatique et des Libertés (CNIL), autorité de contrôle chargée de la protection des données personnelles.
            </p> 
            <p id="text_bold">  
            4. DESTINATAIRES DES DONNEES
            </p> 
            <p id="text_title">  
            SURVEY SCAPE ne communique vos données personnelles qu’à des destinataires habilités et déterminés pour répondre aux finalités précédemment indiquées. Il s’agit notamment des personnes en charge de l’APPLICATION et de la relation client de SURVEY SCAPE et des prestataires tiers intervenant dans le cadre des SERVICES.
            </p> 
            <li id="text_bold">
            5. DUREES DE CONSERVATION
            <p id="text_title">  
            Les données personnelles traitées par SURVEY SCAPE sont conservées pendant un délai ne dépassant pas la durée nécessaire à la fourniture des SERVICES et la gestion et suivi de la relation client et des prospects. Certaines données personnelles pourront être conservées par voie d’archivage au-delà de cette durée afin de permettre à SURVEY SCAPE d’établir la preuve du contrat ou du respect de ses obligations dans les délais de prescription légale.
            </p> 
            <p id="text_bold">  
            7. TRANSFERTS EN DEHORS DE L’ESPACE ECONOMIQUE EUROPEEN
            </p>  
            <p id="text_title"> 
            Vos données personnelles sont susceptibles d’être transférées vers un pays tiers ou à une organisation internationale ne bénéficiant pas d’une décision d'adéquation rendue par la Commission européenne. Le cas échéant, ces transferts sont couverts par des clauses contractuelles types adoptées par la Commission européenne, la certification « Privacy Shield » ou des règles contraignantes d'entreprises approuvées par une autorité européenne de protection des données personnelles.
            </p> 
            <p id="text_bold">
            8. OBLIGATION DE L’UTILISATEUR 
            </p> 
            <p id="text_title"> 
            L’UTILISATEUR demeure seul responsable de ses propres traitements et s’engage, le cas échéant, à informer ses collaborateurs du traitement de données personnelles opéré par SURVEY SCAPE dans le cadre des SERVICES et de ses modalités telles qu’elles sont détaillées ci-dessus. Lorsque l’UTILISATEUR traite des données personnelles de tiers dans le cadre de l’utilisation des SERVICES, il reconnaît qu’il agit en qualité de responsable de traitement et que SURVEY SCAPE agit en qualité de sous-traitant au sens du RGPD, conformément aux stipulations des <a href="{{route("conditions_utilisations")}}">Conditions d'utilisations </a>SURVEY SCAPE . 
            </p>
            <ul>
                <li id="text_title">mettre à la disposition de l’UTILISATEUR toutes les informations nécessaires pour démontrer le respect des obligations prévues au présent article et pour permettre la réalisation d'audits, y compris des inspections, par l’UTILISATEUR ou un autre auditeur qu'il a mandaté, et contribuer à ces audits ;</li>
                <li id="text_title">informer immédiatement l’UTILISATEUR si, selon lui, une instruction de l’UTILISATEUR constitue une violation du présent contrat ou d'autres dispositions du droit de l'Union européenne ou du droit des États membres relatives à la protection des données.</li>
            </ul> 
            <p id="text_title">  
            Transfert hors Espace Economique Européen (« EEE ») [NB : paragraphe à modifier en fonction des éventuels transferts hors UE effectués par les prestataires de Drag’n Survey]Dans l’hypothèse d’un Utilisateur qui accède à ou utilise l’Application dans un pays en dehors de l’EEE qui n’assure pas un niveau de protection adéquat, ou qui est lui-même établi en dehors de l’EEE dans un tel pays, il appartient à cet Utilisateur d’observer les règles du RGPD relatives aux transferts de données personnelles vers un pays tiers qui n’assure pas un niveau de protection adéquat.
            </p> 
            <p id="text_bold">  
            ARTICLE 17 – OBLIGATIONS DE SURVEY SCAPE AGISSANT EN TANT QUE RESPONSABLE DE TRAITEMENT
            </p>
            <p id="text_title">  
            L‘UTILISATEUR peut consulter la <a href="{{route("politique_de_confidentialite")}}">politique de confidentialité </a> pour s’informer sur les traitements sur ses données personnelles opérés par SURVEY SCAPE en tant que responsable de traitement.
            </p> 
            <br>

            


<div>































@endsection