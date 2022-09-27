@extends('master')

@section('title', $title)

@section('main')
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
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
           <tr>
               <td>{{ $contact->getId() }}</td>
               <td>{{ $contact->getLastName() }}</td>
               <td>{{ $contact->getFirstName() }}</td>
               <td>{{ $contact->getOrganisation() }}</td>
               <td>{{ $contact->getPhoneNumber() }}</td>
               <td>{{ $contact->getMailAddress() }}</td>
           </tr>
        @endforeach
        </tbody>
    </table>
@endsection