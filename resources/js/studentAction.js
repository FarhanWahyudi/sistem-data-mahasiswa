const showStudent = document.getElementById('show-student')
const editStudent = document.getElementById('edit-student')
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
        
        showStudent.classList.add('hidden');
        
        editStudent.classList.add('hidden');
        
        addStudent.classList.remove('hidden');
    })
})

document.querySelectorAll('.btn-show').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.dataset.id;
        
        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-student-empty').classList.add('hidden');

        addStudent.classList.add('hidden');

        showStudent.classList.remove('hidden');

        editStudent.classList.add('hidden');

        fetch(`/admin/mahasiswa/${id}`)
        .then(res => res.json())
        .then(data => {
            const container = document.querySelector('#show-student-container');

            const date = new Date(data.birth_date);
            const dateFormatted = new Intl.DateTimeFormat('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            }).format(date);

            container.innerHTML = `
                <div class="flex flex-col sm:flex-row">
                    <div class="flex text-gray-600 dark:text-gray-300 justify-between">
                        <span class="w-36">NIM</span>
                        <span class="hidden sm:block">:&nbsp;</span>
                    </div>
                    <span class="dark:text-gray-200">${data.nim}</span>
                </div>
                <div class="flex flex-col sm:flex-row">
                    <div class="flex text-gray-600 dark:text-gray-300 justify-between">
                        <span class="w-36">NAMA</span>
                        <span class="hidden sm:block">:&nbsp;</span>
                    </div>
                    <span class="dark:text-gray-200">${data.name}</span>
                </div>
                <div class="flex flex-col sm:flex-row">
                    <div class="flex text-gray-600 dark:text-gray-300 justify-between">
                        <span class="w-36">JURUSAN</span>
                        <span class="hidden sm:block">:&nbsp;</span>
                    </div>
                    <span class="dark:text-gray-200">${data.major.name}</span>
                </div>
                <div class="flex flex-col sm:flex-row">
                    <div class="flex text-gray-600 dark:text-gray-300 justify-between">
                        <span class="w-36">TANGGAL LAHIR</span>
                        <span class="hidden sm:block">:&nbsp;</span>
                    </div>
                    <span class="dark:text-gray-200">${dateFormatted}</span>
                </div>
                <div class="flex flex-col sm:flex-row">
                    <div class="flex text-gray-600 dark:text-gray-300 justify-between">
                        <span class="w-36">GENDER</span>
                        <span class="hidden sm:block">:&nbsp;</span>
                    </div>
                    <span class="dark:text-gray-200">${data.gender === 'male' ? 'Laki-laki' : 'Perempuan'}</span>
                </div>
                <div class="flex flex-col sm:flex-row">
                    <div class="flex text-gray-600 dark:text-gray-300 justify-between">
                        <span class="w-36">ALAMAT</span>
                        <span class="hidden sm:block">:&nbsp;</span>
                    </div>
                    <span class="dark:text-gray-200">${data.address}</span>
                </div>
            `
        })
        .catch(err => console.error('Gagal ambil data:', err));
    });
});

document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.dataset.id;

        modal.classList.remove('hidden')
        modal.classList.add('flex')

        document.getElementById('data-student-empty').classList.add('hidden');

        addStudent.classList.add('hidden');

        showStudent.classList.add('hidden');

        editStudent.classList.remove('hidden');

        fetch(`/admin/mahasiswa/${id}`)
        .then(res => res.json())
        .then(data => {
            const matches = data.address.match(/Kec\.\s*(.*?)\s+Kab\.\s*(.*?)\s+Prov\.\s*(.*)/i);
            const [, kecamatan, kabupaten, provinsi] = matches;

            document.getElementById('input-id').value = data.id;
            document.getElementById('edit-nim').value = data.nim;
            document.getElementById('edit-name').value = data.name;
            document.getElementById('edit-major').value = data.major.id;
            document.getElementById('edit-birth-date').value = data.birth_date;
            document.getElementById('edit-gender').value = data.gender;
            document.getElementById('edit-kecamatan').value = kecamatan;
            document.getElementById('edit-kabupaten').value = kabupaten;
            document.getElementById('edit-provinsi').value = provinsi;
        })
        .catch(err => console.error('Gagal ambil data jurusan:', err));
    })
})

// menambahkan data mahasiswa secara AJAX (tanpa reload) agar pesan error tidak hilang
document.getElementById('student-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch("/admin/mahasiswa", {
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
                document.getElementById('nim-error').textContent = data.errors.nim?.[0] || '';
                document.getElementById('name-error').textContent = data.errors.name?.[0] || '';
                document.getElementById('major-error').textContent = data.errors.major?.[0] || '';
                document.getElementById('birth-date-error').textContent = data.errors.birth_date?.[0] || '';
                document.getElementById('gender-error').textContent = data.errors.gender?.[0] || '';
                document.getElementById('kec-error').textContent = data.errors.kecamatan?.[0] || '';
                document.getElementById('kab-error').textContent = data.errors.kabupaten?.[0] || '';
                document.getElementById('prov-error').textContent = data.errors.provinsi?.[0] || '';
            }
        } else {
            location.reload();
        }
    })
    .catch(error => console.error('Gagal kirim:', error));
});

// mengedit data mahasiswa secara AJAX (tanpa reload) agar pesan error tidak hilang
document.getElementById('student-edit-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const id = form.querySelector('input[name="id-student"]').value;

    fetch(`/admin/mahasiswa/update/${id}`, {
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
                document.getElementById('edit-nim-error').textContent = data.errors.nim?.[0] || '';
                document.getElementById('edit-name-error').textContent = data.errors.name?.[0] || '';
                document.getElementById('edit-major-error').textContent = data.errors.major_id?.[0] || '';
                document.getElementById('edit-birth-date-error').textContent = data.errors.birth_date?.[0] || '';
                document.getElementById('edit-gender-error').textContent = data.errors.gender?.[0] || '';
                document.getElementById('edit-kec-error').textContent = data.errors.kecamatan?.[0] || '';
                document.getElementById('edit-kab-error').textContent = data.errors.kabupaten?.[0] || '';
                document.getElementById('edit-prov-error').textContent = data.errors.provinsi?.[0] || '';
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