import Chart from 'chart.js/auto';

const ctx = document.getElementById('myChart');

const male = parseInt(ctx.dataset.male);
const female = parseInt(ctx.dataset.female);

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Laki-laki', 'Perempuan'],
        datasets: [{
            label: 'Total Mahasiswa',
            data: [male, female],
            backgroundColor: [
                'rgba(54, 162, 235, 0.4)',
                'rgba(255, 99, 132, 0.4)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
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
const majors = JSON.parse(ctx2.dataset.majors);

const labels = majors.map(major => major.name);
const data = majors.map(major => major.count); 

new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total Mahasiswa',
            data: data,
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