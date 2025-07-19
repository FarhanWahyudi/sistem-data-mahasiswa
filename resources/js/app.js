import './bootstrap';
import Chart from 'chart.js/auto';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Red', 'Blue'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19],
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
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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
const open = document.getElementById('open');
const close = document.getElementById('close');
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