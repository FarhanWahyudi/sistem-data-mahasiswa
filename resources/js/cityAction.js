const showCity = document.getElementById('show-city')
const editCity = document.getElementById('edit-city')
const addCity = document.getElementById('add-city')
const dataCityEmpty = document.getElementById('data-city-empty')
const modal = document.getElementById('modal')
const modalContent = document.getElementById('modal-content');
const errorCityMessages = document.querySelectorAll('.error-city-message');

// close modal ketika diclick di luar modal
modal.addEventListener('click', function (e) {
    if (!modalContent.contains(e.target)) {
        modal.classList.add('hidden');

        dataCityEmpty.classList.remove('hidden');
        addCity.classList.add('hidden');
        showCity.classList.add('hidden');
        editCity.classList.add('hidden');

        errorCityMessages.forEach(el => el.innerText = '');
    }
});

// close modal dengan button
document.querySelectorAll('.btn-close-city').forEach(button => {
    button.addEventListener('click', function () {
        modal.classList.add('hidden');

        dataCityEmpty.classList.remove('hidden');
        addCity.classList.add('hidden');
        showCity.classList.add('hidden');
        editCity.classList.add('hidden');

        errorCityMessages.forEach(el => el.innerText = '');
    })
})

// menampilkan modal tambah kota
document.querySelectorAll('.btn-add-city').forEach(button => {
    button.addEventListener('click', function () {
        modal.classList.remove('hidden')
        modal.classList.add('flex')

        dataCityEmpty.classList.add('hidden');       
        showCity.classList.add('hidden');        
        editCity.classList.add('hidden');       
        addCity.classList.remove('hidden');

        errorCityMessages.forEach(el => el.innerText = '');
    })
})

// menampilkan modal detail kota
document.querySelectorAll('.btn-show').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.dataset.id;
        
        modal.classList.remove('hidden')
        modal.classList.add('flex')

        dataCityEmpty.classList.add('hidden');
        addCity.classList.add('hidden');
        showCity.classList.remove('hidden');
        editCity.classList.add('hidden');

        errorCityMessages.forEach(el => el.innerText = '');

        fetch(`/admin/kota/${id}/students`)
        .then(res => res.json())
        .then(data => {
            const tbody = document.querySelector('#students-table-body');
            const label = document.querySelector('#city-label');

            tbody.innerHTML = '';
            label.innerHTML = data.city.name;

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

// menampilkan modal edit jurusan
document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.dataset.id;

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        dataCityEmpty.classList.add('hidden');
        addCity.classList.add('hidden');
        showCity.classList.add('hidden');
        editCity.classList.remove('hidden')

        errorCityMessages.forEach(el => el.innerText = '');

        fetch(`/admin/kota/${id}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('input-name').value = data.name;
            document.getElementById('input-id').value = id;
        })
        .catch(err => console.error('Gagal ambil data jurusan:', err));
    })
})

// menambahkan data kota secara AJAX (tanpa reload) agar pesan error tidak hilang
document.getElementById('city-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch("/admin/kota", {
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
                document.getElementById('name-error').textContent = data.errors.city?.[0] || '';
            }
        } else {
            location.reload();
        }
    })
    .catch(error => console.error('Gagal kirim:', error));
});

// mengedit data kota secara AJAX (tanpa reload) agar pesan error tidak hilang
document.getElementById('city-edit-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const id = form.querySelector('input[name="id-city"]').value;

    fetch(`/admin/kota/update/${id}`, {
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
                document.getElementById('edit-name-error').textContent = data.errors.city?.[0] || '';
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