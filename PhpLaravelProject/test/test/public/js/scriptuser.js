
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

function deleteUser(id) {
    if (id == window.userId) {
        alert("Вы не можете удалить себя!");
    } else {
        var modal = document.getElementById('deleteUserModal');
        modal.style.display = "block";
        window.userToDeleteId = id;
    }

}
//для удаления
function confirmDeleteUser() {
    var userIdToDelete = window.userToDeleteId;
    var csrfToken = document.querySelector('meta[name="csrf-token-user"]').getAttribute('content');
    var modal = document.getElementById('deleteUserModal');
    modal.style.display = "none";
    fetch('/users/' + userIdToDelete, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        }
    }).then(function(response) {
        if (response.ok) {
            location.reload();
        } else {
            console.error('Ошибка удаления пользователя');
        }
    }).catch(function(error) {
        console.error('Ошибка:', error);
    });
}

//если отмена удаления
function closeDeleteUserModal() {
    var modal = document.getElementById('deleteUserModal');
    modal.style.display = "none";
}

