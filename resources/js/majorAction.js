const showMajor = document.querySelectorAll('.show-major')
const editMajor = document.querySelectorAll('.edit-major')
const addMajor = document.getElementById('add-major')
const modal = document.getElementById('modal')
const modalContent = document.getElementById('modal-content');

modal.addEventListener('click', function (e) {
    if (!modalContent.contains(e.target)) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
});

document.querySelectorAll('.btn-add-major').forEach(button => {
    button.addEventListener('click', function () {

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-major-empty').classList.add('hidden');
        
        showMajor.forEach((major) => {
            major.classList.add('hidden');
        });
        
        editMajor.forEach((major) => {
            major.classList.add('hidden');
        });
        
        addMajor.classList.remove('hidden');
    })
})

document.querySelectorAll('.btn-show').forEach(button => {
    button.addEventListener('click', function () {
        const nim = this.dataset.nim;
        
        history.pushState({}, '', '?nim=' + nim);

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-major-empty').classList.add('hidden');

        addMajor.classList.add('hidden');

        showMajor.forEach((major) => {
            major.classList.add('hidden');

            if (major.dataset.showMajor == nim) {
                major.classList.remove('hidden')
            }
        });

        editMajor.forEach((major) => {
            major.classList.add('hidden');
        });
    });
});

document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function () {
        const nim = this.dataset.nim;

        history.pushState({}, '', '?edit-nim=' + nim);

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-major-empty').classList.add('hidden');

        addMajor.classList.add('hidden');

        showMajor.forEach((major) => {
            major.classList.add('hidden');
        });

        editMajor.forEach((major) => {
            major.classList.add('hidden');

            if (major.dataset.editMajor == nim) {
                major.classList.remove('hidden')
            }
        });
    })
})