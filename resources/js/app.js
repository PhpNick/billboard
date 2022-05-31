require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('favorite-button-component', require('./components/FavoriteButtonComponent.vue').default);

const app = new Vue({
    el: '#app',
});

import Swal from 'sweetalert2';
window.Swal = Swal;

import * as FilePond from 'filepond';
import ru_RU from 'filepond/locale/ru-ru.js';
FilePond.setOptions(ru_RU);
window.FilePond = FilePond;
// Import the Image Preview plugin
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
// Import the plugin styles
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

// Register plugins with FilePond
FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateSize,
    FilePondPluginFileValidateType
    );

import PhotoSwipeLightbox from 'photoswipe/lightbox';

const lightbox = new PhotoSwipeLightbox({
  gallery: '#photo-gallery',
  children: 'a',
  showHideAnimationType: 'fade',
  pswpModule: () => import('photoswipe')
});
lightbox.init();
