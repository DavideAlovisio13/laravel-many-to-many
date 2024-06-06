import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

import Chart from 'chart.js/auto';

//barchart

document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById('barchart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['last year', 'this year', 'this month', 'this week', 'yesterday', 'today'],
            datasets: [{
                label: 'Traffic',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                    'rgb(54, 162, 235)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'linear',
                    from: 1,
                    to: 0,
                    loop: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                },
                tooltip: {
                    titleColor: 'white',
                    bodyColor: 'white',
                    footerColor: 'white',
                }
            }
        }
    });
});

//doughnut chart

document.addEventListener("DOMContentLoaded", () => {
    const ctx2 = document.getElementById('doughnut');

    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['last year', 'this year', 'this month', 'this week', 'yesterday', 'today'],
            datasets: [{
                label: 'Total expenses',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                    'rgb(54, 162, 235)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'linear',
                    from: 1,
                    to: 0,
                    loop: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                },
                tooltip: {
                    titleColor: 'white',
                    bodyColor: 'white'
                }
            }
        }
    });
});

// polarArea chart
document.addEventListener("DOMContentLoaded", () => {
    const ctx3 = document.getElementById('polarArea');

    new Chart(ctx3, {
        type: 'polarArea',
        data: {
            labels: ['last year', 'this year', 'this month', 'this week', 'yesterday', 'today'],
            datasets: [{
                label: 'Total Revenue',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                    'rgb(54, 162, 235)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'linear',
                    from: 1,
                    to: 0,
                    loop: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                },
                tooltip: {
                    titleColor: 'white',
                    bodyColor: 'white'
                }
            }
        }
    });
});

// delete modal 

const deleteSubmitButtons = document.querySelectorAll(".delete-button");

deleteSubmitButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();

        const dataTitle = button.getAttribute("data-item-title");

        const modal = document.getElementById("deleteModal");

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalItemTitle = modal.querySelector("#modal-item-title");
        modalItemTitle.textContent = dataTitle;

        const buttonDelete = modal.querySelector("button.btn-danger");

        buttonDelete.addEventListener("click", () => {
            button.parentElement.submit();
        });
    });
});
