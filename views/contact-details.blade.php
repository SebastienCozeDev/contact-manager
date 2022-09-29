@extends('master')

@section('title', $title)

@section('main')
    <h2>{{ $title ?? 'Détails du contact' }}</h2>
    <table>
        <thead>
        <tr>
            <th>Intitulé de l'information</th>
            <th>Information</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th>Identifiant</th>
                <td>{{ $contact->getId() }}</td>
            </tr>
            <tr>
                <th>Titre de civilité</th>
                <td>{{ $civilityTitle ?? $noKnown }}</td>
            </tr>
            <tr>
                <th>Nom de famille</th>
                <td>{{ $contact->getLastName() ?? $noKnown }}</td>
            </tr>
            <tr>
                <th>Premier prénom</th>
                <td>{{ $contact->getFirstName() ?? $noKnown }}</td>
            </tr>
            <tr>
                <th>Second prénom</th>
                <td>{{ $contact->getSecondName() ?? $noKnown }}</td>
            </tr>
            <tr>
                <th>Organisation</th>
                <td>{{ $contact->getOrganisation() ?? $noKnown }}</td>
            </tr>
            <tr>
                <th>Poste</th>
                <td>{{ $contact->getPosition() ?? $noKnown }}</td>
            </tr>
            <tr>
                <th>Numéro de téléphone</th>
                <td><a href="tel:{{ $contact->getPhoneNumber() ?? '#' }}">{{ $contact->getPhoneNumber() ?? $noKnown }}</a></td>
            </tr>
            <tr>
                <th>Adresse mail</th>
                <td><a href="mailto:{{ $contact->getMailAddress() ?? '#' }}">{{ $contact->getMailAddress() ?? $noKnown }}</a></td>
            </tr>
            <tr>
                <th>Note</th>
                <td>{{ $contact->getNote() ?? $noKnown }}</td>
            </tr>
        </tbody>
    </table>
    <a href="/contacts">Retour</a>
    <a href="/contacts/{{ $contact->getId() }}/update">Modifier ce contact</a>
    <a onclick="deleteContact();">Supprimer ce contact</a>
@endsection