import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

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