<script>

import HeaderComponent from './HeaderComponent.vue';
import MainBannerComponent from './MainBannerComponent.vue';
import TechnologiesComponent from './TechnologiesComponent.vue';
import ServicesComponent from './ServicesComponent.vue';
import FormComponent from "./FormComponent.vue";
import FooterComponent from './FooterComponent.vue';

export default {
    data() {
        return {

        }
        HeaderComponent
    },
    $route: {
        immediate: true,
        handler(to, from) {
            document.title = to.meta.title || '';
        }
    },
    components: {
        'header-component': HeaderComponent,
        'main-banner': MainBannerComponent,
        'technologies-component': TechnologiesComponent,
        "services-component": ServicesComponent,
        "form-component": FormComponent,
        "footer-component": FooterComponent
    }
}
</script>
<template>
    <main-banner></main-banner>
    <technologies-component></technologies-component>
    <services-component></services-component>
    <form-component></form-component>
</template>