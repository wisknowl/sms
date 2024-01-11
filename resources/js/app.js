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
initTE({
    Chart, Tab, Sidenav, Dropdown, Tooltip, Collapse, Ripple, Datepicker,
    Input, Select, Datetimepicker, Modal
});
require('./vendor/livewire-ui/modal');


// Reference from vendor
require('../../vendor/livewire-ui/modal/resources/js/modal');