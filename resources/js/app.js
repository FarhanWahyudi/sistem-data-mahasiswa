import './bootstrap';
import Chart from 'chart.js/auto';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Laki-laki', 'Perempuan'],
        datasets: [{
            label: 'Total Mahasiswa',
            data: [12, 19],
            backgroundColor: [
                'rgba(255, 99, 132, 0.4)',
                'rgba(54, 162, 235, 0.4)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        maintainAspectRatio: false,
    }
});

const ctx2 = document.getElementById('myChart2');

new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Teknik Sipil', 'Teknik Informatika', 'Teknik Mesin', 'Teknik Elektro'],
        datasets: [{
            label: 'Total Mahasiswa',
            data: [12, 19, 3, 5],
            backgroundColor: [
                'rgba(255, 99, 132, 0.4)',
                'rgba(54, 162, 235, 0.4)',
                'rgba(255, 206, 86, 0.4)',
                'rgba(75, 192, 192, 0.4)',
                'rgba(153, 102, 255, 0.4)',
                'rgba(200, 19, 225, 0.4)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(200, 19, 225, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        maintainAspectRatio: false,
    }
});

const navigation = document.getElementById('navigation');
const burger = document.getElementById('burger');
const burgerSpan = document.querySelectorAll('.burger-span');

burger.addEventListener('click', () => {
    if (navigation.classList.contains('hidden')) {
        navigation.classList.remove('hidden');
        burgerSpan.forEach(span => {
            span.classList.remove('w-full');
            span.classList.add('w-[70%]');
        });
        setTimeout(() => {
            navigation.classList.remove('-translate-x-full');
            navigation.classList.add('translate-x-0');
        }, 100);
    } else {
        navigation.classList.remove('translate-x-0');
        navigation.classList.add('-translate-x-full');
        burgerSpan.forEach(span => {
            span.classList.add('w-full');
            span.classList.remove('w-[70%]');
        });
        setTimeout(() => {
            navigation.classList.add('hidden');
        }, 300);
    }
})

const darkModeToggle = document.getElementById('darkModeToggle');
const savedTheme = localStorage.getItem('theme');

if (savedTheme === 'dark') {
  document.documentElement.classList.add('dark');
}

darkModeToggle.addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
})