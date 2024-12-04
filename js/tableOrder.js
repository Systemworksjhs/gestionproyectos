$(document).ready(function () {
    $('#tableOrder').DataTable();
    
});

$('#tableOrder').DataTable( {
    language: {
        
        processing:     "Traitement en cours...",
        search:         "Buscar:",
        lengthMenu:    "Mostrar _MENU_ compras",
        info:           "Mostrando _END_ de _TOTAL_ compras",
        
        
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




