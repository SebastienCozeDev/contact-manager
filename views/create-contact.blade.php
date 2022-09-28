@extends('master')

@section('title', $title)

@if(isset($feedback))
    <h4>Attention</h4>
    <ul>
        @foreach($feedback as $info)
            <li>{{ $info }}</li>
        @endforeach
    </ul>
@endif

@section('main')
    <form method="POST" action="/contacts">
        <fieldset>
            <legend>Ajout d'un contact</legend>
            <div>
                <label for="civility-title">Titre de civilité : </label>
                <select name="civilityTitle" id="civility-title">
                    <option value="Madame">Madame</option>
                    <option value="Monsieur">Monsieur</option>
                    <option value="Maître">Maître</option>
                    <option value="Docteur">Docteur</option>
                    <option value="Docteure">Docteure</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
            <div>
                <label for="lastname">Nom de famille : </label>
                <input type="text" name="lastName" id="lastname" value="{{ $contact->getLastName() }}" placeholder="Nom de famille du contact">
            </div>
            <div>
                <label for="firstname">Premier prénom : </label>
                <input type="text" name="firstName" id="firstname" value="{{ $contact->getFirstName() }}" placeholder="Premier prénom du contact">
            </div>
            <div>
                <label for="secondname">Second prénom : </label>
                <input type="text" name="secondName" id="secondname" value="{{ $contact->getSecondName() }}" placeholder="Second prénom du contact">
            </div>
            <div>
                <label for="organisation">Organisation : </label>
                <input type="text" name="organisation" id="organisation" value="{{ $contact->getOrganisation() }}" placeholder="Organisation du contact">
            </div>
            <div>
                <label for="position">Poste : </label>
                <input type="text" name="position" id="position" value="{{ $contact->getPosition() }}" placeholder="Poste du contact">
            </div>
            <div>
                <label for="phoneNumber">Numéro de téléphone : </label>
                <input type="tel" name="phoneNumber" id="phoneNumber" value="{{ $contact->getPhoneNumber() }}" placeholder="Numéro de téléphone du contact">
            </div>
            <div>
                <label for="mailAddress">Adresse mail : </label>
                <input type="email" name="mailAddress" id="mailAddress" value="{{ $contact->getMailAddress() }}" placeholder="Adresse mail du contact">
            </div>
            <div>
                <label for="note">Note : </label>
                <textarea id="note" name="note" placeholder="Note du contact">{{ $contact->getMailAddress() }}</textarea>
            </div>
            <div>
                <button type="submit">Ajouter</button>
            </div>email
        </fieldset>
    </form>
@endsection