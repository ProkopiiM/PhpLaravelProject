
function setPerPage(count) {
    var currentUrl = new URL(window.location.href);
    currentUrl.searchParams.set('count', count);
    window.location.href = currentUrl.toString();
}
function applyFilters() {
    var sortField = document.getElementById('sortField').value;
    var sortDirection = document.getElementById('sortDirection').value;
    var nameOrEmail = document.querySelector('input[name="nameOrEmail"]').value;

    var currentUrl = new URL(window.location.href);
    currentUrl.searchParams.set('sort', sortField);
    currentUrl.searchParams.set('direction', sortDirection);
    currentUrl.searchParams.set('nameOrEmail', nameOrEmail);

    window.location.href = currentUrl.toString();
}
// Сохранение выбранных значений combobox после обновления страницы
document.addEventListener("DOMContentLoaded", function() {
    var sortField = document.getElementById('sortField');
    var sortDirection = document.getElementById('sortDirection');
    var nameOrEmail = document.querySelector('input[name="nameOrEmail"]');

    if (sortField && sortDirection && nameOrEmail) {
        var currentUrl = new URL(window.location.href);
        var params = new URLSearchParams(currentUrl.search);

        if (params.has('sort')) {
            var sortFieldValue = params.get('sort');
            sortField.value = sortFieldValue;
        }

        if (params.has('direction')) {
            var sortDirectionValue = params.get('direction');
            sortDirection.value = sortDirectionValue;
        }

        if (params.has('nameOrEmail')) {
            var nameOrEmailValue = params.get('nameOrEmail');
            nameOrEmail.value = nameOrEmailValue;
        }
    }
});
function deleteRequest(id) {
    var modal = document.getElementById('deleteRequestModal');
    modal.style.display = "block";
    window.requestToDeleteId = id;
}
function confirmDeleteRequest() {
    var requestIdToDelete = window.requestToDeleteId;
    var csrfToken = document.querySelector('meta[name="csrf-token-request"]').getAttribute('content');
    var modal = document.getElementById('deleteRequestModal');
    modal.style.display = "none";
    fetch('/requests/' + requestIdToDelete, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        }
    }).then(function(response) {
        if (response.ok) {
            location.reload();
        } else {
            console.error('Ошибка удаления заявки');
        }
    }).catch(function(error) {
        console.error('Ошибка:', error);
    });
}
function closeDeleteRequestModal() {
    var modal = document.getElementById('deleteRequestModal');
    modal.style.display = "none";
}




