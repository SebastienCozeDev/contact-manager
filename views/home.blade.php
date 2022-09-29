@extends('master')

@section('title', $title)

@section('main')
    <article class="box content">
        <h2>Bienvenue sur Contact Manager !</h2>
        <p>
            Contact Manager sert à gérer vos contacts. En effet, vous pouvez ajouter des contacts, les modifiers et les
            supprimer.
        </p>
    </article>
    <hr>
    <article class="box content">
        <h2 id="#about">Mentions légales</h2>
        <p>
            Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour la
            Confiance dans l’économie numérique, dite L.C.E.N., il est porté à la connaissance des utilisateurs et
            visiteurs, ci-après l'<strong>Utilisateur</strong>, du site http://localhost:8080/ , ci-après le <strong>Site</strong>",
            les présentes
            mentions légales.
        </p>
        <hr>
        <p>
            La connexion et la navigation sur le Site par l’Utilisateur implique acceptation intégrale et sans réserve
            des présentes mentions légales.
        </p>
        <hr>
        <p>
            Ces dernières sont accessibles sur le Site à la rubrique « <a href="/#about">À Propos</a> ».
        </p>
    </article>
    <article class="box content">
        <h2>Mentions légales - Article I - L'éditeur</h2>
        <p>
            L’édition et la direction de la publication du Site est assurée par Coze Sébastien, domiciliée dont
            l'adresse e-mail est <a href="mailto:sebastien.coze.62@outlook.fr">sebastien.coze.62@outlook.fr</a>,
            ci-après l'<strong>Éditeur</strong>.
        </p>
    </article>
    <article class="box content">
        <h2>Mentions légales - Article II - L'hébergeur</h2>
        <p>
            L'hébergeur du Site est la société <a href="https://github.com" target="_blank">GutHub</a>, dont le siège
            social est situé à San Francisco, Californie,
            États-Unis.
        </p>
    </article>
    <article class="box content">
        <h2>Mentions légales - Article III - L'accès au site</h2>
        <p>
            Le Site est accessible en tout endroit, 7j/7, 24h/24 sauf cas de force majeure, interruption
            programmée ou non et pouvant découlant d’une nécessité de maintenance.
            En cas de modification, interruption ou suspension du Site, l'Éditeur ne saurait être tenu responsable.
        </p>
    </article>
    <article class="box content">
        <h2>Mentions légales - Article IV - Les collectes de données</h2>
        <p>
            Le site est exempté de déclaration à la Commission Nationale Informatique et Libertés (CNIL) dans la
            mesure où il ne collecte aucune donnée concernant les utilisateurs.
            Toute utilisation, reproduction, diffusion, commercialisation, modification de toute ou partie du Site,
            sans autorisation de l’Éditeur est prohibée et pourra entraîner des actions et poursuites judiciaires
            telles que notamment prévues par le Code de la propriété intellectuelle et le Code civil.
        </p>
    </article>
@endsection
