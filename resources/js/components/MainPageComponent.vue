<script>

import HeaderComponent from './HeaderComponent.vue';
import MainBannerComponent from './MainBannerComponent.vue';
import TechnologiesComponent from './TechnologiesComponent.vue';
import ServicesComponent from './ServicesComponent.vue';
import FormComponent from "./FormComponent.vue";
import FooterComponent from './FooterComponent.vue';
import RecentWorks from './RecentWorks.vue';
import UpperComponent from './UpperComponent.vue';

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
        "footer-component": FooterComponent,
        "recent-works":RecentWorks,
        "upper-component":UpperComponent
    }
}
</script>
<template>
    <main-banner></main-banner>
    <hr>
    <recent-works id="recent_works"></recent-works>
    <hr>
    <technologies-component id="stack"></technologies-component>
    <hr>
    <services-component id="services"></services-component>
    <hr>
    <form-component id="feedback"></form-component>
    <hr>
    <upper-component></upper-component>
</template>