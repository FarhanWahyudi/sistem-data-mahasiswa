const showMajor = document.getElementById('show-major')
const editMajor = document.getElementById('edit-major')
const addMajor = document.getElementById('add-major')
const modal = document.getElementById('modal')
const modalContent = document.getElementById('modal-content');

modal.addEventListener('click', function (e) {
    if (!modalContent.contains(e.target)) {
        const baseUrl = window.location.origin + window.location.pathname;
        history.replaceState({}, '', baseUrl);

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
});

document.querySelectorAll('.btn-add-major').forEach(button => {
    button.addEventListener('click', function () {

        const baseUrl = window.location.origin + window.location.pathname;
        history.replaceState({}, '', baseUrl);

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-major-empty').classList.add('hidden');
        
        showMajor.classList.add('hidden');
        
        editMajor.classList.add('hidden');
        
        addMajor.classList.remove('hidden');
    })
})

document.querySelectorAll('.btn-show').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.dataset.id;
        
        history.pushState({}, '', '?id=' + id);

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-major-empty').classList.add('hidden');

        addMajor.classList.add('hidden');

        showMajor.classList.remove('hidden');

        editMajor.classList.add('hidden');

        fetch(`/admin/jurusan/${id}/students`)
        .then(res => res.json())
        .then(data => {
            const tbody = document.querySelector('#students-table-body');
            tbody.innerHTML = '';

            if (data.students.length === 0) {
                tbody.innerHTML = '<tr><td colspan="2" class="text-center py-4 text-gray-500">Tidak ada data mahasiswa</td></tr>';
                return;
            }

            data.students.forEach(student => {
                const row = `
                    <tr class="border-b border-gray-200 dark:border-gray-400 transition-all duration-300">
                        <td class="px-3 text-xs py-4 text-gray-700 dark:text-gray-300 md:text-sm">${student.nim}</td>
                        <td class="px-3 text-xs py-4 text-gray-700 dark:text-gray-300 md:text-sm">${student.name}</td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });
        })
        .catch(err => console.error('Gagal ambil data:', err));
    });
});

document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.dataset.id;

        history.pushState({}, '', '?edit-id=' + id);

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-major-empty').classList.add('hidden');

        addMajor.classList.add('hidden');

        showMajor.classList.add('hidden');

        editMajor.classList.remove('hidden')

        fetch(`/admin/jurusan/${id}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('input-name').value = data.name;
            document.getElementById('input-id').value = id;
        })
        .catch(err => console.error('Gagal ambil data jurusan:', err));
    })
})

window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');
    const editId = params.get('edit-id');

    if (id) {
        document.querySelector(`.btn-show[data-id="${id}"]`)?.click();
    }

    if (editId) {
        document.querySelector(`.btn-edit[data-id="${editId}"]`)?.click();
    }
});

// menambahkan data jurusan secara AJAX (tanpa reload) agar pesan error tidak hilang
document.getElementById('major-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch("/admin/jurusan", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": form.querySelector('input[name=_token]').value,
            "Accept": "application/json"
        },
        body: formData
    })
    .then(async response => {
        if (!response.ok) {
            const data = await response.json();
            if (data.errors) {
                document.getElementById('name-error').textContent = data.errors.major?.[0] || '';
            }
        } else {
            location.reload();
        }
    })
    .catch(error => console.error('Gagal kirim:', error));
});

// mengedit data jurusan secara AJAX (tanpa reload) agar pesan error tidak hilang
document.getElementById('major-edit-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const id = form.querySelector('input[name="id-major"]').value;

    fetch(`/admin/jurusan/update/${id}`, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": form.querySelector('input[name=_token]').value,
            "Accept": "application/json"
        },
        body: formData
    })
    .then(async response => {
        if (!response.ok) {
            const data = await response.json();
            if (data.errors) {
                document.getElementById('edit-name-error').textContent = data.errors.major?.[0] || '';
            }
        } else {
            const url = new URL(window.location.href);
            url.searchParams.delete('edit-id');
            window.history.replaceState({}, '', url); // Update URL di address bar tanpa reload
            window.location.reload();
        }
    })
    .catch(error => console.error('Gagal kirim:', error));
});