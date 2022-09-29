function deleteContact() {
    if (confirm("Voulez-vous vraiment supprimer ce contact ?")) {
        document.location.href += '/delete';
    }
}