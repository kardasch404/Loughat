function loadCategorieData(e)
{
    document.getElementById('categorie_id').value = e.getAttribute('data-id')
    document.getElementById('name').value = e.getAttribute('data-name')
    document.getElementById('logo').value = e.getAttribute('data-logo')
}

function loadRoleData(e)
{
    document.getElementById('role_id').value = e.getAttribute('data-id')
    document.getElementById('name').value = e.getAttribute('data-name')

}
function loadUserData(e)
{
    document.getElementById('user_id').value = e.getAttribute('data-id')
    document.getElementById('firstname').value = e.getAttribute('data-firstname')
    document.getElementById('lastname').value = e.getAttribute('data-lastname')
    document.getElementById('email').value = e.getAttribute('data-email')
    document.getElementById('phone').value = e.getAttribute('data-phone')
    document.getElementById('photo').value = e.getAttribute('data-photo')
    document.getElementById('bio').value = e.getAttribute('data-bio')
}





