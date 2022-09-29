@extends('master')

@section('title', $contact->getLastName().$contact->getFirstName())

@if(isset($feedback))
    <h4>Attention</h4>
    <p>{{ $feedback }}</p>
@endif

@section('main')
    @if(isset($feedback))
        <div class="content notification is-danger">
            <button class="delete"></button>
            <p>{{ $feedback }}</p>
        </div>
    @endif
    <article class="content box">
        <h2>Ajout d'un contact</h2>
        <form method="POST" action="/contacts">
            <div class="field">
                <label class="label" for="civility-title">Titre de civilité</label>
                <div class="control">
                    <div class="select">
                        <select name="civilityTitle" id="civility-title">
                            <option value="Autre">Autre</option>
                            <option value="Madame">Madame</option>
                            <option value="Monsieur">Monsieur</option>
                            <option value="Maître">Maître</option>
                            <option value="Docteur">Docteur</option>
                            <option value="Docteure">Docteure</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label" for="lastname">Nom de famille</label>
                <div class="control">
                    <input class="input" type="text" name="lastName" id="lastname" value="{{ $contact->getLastName() }}" placeholder="Nom de famille du contact">
                </div>
            </div>
            <div class="field">
                <label class="label" for="firstname">Premier prénom</label>
                <div class="control">
                    <input class="input" type="text" name="firstName" id="firstname" value="{{ $contact->getFirstName() }}" placeholder="Premier prénom du contact">
                </div>
            </div>
            <div class="field">
                <label class="label" for="secondname">Second prénom</label>
                <div class="control">
                    <input class="input" type="text" name="secondName" id="secondname" value="{{ $contact->getSecondName() }}" placeholder="Second prénom du contact">
                </div>
            </div>
            <div class="field">
                <label class="label" for="organisation">Organisation</label>
                <div class="control">
                    <input class="input" type="text" name="organisation" id="organisation" value="{{ $contact->getOrganisation() }}" placeholder="Organisation du contact">
                </div>
            </div>
            <div class="field">
                <label class="label" for="position">Poste</label>
                <div class="control">
                    <input class="input" type="text" name="position" id="position" value="{{ $contact->getPosition() }}" placeholder="Poste du contact">
                </div>
            </div>
            <div class="field">
                <label class="label" for="phoneNumber">Numéro de téléphone</label>
                <div class="control">
                    <input class="input" type="tel" name="phoneNumber" id="phoneNumber" value="{{ $contact->getPhoneNumber() }}" placeholder="Numéro de téléphone du contact">
                </div>
            </div>
            <div class="field">
                <label class="label" for="mailAddress">Adresse mail</label>
                <div class="control">
                    <input class="input" type="email" name="mailAddress" id="mailAddress" value="{{ $contact->getMailAddress() }}" placeholder="Adresse mail du contact">
                </div>
            </div>
            <div class="field">
                <label class="label" for="note">Note</label>
                <div class="control">
                    <textarea class="textarea" id="note" name="note" placeholder="Note du contact">{{ $contact->getNote() }}</textarea>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <a class="button is-danger is-light" href="/contacts">Retour</a>
                </div>
                <div class="control">
                    <button class="button is-success" type="submit">Ajouter</button>
                </div>
            </div>
        </form>
    </article>
@endsection