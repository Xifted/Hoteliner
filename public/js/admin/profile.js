let editBtn = document.getElementById('editBtn');

editBtn.addEventListener('click', function(){
    let profileEditElems = document.querySelectorAll('.profile-edit');
    profileEditElems.forEach(function(elem) {
        elem.disabled = false;
    });
})