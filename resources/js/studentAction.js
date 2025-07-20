const showStudent = document.querySelectorAll('.show-student')
const editStudent = document.querySelectorAll('.edit-student')
const addStudent = document.getElementById('add-student')
const modal = document.getElementById('modal')
const modalContent = document.getElementById('modal-content');

modal.addEventListener('click', function (e) {
    if (!modalContent.contains(e.target)) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
});

document.querySelectorAll('.btn-add-student').forEach(button => {
    button.addEventListener('click', function () {

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-student-empty').classList.add('hidden');
        
        showStudent.forEach((student) => {
            student.classList.add('hidden');
        });
        
        editStudent.forEach((student) => {
            student.classList.add('hidden');
        });
        
        addStudent.classList.remove('hidden');
    })
})

document.querySelectorAll('.btn-show').forEach(button => {
    button.addEventListener('click', function () {
        const nim = this.dataset.nim;
        
        history.pushState({}, '', '?nim=' + nim);

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-student-empty').classList.add('hidden');

        addStudent.classList.add('hidden');

        showStudent.forEach((student) => {
            student.classList.add('hidden');
        });

        editStudent.forEach((student) => {
            student.classList.add('hidden');
        });

        showStudent.forEach((student) => {
            if (student.dataset.showStudent == nim) {
                student.classList.remove('hidden')
            }
        })
    });
});

document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function () {
        const nim = this.dataset.nim;

        history.pushState({}, '', '?edit-nim=' + nim);

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-student-empty').classList.add('hidden');

        addStudent.classList.add('hidden');

        showStudent.forEach((student) => {
            student.classList.add('hidden');
        });

        editStudent.forEach((student) => {
            student.classList.add('hidden');
        });

        editStudent.forEach((student) => {
            if (student.dataset.editStudent == nim) {
                student.classList.remove('hidden')
            }
        })
    })
})