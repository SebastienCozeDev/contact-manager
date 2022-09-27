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
                <th>Nom de famille</th>
                <td>{{ $contact->getLastName() }}</td>
            </tr>
            <tr>
                <th>Premier prénom</th>
                <td>{{ $contact->getFirstName() }}</td>
            </tr>
            <tr>
                <th>Organisation</th>
                <td>{{ $contact->getOrganisation() }}</td>
            </tr>
            <tr>
                <th>Numéro de téléphone</th>
                <td><a href="tel:{{ $contact->getPhoneNumber() }}">{{ $contact->getPhoneNumber() }}</a></td>
            </tr>
            <tr>
                <th>Adresse mail</th>
                <td><a href="mailto:{{ $contact->getMailAddress() }}">{{ $contact->getMailAddress() }}</a></td>
            </tr>
        </tbody>
    </table>
@endsection