@extends('master')

@section('title', $title)

@section('main')
    <article class="box content">
        <h2>{{ $title ?? 'Liste des contacts' }}</h2>
        <table>
            <thead>
            <tr>
                <th>Identifiant</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Organisation</th>
                <th>Numéro de téléphone</th>
                <th>Adresse mail</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->getId() }}</td>
                    <td>{{ $contact->getLastName() }}</td>
                    <td>{{ $contact->getFirstName() }}</td>
                    <td>{{ $contact->getOrganisation() }}</td>
                    <td><a href="tel:{{ $contact->getPhoneNumber() }}">{{ $contact->getPhoneNumber() }}</a></td>
                    <td><a href="mailto:{{ $contact->getMailAddress() }}">{{ $contact->getMailAddress() }}</a></td>
                    <td><a class="button is-info is-normal" href="/contacts/{{ $contact->getId() }}">Voir</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </article>
@endsection