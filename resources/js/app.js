import './bootstrap';
import.meta.glob([
    '../img/**',
    // '../fonts/**',
]);

let inputs = document.querySelectorAll('input:not([type="hidden"])');
if (inputs !== null) {
    inputs[0].focus();
}
