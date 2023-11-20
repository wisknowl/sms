import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

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
    Modal,
    Tab,
    initTE,
} from "tw-elements";
initTE({
    Chart, Tab, Sidenav, Dropdown, Tooltip, Collapse, Ripple,
    Input, Select, Datetimepicker, Modal
});
