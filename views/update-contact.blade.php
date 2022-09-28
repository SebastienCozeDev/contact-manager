@extends('master')

@section('title', $contact->getLastName().$contact->getFirstName())

@if(isset($feedback))
    <h4>Attention</h4>
    <p>{{ $feedback }}</p>
@endif

@section('main')
    <form method="POST" action="/contacts/{{ $contact->getId() }}">
        <fieldset>
            <legend>Modification de {{ $contact->getLastName().$contact->getFirstName() }}</legend>
            <div>
                <label for="civility-title">Titre de civilité : </label>
                <select name="civilityTitle" id="civility-title">
                    <option value="Autre">Autre</option>
                    <option value="Madame">Madame</option>
                    <option value="Monsieur">Monsieur</option>
                    <option value="Maître">Maître</option>
                    <option value="Docteur">Docteur</option>
                    <option value="Docteure">Docteure</option>
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
                <a href="/contacts/{{ $contact->getId() }}">Retour</a>
                <button type="submit">Ajouter</button>
            </div>
        </fieldset>
    </form>
@endsection