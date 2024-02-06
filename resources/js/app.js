import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import 'flowbite';

import {
    Ripple,
    Input,
    Chart,
    Sidenav,
    Collapse,
    Dropdown,
    Tooltip,
    Select,
    Datetimepicker,
    Datepicker,
    Modal,
    Tab,
    initTE,
} from "tw-elements";
import axios from "axios";
initTE({
    Chart, Tab, Sidenav, Dropdown, Tooltip, Collapse, Ripple, Datepicker,
    Input, Select, Datetimepicker, Modal
});

function getBgColors(data) {
    // Initialize an empty array of colors
    var colors = [];
    // Loop through the data array
    for (var i = 0; i < data.length; i++) {
        // Get the value of the current element
        var value = data[i];
        // Declare a variable to store the color
        var color;
        // Check the value and assign the color accordingly
        if (value == 0 || (value > 0 && value < 5)) {
            color = 'rgba(211, 211, 211, 0.3)';
        }
        else if (value == 5 || (value > 5 && value < 10)) {
            color = 'rgba(255, 0, 0, 0.3)';
        }
        else if (value == 10 || (value > 10 && value < 12)) {
            color = 'rgba(255, 206, 86, 0.3)';
        }
        else if (value == 12 || (value > 12 && value < 14)) {
            color = 'rgba(255, 159, 64, 0.3)';
        }
        else if (value == 14 || (value > 14 && value < 15)) {
            color = 'rgba(0, 0, 255, 0.3)';
        }
        else {
            color = 'rgba(0, 255, 0, 0.3)';
        }

        // Push the color to the colors array
        colors.push(color);
    }
    // Return the colors array
    return colors;
}
function getBdColors(data) {
    // Initialize an empty array of colors
    var colors = [];
    // Loop through the data array
    for (var i = 0; i < data.length; i++) {
        // Get the value of the current element
        var value = data[i];
        // Declare a variable to store the color
        var color;
        // Check the value and assign the color accordingly
        if (value == 0 || (value > 0 && value < 5)) {
            color = 'rgba(211, 211, 211, 1)';
        }
        else if (value == 5 || (value > 5 && value < 10)) {
            color = 'rgba(255, 0, 0, 1)';
        }
        else if (value == 10 || (value > 10 && value < 12)) {
            color = 'rgba(255, 206, 86, 1)';
        }
        else if (value == 12 || (value > 12 && value < 14)) {
            color = 'rgba(255, 159, 64, 1)';
        }
        else if (value == 14 || (value > 14 && value < 15)) {
            color = 'rgba(0, 0, 255, 1)';
        }
        else {
            color = 'rgba(0, 255, 0, 1)';
        }

        // Push the color to the colors array
        colors.push(color);
    }
    // Return the colors array
    return colors;
}
// Fetch the data from the URL
axios.get("/chart-data")
    .then(response => {
        // Get the data from the response
        const data = response.data;

        // Data
        const dataChartOptionsExample = {
            type: 'bar',
            data: {
                labels: data.labels, // Use the labels from the data
                datasets: [
                    {
                        label: 'Moyenne',
                        data: data.data, // Use the data from the data
                        backgroundColor: getBgColors(data.data),
                        borderColor: getBdColors(data.data),
                        borderWidth: 1,
                    },
                ],
            },
        };

        // Options
        const optionsChartOptionsExample = {
            options: {
                scales: {
                    x: {
                        ticks: {
                            color: '#4285F4',
                        },
                    },
                    y: {
                        ticks: {
                            color: '#f44242',
                        },
                    },
                },
                tooltips: { // Place the tooltips option inside the options object
                    callbacks: {
                        // Use the label callback to show the student name, the matricule, and the mark
                        label: function (tooltipItem, data) {
                            // Get the index of the tooltip item
                            const index = tooltipItem.index;
                            // Get the student name from the student names array
                            const name = data.student_name[index];
                            // Get the matricule from the labels array
                            const matricule = data.labels[index];
                            // Get the mark from the data array
                            const mark = data.datasets[0].data[index];
                            // Return the formatted string for the tooltip box
                            return name + ' (' + matricule + '): ' + mark;
                        },
                    },
                },
            },
        };


        // Create the chart
        new Chart(
            document.getElementById('chart-options-example'),
            dataChartOptionsExample,
            optionsChartOptionsExample
        );
    })
    .catch(error => {
        // Handle the error
        console.error(error);
    });

// Data
// const dataChartOptionsExample = {
//     type: 'bar',
//     data: {
//         labels: ['24ISIG1047', '24ISIG1046', '24ISIG1045', '24ISIG1044', '24ISIG1043', '24ISIG1042'],
//         datasets: [
//             {
//                 label: 'Moyenne',
//                 data: [6, 3, 12.4, 13.5, 12.2, 1.2],
//                 backgroundColor: [
//                     'rgba(255, 99, 132, 0.2)',
//                     'rgba(54, 162, 235, 0.2)',
//                     'rgba(255, 206, 86, 0.2)',
//                     'rgba(75, 192, 192, 0.2)',
//                     'rgba(153, 102, 255, 0.2)',
//                     'rgba(255, 159, 64, 0.2)',
//                 ],
//                 borderColor: [
//                     'rgba(255,99,132,1)',
//                     'rgba(54, 162, 235, 1)',
//                     'rgba(255, 206, 86, 1)',
//                     'rgba(75, 192, 192, 1)',
//                     'rgba(153, 102, 255, 1)',
//                     'rgba(255, 159, 64, 1)',
//                 ],
//                 borderWidth: 1,
//             },
//         ],
//     },
// };

// // Options
// const optionsChartOptionsExample = {
//     options: {
//         scales: {
//             x:
//             {
//                 ticks: {
//                     color: '#4285F4',
//                 },
//             },
//             y:
//             {
//                 ticks: {
//                     color: '#f44242',
//                 },
//             },
//         },
//     },
// };

// new Chart(
//     document.getElementById('chart-options-example'),
//     dataChartOptionsExample,
//     optionsChartOptionsExample
// );

document
    .getElementById("slim-toggler")
    .addEventListener("click", () => {
        const instance = Sidenav.getInstance(
            document.getElementById("sidenav-4")
        );
        instance.toggleSlim();
    });

const instanceMode = Sidenav.getInstance(
    document.getElementById("sidenav-2")
);
const modes = ["push", "over", "side"];

modes.forEach((mode) => {
    const modeSwitch = document.getElementById(mode);
    modeSwitch.addEventListener("click", () => {
        const instance = Sidenav.getInstance(
            document.getElementById("sidenav-2")
        );
        instance.changeMode(mode);
        modes.forEach((el) => {
            if (el === mode) {
                ["text-blue-600", "border-blue-600"].forEach((item) =>
                    modeSwitch.classList.remove(item)
                );
                modeSwitch.className +=
                    " bg-blue-600 text-white hover:bg-blue-700 active:bg-blue-800 focus:bg-blue-700 border-transparent";
            } else {
                const node = document.getElementById(el);
                node.className += " text-blue-600 border-blue-600";
                [
                    "bg-blue-600",
                    "text-white",
                    "hover:bg-blue-700",
                    "active:bg-blue-800",
                    "focus:bg-blue-700",
                    "border-transparent",
                ].forEach((item) => node.classList.remove(item));
            }
        });
    });
});
require('./vendor/livewire-ui/modal');


// Reference from vendor
require('../../vendor/livewire-ui/modal/resources/js/modal');