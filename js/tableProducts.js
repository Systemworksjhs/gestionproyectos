$(document).ready(function () {
    $('#tableProducts').DataTable();
    
});

$('#tableProducts').DataTable( {
    language: {
        
        processing:     "Traitement en cours...",
        search:         "Buscar:",
        lengthMenu:    "Mostrar _MENU_ productos",
        info:           "Mostrando _END_ de _TOTAL_ productos",
        
        
        paginate: {
            first:      "Primero",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Último"
        },
        aria: {
            sortAscending:  ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
        }
    }
});




